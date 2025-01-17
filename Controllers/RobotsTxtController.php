<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\RobotsTxt;

class RobotsTxtController extends Controller
{
    public function index(Request $request)
    {

        try {
            $robotsTxt = RobotsTxt::first();
            return view('robots-txt.index', compact('robotsTxt'));
        } catch (\Exception $e) {
            return redirect("admin/robots-txt")->withErrors([
                "error" =>
                    "An error occurred while loading the robots-txt content.",
            ]);
        }
    }
    public function update(Request $request)
    {
        
        try {
            DB::beginTransaction();
            $input = $request->all();
    
            $validator = Validator::make($request->all(), [
                "content" => "required",
    
            ]);
            if ($validator->fails()) {
                return redirect("admin/robots-txt")
                    ->withErrors($validator)
                    ->withInput();
            }
            $page = "robots.txt";
            $content = $request->input('content');
            RobotsTxt::updateOrCreate(
                ["page" => $page],
                ['content' => $content]
            );
            $this->writeRobotsTxtToFile($content);
            DB::commit();
            Session::flash(
                "message",
                "robots.txt updated successfully!"
            );
            Session::flash("alert-class", "alert-success");
            Session::flash("icon-class", "icon fa fa-check");
            return redirect("/admin/robots-txt");
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash("message", "Something went wrong");
            Session::flash("alert-class", "alert-success");
            Session::flash("icon-class", "icon fa fa-ban");
            return redirect("/admin/robots-txt");
        }
    }
    private function writeRobotsTxtToFile($content)
    {
        $path = public_path('robots.txt');
        file_put_contents($path, $content);
        if (file_put_contents($path, $content) === false) {
            Session::flash("message", "Something went wrong");
        }
    }
}
