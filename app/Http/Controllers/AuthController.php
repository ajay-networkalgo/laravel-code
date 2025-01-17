<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ModuleList;
use App\Models\ModulePermission;
use Validator;

class AuthController extends Controller
{
    public function login(){
    	return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function authenticate(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ],
        [
            'email.required'=>'Please enter email',
            'password.required'=>'Please enter password',
        ]);

        if($validator->fails()){
            return redirect('admin/Olax-login-authority')->withErrors($validator)->withInput();
        }
        $input = $request->all();
        $remember_me = (isset($input['remember_me']) && $input['remember_me']==1) ? true:false;
        if(Auth::attempt(['email'=>$input['email'],'password'=>$input['password'],'status' => 1,'is_deleted'=>0],$remember_me)){
            return redirect()->intended("admin/dashboard");
        }else{
            Session::flash('message', 'Invalid email OR password!');
            Session::flash('alert-class', 'alert-danger');
            Session::flash('icon-class', 'icon fa fa-ban');
        }
        return redirect('admin/Olax-login-authority');
    }

    public function dashboard(){
        $user = Auth::user();
    	return view('auth.dashboard');
    }

     public function changePassword(Request $request){
        $input = $request->all();
        $user = Auth::user();
        $password = Hash::make($input['new_password']);
        User::where('id',$user->id)->update(['password'=>$password]);
        Auth::logout();
        Session::flash('message','Password has been updated successfully.');
        Session::flash('alert-class', 'alert-success');
        Session::flash('icon-class', 'icon fa fa-check');
        return redirect('admin/Olax-login-authority');
    }

    public function logout(){
        Auth::logout();
        return redirect('admin/Olax-login-authority');
    }
}
