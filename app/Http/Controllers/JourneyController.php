<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Journey;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class JourneyController extends Controller
{
    public function index(Request $request)
{
    if ($request->ajax()) {
        $journeys = Journey::orderBy('id', 'DESC')->get();
        return DataTables::of($journeys)
            ->addIndexColumn()  
            ->editColumn('journey_description', function ($row) {
                return $row->journey_description;
            })
            ->editColumn('journey_year', function ($row) {
                return $row->journey_year;
            })
            ->editColumn('journey_image', function ($row) {
                return '<img src="' . asset('assets/about_us/' . $row->journey_image) . '" alt="Award Logo" width="50" height="50">';
            })
            ->rawColumns(['journey_image']) 
            ->make(true);
    }
    
}
    public function store(Request $request)
    {
        DB::beginTransaction(); // Start the transaction
    try {
        $file_size = env("FILE_SIZE");
        $validator = Validator::make($request->all(), [
            'journey_description' => 'required|string|max:255',
            'journey_year' => 'required',
            "journey_image" => "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        // Save the award details, including file upload
        $journeimagePath = $this->handleJourneyImageUploading($request, "journey_image", "assets/about_us/");

        // Store the award information (you can adjust this part as per your model)
        $journey = Journey::create([
            'journey_description' => $request->journey_description,
            'journey_year' => $request->journey_year,
            'journey_image' => $journeimagePath,
        ]);

        
        DB::commit(); // Commit the transaction
        return response()->json([
            'success' => true,
            'message' => 'Journey has been added successfully.',
            'data' => $journey  // Send back the new award data
        ]);
    } catch (\Exception $e) {
        DB::rollBack(); // Rollback the transaction
        return response()->json([
            'success' => false,
            'message' => 'Something went wrong.'
        ]);
    }
    }
    private function handleJourneyImageUploading($request, $inputName, $path)
    {
        try {
            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);
                $filename = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path($path), $filename);
                return $filename;
            } else {
                return $request->input($inputName);
            }
        } catch (\Exception $e) {
            throw new \Exception(
                "File upload failed for " . $inputName . ": " . $e->getMessage()
            );
        }
    }
}
