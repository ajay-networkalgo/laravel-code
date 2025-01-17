<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\PageScript;

class PageScriptController extends Controller
{
    public function index(Request $request)
    {   try {
        if($request->ajax()) {
    		$pageScript = PageScript::where('is_deleted',0)->orderBy('id', 'DESC')->get();
    		return Datatables::of($pageScript)
    			->addIndexColumn()
    			->editColumn('page', function($row) {
                    return $row->page;
                })
                ->addColumn('action', function($row){
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    $button = '<a href="'.url("admin/page-script/view/".$encryptId).'" class="mr-2"><i class="fas fa-eye"></i></a>';
                    $button = $button.'<a href="'.url("admin/page-script/edit/".$encryptId).'" class="mr-2"><i class="fas fa-edit"></i></a>';
                    $button = $button.'<a href="javascript:void(0)" class="mr-2 deleteRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
    	}
        return view('page-script.index');
        } catch (\Exception $e) {
            return redirect("admin/page-script")->withErrors([
                "error" =>
                    "An error occurred while loading the page script content.",
            ]);
        }
    }
    public function add(Request $requet){
        return view('page-script.add');
    }
    public function save(Request $request){
        DB::beginTransaction(); // Start the transaction
        try {
            $input = $request->all();
            $validator = Validator::make($request->all(), [
                'page' => 'required',
                'page_script' => 'required',
            ]);
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $product = PageScript::create([
                'page' => $input['page'],
                'page_script' => $input['page_script'],
                'is_deleted' => 0
            ]);
                DB::commit();
                Session::flash('message','Page Script has been added successfully.');
                Session::flash('alert-class', 'alert-success');
                Session::flash('icon-class', 'icon fa fa-check');
                return redirect('/admin/page-script');
       
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Session::flash("message", "Something went wrong: " . $e->getMessage());
            Session::flash("alert-class", "alert-danger");
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect("/admin/page-script")->withErrors(["error" => $e->getMessage()]);
        }
    }
    public function view($encryptId)
    {
        if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$pagescript = PageScript::findOrFail($id);
    		if(!empty($pagescript)){
	            return view('page-script.view',['pagescript'=>$pagescript,'id'=>$encryptId]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
                return redirect('/admin/page-script');
	        }
    	}else{
    		return redirect('/admin/page-script');
    	}
    }
    public function edit($encryptId)
    {
        if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$pagescript = PageScript::where('id',$id)->first();
    		if(!empty($pagescript)){
	            return view('page-script.edit',['pagescript'=>$pagescript,'id'=>$encryptId]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
                return redirect('/admin/page-script');
	        }
    	}else{
    		return redirect('/admin/page-script');
    	}
    }
    public function update(Request $request, $id)
    {
        
        $validator = Validator::make($request->all(), [
            'page' => 'required',
            'page_script' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    	$pagescript = PageScript::findOrFail($id);
        
    	$pagescript->page  = $request->input('page');
    	$pagescript->page_script = $request->input('page_script');
        if($pagescript->save()){
        	Session::flash('message','Page Script has been updated successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/page-script');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/page-script');
        }
    }
    public function delete(Request $request, $encryptId){
    	$id = base64_decode($encryptId);
    	if(PageScript::where('id',$id)->update(['is_deleted'=>1])){
    		return response()->json(['status' => true,'msg'=>'Page Script deleted successfully.']);
    	}else{
    		return response()->json(['status' => false,'msg'=>'something went wrong']);
    	}

    }
}
