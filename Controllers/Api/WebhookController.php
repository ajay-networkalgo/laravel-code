<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\WebhookResponse;
use Illuminate\Http\Request;
use App\Jobs\RunCommandJob;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class WebhookController extends Controller
{
    //
    public function googleLeads(Request $request) {
        try{
            $webhookResponse = new WebhookResponse();
            $webhookResponse->source = 'Google Adwards';
            $webhookResponse->response = json_encode($request->all());
            $webhookResponse->save();

            RunCommandJob::dispatch('ghl:lead-webhook')->onQueue('default');

        } catch(\Exception $e) {
            Log::error('Webhook - Error: ' . $e->getMessage());
            return response()->json(['message' => $e->getMessage()]);
        }

        return response()->json(['message' => 'Response Saved Successfully']);
    }

    public function audienceLabLeads(Request $request, $slug) {
        try{
            if($slug != 'treehouse' && $slug != 'us-website') {
                return response()->json(['status'=> 404, 'message' => 'Wrong keyword']);
            }
            $webhookResponse = new WebhookResponse();
            $webhookResponse->source = $slug;
            $webhookResponse->response = json_encode($request->all());
            $webhookResponse->save();

            // RunCommandJob::dispatch('ghl:lead-webhook')->onQueue('default');

        } catch(\Exception $e) {
            Log::error('Webhook - Error: ' . $e->getMessage());
            return response()->json(['message' => $e->getMessage()]);
        }

        return response()->json(['message' => 'Response Saved Successfully']);
    }

    public function audienceLabDownloadToCsv($slug = '')
    {
        if($slug != 'treehouse' && $slug != 'us-website') {
            return response()->json(['status'=> 404, 'message' => 'Wrong keyword']);
        }
        $fileName = 'audience-lab-data.csv';

        $callback = function () use ($slug) {
            $file = fopen('php://output', 'w');

            // Fetch data from the database
            $responses = DB::table('webhook_responses')
                ->where('source', $slug)
                ->select('id', 'source', 'response')
                ->get();

            // Extract all unique JSON keys
            $allKeys = [];
            foreach ($responses as $response) {
                $jsonResponse = json_decode($response->response, true);
                if (is_array($jsonResponse)) {
                    $allKeys = array_unique(array_merge($allKeys, array_keys($this->flattenArray($jsonResponse))));
                }
            }

            // Add CSV headers
            $headers = array_merge(['id', 'source'], $allKeys);
            fputcsv($file, $headers);

            // Write rows to the CSV
            foreach ($responses as $response) {
                $jsonResponse = json_decode($response->response, true);
                if (!is_array($jsonResponse)) {
                    $jsonResponse = [];
                }

                $flattenedResponse = $this->flattenArray($jsonResponse);
                $row = [$response->id, $response->source];

                foreach ($allKeys as $key) {
                    $row[] = $flattenedResponse[$key] ?? '';
                }

                fputcsv($file, $row);
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
        ]);
    }

    /**
     * Flattens a multidimensional array into a single level with dot notation for keys.
     */
    private function flattenArray(array $array, string $prefix = ''): array
    {
        $result = [];
        foreach ($array as $key => $value) {
            $newKey = $prefix === '' ? $key : $prefix . '.' . $key;
            if (is_array($value)) {
                $result = array_merge($result, $this->flattenArray($value, $newKey));
            } else {
                $result[$newKey] = $value;
            }
        }
        return $result;
    }
}
