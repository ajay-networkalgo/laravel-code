<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\NewsLetter;
use App\Models\Setting;
use App\Services\GoHighLevelServiceV1;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GHLController extends Controller
{
    protected $ghlService;
    protected $ghlAccessToken;
    var $apiEndPoint = 'https://services.leadconnectorhq.com';
    var $version = '2021-07-28';
    var $newsletterWorkFlowId = '0bd89ce5-c04e-44cc-a49f-bedb17908c86';

    var $locationId = 'FIBioLc8rxT1TBigrimL';

    public function __construct(GoHighLevelServiceV1 $ghlService)
    {
        $this->ghlService = $ghlService;
    }

    // public function index()
    // {
    //     try {
    //         $contacts = $this->ghlService->getContacts();
    //         return response()->json($contacts);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

    // public function store(Request $request)
    // {
    //     try {
    //         // $data = [];
    //         // $data["email"]= "john@deo.com";
    //         // $data["phone"]= "+18887324197";
    //         // $data["firstName"]= "John";
    //         // $data["lastName"]= "Deo";
    //         // $data["name"]= "John Deo";
    //         // $data["dateOfBirth"]= "1990-09-25";
    //         // $data["address1"]= "3535 1st St N";
    //         // $data["city"]= "Dolomite";
    //         // $data["state"]= "AL";
    //         // $data["country"]= "US";
    //         // $data["postalCode"]= "35061";
    //         // $data["companyName"]= "DGS VolMAX";
    //         // $data["website"]= "35061";
    //         // $data["tags"]= [
    //         //     "commodo",
    //         //     "veniam ut reprehenderit"
    //         // ];
    //         // $data["source"]= "public api";
    //         // $data["customField"]= ["test_with_kevin"=> "do in Lorem ut exercitation"];
    //         // echo "<pre>";
    //         // print_r($data);
    //         // exit;
    //         echo "<pre>";
    //         print_r($request->all());
    //         exit;
    //         // $contact = $this->ghlService->createContact($request->all());
    //         return response()->json($contact, 201);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

    // public function update(Request $request, $id)
    // {
    //     try {
    //         $contact = $this->ghlService->updateContact($id, $request->all());
    //         return response()->json($contact);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

    // public function destroy($id)
    // {
    //     try {
    //         $this->ghlService->deleteContact($id);
    //         return response()->json(['message' => 'Contact deleted successfully']);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

    // //API2.0
    // public function redirect()
    // {
    //     $query = http_build_query([
    //         'client_id' => env('GHL_CLIENT_ID'),
    //         'redirect_uri' => route('ghl.callback'),
    //         'response_type' => 'code',
    //         'scope' => 'contacts.readonly', // Define the scopes required
    //     ]);

    //     return redirect('https://marketplace.gohighlevel.com/oauth/authorize?' . $query);
    // }

    public function callback(Request $request)
    {
        $code = $request->code; //'fbedb4a362434c356b54dd9879a17ec3d3a4210e';
        Setting::updateOrCreate(['attribute' => 'code'], ['value' => Crypt::encrypt($request->code)]);

        $response = Http::asForm()->post($this->apiEndPoint . '/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => env('GHL_CLIENT_ID'),
            'client_secret' => env('GHL_CLIENT_SECRET'),
            'redirect_uri' => route('ghl.callback'),
            'user_type' => 'Company',
            'code' => $code
        ]);

        $tokenData = $response->json();

        if (empty($tokenData['access_token'])) {
        } else {
            Setting::updateOrCreate(['attribute' => 'access_token'], ['value' => Crypt::encrypt($tokenData['access_token'])]);

            Setting::updateOrCreate(['attribute' => 'refresh_token'], ['value' => Crypt::encrypt($tokenData['refresh_token'])]);
        }
        echo "<pre>";
        print($response->body());
        print_r($tokenData);
    }

    // protected function refreshAccessToken()
    // {
    //     try {
    //         $setting = Setting::where('attribute', 'refresh_token')->firstOrCreate();

    //         $response = Http::asForm()->post($this->apiEndPoint . '/oauth/token', [
    //             'grant_type' => 'refresh_token',
    //             'client_id' => env('GHL_CLIENT_ID'),
    //             'client_secret' => env('GHL_CLIENT_SECRET'),
    //             'user_type' => 'Company',
    //             'refresh_token' => Crypt::decrypt($setting['value'])
    //         ]);

    //         $tokenData = $response->json();

    //         if (empty($tokenData['access_token'])) {
    //             Log::info($response);
    //         } else {
    //             //update access_token
    //             Setting::updateOrCreate(['attribute' => 'access_token'], ['value' => Crypt::encrypt($tokenData['access_token'])]);
    //             //update refresh_token
    //             Setting::updateOrCreate(['attribute' => 'refresh_token'], ['value' => Crypt::encrypt($tokenData['refresh_token'])]);

    //             Log::info("Token refreshed successfully");
    //         }
    //     } catch (\Exception $e) {
    //         Log::error("Token not refreshed");
    //         Log::error('Method Refresh Token: ' . $e->getMessage());
    //     }
    // }

    // public function leads()
    // {
    //     try {

    //         $accessToken = Setting::where('attribute', 'access_token')->pluck('value');

    //         // Define the query parameters
    //         $queryParams = [
    //             'locationId' => 'FIBioLc8rxT1TBigrimL',
    //         ];

    //         // Define the headers
    //         $headers = [
    //             'Authorization' => 'Bearer ' . Crypt::decrypt($accessToken[0]),
    //             'Accept'        => 'application/json',
    //             'Version' => $this->version
    //         ];

    //         // Send a GET request with query parameters and headers
    //         $response = Http::withHeaders($headers)->get($this->apiEndPoint . '/contacts/', $queryParams);

    //         // Get the response body
    //         $body = $response->body();

    //         // Decode JSON response if needed
    //         $data = $response->json();

    //         // if($data['statusCode'] !== 200) {
    //         //     throw new \Exception($data['error'].'-'.$data['message']);
    //         // }
    //         // Process the response data
    //         print_r($data);
    //         echo "Records fetched successfully";
    //     } catch (\Exception $e) {
    //         $message = $e->getMessage();
    //         Log::error($e->getMessage());
    //     }
    // }

    // public function createLead()
    // {
    //     try {
    //         $enquiries = ContactUs::where('updated_on_crm', 0)->find();
    //         if ($enquiries->count() > 0) {

    //             foreach ($enquiries as $enq) {

    //                 $accessToken = Setting::where('attribute', 'access_token')->pluck('value');

    //                 // Define the query parameters
    //                 // Define the POST fields
    //                 $postFields = [
    //                     'name'  => $enq->name,
    //                     'email'     => $enq->name,
    //                     'locationId' => $enq->name,
    //                     'phone' => $enq->name,
    //                     'country' => $enq->name,
    //                     'source' => 'Olax Power US leads - ' . $enq->enquiry_type,
    //                     'customFields' => [
    //                         [
    //                             'id' => $enq->id . time(),
    //                             'key' => 'Message',
    //                             'field_value' => $enq->message
    //                         ],
    //                         [
    //                             'id' => $enq->id . time(),
    //                             'key' => 'Attachment',
    //                             'field_value' => $enq->files
    //                         ],
    //                     ]
    //                 ];

    //                 // Define the headers
    //                 $headers = [
    //                     'Authorization' => 'Bearer ' . Crypt::decrypt($accessToken[0]),
    //                     'Accept'        => 'application/json',
    //                     'Version' => $this->version
    //                 ];

    //                 // Send a GET request with query parameters and headers
    //                 $response = Http::withHeaders($headers)->post($this->apiEndPoint . '/contacts/', $postFields);

    //                 // Get the response body
    //                 $body = $response->body();

    //                 // Decode JSON response if needed
    //                 $data = $response->json();

    //                 if (!empty($data['contact'])) {
    //                     $enq->updated_on_crm = 1;

    //                     $contactId = $data['contact']['id'];
    //                 }
    //                 $enq->crm_response = $body;
    //                 $enq->save();

    //                 $this->connectContactToWorkFlow($contactId);
    //             }
    //         }

    //         // Process the response data
    //         // return $data;
    //     } catch (\Exception $e) {
    //         $message = $e->getMessage();
    //         Log::error('Create Contact Error:' . $e->getMessage());
    //         Log::error('Create Contact Response:' + $body);
    //     }
    // }

    // //add subscribers to GHL CRM
    // public function addSubscriberToGHL()
    // {
    //     try {
    //         $enquiries = NewsLetter::where('updated_on_crm', 0)->get();
    //         // echo "<pre>";
    //         // print_r($enquiries);exit;
    //         // echo $this->locationId;exit;
    //         $accessToken = Setting::where('attribute', 'access_token')->pluck('value');

    //         if ($enquiries->count() > 0) {
    //             foreach ($enquiries as $enq) {

    //                 // Define the query parameters
    //                 // Define the POST fields
    //                 $postFields = [
    //                     'email'     => $enq->email,
    //                     'locationId' => $this->locationId,
    //                     'tags'  => 'Test Lead Newsletter Completed On Website'
    //                 ];

    //                 // Define the headers
    //                 $headers = [
    //                     'Authorization' => 'Bearer ' . Crypt::decrypt($accessToken[0]),
    //                     'Accept'        => 'application/json',
    //                     'Version' => $this->version
    //                 ];

    //                 Log::info("addSubscriberToGHL - Step1: Preparing Request");

    //                 // Send a GET request with query parameters and headers
    //                 $response = Http::withHeaders($headers)->post($this->apiEndPoint . '/contacts/', $postFields);

    //                 // Get the response body
    //                 $body = $response->body();
    //                 Log::info("addSubscriberToGHL - Step2: Preparing Request");

    //                 // Decode JSON response if needed
    //                 $data = $response->json();
    //                 Log::info('addSubscriberToGHL - Step3: Response Received:'.json_encode($data));

    //                 if (!empty($data['contact'])) {
    //                     $enq->updated_on_crm = 1;
    //                     $contactId = $data['contact']['id'];
    //                 }
    //                 $enq->crm_response = json_encode($body);
    //                 $enq->save();

    //                 Log::info('addSubscriberToGHL - Step3: Finally Subscriber created successfully');

    //                 $this->connectContactToWorkFlow($contactId, $this->newsletterWorkFlowId);
    //             }
    //         }
    //         // Process the response data
    //     } catch (\Exception $e) {
    //         Log::error(' - Catch Block Error Logged:' . $e->getMessage());
    //         // Log::error('Subscriber Add Error:' + json_encode($response->body()));
    //     }
    // }

    // public function connectContactToWorkFlow($contactId = '', $workflowId = '')
    // {
    //     // qAcz6OY1JQyrEJbiAdmt/0bd89ce5-c04e-44cc-a49f-bedb17908c86

    //     try {
    //         // $contactId = 'qAcz6OY1JQyrEJbiAdmt';
    //         // $workflowId = '0bd89ce5-c04e-44cc-a49f-bedb17908c86';
    //         Log::info('connectContactToWorkFlow - Step 1 started:'.$contactId.'/'.$workflowId);
    //         $accessToken = Setting::where('attribute', 'access_token')->pluck('value');

    //         // Define the query parameters
    //         // Define the POST fields
    //         // $postFields = [
    //         //     'contactId'  => $contactId,
    //         //     'workflowId'     => $workflowId
    //         // ];

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

    //         Log::info('connectContactToWorkFlow - Step 2 Response Received:'. json_encode($data));

    //         if (empty($data['succeded'])) {
    //             throw new \Exception(json_encode($data));
    //         } else {
    //             Log::info("connectContactToWorkFlow - Step 3: Contact added to workflow successfully");
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('Contact WorkFlow Add Error:' . $e->getMessage());
    //     }
    // }
}
