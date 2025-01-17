<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuccessStory;
use App\Models\TempAsset;
use App\Models\Asset;

class SuccessStoriesFrontenedController extends Controller
{
    public function index(){
        try {
            $successstoriespagecontent = TempAsset::where("type", "success_stories")
                ->get()
                ->keyBy("key")
                ->toArray();
            if (empty($successstoriespagecontent)) {
                $successstoriespagecontent = Asset::where("type", "success_stories")
                    ->get()
                    ->keyBy("key")
                    ->toArray();
            }
            return view(
                "home.success",
                compact("successstoriespagecontent")
            );
        } catch (\Exception $e) {
            return redirect("admin/case")->withErrors([
                "error" =>
                    "An error occurred while loading the success stories page content.",
            ]);
        }
    }

    public function storiesData(Request $request){
    	$input = $request->all();
    	$type = $input['type'];
    	if(!empty($type)){
    		$success_stories = SuccessStory::where('type',$type)->orderBy('id', 'DESC')->get();
    		return view('success-stories.details',['success_stories'=>$success_stories]);
    	}else{
    		return response()->json(['status' => false,'msg'=>'something went wrong']);
    	}
    }

    public function details(Request $request,$id){
        $successStories = SuccessStory::with('relatedProducts.product')->where('id',base64_decode($id))->first();
        if(!empty($successStories)){
            return response()->json($successStories);
        }else{
            return response()->json(['status' => false,'msg'=>'something went wrong']);
        }
    }
}
