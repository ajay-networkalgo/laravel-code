<?php

namespace App\Console\Commands;

use App\Mail\ErrorNotification;
use App\Models\ConsultationBooking as ModelsConsultationBooking;
use App\Models\ContactUs;
use App\Models\GhlContact;
use App\Services\CronCommandLogger;
use Illuminate\Console\Command;
use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class ConsultationBooking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ghl:consultation-booking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adding Consultation Appointment to GHL';

    protected $apiEndPoint = '';
    protected $version = '';
    protected $workFlowId = '';
    protected $locationId = '';
    protected $calendarId = '';

    public function __construct()
    {
        $this->apiEndPoint = Config('services.ghl.api_end_point');
        $this->version = Config('services.ghl.version');
        $this->workFlowId = Config('services.ghl.consultation_booking_workflow_id');
        $this->locationId = Config('services.ghl.location_id');
        $this->calendarId = Config('services.ghl.calendar_id');
        // echo 'Calender'.$this->calendarId;exit;
        parent::__construct();
    }

    public function handle()
    {
        try {

            $enquiries = ModelsConsultationBooking::where('updated_on_crm', 0)->get();
            $accessToken = Setting::where('attribute', 'access_token')->pluck('value');
            if ($enquiries->count() > 0) {

                foreach ($enquiries as $enq) {

                    $ghlContactExist = GhlContact::where('email', $enq->email)->orWhere('phone_number', $enq->phone)->first();

                    if ((empty($ghlContactExist) || $ghlContactExist == null)) {

                        // Define the query parameters
                        // Define the POST fields
                        $postFields = [
                            'firstName' => $enq->firstname,
                            'lastName' => $enq->lastname,
                            'name'  => $enq->firstname . ' ' . $enq->lastname,
                            'email'     => $enq->email,
                            'phone' => $enq->phone,
                            'address1'     => $enq->address,
                            'locationId' => $this->locationId,
                            'source' => 'SolaX Power US - Consultation Booking',
                            'timezone' => $enq->timezone,
                            'tags' => [
                                "'SolaX Power US - Consultation Booking'"
                            ],
                            'customFields' => [
                                [
                                    'id' => $enq->id . time(),
                                    'key' => 'product',
                                    'field_value' => $enq->product
                                ],
                                [
                                    'id' => $enq->id . time(),
                                    'key' => 'user_type',
                                    'field_value' => $enq->product
                                ],
                                [
                                    'id' => $enq->id . time(),
                                    'key' => 'attachment',
                                    'field_value' => $enq->files
                                ],
                                [
                                    'id' => $enq->id . time(),
                                    'key' => 'appointment_date__time',
                                    'field_value' => $enq->date.' '.$enq->time_slot
                                ]
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

                        Log::info('Consultation Booking::Command - Step2: Response Received:' . json_encode($data));

                        if (!empty($data['contact'])) {
                            $enq->is_added_to_ghl_contact = 1;
                            $enq->crm_response = $body;
                            $enq->save();
                            $contactId = $data['contact']['id'];

                            GhlContact::create([
                                'email' => $enq->email,
                                'phone_number' => $enq->phone,
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

                            // // Appointment Booking
                            // $date = $enq->date;
                            // $timeSlot = $enq->time_slot;
                            // $timeZone = '+05:30';
                            // $convertedDatetime = Carbon::parse($date.' '.$timeSlot)
                            // ->setTimezone($timeZone)
                            // ->format('Y-m-d\TH:i:sP');
                            // $this->addAppointment($contactId, $this->calendarId, $convertedDatetime);
                            // Appointment Booking
                        }
                    } else {
                        // $this->connectContactToWorkFlow($enq, $ghlContactExist->ghl_contact_id, $this->workFlowId);
                        $enq->is_added_to_ghl_contact = 1;
                        $enq->save();

                        GhlContact::updateOrCreate([
                            'email' => $enq->email,
                        ], ['phone_number' => $enq->phone, 'ghl_contact_id' => $ghlContactExist->ghl_contact_id]);

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
