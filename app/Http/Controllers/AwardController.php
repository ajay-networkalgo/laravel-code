<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Award;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class AwardController extends Controller
{
    public function index(Request $request)
{
    if ($request->ajax()) {
        $awards = Award::orderBy('id', 'DESC')->get();
        return DataTables::of($awards)
            ->addIndexColumn()  
            ->editColumn('award_title', function ($row) {
                return $row->award_title;
            })
            ->editColumn('award_year', function ($row) {
                return $row->award_year;
            })
            ->editColumn('award_logo', function ($row) {
                return '<img src="' . asset('assets/about_us/' . $row->award_logo) . '" alt="Award Logo" width="50" height="50">';
            })
            ->rawColumns(['award_logo']) 
            ->make(true);
    }
    
}

public function store(Request $request)
{
    DB::beginTransaction();

    try {
        
        $validator = Validator::make($request->all(), [
            'award_title' => 'required|string|max:255',
            'award_year' => 'required|integer',
            'award_logo' => 'nullable|file|mimes:gif,jpeg,jpg,png,webp|max:' . env('FILE_SIZE'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        
        $awardLogoPath = $this->handleAwarsUploading($request, "award_logo", "assets/about_us/");
        $award = Award::create([
            'award_title' => $request->award_title,
            'award_year' => $request->award_year,
            'award_logo' => $awardLogoPath,
        ]);

        DB::commit();
        return response()->json([
            'success' => true,
            'message' => 'Award has been added successfully.',
            'data' => $award  
        ]);
    } catch (\Exception $e) {
        DB::rollBack();

        return response()->json([
            'success' => false,
            'message' => 'Something went wrong.'
        ]);
    }
}
    private function handleAwarsUploading($request, $inputName, $path)
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

