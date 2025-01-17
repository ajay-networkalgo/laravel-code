<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsImage;
use App\Models\TempAsset;
use App\Models\Asset;
use Carbon\Carbon;

class NewsFrontenedController extends Controller
{
    public function index(){
        $news = News::with('images')->where('status', 1)->orderBy('id', 'DESC')->take(6)->get();
    	$this->viewData['news'] = $news;
        $newspagecontent = TempAsset::where("type", "news")
            ->get()
            ->keyBy("key")
            ->toArray();
        if (empty($newspagecontent)) {
            $newspagecontent = Asset::where("type", "news")
                ->get()
                ->keyBy("key")
                ->toArray();
        }
        $this->viewData['newspagecontent'] = $newspagecontent;
        
    	return view('home.news',$this->viewData );

    }

    public function loadMoreNews(Request $request,$slug){
        $skip = $request->skip;
        if($slug == 'all'){
            $news = News::with('images')->where('status', 1)->orderBy('id', 'DESC')->skip($skip)->take(6)->get();
        }else{
            $type = ($slug=='company-news') ? 1 : 2;
            $news = News::where('type',$type)->where('status', 1)->with('images')->orderBy('id', 'DESC')->skip($skip)->take(6)->get();
        }
        $this->viewData['news'] = $news;
        return view('home.all-news',$this->viewData);
    }

    public function details($slug = ''){
    	if(!empty($slug)){
    		$news = News::with('images')->where('status', 1)->where('slug', $slug)->first();
    		if(!empty($news)){
                $excludedIds = [$news->id];
                $relatedNews = News::whereNotIn('id', $excludedIds)->with('images')->where('status', 1)->orderBy('id', 'DESC')->take(3)->get();
	            return view('news.details',['news'=>$news,'id'=>$news->id,'relatedNews'=>$relatedNews]);
	        }else{
	            return redirect('/news');
	        }
    	}else{
    		return redirect('/');
    	}
    }

    // public function createSlug() {
    //     $news = News::select('title', 'id')->get();
    //     foreach($news as $val) {
    //         $delimiter = '-';
    //         // Convert the string to lowercase
    //         $slug = strtolower($val->title);

    //         // Remove special characters and spaces
    //         $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

    //         // Replace spaces and multiple hyphens with the delimiter
    //         $slug = preg_replace('/[\s-]+/', $delimiter, $slug);

    //         // Trim any leading or trailing delimiters
    //         $slug = trim($slug, $delimiter);

    //         $val->slug = $slug;
    //         $val->save();
    //     }

    //     $blogs = Blog::select('title', 'id')->get();
    //     foreach($blogs as $val) {
    //         $delimiter = '-';
    //         // Convert the string to lowercase
    //         $slug = strtolower($val->title);

    //         // Remove special characters and spaces
    //         $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

    //         // Replace spaces and multiple hyphens with the delimiter
    //         $slug = preg_replace('/[\s-]+/', $delimiter, $slug);

    //         // Trim any leading or trailing delimiters
    //         $slug = trim($slug, $delimiter);

    //         $val->slug = $slug;
    //         $val->save();
    //     }
    //     // return $slug;
    // }
}
