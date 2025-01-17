<?php

namespace App\Console\Commands;

use App\Mail\ErrorNotification;
use Illuminate\Console\Command;
use App\Models\Setting;
use App\Services\CronCommandLogger;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class GhlWorkflow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ghl:add-workflow';

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

    }

    public function connectContactToWorkFlow($enq, $contactId = '', $workflowId = '')
    {
        try {
            Log::info('Workflow::Command - Step 1 started:' . $contactId . '/' . $workflowId);
            $accessToken = Setting::where('attribute', 'access_token')->pluck('value');

            // Define the headers
            $headers = [
                'Authorization' => 'Bearer ' . Crypt::decrypt($accessToken[0]),
                'Accept'        => 'application/json',
                'Version' => $this->version
            ];

            // Send a GET request with query parameters and headers
            // $response = Http::withHeaders($headers)->post($this->apiEndPoint . "/contacts/" . $contactId . "/workflow/" . $workflowId, $postFields);
            $response = Http::withHeaders($headers)->asForm()->post($this->apiEndPoint . "/contacts/" . $contactId . "/workflow/" . $workflowId);

            $statusCode = $response->status();

            // Get the response body
            $body = $response->body();

            // Decode JSON response if needed
            $data = $response->json();

            CronCommandLogger::log($this->signature, $this->apiEndPoint . "/contacts/" . $contactId . "/workflow/" . $workflowId,  json_encode([]), json_encode($data), $statusCode);

            Log::info('Workflow::Command - Step 2 Response Received:' . json_encode($data));

            if (empty($data['succeded'])) {
                $enq->is_added_to_ghl_workflow = 0;
                $enq->updated_on_crm = 0;
                $enq->crm_response = $body;
                $enq->save();
                throw new \Exception(json_encode($data));
            } else {
                $enq->is_added_to_ghl_workflow = 1;
                $enq->updated_on_crm = 1;
                $enq->crm_response = $body;
                $enq->save();
                Log::info("Workflow::Command - Step 3: Contact added to workflow successfully");
            }
        } catch (\Exception $e) {
            Log::error('Workflow::Command - Catch Block Error:' . $e->getMessage());
            if (app()->environment('production')) {
                //// Mail::to(config('constant.error_report_emails'))->send(new ErrorNotification($e));
            }
        }
    }
}
