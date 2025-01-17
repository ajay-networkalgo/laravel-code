<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogImage;
use App\Models\TempAsset;
use App\Models\Asset;

class BlogFrontenedController extends Controller
{
    public function index(){
        $blog = Blog::with('images')->where('status', 1)->orderBy('id', 'DESC')->take(6)->get();
        $blog_type = config('constant.blog_types');
        $this->viewData['blog_type'] = $blog_type;
    	$this->viewData['blog'] = $blog;

        $blogspagecontent = TempAsset::where("type", "blogs")
            ->get()
            ->keyBy("key")
            ->toArray();
        if (empty($blogspagecontent)) {
            $blogspagecontent = Asset::where("type", "blogs")
                ->get()
                ->keyBy("key")
                ->toArray();
        }
        $this->viewData['blogspagecontent'] = $blogspagecontent;
    	return view('home.blog',$this->viewData);
    }


    public function loadMoreBlogs(Request $request,$slug){
        $skip = $request->skip;
        if($slug == 'all'){
            $blog = Blog::with('images')->where('status', 1)->orderBy('id', 'DESC')->skip($skip)->take(6)->get();
        }else{
            if($slug == 'solax-accessories'){
                $type = 1;
            }else if($slug == 'installers'){
                $type = 2;
            }else if($slug == 'homeowners'){
                $type = 3;
            }else if($slug == 'innovation'){
                $type = 4;
            }
            $blog = Blog::where('type',$type)->where('status', 1)->with('images')->orderBy('id', 'DESC')->skip($skip)->take(6)->get();
        }

        $blog_type = config('constant.blog_types');
        $this->viewData['blog_type'] = $blog_type;
        $this->viewData['blog'] = $blog;
        return view('home.all-blog',$this->viewData);
    }

    public function details($slug = ''){
    	if(!empty($slug)){
    		$blog = Blog::with('images')->where('status', 1)->where('slug', $slug)->first();
    		if(!empty($blog)){
                $blog_type = config('constant.blog_types');
                $excludedIds = [$blog->id];
                $relatedBlog = Blog::whereNotIn('id', $excludedIds)->where('status', 1)->with('images')->orderBy('id', 'DESC')->take(3)->get();
	            return view('blog.details',['blog'=>$blog,'id'=>$blog->id,'blog_type'=>$blog_type,'relatedBlog'=>$relatedBlog]);
	        }else{
	            return redirect('/blogs');
	        }
    	}else{
    		return redirect('/blogs');
    	}
    }
}
