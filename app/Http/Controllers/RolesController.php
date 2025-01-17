<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\ModuleList;
use App\Models\ModulePermission;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class RolesController extends Controller{
    public function index(Request $request){
    	if($request->ajax()) {
    		$data = UserRole::select(['id','roles','created_at'])->get();
    		return Datatables::of($data)
    			->addIndexColumn()
    			->editColumn('roles', function($row) {
                    return $row->roles;
                })
                ->editColumn('created_at', function($row) {
                    return $row->created_at;
                })
                ->addColumn('action', function($row){
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    $button = '<a href="'.url("admin/roles-management/edit/".$encryptId).'" class="mr-2"><i class="fas fa-edit"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
    	}
    	return view('roles-management.index');
    }

    public function add(){
        $module_lists = ModuleList::all();
        return view('roles-management.add',['module_lists'=>$module_lists]);
    }

    public function save(Request $request){
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z0-9\-\+_(), ]+$/|max:255',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user_roles = new UserRole;
        $user_roles->roles = $input['name'];
        if($user_roles->save()){
            $role_id = $user_roles->id;
            if(!empty($input['modules']) && count($input['modules']) > 0){
                foreach ($input['modules'] as $module) {
                    $module_permission = new ModulePermission;
                    $module_permission->role_id = $role_id;
                    $module_permission->module_id = $module;
                    $module_permission->save();
                }
            }
            Session::flash('message','Roles has been added successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/roles-management');
        }else{
            Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/roles-management');
        }
    }

    public function edit($encryptId){
        if(!empty($encryptId)){
            $id = base64_decode($encryptId);
            $user_role = UserRole::findOrFail($id);
            $module_lists = ModuleList::all();
            $selected_modules = $user_role->modules()->pluck('module_id')->toArray();
            if(!empty($user_role)){
                return view('roles-management.edit',compact('module_lists', 'selected_modules', 'user_role'));
            }else{
                Session::flash('message', 'No Record Found');
                Session::flash('alert-class', 'alert-danger');
                Session::flash('icon-class', 'icon fa fa-ban');
                return redirect()->back();
            }
        }else{
            return redirect('/admin/roles-management');
        }
    }


    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z0-9\-\+_(), ]+$/|max:255',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $role_id = $request->input('role_id');
        $user_role = UserRole::findOrFail($role_id);
        $user_role->roles = $request->input('name');
        $user_role->save();
        $user_role->modules()->sync($request->input('modules'));
        Session::flash('message', 'User role and modules have been updated successfully.');
        Session::flash('alert-class', 'alert-success');
        Session::flash('icon-class', 'icon fa fa-check');
        return redirect('/admin/roles-management');
    }
}
