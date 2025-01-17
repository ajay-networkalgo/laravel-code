<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request){
    	if($request->ajax()) {
    		$data = User::select(['id','name','email','status'])->where('role_id','!=',1)->where('is_deleted',0)->get();
    		return Datatables::of($data)
    			->addIndexColumn()
    			->editColumn('name', function($row) {
                    return $row->name;
                })
                ->editColumn('email', function($row) {
                    return $row->email;
                })
                ->editColumn('email', function($row) {
                    return $row->email;
                })
                ->editColumn('status', function($row) {
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    return $row->status.'_'.$encryptId;
                })
                ->addColumn('action', function($row){
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    $button = '<a href="'.url("admin/user-management/view/".$encryptId).'" class="mr-2"><i class="fas fa-eye"></i></a>';
                    $button = $button.'<a href="'.url("admin/user-management/edit/".$encryptId).'" class="mr-2"><i class="fas fa-edit"></i></a>';
                    $button = $button.'<a href="javascript:void(0)" class="mr-2 deleteRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
    	}
    	return view('user-management.index');
    }

    public function add(){
        $user_roles = UserRole::all();
    	return view('user-management.add',['user_roles'=>$user_roles]);
    }

    public function save(Request $request){
    	$input = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z0-9\-\+_(), ]+$/|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required',
            'cpassword' => 'required',
            'role_id' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $mytime = Carbon::now();
        $date = $mytime->toDateString();
        $user = new User;
        $user->role_id = $input['role_id'];
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->created_at = $date;
        $user->updated_at = $date;
        if($user->save()){
            Session::flash('message','User has been added successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/user-management');
        }else{
            Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/user-management');
        }
    }

    public function edit($encryptId){
    	if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$users = User::select(['name','email','password','role_id'])->where('id',$id)->first();
            $user_roles = UserRole::all();
    		if(!empty($users)){
	            return view('user-management.edit',['user'=>$users,'id'=>$encryptId,'user_roles'=>$user_roles]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
	            return redirect()->back();
	        }
    	}else{
    		return redirect('/admin/user-management');
    	}
    }

    public function update(Request $request){
    	$input = $request->all();
    	$id = base64_decode($input['user_id']);
    	$user = User::findOrFail($id);
    	$validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z0-9\-\+_(), ]+$/|max:255',
            'email' => 'required|email|max:255',
            'role_id' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->role_id = $input['role_id'];
         if ($request->filled('password')) {
            $user->password = Hash::make($input['password']); // Hash the password
        }
        if($user->save()){
            Session::flash('message','User has been updated successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/user-management');
        }else{
            Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/user-management');
        }
    }

    public function view($encryptId){
    	$id = base64_decode($encryptId);
    	$users = User::where('id',$id)->first();
    	if(!empty($users)){
    		return view('user-management.view',['users'=>$users]);
    	}else{
    		Session::flash('message', 'No Record Found');
            Session::flash('alert-class', 'alert-danger');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect()->back();
    	}
    }

    public function delete(Request $request){
    	$input = $request->all();
    	$id = base64_decode($input['rowid']);
    	if(User::where('id',$id)->update(['is_deleted'=>1])){
    		return response()->json(['status' => true,'msg'=>'user has been deleted']);
    	}else{
    		return response()->json(['status' => false,'msg'=>'something went wrong']);
    	}
    }

    public function changestatus(Request $request){
        $input = $request->all();
        $id = base64_decode($input['rowid']);
        $status = $input['status'];
        if(User::where('id',$id)->update(['status'=>$status==1?0:1])){
            return response()->json(['status' => true,'msg'=>'status has been updated']);
        }else{
            return response()->json(['status' => false,'msg'=>'something went wrong']);
        }
    }
}
