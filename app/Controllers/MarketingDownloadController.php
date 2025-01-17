<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarketingDownload;
use App\Models\ProductType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class MarketingDownloadController extends Controller
{
    public function index(Request $request){
        if($request->ajax()) {
    		$downloads = MarketingDownload::where('is_deleted',0)->orderBy('id', 'DESC')->get();
    		return Datatables::of($downloads)
    			->addIndexColumn()
                ->editColumn('name', function($row) {
                    return $row->name;
                })
                ->editColumn('language', function($row) {
                    return $row->language;
                })
                ->editColumn('size', function($row) {
                    return $row->size;
                })
                ->editColumn('file_name', function($row) {
                    return "<a target='_blank' href='/uploads/file/$row->file_name'>".$row->file_name."</a>";
                })
                ->addColumn('action', function($row){
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    $button = '<a href="javascript:void(0)" class="mr-2 deleteRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
                    $button = $button.'<a href="'.url("admin/marketing-download/edit/".$encryptId).'" class="mr-2"><i class="fas fa-edit"></i></a>';
                    return $button;
                })
                ->rawColumns(['action', 'file_name'])
                ->make(true);
    	}
        return view('downloads.marketing.index');
    }

    public function add(){
    	$product_types = ProductType::all();
    	return view('downloads.marketing.add',['product_types'=>$product_types]);
    }

    public function edit($encryptId){
        if(!empty($encryptId)){
            $id = base64_decode($encryptId);
            $marketsDownloads = MarketingDownload::where('id',$id)->first();
            if(!empty($marketsDownloads)){
                $product_types = ProductType::all();
                return view('downloads.marketing.edit',['marketsDownloads'=>$marketsDownloads,'id'=>$encryptId,'product_types'=>$product_types]);
            }else{
                Session::flash('message', 'No Record Found');
                Session::flash('alert-class', 'alert-danger');
                Session::flash('icon-class', 'icon fa fa-ban');
                return redirect()->back();
            }
        }else{
            return redirect('/admin/marketing-download');
        }
    }

    public function update(Request $request, $id){
        $file_size = env('FILE_SIZE');
        $marketDownload = MarketingDownload::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'type' => 'required',
            'product_type' => 'required',
            'name'=> 'required|regex:/^[a-zA-Z0-9\-\+_&.: ]+$/|max:255',
            'language'=> 'required',
            'date'=> 'required|date',
            'company_files'=>'file|mimes:gif,jpeg,jpg,png,webp,doc,docx,xlsx,xls,pdf|max:'.$file_size,
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

        $marketDownload->name = $request->input('name');
        $marketDownload->type = $request->input('type');
        $marketDownload->product_type = $request->input('product_type');
        $marketDownload->file_name = $filename;
        $marketDownload->language = $request->input('language');
        $marketDownload->format = $fileFormat;
        $marketDownload->size = $fileSize;
        $marketDownload->last_updated = $request->input('date');
        if($marketDownload->save()){
            Session::flash('message','Marketing Download has been updated successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/marketing-download');
        }else{
            Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/marketing-download');
        }
    }

    public function save(Request $request){
        $file_size = env('FILE_SIZE');
        $validator = Validator::make($request->all(),[
            'type' => 'required',
            'product_type' => 'required',
            'name'=> 'required|regex:/^[a-zA-Z0-9\-\+_&.: ]+$/|max:255',
            'language'=> 'required',
            'date'=> 'required|date',
            'company_files'=>'required|file|mimes:gif,jpeg,jpg,png,webp,doc,docx,xlsx,xls,pdf|max:'.$file_size,
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
        $events = MarketingDownload::create([
            'name' => $request->name,
        	'type' => $request->type,
        	'product_type' => $request->product_type,
            'file_name' => $filename,
            'format' => $fileFormat,
            'size' => $fileSize,
            'language' => $request->language,
            'last_updated' => $request->date,
        ]);

        if($events){
        	Session::flash('message','Marketing Info has been added successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/marketing-download');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/marketing-download');
        }
    }

    public function delete($encryptId){
    	$id = base64_decode($encryptId);
        $download = MarketingDownload::findOrFail($id);
        $download->is_deleted = 1;
        if ($download->save()) {
            return response()->json(['status' => true, 'msg' => 'Products item and associated images marked as deleted successfully.']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something went wrong']);
        }
    }
}
