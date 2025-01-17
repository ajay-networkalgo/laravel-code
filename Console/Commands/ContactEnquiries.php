<?php

namespace App\Console\Commands;

use App\Mail\ErrorNotification;
use App\Models\ContactUs;
use App\Models\CronCommandLog;
use App\Models\GhlContact;
use Illuminate\Console\Command;
use App\Models\Setting;
use App\Services\CronCommandLogger;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class ContactEnquiries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ghl:contact-enquiries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adding contact enquiries to GHL';
    protected $apiEndPoint = '';
    protected $version = '';
    protected $workFlowId = '';
    protected $locationId = '';

    public function __construct()
    {
        $this->apiEndPoint = Config('services.ghl.api_end_point');
        $this->version = Config('services.ghl.version');
        $this->workFlowId = Config('services.ghl.contact_us_workflow_id');
        $this->locationId = Config('services.ghl.location_id');

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {

            $enquiries = ContactUs::where('updated_on_crm', 0)->get();
            $accessToken = Setting::where('attribute', 'access_token')->pluck('value');
            if ($enquiries->count() > 0) {

                foreach ($enquiries as $enq) {

                    $ghlContactExist = GhlContact::where('email', $enq->email)->orWhere('phone_number', $enq->phone_number)->first();

                    // print_r($ghlContactExist);exit;

                    if (empty($ghlContactExist) || $ghlContactExist == null) {

                        // Define the query parameters
                        // Define the POST fields
                        $postFields = [
                            'name'  => $enq->name,
                            'email'     => $enq->email,
                            'locationId' => $this->locationId,
                            'phone' => $enq->phone_number,
                            'country' => $enq->country,
                            'source' => 'Solax Power US leads - ' . $enq->enquiry_type,
                            'customFields' => [
                                [
                                    'id' => $enq->id . time(),
                                    'key' => 'message',
                                    'field_value' => $enq->message
                                ],
                                [
                                    'id' => $enq->id . time(),
                                    'key' => 'attachment',
                                    'field_value' => url('/contact_enquiry_attachments/' . $enq->files)
                                ],
                                [
                                    'id' => $enq->id . time(),
                                    'key' => 'user_type',
                                    'field_value' => $enq->type
                                ]
                            ]
                        ];

                        // Define the headers
                        $headers = [
                            'Authorization' => 'Bearer ' . Crypt::decrypt($accessToken[0]),
                            'Accept'        => 'application/json',
                            'Version' => $this->version
                        ];
                        Log::info("ContactEnquiries::Command - Step1: Preparing Request");

                        // Send a GET request with query parameters and headers
                        $response = Http::withHeaders($headers)->post($this->apiEndPoint . '/contacts/', $postFields);

                        $statusCode = $response->status();

                        // Get the response body
                        $body = $response->body();

                        // Decode JSON response if needed
                        $data = $response->json();

                        if((!empty($data['message']) && $data['message'] == 'This location does not allow duplicated contacts.') || !empty($data['meta']['matchingField'])) {
                            $data['contact']['id'] = $data['meta']['contactId'];
                        }

                        CronCommandLogger::log($this->signature, $this->apiEndPoint . '/contacts/',  json_encode($postFields), json_encode($data), $statusCode);

                        Log::info('ContactEnquiries::Command - Step2: Response Received:' . json_encode($data));

                        if (!empty($data['contact'])) {
                            $enq->is_added_to_ghl_contact = 1;
                            $enq->crm_response = $body;
                            $enq->save();
                            $contactId = $data['contact']['id'];

                            GhlContact::create([
                                'email' => $enq->email,
                                'phone_number' => $enq->phone_number,
                                'ghl_contact_id' => $contactId
                            ]);

                            Log::info('ContactEnquiries::Command - Step3: Finally Contact created successfully');
                        } else {
                            $enq->is_added_to_ghl_contact = 0;
                            $enq->updated_on_crm = 0;
                            $enq->crm_response = $body;
                            $enq->save();
                            Log::info('ContactEnquiries::Command - Step3: Finally Error Occured -' . json_encode($data));
                            throw new \Exception(json_encode($data));
                        }

                        if (!empty($contactId)) {

                            // $this->connectContactToWorkFlow($enq, $contactId, $this->workFlowId);
                            $workFlowCommand = new GhlWorkflow();
                            $workFlowCommand->connectContactToWorkFlow($enq, $contactId, $this->workFlowId);
                        }
                    } else {
                        // $this->connectContactToWorkFlow($enq, $ghlContactExist->ghl_contact_id, $this->workFlowId);
                        $enq->is_added_to_ghl_contact = 1;
                        $enq->save();

                        GhlContact::updateOrCreate([
                            'email' => $enq->email,
                        ], ['phone_number' => $enq->phone_number,'ghl_contact_id' => $ghlContactExist->ghl_contact_id]);

                        $workFlowCommand = new GhlWorkflow();
                        $workFlowCommand->connectContactToWorkFlow($enq, $ghlContactExist->ghl_contact_id, $this->workFlowId);
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error('ContactEnquiries::Command - Catch Block Error Logged:' . $e->getMessage());
            if (app()->environment('production')) {
                //// Mail::to(config('constant.error_report_emails'))->send(new ErrorNotification($e));
            }
        }
    }

    // public function connectContactToWorkFlow($enq, $contactId = '', $workflowId = '')
    // {
    //     try {
    //         Log::info('ContactEnquiries::Command - connectContactToWorkFlow - Step 1 started:' . $contactId . '/' . $workflowId);
    //         $accessToken = Setting::where('attribute', 'access_token')->pluck('value');

    //         // Define the headers
    //         $headers = [
    //             'Authorization' => 'Bearer ' . Crypt::decrypt($accessToken[0]),
    //             'Accept'        => 'application/json',
    //             'Version' => $this->version
    //         ];

    //         // Send a GET request with query parameters and headers
    //         // $response = Http::withHeaders($headers)->post($this->apiEndPoint . "/contacts/" . $contactId . "/workflow/" . $workflowId, $postFields);
    //         $response = Http::withHeaders($headers)->asForm()->post($this->apiEndPoint . "/contacts/" . $contactId . "/workflow/" . $workflowId);

    //         $statusCode = $response->status();

    //         // Get the response body
    //         $body = $response->body();

    //         // Decode JSON response if needed
    //         $data = $response->json();

    //         CronCommandLogger::log($this->signature, $this->apiEndPoint . "/contacts/" . $contactId . "/workflow/" . $workflowId,  json_encode([]), json_encode($data), $statusCode);

    //         Log::info('ContactEnquiries::Command - connectContactToWorkFlow - Step 2 Response Received:' . json_encode($data));

    //         if (empty($data['succeded'])) {
    //             $enq->is_added_to_ghl_workflow = 0;
    //             $enq->updated_on_crm = 0;
    //             $enq->crm_response = $body;
    //             $enq->save();
    //             throw new \Exception(json_encode($data));
    //         } else {
    //             $enq->is_added_to_ghl_workflow = 1;
    //             $enq->updated_on_crm = 1;
    //             $enq->crm_response = $body;
    //             $enq->save();
    //             Log::info("ContactEnquiries::Command - connectContactToWorkFlow - Step 3: Contact added to workflow successfully");
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('ContactEnquiries::Command - Catch Block Error:' . $e->getMessage());
    //         Mail::to(config('constant.error_report_emails'))->send(new ErrorNotification($e));
    //     }
    // }
}
