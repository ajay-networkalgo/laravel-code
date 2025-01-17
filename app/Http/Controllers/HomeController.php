<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempAsset;
use App\Models\Asset;

class HomeController extends Controller
{
    public function index(){
        $homepagecontent = TempAsset::where("type", "home")
        ->get()
        ->keyBy("key")
        ->toArray();
    if (empty($homepagecontent)) {
        $homepagecontent = Asset::where("type", "home")
            ->get()
            ->keyBy("key")
            ->toArray();
    }
    return view("home.index", ['homepagecontent' => $homepagecontent]);
    }
}
