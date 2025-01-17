<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyDownload;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class CompanyDownloadController extends Controller
{
    public function index(Request $request){
        if($request->ajax()) {
    		$downloads = CompanyDownload::where('is_deleted',0)->orderBy('id', 'DESC')->get();
    		return Datatables::of($downloads)
    			->addIndexColumn()
                ->editColumn('name', function($row) {
                    return $row->name;
                })
    			->editColumn('file_name', function($row) {
                    return "<a target='_blank' href='/uploads/file/$row->file_name'>".$row->file_name."</a>";
                })
                ->editColumn('language', function($row) {
                    return $row->language;
                })
                ->editColumn('size', function($row) {
                    return $row->size;
                })
                ->addColumn('action', function($row){
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    $button = '<a href="javascript:void(0)" class="mr-2 deleteRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
                    $button = $button.'<a href="'.url("admin/company-download/edit/".$encryptId).'" class="mr-2"><i class="fas fa-edit"></i></a>';
                    return $button;
                })
                ->rawColumns(['action', 'file_name'])
                ->make(true);
    	}
        return view('downloads.company-info.index');
    }

    public function add(){
    	return view('downloads.company-info.add');
    }

    public function save(Request $request){
        $file_size = env('FILE_SIZE');
        $validator = Validator::make($request->all(),[
            'company_files' => 'required|file|mimes:gif,jpeg,jpg,png,webp,doc,docx,xlsx,xls,pdf|max:'.$file_size,
            'language' => 'required',
            'date' => 'required|date',
            'name' => 'required|regex:/^[a-zA-Z0-9\-\+_&.: ]+$/|max:255',
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
        $events = CompanyDownload::create([
            'name' => $request->name,
            'file_name' => $filename,
            'format' => $fileFormat,
            'size' => $fileSize,
            'language' => $request->language,
            'last_updated' => $request->date,
        ]);

        if($events){
        	Session::flash('message','Company Info has been added successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/company-download');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/company-download');
        }
    }

    public function edit($encryptId){
        if(!empty($encryptId)){
            $id = base64_decode($encryptId);
            $companyDownloads = CompanyDownload::where('id',$id)->first();
            if(!empty($companyDownloads)){
                return view('downloads.company-info.edit',['companyDownloads'=>$companyDownloads,'id'=>$encryptId]);
            }else{
                Session::flash('message', 'No Record Found');
                Session::flash('alert-class', 'alert-danger');
                Session::flash('icon-class', 'icon fa fa-ban');
                return redirect()->back();
            }
        }else{
            return redirect('/admin/company-download');
        }
    }

    public function update(Request $request, $id){
        $companyDownload = CompanyDownload::findOrFail($id);
        $file_size = env('FILE_SIZE');
        $validator = Validator::make($request->all(),[
            'company_files' => 'file|mimes:gif,jpeg,jpg,png,webp,doc,docx,xlsx,xls,pdf|max:'.$file_size,
            'language' => 'required',
            'date' => 'required|date',
            'name' => 'required|regex:/^[a-zA-Z0-9\-\+_&.: ]+$/|max:255',
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

        $companyDownload->name = $request->input('name');
        $companyDownload->file_name = $filename;
        $companyDownload->language = $request->input('language');
        $companyDownload->format = $fileFormat;
        $companyDownload->size = $fileSize;
        $companyDownload->last_updated = $request->input('date');
        if($companyDownload->save()){
            Session::flash('message','Company Download has been updated successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/company-download');
        }else{
            Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/company-download');
        }
    }

    public function delete($encryptId){
    	$id = base64_decode($encryptId);
        $download = CompanyDownload::findOrFail($id);
        $download->is_deleted = 1;
        if ($download->save()) {
            return response()->json(['status' => true, 'msg' => 'Products item and associated images marked as deleted successfully.']);
        } else {
            return response()->json(['status' => false, 'msg' => 'Something went wrong']);
        }
    }
}
