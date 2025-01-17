<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\ProductType;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   try {
        if($request->ajax()) {
    		$productcategories = ProductCategory::where('is_deleted',0)->orderBy('id', 'DESC')->get();
    		return Datatables::of($productcategories)
    			->addIndexColumn()
                ->editColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('description', function ($row) {
                    return $row->description;
                })
                 ->editColumn('feature_image', function ($row) {
                return '<img src="' . asset('img/product_images/' . $row->feature_image) . '" alt="Product Category Image" width="50" height="50">';
            })
            
            
                
                ->editColumn('status', function($row) {
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    return $row->is_active.'_'.$encryptId;
                })
                ->addColumn('action', function($row){
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    $button = '<a href="'.url("admin/product-categories/view/".$encryptId).'" class="mr-2"><i class="fas fa-eye"></i></a>';
                    $button = $button.'<a href="'.url("admin/product-categories/edit/".$encryptId).'" class="mr-2"><i class="fas fa-edit"></i></a>';
                    $button = $button.'<a href="javascript:void(0)" class="mr-2 deleteRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
                    return $button;
                })
                ->rawColumns(['feature_image','action'])
                ->make(true);
    	}
        return view('product-categories.index');
    } catch (\Exception $e) {
        return redirect("admin/product-categories")->withErrors([
            "error" =>
                "An error occurred while loading the Product Category content.",
        ]);
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $product_type = ProductType::all();
    	return view('product-categories.add',['product_type'=>$product_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {   DB::beginTransaction(); // Start the transaction
        try {
            $input = $request->all();
            $file_size = env('FILE_SIZE');
            $validator = Validator::make($request->all(), [
                'product_type_id' => 'required',
                'name' => 'required|regex:/^[a-zA-Z0-9\-\+_(), ]+$/|max:255',
                'description' => 'required',
                'feature_image'=>'required|file|mimes:gif,jpeg,jpg,png,webp|max:'.$file_size,
            ]);
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $filename = null;
            if($request->hasFile('feature_image')){
                $file = $request->file('feature_image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img/product_images/'), $filename);
            }
            $product = ProductCategory::create([
                'product_type_id' => $input['product_type_id'],
                'name' => $input['name'],
                'description' => $input['description'],
                'feature_image' => $filename,
                'is_active' => 1,
                'is_deleted' => 0
            ]);
                DB::commit();
                Session::flash('message','Product Category has been added successfully.');
                Session::flash('alert-class', 'alert-success');
                Session::flash('icon-class', 'icon fa fa-check');
                return redirect('/admin/product-categories');
       
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Session::flash("message", "Something went wrong: " . $e->getMessage());
            Session::flash("alert-class", "alert-danger");
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect("/admin/product-categories")->withErrors(["error" => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($encryptId)
    {
        if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$productcategories = ProductCategory::findOrFail($id);
    		if(!empty($productcategories)){
	            return view('product-categories.view',['productcategories'=>$productcategories,'id'=>$encryptId]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
                return redirect('/admin/product-categories');
	        }
    	}else{
    		return redirect('/admin/product-categories');
    	}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($encryptId)
    {
        if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$productcategory = ProductCategory::where('id',$id)->first();
    		if(!empty($productcategory)){
                $product_type = ProductType::all();
	            return view('product-categories.edit',['productcategory'=>$productcategory,'id'=>$encryptId,'product_type'=>$product_type]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
                return redirect('/admin/product-categories');
	        }
    	}else{
    		return redirect('/admin/product-categories');
    	}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file_size = env('FILE_SIZE');
        $validator = Validator::make($request->all(), [
            'product_type_id' => 'required',
            'name' => 'required|regex:/^[a-zA-Z0-9\-\+_(), ]+$/|max:255',
            'description' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    	$productcategories = ProductCategory::findOrFail($id);
    	if($request->hasFile('feature_image')){
            $file = $request->file('feature_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/product_images/'), $filename);
        }else{
        	$filename = $request->input('exist_image');
        }
        
    	$productcategories->product_type_id  = $request->input('product_type_id');
    	$productcategories->name = $request->input('name');
        $productcategories->description = $request->input('description');
        $productcategories->feature_image = $filename;
        if($productcategories->save()){
        	Session::flash('message','Product Category has been updated successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/product-categories');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/product-categories');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $encryptId
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$encryptId){
    	$id = base64_decode($encryptId);
    	if(ProductCategory::where('id',$id)->update(['is_deleted'=>1])){
    		return response()->json(['status' => true,'msg'=>'Product Category  and associated images deleted successfully.']);
    	}else{
    		return response()->json(['status' => false,'msg'=>'something went wrong']);
    	}

    }
    public function changestatus(Request $request){
    	$input = $request->all();
        $id = base64_decode($input['rowid']);
        $status = $input['status'];
        if(ProductCategory::where('id',$id)->update(['is_active'=>$status==1?0:1])){
            return response()->json(['status' => true,'msg'=>'status has been updated']);
        }else{
            return response()->json(['status' => false,'msg'=>'something went wrong']);
        }
    }
}
