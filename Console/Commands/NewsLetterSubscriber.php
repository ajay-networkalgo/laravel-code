<?php

namespace App\Console\Commands;

use App\Services\CronCommandLogger;
use Illuminate\Console\Command;
use App\Models\NewsLetter;
use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ErrorNotification;
use App\Models\GhlContact;

class NewsLetterSubscriber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ghl:add-newletter-subscriber';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adding newsletter subscriber to GHL in every 24 hrs';

    protected $apiEndPoint = ''; //Config('services.ghl.api_end_point');
    protected $version = '';
    protected $workFlowId = '';
    protected $locationId = '';

    public function __construct()
    {
        $this->apiEndPoint = Config('services.ghl.api_end_point');
        $this->version = Config('services.ghl.version');
        $this->workFlowId = Config('services.ghl.newsletter_workflow_id');
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

            $enquiries = NewsLetter::where('updated_on_crm', 0)->get();
            $accessToken = Setting::where('attribute', 'access_token')->pluck('value');

            if ($enquiries->count() > 0) {
                foreach ($enquiries as $enq) {

                    $ghlContactExist = GhlContact::where('email', $enq->email)->first();

                    if (empty($ghlContactExist) || $ghlContactExist == null) {

                        // Define the query parameters
                        // Define the POST fields
                        $postFields = [
                            'email'     => $enq->email,
                            'locationId' => $this->locationId,
                            'tags'  => 'news letter completed us website'
                        ];

                        // Define the headers
                        $headers = [
                            'Authorization' => 'Bearer ' . Crypt::decrypt($accessToken[0]),
                            'Accept'        => 'application/json',
                            'Version' => $this->version
                        ];

                        Log::info("NewsLetterSubscriber::Command A - Step1: Preparing Request");

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

                        Log::info('NewsLetterSubscriber::Command A - Step2: Response Received:' . json_encode($data));

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
                            Log::info('NewsLetterSubscriber::Command A - Step3: Finally Contact created successfully');
                        } else {
                            $enq->is_added_to_ghl_contact = 0;
                            $enq->updated_on_crm = 0;
                            $enq->crm_response = $body;
                            $enq->save();
                            Log::info('NewsLetterSubscriber::Command A - Step3: Finally Error Occured -' . json_encode($data));
                            throw new \Exception(json_encode($data));
                        }
                        $enq->save();

                        if (!empty($contactId)) {
                            $workFlowCommand = new GhlWorkflow();
                            $workFlowCommand->connectContactToWorkFlow($enq, $contactId, $this->workFlowId);
                        }
                    } else {
                        $enq->is_added_to_ghl_contact = 1;
                        $enq->save();

                        GhlContact::updateOrCreate([
                            'email' => $enq->email,
                        ], ['phone_number' => $enq->phone_number, 'ghl_contact_id' => $ghlContactExist->ghl_contact_id]);

                        $workFlowCommand = new GhlWorkflow();
                        $workFlowCommand->connectContactToWorkFlow($enq, $ghlContactExist->ghl_contact_id, $this->workFlowId);
                    }
                }
            }
            // Process the response data
        } catch (\Exception $e) {
            Log::error('NewsLetterSubscriber::Command A - Catch Block Error Logged:' . $e->getMessage());
            if (app()->environment('production')) {
                //// Mail::to(config('constant.error_report_emails'))->send(new ErrorNotification($e));
            }
        }
    }

    // public function connectContactToWorkFlow($end, $contactId = '', $workflowId = '')
    // {
    //     echo "HISFd";exit;
    //     try {
    //         // $contactId = 'qAcz6OY1JQyrEJbiAdmt';
    //         // $workflowId = '0bd89ce5-c04e-44cc-a49f-bedb17908c86';
    //         Log::info('NewsLetterSubscriber::Command - connectContactToWorkFlow - Step 1 started:'.$contactId.'/'.$workflowId);
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

    //         // Get the response body
    //         $body = $response->body();

    //         // Decode JSON response if needed
    //         $data = $response->json();

    //         Log::info('NewsLetterSubscriber::Command - connectContactToWorkFlow - Step 2 Response Received:'. json_encode($data));

    //         if (empty($data['succeded'])) {
    //             throw new \Exception(json_encode($data));
    //         } else {
    //             Log::info("NewsLetterSubscriber::Command - connectContactToWorkFlow - Step 3: Contact added to workflow successfully");
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('NewsLetterSubscriber::Command - Catch Block Error:' . $e->getMessage());
    //         Mail::to(config('constant.error_report_emails'))->send(new ErrorNotification($e));
    //     }
    // }
}
