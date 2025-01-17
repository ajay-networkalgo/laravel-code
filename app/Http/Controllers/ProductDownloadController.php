<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\Product;
use App\Models\Certification;
use App\Models\ProductDownload;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ProductDownloadController extends Controller
{
    public function index(Request $request){

    	if($request->ajax()) {
    		$product_download = ProductDownload::with(['product','productType'])->where('is_deleted',0)->get();
    		$file_types = config('constant.file_types');
    		return Datatables::of($product_download)
    			->addIndexColumn()
                ->editColumn('product_type', function($row) {
                    return $row->productType->name;
                })
                ->editColumn('products', function($row) {
                    return $row->product->name;
                })
                ->editColumn('file_type', function($row) use ($file_types) {
                    return $file_types[$row->file_type];
                })
                ->editColumn('file_name', function($row) {
                    return $row->file_name;
                })
                ->editColumn('file', function($row) {
                    return $row->file;
                })
                ->editColumn('language', function($row) {
                    return $row->language;
                })
                ->addColumn('action', function($row){
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    $button = '<a href="javascript:void(0)" class="mr-2 deleteRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
                    $button = $button.'<a href="'.url("admin/product-download/edit/".$encryptId).'" class="mr-2"><i class="fas fa-edit"></i></a>';
                    return $button;
                })
                ->rawColumns(['action', 'file_name'])
                ->make(true);
    	}
    	return view('downloads.product.index');
    }

    public function add(){
    	$product_types = ProductType::all();
    	return view('downloads.product.add',['product_types'=>$product_types]);
    }

    public function edit($encryptId){
        if(!empty($encryptId)){
            $id = base64_decode($encryptId);
            $productDownloads = ProductDownload::where('id',$id)->first();
            if(!empty($productDownloads)){
                $product_types = ProductType::all();
                return view('downloads.product.edit',['productDownloads'=>$productDownloads,'id'=>$encryptId,'product_types'=>$product_types]);
            }else{
                Session::flash('message', 'No Record Found');
                Session::flash('alert-class', 'alert-danger');
                Session::flash('icon-class', 'icon fa fa-ban');
                return redirect()->back();
            }
        }else{
            return redirect('/admin/product-download');
        }
    }

    public function products(Request $request){
    	$input = $request->all();
    	$type_id = $input['type_id'];
    	$products = Product::where('product_types_id',$type_id)->get();
    	if(count($products) > 0){
    		return response()->json($products);
    	}
    }

    public function certification(Request $request){
    	$input = $request->all();
    	$certification = Certification::all();
    	if(count($certification) > 0){
    		return response()->json($certification);
    	}
    }

    public function addCertification(Request $request){
        $certifications = new Certification();
        $certifications->name = $request->optionName;
        if($certifications->save()){
            return response()->json(['success' => true, 'certifications' => $certifications]);
        }else{
            return response()->json(['success' => false]);
        }
    }

    public function save(Request $request){
    	$input = $request->all();
        $file_size = env('FILE_SIZE');
    	$validator = Validator::make($request->all(),[
            'product_type' => 'required',
            'products' => 'required',
            'date' => 'required|date',
            'file_type'=> 'required',
            'file_name'=> 'required|regex:/^[a-zA-Z0-9\-\+_&.: ]+$/|max:255',
            'language'=> 'required',
            'company_files'=>'required|file|mimes:gif,jpeg,jpg,png,webp,doc,docx,xlsx,xls,pdf|max:'.$file_size,
            'certification_type' => 'required_if:file_type,4',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->hasFile('company_files')){
            $file = $request->file('company_files');
            $filename = $file->getClientOriginalName();
            // $filename = time() . '_' . $file->getClientOriginalName();
            $fileFormat = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            $file->move(public_path('uploads/file/'), $filename);
        }
        $products = ProductDownload::create([
            'product_type_id' => $request->product_type,
        	'product_id' => $request->products,
        	'file_type' => $request->file_type,
            'certification_id' => $request->certification_type,
            'language' => $request->language,
            'date' => $request->date,
            'file' => $filename,
            'format' =>$fileFormat,
            'size' =>$fileSize,
            'file_name' => $request->file_name,
        ]);

        if($products){
        	Session::flash('message','Product Info has been added successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/product-download');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/product-download');
        }
    }

    public function update(Request $request, $id){
        $productDownload = ProductDownload::findOrFail($id);
        $file_size = env('FILE_SIZE');
        $validator = Validator::make($request->all(),[
            'product_type' => 'required',
            'products' => 'required',
            'date' => 'required|date',
            'file_type'=> 'required',
            'file_name'=> 'required|regex:/^[a-zA-Z0-9\-\+_&.: ]+$/|max:255',
            'language'=> 'required',
            'company_files'=>'file|mimes:gif,jpeg,jpg,png,webp,doc,docx,xlsx,xls,pdf|max:'.$file_size,
            'certification_type' => 'required_if:file_type,4',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->hasFile('company_files')){
            $file = $request->file('company_files');
            $filename = $file->getClientOriginalName();
            // $filename = time() . '_' . $file->getClientOriginalName();
            $fileFormat = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            $file->move(public_path('uploads/file/'), $filename);
        }else{
            $filename = $request->input('exist_image');
            $fileFormat = $request->input('format');
            $fileSize = $request->input('size');
        }
        $productDownload->product_type_id = $request->input('product_type');
        $productDownload->product_id = $request->input('products');
        $productDownload->file_type = $request->input('file_type');
        $productDownload->certification_id = $request->input('certification_type');
        $productDownload->file_name = $request->input('file_name');
        $productDownload->language = $request->input('language');
        $productDownload->date = $request->input('date');
        $productDownload->file = $filename;
        $productDownload->format = $fileFormat;
        $productDownload->size = $fileSize;
        if($productDownload->save()){
            Session::flash('message','Product Download has been updated successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/product-download');
        }else{
            Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/product-download');
        }
    }

    public function delete($encryptId){
    	$id = base64_decode($encryptId);
        $download = ProductDownload::findOrFail($id);
        $download->is_deleted = 1;
        if ($download->save()) {
            return response()->json(['status' => true, 'msg' => 'Products item and associated images marked as deleted successfully.']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something went wrong']);
        }
    }
}
