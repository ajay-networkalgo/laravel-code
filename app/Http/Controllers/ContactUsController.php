<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use Yajra\DataTables\Facades\DataTables;

class ContactUsController extends Controller
{
    public function index(Request $request){
        $contacts = ContactUs::orderBy('id','DESC')->get();
        return view('contacts.index',['contacts'=>$contacts]);
    }

    public function view($encryptId){
    	if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$contact_us = ContactUs::findOrFail($id);
    		if(!empty($contact_us)){
	            return view('contacts.view',['contact_us'=>$contact_us,'id'=>$encryptId]);
	        }else{
	            Session::flash('message', 'No Record Found'); 
	            Session::flash('alert-class', 'alert-danger'); 
	            Session::flash('icon-class', 'icon fa fa-ban');
	            return redirect()->back(); 
	        }
    	}else{
    		return redirect('/admin/contact-us');
    	}
    }
}
