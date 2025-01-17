<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalContact;
use App\Models\Country;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class GlobalContactController extends Controller
{
    public function index(Request $request){
    	if($request->ajax()) {
    		$globalContact = GlobalContact::with('country')->orderBy('id','DESC')->get();
    		return Datatables::of($globalContact)
    			->addIndexColumn()
    			->editColumn('country_id', function($row) {
                    return $row->country->name;
                })
                ->editColumn('email', function($row) {
                    return $row->email;
                })
                ->editColumn('service_hotline', function($row) {
                    return $row->service_hotline;
                })
                ->addColumn('action', function($row){
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    $button = '<a href="'.url("admin/global-contacts/view/".$encryptId).'" class="mr-2"><i class="fas fa-eye"></i></a>';
                    $button = $button.'<a href="'.url("admin/global-contacts/edit/".$encryptId).'" class="mr-2"><i class="fas fa-edit"></i></a>';
                    $button = $button.'<a href="javascript:void(0)" class="mr-2 deleteRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
    	}
    	return view('global-contacts.index');
    }

    public function add(){
    	$countries = Country::all();
    	return view('global-contacts.add',['countries'=>$countries]);
    }

    public function save(Request $request){
        $validator = Validator::make($request->all(), [
            'country_id' => 'required',
            'email' => 'required|regex:/^[a-zA-Z0-9\-\+_(),@. ]+$/|max:255',
            'service_hotline' => 'required',
            'address' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    	$input = $request->all();
        $globalData = $request->only(['country_id','address','email','service_hotline']);
        $globalContacts = GlobalContact::create($globalData);
        if($globalContacts){
        	Session::flash('message','Global Contacts has been added successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/global-contacts');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/global-contacts');
        }
    }

    public function edit($encryptId){
    	if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$countries = Country::all();
    		$globalContacts = GlobalContact::where('id',$id)->first();
    		if(!empty($globalContacts)){
	            return view('global-contacts.edit',['globalContacts'=>$globalContacts,'id'=>$encryptId,'countries'=>$countries]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
	            return redirect()->back();
	        }
    	}else{
    		return redirect('/admin/global-contacts');
    	}
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'country_id' => 'required',
            'email' => 'required|regex:/^[a-zA-Z0-9\-\+_(),@. ]+$/|max:255',
            'service_hotline' => 'required',
            'address' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    	$input = $request->all();
        $globalContacts = GlobalContact::find($id);
        if (!$globalContacts) {
            return redirect()->back();
        }
        $globalData = $request->only(['country_id','address','email','service_hotline']);
        $globalContacts->update($globalData);
        if($globalContacts){
        	Session::flash('message','Global Contacts has been updated successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/global-contacts');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/global-contacts');
        }
    }

    public function view($encryptId){
    	if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$globalContacts = GlobalContact::with('country')->findOrFail($id);
    		if(!empty($globalContacts)){
	            return view('global-contacts.view',['globalContacts'=>$globalContacts]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
	            return redirect()->back();
	        }
    	}else{
    		return redirect('/admin/global-contacts');
    	}
    }

    public function delete($encryptId){
    	$id = base64_decode($encryptId);
    	$globalContacts = GlobalContact::findOrFail($id);
    	if($globalContacts->delete()){
    		return response()->json(['status' => true,'msg'=>'News item and associated images deleted successfully.']);
    	}else{
    		return response()->json(['status' => false,'msg'=>'something went wrong']);
    	}
    }
}
