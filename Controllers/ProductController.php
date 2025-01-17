<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductRelatedImage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index(Request $request){

    	if($request->ajax()) {
    		$products = Product::where('is_deleted',0)->orderBy('id', 'DESC')->get();
    		return Datatables::of($products)
    			->addIndexColumn()
    			->editColumn('title', function($row) {
                    return $row->name;
                })
                ->editColumn('status', function($row) {
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    return $row->is_active.'_'.$encryptId;
                })
                ->addColumn('action', function($row){
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    $button = '<a href="'.url("admin/products/view/".$encryptId).'" class="mr-2"><i class="fas fa-eye"></i></a>';
                    $button = $button.'<a href="'.url("admin/products/edit/".$encryptId).'" class="mr-2"><i class="fas fa-edit"></i></a>';
                    $button = $button.'<a href="javascript:void(0)" class="mr-2 deleteRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
                    $button = $button.'<a href="javascript:void(0)" class="mr-2 openDropzone" id="'.$encryptId.'"><i class="fas fa-upload"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
    	}
    	return view('products.index');
    }

    public function add(){
    	$product_category = ProductCategory::all();
    	return view('products.add',['product_category'=>$product_category]);
    }

    public function save(Request $request){
    	$input = $request->all();
        $file_size = env('FILE_SIZE');
    	$validator = Validator::make($request->all(), [
            'product_category_id' => 'required',
            'name' => 'required|regex:/^[a-zA-Z0-9\-\+_(), ]+$/|max:255',
            'description' => 'required',
            'slug' => 'required',
            'featured_images'=>'required|file|mimes:gif,jpeg,jpg,png,webp|max:'.$file_size,
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $filename = null;
        if($request->hasFile('featured_images')){
            $file = $request->file('featured_images');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/product_images/'), $filename);
        }
        $product = Product::create([
        	'product_category_id' => $input['product_category_id'],
        	'slug' => $input['slug'],
            'name' => $input['name'],
            'small_desc' => $input['description'],
            'feature_image' => $filename,
            'is_active' => 1,
            'is_deleted' => 0
        ]);
        if($product){
        	Session::flash('message','Product has been added successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/products');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/products');
        }
    }

    public function edit($encryptId){
    	if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$products = Product::where('id',$id)->first();
    		if(!empty($products)){
    			$product_category = ProductCategory::all();
	            return view('products.edit',['products'=>$products,'id'=>$encryptId,'product_category'=>$product_category]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
	            return redirect()->back();
	        }
    	}else{
    		return redirect('/admin/products');
    	}
    }

    public function update(Request $request, $id){
        $file_size = env('FILE_SIZE');
        $validator = Validator::make($request->all(), [
            'product_category_id' => 'required',
            'name' => 'required|regex:/^[a-zA-Z0-9\-\+_(), ]+$/|max:255',
            'description' => 'required',
            'slug' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    	$products = Product::findOrFail($id);
    	if($request->hasFile('featured_images')){
            $file = $request->file('featured_images');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/product_images/'), $filename);
        }else{
        	$filename = $request->input('exist_image');
        }
        $products->product_category_id =  $request->input('product_category_id');
    	$products->name = $request->input('name');
    	$products->slug  = $request->input('slug');
        $products->small_desc = $request->input('description');
        $products->feature_image = $filename;
        if($products->save()){
        	Session::flash('message','Product has been updated successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/products');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/products');
        }


    }

    public function view($encryptId){
    	if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$products = Product::findOrFail($id);
    		if(!empty($products)){
	            return view('products.view',['products'=>$products,'id'=>$encryptId]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
	            return redirect()->back();
	        }
    	}else{
    		return redirect('/admin/products');
    	}
    }

    public function delete(Request $request,$encryptId){
    	$id = base64_decode($encryptId);
    	if(Product::where('id',$id)->update(['is_deleted'=>1])){
    		return response()->json(['status' => true,'msg'=>'Product item and associated images deleted successfully.']);
    	}else{
    		return response()->json(['status' => false,'msg'=>'something went wrong']);
    	}

    }

    public function changestatus(Request $request){
    	$input = $request->all();
        $id = base64_decode($input['rowid']);
        $status = $input['status'];
        if(Product::where('id',$id)->update(['is_active'=>$status==1?0:1])){
            return response()->json(['status' => true,'msg'=>'status has been updated']);
        }else{
            return response()->json(['status' => false,'msg'=>'something went wrong']);
        }
    }

    public function fetch($itemId){
	    $images = ProductRelatedImage::where('product_id',base64_decode($itemId))->get(['id', 'images']);
	    return response()->json(['images' => $images]);
	}

	public function imageDelete($id){
	    $image = ProductRelatedImage::findOrFail($id);
	    $image->delete();
	    return response()->json(['success' => true]);
	}

	public function upload(Request $request){
	    $request->validate([
	        'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
	    ]);

	    $imageFile = $request->file('file');
	    $filename = time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
	    $imageFile->move(public_path('img/product_images/related_products/'), $filename);
        $upload  = new ProductRelatedImage();
        $upload->product_id = base64_decode($request->item_id);
        $upload->images = $filename;
        if($upload->save()){
            return response()->json(['success' => $filename]);
        }else{
            return response()->json(['error' => 'No file uploaded'], 400);
        }
	    // ProductRelatedImage::create([
	    //     'product_id' => base64_decode($request->item_id),
	    //     'images' => $filename,
	    // ]);

	    // return response()->json(["success" => $filename]);
	}
}
