<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuccessStory;
use App\Models\Country;
use App\Models\Product;
use App\Models\SuccessStoriesProduct;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class SuccessStoryController extends Controller
{
    public function index(Request $request){
    	if($request->ajax()) {
    		$news = SuccessStory::orderBy('id', 'DESC')->get();
    		return Datatables::of($news)
    			->addIndexColumn()
    			->editColumn('country', function($row) {
                    return $row->country;
                })
                ->editColumn('details', function($row) {
                    return $row->details;
                })
                ->addColumn('action', function($row){
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    $button = '<a href="'.url("admin/succes-stories/view/".$encryptId).'" class="mr-2"><i class="fas fa-eye"></i></a>';
                    $button = $button.'<a href="'.url("admin/succes-stories/edit/".$encryptId).'" class="mr-2"><i class="fas fa-edit"></i></a>';
                    $button = $button.'<a href="javascript:void(0)" class="mr-2 deleteRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
    	}
    	return view('success-stories.index');
    }

    public function add(){
    	$countries = Country::all();
        $products = Product::all();
    	$types = config('constant.types');
    	return view('success-stories.add',['countries'=>$countries,'types'=>$types,'products'=>$products]);
    }

    public function save(Request $request){
    	$input = $request->all();
        $file_size = env('FILE_SIZE');
    	$validator = Validator::make($request->all(), [
            'type' => 'required',
            'country' => 'required',
            'details' => 'required',
            'featured_images' => 'required|file|mimes:gif,jpeg,jpg,png,webp|max:'.$file_size,
        ],[
            'featured_images.dimensions' => 'Please upload an image with 400 x 300 pixels dimension',
        ]);
        $validator->after(function ($validator) use ($request) {
            if ($request->hasFile('featured_images')) {
                $image = $request->file('featured_images');
                $imageSize = getimagesize($image);
                if(!empty($imageSize)) {
                    $width = $imageSize[0];
                    $height = $imageSize[1];
                    if ($width != 400 || $height != 300) {
                        $validator->errors()->add('featured_images', 'Please upload an image with 400 x 300 pixels dimension');
                    }
                }
            }
        });
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $successStoryData = $request->only(['type','country','details']);
        if ($request->hasFile('featured_images')) {
            $file = $request->file('featured_images');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/success_stories_images'), $filename);
            $successStoryData['feature_image'] = $filename;
        }
        $successStory = SuccessStory::create($successStoryData);
        if($successStory){
            if($request->has('related_products')){
                $relatedProducts = $request->input('related_products');
                foreach($relatedProducts as $productId) {
                    SuccessStoriesProduct::create([
                        'success_stories_id' => $successStory->id,
                        'product_id' => $productId,
                    ]);
                }
            }

        	Session::flash('message','Succes Stories has been added successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/succes-stories');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/succes-stories');
        }
    }

    public function edit($encryptId){
    	if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$countries = Country::all();
    		$types = config('constant.types');
    		$successStory = SuccessStory::with('relatedProducts')->findOrFail($id);
    		if(!empty($successStory)){
                $products = Product::all();
                $relatedProductIds = $successStory->relatedProducts->pluck('product_id')->toArray();
	            return view('success-stories.edit',['successStory'=>$successStory,'id'=>$encryptId,'countries'=>$countries,'types'=>$types,'products'=>$products,'relatedProductIds'=>$relatedProductIds]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
	            return redirect()->back();
	        }
    	}else{
    		return redirect('/admin/succes-stories');
    	}
    }

    public function update(Request $request, $id){
    	$input = $request->all();
    	$file_size = env('FILE_SIZE');
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'country' => 'required',
            'details' => 'required',
            'featured_images' => 'file|mimes:gif,jpeg,jpg,png,webp|max:'.$file_size,
        ],[
            'featured_images.dimensions' => 'Please upload an image with 400 x 300 pixels dimension',
        ]);
        $validator->after(function ($validator) use ($request) {
            if ($request->hasFile('featured_images')) {
                $image = $request->file('featured_images');
                $imageSize = getimagesize($image);
                if(!empty($imageSize)) {
                    $width = $imageSize[0];
                    $height = $imageSize[1];
                    if ($width != 400 || $height != 300) {
                        $validator->errors()->add('featured_images', 'Please upload an image with 400 x 300 pixels dimension');
                    }
                }
            }
        });
        $validator->after(function ($validator) use ($request) {
            if ($request->hasFile('featured_images')) {
                $image = $request->file('featured_images');
                $imageSize = getimagesize($image);
                if(!empty($imageSize)) {
                    $width = $imageSize[0];
                    $height = $imageSize[1];
                    if ($width != 400 || $height != 300) {
                        $validator->errors()->add('featured_images', 'Please upload an image with 400 x 300 pixels dimension');
                    }
                }
            }
        });
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $successStory = SuccessStory::find($id);
        if (!$successStory) {
            return redirect()->back();
        }
        $currentImage = $successStory->feature_image;
        $successStoryData = $request->only(['type', 'country', 'details']);
        if($request->hasFile('featured_images')){
            $file = $request->file('featured_images');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/success_stories_images'), $filename);
            $successStoryData['feature_image'] = $filename;
            $imagePath = public_path('img/success_stories_images/'.$currentImage);
	        if(file_exists($imagePath)){
	            unlink($imagePath);
	        }
        }
        $successStory->update($successStoryData);
        if($successStory){
            if($request->has('related_products')) {
                $successStory->relatedProducts()->delete();
                foreach ($request->input('related_products') as $productId) {
                    SuccessStoriesProduct::create([
                        'success_stories_id' => $successStory->id,
                        'product_id' => $productId,
                    ]);
                }
            } else {
                $successStory->relatedProducts()->delete();
            }
        	Session::flash('message','Succes Stories has been updated successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/succes-stories');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/succes-stories');
        }
    }

    public function view($encryptId){
    	if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$successStory = SuccessStory::findOrFail($id);
    		$types = config('constant.types');
    		if(!empty($successStory)){
	            return view('success-stories.view',['successStory'=>$successStory,'types'=>$types]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
	            return redirect()->back();
	        }
    	}else{
    		return redirect('/admin/succes-stories');
    	}
    }

    public function delete($encryptId){
    	$id = base64_decode($encryptId);
    	$successStory = SuccessStory::findOrFail($id);
    	$currentImage = $successStory->feature_image;
    	if($successStory->delete()){
    		$filePath = public_path('img/success_stories_images/' . $currentImage);
	        if (file_exists($filePath)) {
	            unlink($filePath);
	        }
    		return response()->json(['status' => true,'msg'=>'News item and associated images deleted successfully.']);
    	}else{
    		return response()->json(['status' => false,'msg'=>'something went wrong']);
    	}
    }
}
