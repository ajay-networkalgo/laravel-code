<?php

use App\Http\Controllers\api\WebhookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/google-leads','App\Http\Controllers\Api\WebhookController@googleLeads');
Route::post('/audience-lab-leads/{slug}','App\Http\Controllers\Api\WebhookController@audienceLabLeads');
Route::get('/download-audience-lab-data/{slug}', 'App\Http\Controllers\Api\WebhookController@audienceLabDownloadToCsv');

