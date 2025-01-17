<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogImage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request){
    	if($request->ajax()) {
    		$blog = Blog::with('images')->where('is_deleted',0)->orderBy('id', 'DESC')->get();
    		return Datatables::of($blog)
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
                    $button = '<a href="'.url("admin/blog/view/".$encryptId).'" class="mr-2"><i class="fas fa-eye"></i></a>';
                    $button = $button.'<a href="'.url("admin/blog/edit/".$encryptId).'" class="mr-2"><i class="fas fa-edit"></i></a>';
                    $button = $button.'<a href="javascript:void(0)" class="mr-2 deleteRecord" id="'.$encryptId.'"><i class="fas fa-trash-alt"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
    	}
    	return view('blog.index');
    }

    public function add(){
    	return view('blog.add');
    }

    public function save(Request $request){
    	$input = $request->all();
        $file_size = env('FILE_SIZE');
    	$validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'title' => 'required|regex:/^[a-zA-Z0-9\-\+_(), ]+$/|max:255',
            'description' => 'required',
            'type' => 'required',
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
        $date = Carbon::createFromFormat('m/d/Y', $input['date'])->format('Y-m-d');
        $description = $request->description;
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');
        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= "/img/blog_images/post_images/" . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }
        $description = $dom->saveHTML();
        $blog = Blog::create([
            'slug' => $this->createSlug($input['title']),
        	'type' => $input['type'],
            'title' => $input['title'],
            'description' => $description,
            'date' => $date,
            'created_by' => auth()->id(),
            'status' => 1
        ]);
        if($blog){
        	if($request->hasFile('featured_images')){
                $file = $request->file('featured_images');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img/blog_images/feature_image/'), $filename);
                $blogImage = BlogImage::create([
                    'blog_id' => $blog->id,
                    'images' =>  $filename,
                ]);
	        }
        	Session::flash('message','Blog has been added successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/blog');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/blog');
        }

    }

    public function edit($encryptId){
    	if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$blog = Blog::with('images')->where('id',$id)->first();
    		if(!empty($blog)){
	            return view('blog.edit',['blog'=>$blog,'id'=>$encryptId]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
	            return redirect()->back();
	        }
    	}else{
    		return redirect('/admin/blog');
    	}
    }

    public function update(Request $request, $id){
        $file_size = env('FILE_SIZE');
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'title' => 'required|regex:/^[a-zA-Z0-9\-\+_(), ]+$/|max:255',
            'description' => 'required',
            'type' => 'required',
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
        // echo "<pre>";
        // print_r($validator->errors());exit;
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    	$blog = Blog::findOrFail($id);
        $description = $request->input('description');
        $description = preg_replace('/<p>\s*<p>/', '<p>', $description);
        $description = preg_replace('/<\/p>\s*<\/p>/', '</p>', $description);
        $description = preg_replace('/<\/p>\s*<p>/', '<p>', $description);
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            $substring = "blog_images";
            if (!Str::contains($data, $substring)) {
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name= "/img/blog_images/post_images/" . time().$item.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);
                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
            }

        }
        $description = $dom->saveHTML();
    	$blog->title = $request->input('title');
    	$blog->type  = $request->input('type');
        $blog->description = $description;
        $blog->date = Carbon::parse($request->input('date'))->format('Y-m-d');
        if($blog->save()){
            if($request->hasFile('featured_images')){
                BlogImage::where('blog_id',$blog->id)->delete();
                $file = $request->file('featured_images');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img/blog_images/feature_image/'), $filename);
                $blogImage = BlogImage::create([
                    'blog_id' => $blog->id,
                    'images' =>  $filename,
                ]);
            }
        	Session::flash('message','Blog has been updated successfully.');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-check');
            return redirect('/admin/blog');
        }else{
        	Session::flash('message','Something went wrong');
            Session::flash('alert-class', 'alert-success');
            Session::flash('icon-class', 'icon fa fa-ban');
            return redirect('/admin/blog');
        }
    }

    public function view($encryptId){
    	if(!empty($encryptId)){
    		$id = base64_decode($encryptId);
    		$blog = Blog::with('images')->findOrFail($id);
    		if(!empty($blog)){
	            return view('blog.view',['blog'=>$blog,'id'=>$encryptId]);
	        }else{
	            Session::flash('message', 'No Record Found');
	            Session::flash('alert-class', 'alert-danger');
	            Session::flash('icon-class', 'icon fa fa-ban');
	            return redirect()->back();
	        }
    	}else{
    		return redirect('/admin/blog');
    	}
    }

    public function delete($encryptId){
    	$id = base64_decode($encryptId);
    	$blog = Blog::findOrFail($id);
        $blog->is_deleted = 1;
    	if($blog->save()){
    		return response()->json(['status' => true,'msg'=>'Blog item and associated images deleted successfully.']);
    	}else{
    		return response()->json(['status' => false,'msg'=>'something went wrong']);
    	}

    }

    public function changestatus(Request $request){
    	$input = $request->all();
        $id = base64_decode($input['rowid']);
        $status = $input['status'];
        if(Blog::where('id',$id)->update(['status'=>$status==1?0:1])){
            return response()->json(['status' => true,'msg'=>'status has been updated']);
        }else{
            return response()->json(['status' => false,'msg'=>'something went wrong']);
        }
    }
}
