<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ImageAltTag;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class AltTagManagerController extends Controller
{
    public function index(Request $request)
    {
        try {
            if($request->ajax()) {
                $imagealttags = ImageAltTag::where('is_deleted',0)->orderBy('id', 'DESC')->get();
                return Datatables::of($imagealttags)
                    ->addIndexColumn()
                    ->editColumn('url', function ($row) {
                        return $row->url;
                    })
                    ->editColumn('path', function ($row) {
                        return $row->path;
                    })
                    ->editColumn('text', function ($row) {
                        return $row->text;
                    })
                    
                    ->addColumn('action', function($row){
                        $id = $row->id;
                        $encryptId = base64_encode($id);
                        $button = '<a href="'.url("admin/image-alt-tag/view/".$encryptId).'" class="mr-2"><i class="fas fa-eye"></i></a>';
                        $button = $button.'<a href="'.url("admin/image-alt-tag/edit/".$encryptId).'" class="mr-2"><i class="fas fa-edit"></i></a>';
                        $button = $button.'<a href="javascript:void(0)" class="mr-2 deleteRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view("image-alt-tag.index");
        } catch (\Exception $e) {
            return redirect("admin/image-alt-tag")->withErrors([
                "error" =>
                    "An error occurred while loading the Product Category content.",
            ]);
        }
    }
    public function add()
    {
        return view('image-alt-tag.add');
    }
    public function save(Request $request)
    {   DB::beginTransaction(); // Start the transaction
        try {
            $input = $request->all();
            $validator = Validator::make($request->all(), [
                'url' => 'required|url|max:2048',
                'path' => 'required|string|max:255|regex:/^[a-zA-Z0-9\/_.-]+$/',
                'text' => 'required|string|max:500|min:3',
            ]);
            if($validator->fails()) {
                return redirect("admin/image-alt-tag/add")->withErrors($validator)->withInput();
            }
            
            $imagealttag = ImageAltTag::create([
                'url' => $input['url'],
                'path' => $input['path'],
                'text' => $input['text'],
                'is_deleted' => 0
            ]);
                DB::commit();
                Session::flash('message','Image Alt Tag has been added successfully.');
                Session::flash('alert-class', 'alert-success');
                Session::flash('icon-class', 'icon fa fa-check');
                return redirect('/admin/image-alt-tag');
       
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Session::flash("message", "Something went wrong: " . $e->getMessage());
            Session::flash("alert-class", "alert-danger");
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect("/admin/image-alt-tag")->withErrors(["error" => $e->getMessage()]);
        }
    }
    public function view($encryptId)
    {
        if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$imagealttag = ImageAltTag::findOrFail($id);
    		if(!empty($imagealttag)){
	            return view('image-alt-tag.view',['imagealttag'=>$imagealttag,'id'=>$encryptId]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
                return redirect('/admin/image-alt-tag');
	        }
    	}else{
    		return redirect('/admin/image-alt-tag');
    	}
    }
    public function edit($encryptId)
    {
        if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$imagealttag = ImageAltTag::where('id',$id)->first();
    		if(!empty($imagealttag)){
	            return view('image-alt-tag.edit',['imagealttag'=>$imagealttag , 'id'=>$encryptId]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
                return redirect('/admin/image-alt-tag');
	        }
    	}else{
    		return redirect('/admin/image-alt-tag');
    	}
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required|url|max:2048',
            'path' => 'required|string|max:255|regex:/^[a-zA-Z0-9\/_.-]+$/',
            'text' => 'required|string|max:500|min:3',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    	$imagealttag = ImageAltTag::findOrFail($id);
    	$imagealttag->url  = $request->input('url');
    	$imagealttag->path = $request->input('path');
        $imagealttag->text = $request->input('text');
        if($imagealttag->save()){
        	Session::flash('message','Image Alt Tag has been updated successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/image-alt-tag');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/image-alt-tag');
        }
    }
    public function delete(Request $request, $encryptId){
    	$id = base64_decode($encryptId);
    	if(ImageAltTag::where('id',$id)->update(['is_deleted'=>1])){
    		return response()->json(['status' => true,'msg'=>'Image Alt Tag deleted successfully.']);
    	}else{
    		return response()->json(['status' => false,'msg'=>'something went wrong']);
    	}

    }
}
