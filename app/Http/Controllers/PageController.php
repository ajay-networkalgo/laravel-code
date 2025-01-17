<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Page;
use App\Models\Menu;

class PageController extends Controller
{
   
    public function index(Request $request)
    {   try {
        if($request->ajax()) {
    		$pages = Page::where('is_deleted',0)->orderBy('id', 'DESC')->get();
    		return Datatables::of($pages)
    			->addIndexColumn()
    			->editColumn('title', function($row) {
                    return $row->title;
                })
                ->editColumn('slug', function ($row) {
                    return $row->slug;
                })
                ->editColumn('short_description', function ($row) {
                    return $row->short_description;
                })
                ->editColumn('status', function($row) {
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    return $row->is_active.'_'.$encryptId;
                })
                ->addColumn('action', function($row){
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    $button = '<a href="'.url("admin/page/view/".$encryptId).'" class="mr-2"><i class="fas fa-eye"></i></a>';
                    $button = $button.'<a href="'.url("admin/page/edit/".$encryptId).'" class="mr-2"><i class="fas fa-edit"></i></a>';
                    $button = $button.'<a href="javascript:void(0)" class="mr-2 deleteRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
    	}
        return view('page.index');
    } catch (\Exception $e) {
        return redirect("admin/page")->withErrors([
            "error" =>
                "An error occurred while loading the product type content.",
        ]);
    }
    }

    public function add()
    {   
        $menulist = Menu::where('is_deleted',0)->orderBy('id', 'DESC')->get();
        return view('page.add',compact('menulist'));
    }

    
    public function save(Request $request)
    { 
        DB::beginTransaction(); // Start the transaction
        try {
            $input = $request->all();
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'slug' => 'required',
                'short_description' => 'required',
                'description' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keywords' => 'required',
                'page_id' => 'required',
            ]);
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $page = Page::create([
                'title' => $input['title'],
                'slug' => $input['slug'],
                'short_description' => $input['short_description'],
                'description' => $input['description'],
                'meta_title' => $input['meta_title'],
                'meta_description' => $input['meta_description'],
                'meta_keywords' => $input['meta_keywords'],
                'page_id' => $input['page_id'],
                'is_active' => 1,
                'is_deleted' => 0
            ]);
                DB::commit();
                Session::flash('message','Page has been added successfully.');
                Session::flash('alert-class', 'alert-success');
                Session::flash('icon-class', 'icon fa fa-check');
                return redirect('/admin/page');
       
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Session::flash("message", "Something went wrong: " . $e->getMessage());
            Session::flash("alert-class", "alert-danger");
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect("/admin/page")->withErrors(["error" => $e->getMessage()]);
        }
    }

   
    public function view($encryptId)
    {
        if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$page = Page::findOrFail($id);
    		if(!empty($page)){
	            return view('page.view', ['page' => $page ,'id' => $encryptId]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
                return redirect('/admin/page');
	        }
    	}else{
    		return redirect('/admin/page');
    	}
    }

    
    public function edit($encryptId)
    {
        
        if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
            $page = Page::findOrFail($id);
            $menulist = Menu::where('is_deleted',0)->orderBy('id', 'DESC')->get();
    		if(!empty($page)){
                
	            return view('page.edit',['menulist' => $menulist, 'id' => $encryptId, 'page'=>$page ]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
                return redirect('/admin/page');
	        }
    	}else{
    		return redirect('/admin/page');
    	}
    }

   
    public function update(Request $request, $id)
    {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'page_id' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    	$page = Page::findOrFail($id);
        $page->title  = $request->input('title');
    	$page->slug  = $request->input('slug');
        $page->short_description  = $request->input('short_description');
        $page->description  = $request->input('description');
        $page->meta_title  = $request->input('meta_title');
        $page->meta_description  = $request->input('meta_description');
        $page->meta_keywords  = $request->input('meta_keywords');
        $page->page_id  = $request->input('page_id');
        if($page->save()){
        	Session::flash('message','Page has been updated successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/page');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/page');
        }
    }

   
    public function delete(Request $request, $encryptId){
    	$id = base64_decode($encryptId);
    	if(Page::where('id',$id)->update(['is_deleted'=>1])){
    		return response()->json(['status' => true,'msg'=>'Page deleted successfully.']);
    	}else{
    		return response()->json(['status' => false,'msg'=>'something went wrong']);
    	}

    }
    public function changestatus(Request $request){
    	$input = $request->all();
        $id = base64_decode($input['rowid']);
        $status = $input['status'];
        if(Page::where('id',$id)->update(['is_active'=>$status==1?0:1])){
            return response()->json(['status' => true,'msg'=>'status has been updated']);
        }else{
            return response()->json(['status' => false,'msg'=>'something went wrong']);
        }
    }
}
