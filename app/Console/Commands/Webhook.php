<?php

namespace App\Console\Commands;

use App\Mail\ErrorNotification;
use App\Models\ConsultationBooking as ModelsConsultationBooking;
use App\Models\ContactUs;
use App\Models\GhlContact;
use App\Services\CronCommandLogger;
use Illuminate\Console\Command;
use App\Models\Setting;
use App\Models\WebhookResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class Webhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ghl:lead-webhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adding Third Party Source Leads to GHL';

    protected $apiEndPoint = '';
    protected $version = '';
    protected $workFlowId = '';
    protected $locationId = '';
    protected $calendarId = '';

    public function __construct()
    {
        $this->apiEndPoint = Config('services.ghl.api_end_point');
        $this->version = Config('services.ghl.version');
        $this->workFlowId = Config('services.ghl.webhook_workflow_id');
        $this->locationId = Config('services.ghl.location_id');
        $this->calendarId = Config('services.ghl.calendar_id');
        parent::__construct();
    }

    public function handle()
    {
        try {
            $leads = WebhookResponse::where('updated_on_crm', 0)->get();
            $accessToken = Setting::where('attribute', 'access_token')->pluck('value');
            if ($leads->count() > 0) {
                foreach ($leads as $enq) {
                    $leadData = json_decode($enq['response']);

                    // Initialize an empty array
                    $arr = [];
                    // Loop through the data
                    foreach ($leadData->user_column_data as $val) {
                        $arr[$val->column_id] = $val->string_value;
                    }


                    $ghlContactExist = GhlContact::where('email', $arr['EMAIL'])->orWhere('phone_number', $arr['PHONE_NUMBER'])->first();

                    if ((empty($ghlContactExist) || $ghlContactExist == null)) {

                        // Define the query parameters
                        // Define the POST fields
                        $postFields = [
                            'name'  => $arr['FULL_NAME'],
                            'email'     => $arr['EMAIL'],
                            'phone' => $arr['PHONE_NUMBER'],
                            'city'  => $arr['CITY'],
                            'state' => $arr['REGION'],
                            'country'     => $arr['COUNTRY'],
                            'locationId' => $this->locationId,
                            'source' => 'Olax Power US - '.$enq->source,
                            'tags' => [
                                "'Olax Power US - $enq->source'"
                            ]
                        ];

                        // Define the headers
                        $headers = [
                            'Authorization' => 'Bearer ' . Crypt::decrypt($accessToken[0]),
                            'Accept'        => 'application/json',
                            'Version' => $this->version
                        ];
                        Log::info("Consultation Booking::Command - Step1: Preparing Request");

                        // Send a GET request with query parameters and headers
                        $response = Http::withHeaders($headers)->post($this->apiEndPoint . '/contacts/upsert', $postFields);

                        $statusCode = $response->status();

                        // Get the response body
                        $body = $response->body();

                        // Decode JSON response if needed
                        $data = $response->json();

                        if((!empty($data['message']) && $data['message'] == 'This location does not allow duplicated contacts.') || !empty($data['meta']['matchingField'])) {
                            $data['contact']['id'] = $data['meta']['contactId'];
                        }

                        CronCommandLogger::log($this->signature, $this->apiEndPoint . '/contacts/upsert',  json_encode($postFields), json_encode($data), $statusCode);

                        Log::info('Consultation Booking::Command - Step2: Response Received:' . json_encode($data));

                        if (!empty($data['contact'])) {
                            $enq->is_added_to_ghl_contact = 1;
                            $enq->crm_response = $body;
                            $enq->save();
                            $contactId = $data['contact']['id'];

                            GhlContact::create([
                                'email' => $arr['EMAIL'],
                                'phone_number' => $arr['PHONE_NUMBER'],
                                'ghl_contact_id' => $contactId
                            ]);

                            Log::info('Consultation Booking::Command - Step3: Finally Contact created successfully');
                        } else {
                            $enq->is_added_to_ghl_contact = 0;
                            $enq->updated_on_crm = 0;
                            $enq->crm_response = $body;
                            $enq->save();
                            Log::info('Consultation Booking::Command - Step3: Finally Error Occured -' . json_encode($data));
                            throw new \Exception(json_encode($data));
                        }

                        if (!empty($contactId)) {

                            // $this->connectContactToWorkFlow($enq, $contactId, $this->workFlowId);
                            $workFlowCommand = new GhlWorkflow();
                            $workFlowCommand->connectContactToWorkFlow($enq, $contactId, $this->workFlowId);
                        }
                    } else {
                        $enq->is_added_to_ghl_contact = 1;
                        $enq->save();

                        GhlContact::updateOrCreate([
                            'email' => $arr['EMAIL'],
                        ], ['phone_number' => $arr['PHONE_NUMBER'], 'ghl_contact_id' => $ghlContactExist->ghl_contact_id]);

                        $workFlowCommand = new GhlWorkflow();
                        $workFlowCommand->connectContactToWorkFlow($enq, $ghlContactExist->ghl_contact_id, $this->workFlowId);
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error('Consultation Booking::Command - Catch Block Error Logged:' . $e->getMessage());
            if (app()->environment('production')) {
                //// Mail::to(config('constant.error_report_emails'))->send(new ErrorNotification($e));
            }
        }
    }
}
