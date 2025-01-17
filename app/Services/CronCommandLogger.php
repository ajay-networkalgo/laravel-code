<?php

namespace App\Services;

use App\Models\CronCommandLog;
use Illuminate\Support\Facades\Http;

class CronCommandLogger
{
    public static function log($commandName, $apiUrl, $requestData, $responseData, $statusCode)
    {
        CronCommandLog::create([
            'command_name' => $commandName,
            'api_url' => $apiUrl,
            'request' => json_encode($requestData),
            'response' => json_encode($responseData),
            'status_code' => $statusCode
        ]);
    }
}
