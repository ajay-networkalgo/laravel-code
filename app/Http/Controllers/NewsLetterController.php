<?php

namespace App\Http\Controllers;

use App\Jobs\RunCommandJob;
use Illuminate\Http\Request;
use App\Models\NewsLetter;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class NewsLetterController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $news_letter = NewsLetter::select(['email'])->orderBy('id', 'DESC')->get();
            return Datatables::of($news_letter)
                ->addIndexColumn()
                ->editColumn('email', function ($row) {
                    return $row->email;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('news_letter.index');
    }

    // public function saveNewsLetter(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //     ]);
    //     $news_letter = NewsLetter::create($request->all());
    //     if ($news_letter) {
    //         // Dispatch Job to enquiry on Go High Level
    //         RunCommandJob::dispatch('ghl:add-newletter-subscriber')->onQueue('default');

    //         $data = ['status' => 'success', 'msg' => 'News letter has been saved successfully'];
    //         return response()->json($data);
    //     } else {
    //         $data = ['status' => 'success', 'msg' => 'Something went wrong'];
    //         return response()->json($data);
    //     }
    // }

    public function saveNewsLetter(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'email' => 'required|email',
            ]);

            // Attempt to create the newsletter entry
            $news_letter = NewsLetter::create($request->all());

            if ($news_letter) {
                // Dispatch the job
                RunCommandJob::dispatch('ghl:add-newletter-subscriber')->onQueue('default');

                // Return success response
                $data = ['status' => 'success', 'msg' => 'Thank You, You are subscribed successfully.'];
                return response()->json($data);
            } else {
                return response()->json(['status' => 'error', 'msg' => 'Something went wrong']);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return validation error response
            return response()->json(['status' => 'error', 'errors' => $e->errors()], 422);
        }
    }
}
