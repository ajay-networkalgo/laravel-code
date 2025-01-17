<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            if($request->ajax()) {
                $menulist = Menu::where('is_deleted',0)->orderBy('id', 'DESC')->get();
                return Datatables::of($menulist)
                    ->addIndexColumn()
                    ->editColumn('solax_menu_section', function ($row) {
                        return $row->solax_menu_section;
                    })
                    ->editColumn('solax_menu_name', function ($row) {
                        return $row->solax_menu_name;
                    })
                    ->editColumn('solax_menu_url', function ($row) {
                        return $row->solax_menu_url;
                    })
                    ->editColumn('status', function($row) {
                        $id = $row->id;
                        $encryptId = base64_encode($id);
                        return $row->is_active.'_'.$encryptId;
                    })
                    ->addColumn('action', function($row){
                        $id = $row->id;
                        $encryptId = base64_encode($id);
                        $button = '<a href="'.url("admin/menu/view/".$encryptId).'" class="mr-2"><i class="fas fa-eye"></i></a>';
                        $button = $button.'<a href="'.url("admin/menu/edit/".$encryptId).'" class="mr-2"><i class="fas fa-edit"></i></a>';
                        $button = $button.'<a href="javascript:void(0)" class="mr-2 deleteRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view("menu-page.index");
        } catch (\Exception $e) {
            return redirect("admin/menu")->withErrors([
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
    public function add(Request $request)
    {
        
        return view("menu-page.add");
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
    	$validator = Validator::make($request->all(), [
            'solax_menu_section' => 'required',
            'solax_menu_name' => 'required',
            'solax_menu_parent_id' => 'nullable|exists:menus,id',
            'solax_menu_url' =>  'required',
        ]);
        if($validator->fails()) {
            return redirect('/admin/menu.add')->withErrors($validator)->withInput();
        }
        $menu = Menu::create([
            'solax_menu_section' => $input['solax_menu_section'],
            'solax_menu_name' => $input['solax_menu_name'],
            'solax_menu_url' => $input['solax_menu_url'],
            'is_active' => 1,
            'is_deleted' => 0
        ]);
        DB::commit();
            Session::flash('message','Menu has been added successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/menu');
       
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Session::flash("message", "Something went wrong: " . $e->getMessage());
            Session::flash("alert-class", "alert-danger");
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect("/admin/menu")->withErrors(["error" => $e->getMessage()]);
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
    		$menu = Menu::where('id',$id)->first();
    		if(!empty($menu)){
	            return view('menu-page.view',['menu'=>$menu,'id'=>$encryptId]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
                return redirect('/admin/menu');
	        }
    	}else{
    		return redirect('/admin/menu');
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
    		$menu = Menu::where('id',$id)->first();
    		if(!empty($menu)){
	            return view('menu-page.edit',['menu'=>$menu,'id'=>$encryptId]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
                return redirect('/admin/menu');
	        }
    	}else{
    		return redirect('/admin/menu');
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
        DB::beginTransaction(); // Start the transaction
        try {
        $input = $request->all();
    	$validator = Validator::make($request->all(), [
            'solax_menu_section' => 'required',
            'solax_menu_name' => 'required',
            'solax_menu_parent_id' => 'nullable|exists:menus,id',
            'solax_menu_url' =>  'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
            $menu = Menu::findOrFail($id);
            $menu->solax_menu_section  = $request->input('solax_menu_section');
            $menu->solax_menu_name  = $request->input('solax_menu_name');
            $menu->solax_menu_url  = $request->input('solax_menu_url');
            $menu->save();
            DB::commit();
            Session::flash('message','Menu has been Updated successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/menu');
       
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction
            Session::flash("message", "Something went wrong: " . $e->getMessage());
            Session::flash("alert-class", "alert-danger");
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect("/admin/menu")->withErrors(["error" => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$encryptId){
    	$id = base64_decode($encryptId);
    	if(Menu::where('id',$id)->update(['is_deleted'=>1])){
    		return response()->json(['status' => true,'msg'=>'Menu deleted successfully.']);
    	}else{
    		return response()->json(['status' => false,'msg'=>'something went wrong']);
    	}

    }
    public function changestatus(Request $request){
    	$input = $request->all();
        $id = base64_decode($input['rowid']);
        $status = $input['status'];
        if(Menu::where('id',$id)->update(['is_active'=>$status==1?0:1])){
            return response()->json(['status' => true,'msg'=>'status has been updated']);
        }else{
            return response()->json(['status' => false,'msg'=>'something went wrong']);
        }
    }
}
