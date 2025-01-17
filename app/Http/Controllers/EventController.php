<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index(Request $request){
    	if($request->ajax()) {
    		$events = Event::where('is_deleted',0)->orderBy('id', 'DESC')->get();
    		return Datatables::of($events)
    			->addIndexColumn()
    			->editColumn('title', function($row) {
                    return $row->title;
                })
                ->editColumn('status', function($row) {
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    return $row->status.'_'.$encryptId;
                })
                ->addColumn('action', function($row){
                    $id = $row->id;
                    $encryptId = base64_encode($id);
                    $button = '<a href="'.url("admin/events/view/".$encryptId).'" class="mr-2"><i class="fas fa-eye"></i></a>';
                    $button = $button.'<a href="'.url("admin/events/edit/".$encryptId).'" class="mr-2"><i class="fas fa-edit"></i></a>';
                    $button = $button.'<a href="javascript:void(0)" class="mr-2 deleteRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
    	}
    	return view('events.index');
    }

    public function add(){
    	return view('events.add');
    }

    public function save(Request $request){
    	$input = $request->all();
        $file_size = env('FILE_SIZE');
    	$validator = Validator::make($request->all(), [
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'title' => 'required|regex:/^[a-zA-Z0-9\-\+_(), ]+$/|max:255',
            'description' => 'required',
            'location' => 'required|regex:/^[a-zA-Z0-9\-\+_(), ]+$/|max:255',
            'featured_images' => 'required|file|mimes:gif,jpeg,jpg,png,webp|max:'.$file_size,
        ],[
            'featured_images.dimensions' => 'Please upload an image with 400 x 300 pixels dimension',
        ]);
        $validator->after(function ($validator) use ($request) {
            if ($request->hasFile('featured_images')) {
                $image = $request->file('featured_images');
                $imageSize = getimagesize($image);
                if(!empty($imageSize)) {
                    $width = $imageSize[0];
                    $height = $imageSize[1];
                    if ($width != 400 || $height != 300) {
                        $validator->errors()->add('featured_images', 'Please upload an image with 400 x 300 pixels dimension');
                    }
                }
            }
        });
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $description = $request->description;
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');
        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= "/img/events_images/post_images/" . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }
        $description = $dom->saveHTML();
        $filename = null;
        if($request->hasFile('featured_images')){
            $file = $request->file('featured_images');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/events_images/feature_image/'), $filename);
        }
        $events = Event::create([
            'slug' => $this->createSlug($input['title']),
        	'from_date' => $input['from_date'],
        	'to_date' => $input['to_date'],
            'title' => $input['title'],
            'description' => $description,
            'location' => $input['location'],
            'featured_image' => $filename,
            'status' => 1
        ]);
        if($events){
        	Session::flash('message','Events has been added successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/events');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/events');
        }
    }

    public function edit($encryptId){
    	if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$events = Event::where('id',$id)->first();
    		if(!empty($events)){
	            return view('events.edit',['events'=>$events,'id'=>$encryptId]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
	            return redirect()->back();
	        }
    	}else{
    		return redirect('/admin/events');
    	}
    }

    public function update(Request $request, $id){
        $file_size = env('FILE_SIZE');
        $validator = Validator::make($request->all(), [
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'title' => 'required|regex:/^[a-zA-Z0-9\-\+_(), ]+$/|max:255',
            'description' => 'required',
            'location' => 'required|regex:/^[a-zA-Z0-9\-\+_(), ]+$/|max:255',
            'featured_images' => 'file|mimes:gif,jpeg,jpg,png,webp|max:'.$file_size,
        ],[
            'featured_images.dimensions' => 'Please upload an image with 400 x 300 pixels dimension',
        ]);
        $validator->after(function ($validator) use ($request) {
            if ($request->hasFile('featured_images')) {
                $image = $request->file('featured_images');
                $imageSize = getimagesize($image);
                if(!empty($imageSize)) {
                    $width = $imageSize[0];
                    $height = $imageSize[1];
                    if ($width != 400 || $height != 300) {
                        $validator->errors()->add('featured_images', 'Please upload an image with 400 x 300 pixels dimension');
                    }
                }
            }
        });
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    	$events = Event::findOrFail($id);
        $description = $request->input('description');
        $description = preg_replace('/<p>\s*<p>/', '<p>', $description);
        $description = preg_replace('/<\/p>\s*<\/p>/', '</p>', $description);
        $description = preg_replace('/<\/p>\s*<p>/', '<p>', $description);
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            $substring = "events_images";
            if (!Str::contains($data, $substring)) {
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name= "/img/events_images/post_images/" . time().$item.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);
                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
            }

        }
        if($request->hasFile('featured_images')){
            $file = $request->file('featured_images');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/events_images/feature_image/'), $filename);
        }else{
        	$filename = $request->input('exist_image');
        }

        $description = $dom->saveHTML();
        $events->from_date = $request->input('from_date');
        $events->to_date = $request->input('to_date');
        $events->location = $request->input('location');
        $events->featured_image = $filename;
    	$events->title = $request->input('title');
        $events->description = $description;
        if($events->save()){
        	Session::flash('message','Events has been updated successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/events');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/events');
        }
    }

    public function view($encryptId){
    	if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$events = Event::findOrFail($id);
    		if(!empty($events)){
	            return view('events.view',['events'=>$events,'id'=>$encryptId]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
	            return redirect()->back();
	        }
    	}else{
    		return redirect('/admin/events');
    	}
    }

    public function delete(Request $request,$encryptId){
    	$id = base64_decode($encryptId);
    	$events = Event::findOrFail($id);
    	$events->is_deleted = 1;
        if($events->save()){
    		return response()->json(['status' => true,'msg'=>'Event item and associated images deleted successfully.']);
    	}else{
    		return response()->json(['status' => false,'msg'=>'something went wrong']);
    	}

    }

    public function changestatus(Request $request){
    	$input = $request->all();
        $id = base64_decode($input['rowid']);
        $status = $input['status'];
        if(Event::where('id',$id)->update(['status'=>$status==1?0:1])){
            return response()->json(['status' => true,'msg'=>'status has been updated']);
        }else{
            return response()->json(['status' => false,'msg'=>'something went wrong']);
        }
    }
}
