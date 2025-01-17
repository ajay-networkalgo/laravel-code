<?php

namespace App\Console\Commands;

use App\Services\CronCommandLogger;
use Illuminate\Console\Command;
use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Mail\ErrorNotification;
use Illuminate\Support\Facades\Mail;

class RefreshToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ghl:refreshToken';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh token for GHL API every 24 hours';
    protected $apiEndPoint = '';

    public function __construct() {
        $this->apiEndPoint = Config('services.ghl.api_end_point');

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
            $apiEndPoint = Config('services.ghl.api_end_point');

            $setting = Setting::where('attribute', 'refresh_token')->first();

            Log::info("RefreshToken::Command - Step 1 - Preparing Request");

            $postFields = [
                'grant_type' => 'refresh_token',
                'client_id' => env('GHL_CLIENT_ID'),
                'client_secret' => env('GHL_CLIENT_SECRET'),
                'user_type' => 'Company',
                'refresh_token' => Crypt::decrypt($setting['value'])
            ];

            $response = Http::asForm()->post($apiEndPoint . '/oauth/token', $postFields);

            $statusCode = $response->status();

            $tokenData = $response->json();

            CronCommandLogger::log($this->signature, $apiEndPoint . '/oauth/token',  json_encode($postFields), json_encode($tokenData), $statusCode);

            Log::info("RefreshToken::Command - Step 2 - Response Received - ". json_encode($tokenData));

            if (empty($tokenData['access_token'])) {
                throw new \Exception(json_encode($tokenData));
            } else {
                //update access_token in database
                Setting::updateOrCreate(['attribute' => 'access_token'], ['value' => Crypt::encrypt($tokenData['access_token'])]);
                //update refresh_token in database
                Setting::updateOrCreate(['attribute' => 'refresh_token'], ['value' => Crypt::encrypt($tokenData['refresh_token'])]);

                Log::info("RefreshToken::Command - Step 3 - Token Refreshed Successfully");
            }
        } catch (\Exception $e) {
            Log::error('RefreshToken::Command Catch Block - Refresh Token Error: ' . $e->getMessage());
            if (app()->environment('production')) {
                // Mail::to(config('constant.error_report_emails'))->send(new ErrorNotification($e));
            }
        }
    }
}
