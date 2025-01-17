<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempAsset;
use App\Models\Asset;
use App\Models\Award;
use App\Models\Journey;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class ContentManagerController extends Controller
{
    public function index(Request $request)
    {

        try {
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
            return view("home-page.index", compact("homepagecontent"));
        } catch (\Exception $e) {
            return redirect("admin/home-page")->withErrors([
                "error" =>
                    "An error occurred while loading the homepage content.",
            ]);
        }
    }
    public function save(Request $request)
{
    DB::beginTransaction(); // Start the transaction
    try {
        $input = $request->all();
        $file_size = env("FILE_SIZE");

        $validator = Validator::make($request->all(), [
            "type" => "required",
            "home_banner_video_title" => "required",
            "home_banner_video_sub_title" => "required",
            "home_powering_title" => "required",
            "home_powering_sub_title" => "required",
            "home_storm_happen_title" => "required",
            "home_storm_happen_content" => "required",
            "home_Olax_smart_title" => "required",
            "home_Olax_smart_sub_title" => "required",
            "home_Olax_smart_content" => "required",
            "home_leading_the_way_title" => "required",
            "home_leading_the_way_sub_title" => "required",
            "home_leading_slide_one_description" => "required",
            "home_leading_slide_two_description" => "required",
            "home_leading_slide_three_description" => "required",
            "home_banner_video" => "file|mimes:mp4|max:" . $file_size,
            "home_mobile_banner_video" => "file|mimes:mp4|max:" . $file_size,
            "home_owner_video" => "file|mimes:mp4|max:" . $file_size,
            "home_installers_video" => "file|mimes:mp4|max:" . $file_size,
            "home_Olax_smart_video" => "file|mimes:mp4|max:" . $file_size,
            "home_storm_happen_banner" => "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
            "home_leading_slide_one_image" => "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
            "home_leading_slide_two_image" => "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
            "home_leading_slide_three_image" => "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
        ]);

        if ($validator->fails()) {
            return redirect("admin/home-page")
                ->withErrors($validator)
                ->withInput();
        }

        // File uploads
        $filename_home_banner_video = $this->handleFileUpload($request, "home_banner_video", "assets/videos/compressed/");
        $filename_home_mobile_banner_video = $this->handleFileUpload($request, "home_mobile_banner_video", "assets/videos/compressed/");
        $filename_home_owner_video = $this->handleFileUpload($request, "home_owner_video", "assets/videos/compressed/");
        $filename_home_installers_video = $this->handleFileUpload($request, "home_installers_video", "assets/videos/compressed/");
        $filename_home_Olax_smart_video = $this->handleFileUpload($request, "home_Olax_smart_video", "assets/videos/compressed/");
        $filename_home_storm_happen_banner = $this->handleFileUpload($request, "home_storm_happen_banner", "assets/");
        $filename_home_leading_slide_one_image = $this->handleFileUpload($request, "home_leading_slide_one_image", "assets/");
        $filename_home_leading_slide_two_image = $this->handleFileUpload($request, "home_leading_slide_two_image", "assets/");
        $filename_home_leading_slide_three_image = $this->handleFileUpload($request, "home_leading_slide_three_image", "assets/");

        $type = $input["type"];
        $homepagecontent = [
            "home_banner_video_title" => $input["home_banner_video_title"],
            "home_banner_video_sub_title" => $input["home_banner_video_sub_title"],
            "home_powering_title" => $input["home_powering_title"],
            "home_powering_sub_title" => $input["home_powering_sub_title"],
            "home_storm_happen_title" => $input["home_storm_happen_title"],
            "home_storm_happen_content" => $input["home_storm_happen_content"],
            "home_Olax_smart_title" => $input["home_Olax_smart_title"],
            "home_Olax_smart_sub_title" => $input["home_Olax_smart_sub_title"],
            "home_Olax_smart_content" => $input["home_Olax_smart_content"],
            "home_leading_the_way_title" => $input["home_leading_the_way_title"],
            "home_leading_the_way_sub_title" => $input["home_leading_the_way_sub_title"],
            "home_banner_video" => $filename_home_banner_video,
            "home_mobile_banner_video" => $filename_home_mobile_banner_video,
            "home_owner_video" => $filename_home_owner_video,
            "home_installers_video" => $filename_home_installers_video,
            "home_Olax_smart_video" => $filename_home_Olax_smart_video,
            "home_storm_happen_banner" => $filename_home_storm_happen_banner,
            "home_leading_slide_one_image" => $filename_home_leading_slide_one_image,
            "home_leading_slide_two_image" => $filename_home_leading_slide_two_image,
            "home_leading_slide_three_image" => $filename_home_leading_slide_three_image,
        ];

        if (isset($input["save_and_preview"])) {
            foreach ($homepagecontent as $key => $value) {
                TempAsset::updateOrCreate(["key" => $key], ["type" => $type, "value" => $value]);
            }
        }

        if (isset($input["save_and_publish"])) {
            TempAsset::where("type", "home")->delete();
            foreach ($homepagecontent as $key => $value) {
                Asset::updateOrCreate(["key" => $key], ["type" => $type, "value" => $value]);
            }
        }

        DB::commit(); // Commit the transaction

        Session::flash("message", "Homepage content has been added successfully.");
        Session::flash("alert-class", "alert-success");
        Session::flash("icon-class", "icon fa fa-check");
        return redirect("/admin/home-page");
    } catch (\Exception $e) {
        DB::rollBack(); // Rollback the transaction
        Session::flash("message", "Something went wrong: " . $e->getMessage());
        Session::flash("alert-class", "alert-danger");
        return redirect("/admin/home-page")->withErrors(["error" => $e->getMessage()]);
    }
} 


    public function installerindex(Request $request)
    {
        try {
            $installerpagecontent = TempAsset::where("type", "installer")
                ->get()
                ->keyBy("key")
                ->toArray();
            if (empty($installerpagecontent)) {
                $installerpagecontent = Asset::where("type", "installer")
                    ->get()
                    ->keyBy("key")
                    ->toArray();
            }
            return view(
                "installer-page.index",
                compact("installerpagecontent")
            );
        } catch (\Exception $e) {
            return redirect("admin/installer-page")->withErrors([
                "error" =>
                    "An error occurred while loading the installer Page content.",
            ]);
        }
    }
    public function installersave(Request $request)
    {
        

        DB::beginTransaction();
        $input = $request->all();
        $file_size = env("FILE_SIZE");
        try {

            $validator = Validator::make($request->all(), [
                "type" => "required",
                "installer_banner_video_title" => "required",
                "installer_banner_video_sub_title" => "required",
                "installer_learn_more_title" => "required",
                "installer_learn_more_sub_title" => "required",
                "installer_learn_more_content" => "required",
                "installer_benefits_title" => "required",
                "installer_benefits_sub_title" => "required",
                "installer_benefits_description" => "required",
                "installer_batteries_features_description" => "required",
                "installer_banner_video" => "file|mimes:mp4|max:" . $file_size,
                "installer_mobile_banner_video" =>
                    "file|mimes:mp4|max:" . $file_size,
                "installer_learn_more_video" =>
                    "file|mimes:mp4|max:" . $file_size,
                "installer_benefits_image" =>
                    "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
                "installer_batteries_features_banner" =>
                    "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
                "installer_become_a_certified_image" =>
                    "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
            ]);
            if ($validator->fails()) {
                return redirect("admin/installer-page")
                    ->withErrors($validator)
                    ->withInput();
            }
            $filename_installer_banner_video = $this->handleFileUpload(
                $request,
                "installer_banner_video",
                "assets/videos/compressed/"
            );
            $filename_installer_mobile_banner_video = $this->handleFileUpload(
                $request,
                "installer_mobile_banner_video",
                "assets/videos/compressed/"
            );
            $filename_installer_learn_more_video = $this->handleFileUpload(
                $request,
                "installer_learn_more_video",
                "assets/videos/compressed/"
            );
            $filename_installer_benefits_image = $this->handleFileUpload(
                $request,
                "installer_benefits_image",
                "assets/installer/"
            );
            $filename_installer_batteries_features_banner = $this->handleFileUpload(
                $request,
                "installer_batteries_features_banner",
                "assets/installer/"
            );
            $filename_installer_become_a_certified_image = $this->handleFileUpload(
                $request,
                "installer_become_a_certified_image",
                "assets/installer/"
            );

            $type = $input["type"];
            $installerpagecontent = [
                "installer_banner_video_title" =>
                    $input["installer_banner_video_title"],
                "installer_banner_video_sub_title" =>
                    $input["installer_banner_video_sub_title"],
                "installer_learn_more_title" =>
                    $input["installer_learn_more_title"],
                "installer_learn_more_sub_title" =>
                    $input["installer_learn_more_sub_title"],
                "installer_learn_more_content" =>
                    $input["installer_learn_more_content"],
                "installer_benefits_title" =>
                    $input["installer_benefits_title"],
                "installer_benefits_sub_title" =>
                    $input["installer_benefits_sub_title"],
                "installer_benefits_description" =>
                    $input["installer_benefits_description"],
                "installer_batteries_features_description" =>
                    $input["installer_batteries_features_description"],
                "installer_become_a_certified_title" =>
                    $input["installer_become_a_certified_title"],

                "installer_banner_video" => $filename_installer_banner_video,
                "installer_mobile_banner_video" => $filename_installer_mobile_banner_video,
                "installer_learn_more_video" => $filename_installer_learn_more_video,
                "installer_benefits_image" => $filename_installer_benefits_image,
                "installer_batteries_features_banner" => $filename_installer_batteries_features_banner,
                "installer_become_a_certified_image" => $filename_installer_become_a_certified_image,
            ];
            if (isset($input["save_and_preview"])) {
                foreach ($installerpagecontent as $key => $value) {
                    TempAsset::updateOrCreate(
                        ["key" => $key], // Find by the 'key' column
                        [
                            "type" => $type, // Update 'type' and 'value'
                            "value" => $value, // Update 'value'
                        ]
                    );
                }
            }
            if (isset($input["save_and_publish"])) {
                TempAsset::where("type", "installer")->delete();
                foreach ($installerpagecontent as $key => $value) {
                    Asset::updateOrCreate(
                        ["key" => $key], // Find by the 'key' column
                        [
                            "type" => $type, // Update 'type' and 'value'
                            "value" => $value, // Update 'value'
                        ]
                    );
                }
            }
            DB::commit();
            Session::flash("message", isset($input["save_and_preview"]) ? "Installer content saved for preview." : "Installer content published successfully.");
            Session::flash("alert-class", "alert-success");
            return redirect("/admin/installer-page");
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash("message", "Something went wrong");
            Session::flash("alert-class", "alert-danger");
            return redirect("/admin/installer-page");
        }
    }
    public function homeownerindex(Request $request)
    {
        
        try {
            $homeownerpagecontent = TempAsset::where("type", "homeowner")
                ->get()
                ->keyBy("key")
                ->toArray();
            if (empty($homeownerpagecontent)) {
                $homeownerpagecontent = Asset::where("type", "homeowner")
                    ->get()
                    ->keyBy("key")
                    ->toArray();
            }
            return view(
                "homeowner-page.index",
                compact("homeownerpagecontent")
            );
        } catch (\Exception $e) {
            return redirect("admin/installer-page")->withErrors([
                "error" =>
                    "An error occurred while loading the homeowner page content.",
            ]);
        }
    }
    
    public function homeownersave(Request $request)
    {
        
        try {
            DB::beginTransaction();
            $input = $request->all();
            $file_size = env("FILE_SIZE");

            $validator = Validator::make($request->all(), [
                "type" => "required",
                "homeowner_banner_video_title" => "required",
                "homeowner_banner_video_sub_title" => "required",
                "homeowner_xpower_title" => "required",
                "homeowner_Olax_app_title" => "required",
                "homeowner_Olax_app_sub_title" => "required",
                "homeowner_configure_xpower_title" => "required",
                "homeowner_configure_xpower_sub_title" => "required",
                "homeowner_configure_xpower_description" => "required",
                "homeowner_looking_to_offset_title" => "required",
                "homeowner_looking_to_offset_content" => "required",
                "homeowner_states_with_height_title" => "required",
                "homeowner_states_of_concern_title" => "required",
                "homeowner_states_of_concern_content" => "required",
                "homeowner_ready_to_see_title" => "required",
                "homeowner_ready_to_see_content" => "required",
                "homeowner_banner_video" => "file|mimes:mp4|max:" . $file_size,
                "homeowner_mobile_banner_video" =>
                    "file|mimes:mp4|max:" . $file_size,
                "homeowner_discover_the_xpower_video" =>
                    "file|mimes:mp4|max:" . $file_size,
                "homeowner_Olax_app_video" =>
                    "file|mimes:mp4|max:" . $file_size,
                "homeowner_configure_xpower_image" =>
                    "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
                "homeowner_looking_to_offset_image" =>
                    "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
                "homeowner_states_with_height_image" =>
                    "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
                "homeowner_states_of_concern_image" =>
                    "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
            ]);
            if ($validator->fails()) {
                return redirect("admin/homeowner-page")
                    ->withErrors($validator)
                    ->withInput();
            }
            $filename_homeowner_banner_video = $this->handleFileUpload(
                $request,
                "homeowner_banner_video",
                "assets/videos/compressed/"
            );
            $filename_homeowner_mobile_banner_video = $this->handleFileUpload(
                $request,
                "homeowner_mobile_banner_video",
                "assets/videos/compressed/"
            );
            $filename_homeowner_discover_the_xpower_video = $this->handleFileUpload(
                $request,
                "homeowner_discover_the_xpower_video",
                "assets/videos/compressed/"
            );
            $filename_homeowner_Olax_app_video = $this->handleFileUpload(
                $request,
                "homeowner_Olax_app_video",
                "assets/videos/compressed/"
            );
            $filename_homeowner_configure_xpower_image = $this->handleFileUpload(
                $request,
                "homeowner_configure_xpower_image",
                "assets/homeowner/"
            );
            $filename_homeowner_looking_to_offset_image = $this->handleFileUpload(
                $request,
                "homeowner_looking_to_offset_image",
                "assets/homeowner/"
            );
            $filename_homeowner_states_with_height_image = $this->handleFileUpload(
                $request,
                "homeowner_states_with_height_image",
                "assets/homeowner/"
            );
            $filename_homeowner_states_of_concern_image = $this->handleFileUpload(
                $request,
                "homeowner_states_of_concern_image",
                "assets/homeowner/"
            );

            $type = $input["type"];
            $homeownerpagecontent = [
                "homeowner_banner_video_title" =>
                    $input["homeowner_banner_video_title"],
                "homeowner_banner_video_sub_title" =>
                    $input["homeowner_banner_video_sub_title"],
                "homeowner_xpower_title" =>
                    $input["homeowner_xpower_title"],
                "homeowner_Olax_app_title" =>
                    $input["homeowner_Olax_app_title"],
                "homeowner_Olax_app_sub_title" =>
                    $input["homeowner_Olax_app_sub_title"],
                "homeowner_configure_xpower_title" =>
                    $input["homeowner_configure_xpower_title"],
                "homeowner_configure_xpower_sub_title" =>
                    $input["homeowner_configure_xpower_sub_title"],
                "homeowner_configure_xpower_description" =>
                    $input["homeowner_configure_xpower_description"],
                "homeowner_looking_to_offset_title" =>
                    $input["homeowner_looking_to_offset_title"],
                "homeowner_looking_to_offset_content" =>
                    $input["homeowner_looking_to_offset_content"],
                "homeowner_states_with_height_title" =>
                    $input["homeowner_states_with_height_title"],
                "homeowner_states_of_concern_title" =>
                    $input["homeowner_states_of_concern_title"],
                "homeowner_states_of_concern_content" =>
                    $input["homeowner_states_of_concern_content"],
                "homeowner_ready_to_see_title" =>
                    $input["homeowner_ready_to_see_title"],
                "homeowner_ready_to_see_content" =>
                    $input["homeowner_ready_to_see_content"],

                "homeowner_banner_video" => $filename_homeowner_banner_video,
                "homeowner_mobile_banner_video" => $filename_homeowner_mobile_banner_video,
                "homeowner_discover_the_xpower_video" => $filename_homeowner_discover_the_xpower_video,
                "homeowner_Olax_app_video" => $filename_homeowner_Olax_app_video,
                "homeowner_configure_xpower_image" => $filename_homeowner_configure_xpower_image,
                "homeowner_looking_to_offset_image" => $filename_homeowner_looking_to_offset_image,
                "homeowner_states_with_height_image" => $filename_homeowner_states_with_height_image,
                "homeowner_states_of_concern_image" => $filename_homeowner_states_of_concern_image,
            ];
            if (isset($input["save_and_preview"])) {
                foreach ($homeownerpagecontent as $key => $value) {
                    TempAsset::updateOrCreate(
                        ["key" => $key], // Find by the 'key' column
                        [
                            "type" => $type, // Update 'type' and 'value'
                            "value" => $value, // Update 'value'
                        ]
                    );
                }
            }
            if (isset($input["save_and_publish"])) {
                TempAsset::where("type", "homeowner")->delete();
                foreach ($homeownerpagecontent as $key => $value) {
                    Asset::updateOrCreate(
                        ["key" => $key], // Find by the 'key' column
                        [
                            "type" => $type, // Update 'type' and 'value'
                            "value" => $value, // Update 'value'
                        ]
                    );
                }
            }
            DB::commit();
            Session::flash(
                "message",
                "InstallerPageContent has been added successfully."
            );
            Session::flash("alert-class", "alert-success");
            Session::flash("icon-class", "icon fa fa-check");
            return redirect("/admin/homeowner-page");
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash("message", "Something went wrong");
            Session::flash("alert-class", "alert-success");
            Session::flash("icon-class", "icon fa fa-ban");
            return redirect("/admin/homeowner-page");
        }
    }
    public function productindex(Request $request)
    {
        
              
              try {
                  $productpagecontent = TempAsset::where("type", "product")
                      ->get()
                      ->keyBy("key")
                      ->toArray();
                  if (empty($productpagecontent)) {
                      $productpagecontent = Asset::where("type", "product")
                          ->get()
                          ->keyBy("key")
                          ->toArray();
                  }
                  return view(
                      "product-page.index",
                      compact("productpagecontent")
                  );
              } catch (\Exception $e) {
                  return redirect("admin/product-page")->withErrors([
                      "error" =>
                          "An error occurred while loading the product page content.",
                  ]);
              }
    }

 public function productsave(Request $request)
 {
    
     
     try {
         DB::beginTransaction();
         $input = $request->all();
         $file_size = env("FILE_SIZE");

         $validator = Validator::make($request->all(), [
             "type" => "required",
             "product_banner_video_title" => "required",
             "product_banner_video_sub_title" => "required",
             "product_section_title" => "required",
             "product_section_sub_title" => "required",
             "product_one_title" => "required",
             "product_one_content" => "required",
             "product_one_slug" => "required",
             "product_two_title" => "required",
              "product_two_content" => "required",
              "product_two_slug" => "required",
              "product_three_title" => "required",
              "product_three_content" => "required",
              "product_three_slug" => "required",
              "product_four_title" => "required",
              "product_four_content" => "required",
              "product_four_slug" => "required",
             "product_feature_title" => "required",
             "product_feature_sub_title" => "required",
             "feature_one_title" => "required",
             "feature_one_content" => "required",
             "feature_two_title" => "required",
              "feature_two_content" => "required",
              "feature_three_title" => "required",
              "feature_three_content" => "required",
              "feature_four_title" => "required",
              "feature_four_content" => "required",
              "feature_five_title" => "required",
              "feature_five_content" => "required",
             "product_banner_video" => "file|mimes:mp4|max:" . $file_size,
             "product_mobile_banner_video" =>
                 "file|mimes:mp4|max:" . $file_size,
             "product_one_image" =>
                 "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
             "product_two_image" =>
                 "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
             "product_three_image" =>
                 "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
             "product_four_image" =>
                 "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
                 "product_feature_image" =>
                 "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
                 "feature_one_image" =>
                 "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
                 "feature_two_image" =>
                 "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
                 "feature_three_image" =>
                 "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
                 "feature_four_image" =>
                 "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
                 "feature_five_image" =>
                 "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
         ]);
         if ($validator->fails()) {
             return redirect("admin/product-page")
                 ->withErrors($validator)
                 ->withInput();
         }
         $filename_product_banner_video = $this->handleFileUpload(
             $request,
             "product_banner_video",
             "assets/videos/compressed/"
         );
         $filename_product_mobile_banner_video = $this->handleFileUpload(
             $request,
             "product_mobile_banner_video",
             "assets/videos/compressed/"
         );
         $filename_product_one_image = $this->handleFileUpload(
             $request,
             "product_one_image",
             "assets/product/"
         );
         $filename_product_two_image = $this->handleFileUpload(
             $request,
             "product_two_image",
             "assets/product/"
         );
         $filename_product_three_image = $this->handleFileUpload(
             $request,
             "product_three_image",
             "assets/product/"
         );
         $filename_product_four_image = $this->handleFileUpload(
             $request,
             "product_four_image",
             "assets/product/"
         );
         $filename_product_feature_image = $this->handleFileUpload(
             $request,
             "product_feature_image",
             "assets/product/"
         );
         $filename_feature_one_image = $this->handleFileUpload(
             $request,
             "feature_one_image",
             "assets/product/"
         );
         $filename_feature_two_image = $this->handleFileUpload(
          $request,
          "feature_two_image",
          "assets/product/"
        );
        $filename_feature_three_image = $this->handleFileUpload(
          $request,
          "feature_three_image",
          "assets/product/"
        );
        $filename_feature_four_image = $this->handleFileUpload(
          $request,
          "feature_four_image",
          "assets/product/"
        );
        $filename_feature_five_image = $this->handleFileUpload(
          $request,
          "feature_five_image",
          "assets/product/"
      );


         $type = $input["type"];
         $productpagecontent = [
             "product_banner_video_title" =>
                 $input["product_banner_video_title"],
             "product_banner_video_sub_title" =>
                 $input["product_banner_video_sub_title"],
             "product_section_title" =>
                 $input["product_section_title"],
             "product_section_sub_title" =>
                 $input["product_section_sub_title"],
             "product_one_title" =>
                 $input["product_one_title"],
             "product_one_content" =>
                 $input["product_one_content"],
             "product_one_slug" =>
                 $input["product_one_slug"],
             "product_two_title" =>
                 $input["product_two_title"],
             "product_two_content" =>
                 $input["product_two_content"],
             "product_two_slug" =>
                 $input["product_two_slug"],
             "product_three_title" =>
                 $input["product_three_title"],
             "product_three_content" =>
                 $input["product_three_content"],
             "product_three_slug" =>
                 $input["product_three_slug"],
             "product_four_title" =>
                 $input["product_four_title"],
             "product_four_content" =>
                 $input["product_four_content"],
              "product_four_slug" =>
                 $input["product_four_slug"],
              "product_feature_title" =>
                 $input["product_feature_title"],
              "product_feature_sub_title" =>
                 $input["product_feature_sub_title"],
              "feature_one_title" =>
                 $input["feature_one_title"],
              "feature_one_content" =>
                 $input["feature_one_content"],

              "feature_two_title" =>
                 $input["feature_two_title"],
              "feature_two_content" =>
                 $input["feature_two_content"],
              "feature_three_title" =>
                 $input["feature_three_title"],
              "feature_three_content" =>
                 $input["feature_three_content"],
              "feature_four_title" =>
                 $input["feature_four_title"],
              "feature_four_content" =>
                 $input["feature_four_content"],
              "feature_five_title" =>
                 $input["feature_five_title"],
              "feature_five_content" =>
                 $input["feature_five_content"],

             "product_banner_video" => $filename_product_banner_video,
             "product_mobile_banner_video" => $filename_product_mobile_banner_video,
             "product_one_image" => $filename_product_one_image,
             "product_two_image" => $filename_product_two_image,
             "product_three_image" => $filename_product_three_image,
             "product_four_image" => $filename_product_four_image,
             "product_feature_image" => $filename_product_feature_image,
             "feature_one_image" => $filename_feature_one_image,
             "feature_two_image" => $filename_feature_two_image,
             "feature_three_image" => $filename_feature_three_image,
             "feature_four_image" => $filename_feature_four_image,
             "feature_five_image" => $filename_feature_five_image,
         ];
         if (isset($input["save_and_preview"])) {
             foreach ($productpagecontent as $key => $value) {
                 TempAsset::updateOrCreate(
                     ["key" => $key], // Find by the 'key' column
                     [
                         "type" => $type, // Update 'type' and 'value'
                         "value" => $value, // Update 'value'
                     ]
                 );
             }
         }
         if (isset($input["save_and_publish"])) {
             TempAsset::where("type", "product")->delete();
             foreach ($productpagecontent as $key => $value) {
                 Asset::updateOrCreate(
                     ["key" => $key], // Find by the 'key' column
                     [
                         "type" => $type, // Update 'type' and 'value'
                         "value" => $value, // Update 'value'
                     ]
                 );
             }
         }
         DB::commit();
         Session::flash(
             "message",
             "ProductPageContent has been added successfully."
         );
         Session::flash("alert-class", "alert-success");
         Session::flash("icon-class", "icon fa fa-check");
         return redirect("/admin/product-page");
     } catch (\Exception $e) {
         DB::rollBack();
         Session::flash("message", "Something went wrong");
         Session::flash("alert-class", "alert-success");
         Session::flash("icon-class", "icon fa fa-ban");
         return redirect("/admin/product-page");
     }
 }
 public function newsindex(Request $request){
    try {
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
        return view(
            "news-page.index",
            compact("newspagecontent")
        );
    } catch (\Exception $e) {
        return redirect("admin/news-page")->withErrors([
            "error" =>
                "An error occurred while loading the news page content.",
        ]);
    }
 }
 public function newssave(Request $request){
    
    try {
        DB::beginTransaction();
        $input = $request->all();
        $file_size = env("FILE_SIZE");

        $validator = Validator::make($request->all(), [
            "type" => "required",
            "news_banner_video_title" => "required",
            "news_banner_video_sub_title" => "required",
            "news_banner_video" => "file|mimes:mp4|max:" . $file_size,
            "news_mobile_banner_video" => "file|mimes:mp4|max:" . $file_size,
        ]);
        if ($validator->fails()) {
            return redirect("admin/news-page")
                ->withErrors($validator)
                ->withInput();
        }
        $filename_news_banner_video = $this->handleFileUpload(
            $request,
            "news_banner_video",
            "assets/videos/compressed/"
        );
        $filename_news_mobile_banner_video = $this->handleFileUpload(
            $request,
            "news_mobile_banner_video",
            "assets/videos/compressed/"
        );


        $type = $input["type"];
        $newspagecontent = [
            "news_banner_video_title" => $input["news_banner_video_title"],
            "news_banner_video_sub_title" => $input["news_banner_video_sub_title"],
            "news_banner_video" => $filename_news_banner_video,
            "news_mobile_banner_video" => $filename_news_mobile_banner_video,
        ];
        
        if (isset($input["save_and_preview"])) {
            foreach ($newspagecontent as $key => $value) {
                TempAsset::updateOrCreate(
                    ["key" => $key], // Find by the 'key' column
                    [
                        "type" => $type, // Update 'type' and 'value'
                        "value" => $value, // Update 'value'
                    ]
                );
            }
        }
        if (isset($input["save_and_publish"])) {
            TempAsset::where("type", "news")->delete();
            foreach ($newspagecontent as $key => $value) {
                Asset::updateOrCreate(
                    ["key" => $key], // Find by the 'key' column
                    [
                        "type" => $type, // Update 'type' and 'value'
                        "value" => $value, // Update 'value'
                    ]
                );
            }
        }
        DB::commit();
        Session::flash(
            "message",
            "NewsPageContent has been added successfully."
        );
        Session::flash("alert-class", "alert-success");
        Session::flash("icon-class", "icon fa fa-check");
        return redirect("/admin/news-page");
    } catch (\Exception $e) {
        DB::rollBack();
        Session::flash("message", "Something went wrong");
        Session::flash("alert-class", "alert-success");
        Session::flash("icon-class", "icon fa fa-ban");
        return redirect("/admin/news-page");
    }
 }
 public function aboutindex(Request $request){
    
    try {
        $aboutpagecontent = TempAsset::where("type", "about")
            ->get()
            ->keyBy("key")
            ->toArray();
        
        $awards = Award::all();
        $journeys = Journey::all();
        if (empty($aboutpagecontent)) {
            $aboutpagecontent = Asset::where("type", "about")
                ->get()
                ->keyBy("key")
                ->toArray();
        }
        return view(
            "about-page.index",
            compact("aboutpagecontent", "awards", "journeys")
        );
    } catch (\Exception $e) {
        return redirect("admin/about-page")->withErrors([
            "error" =>
                "An error occurred while loading the about page content.",
        ]);
    }
 }
 public function aboutsave(Request $request){
    
   try {
        DB::beginTransaction();
        $input = $request->all();
        $file_size = env("FILE_SIZE");

        $validator = Validator::make($request->all(), [
            "type" => "required",
            "about_banner_video_title" => "required",
            "about_banner_video" => "file|mimes:mp4|max:" . $file_size,
            "about_mobile_banner_video" => "file|mimes:mp4|max:" . $file_size,
            "about_who_we_are_title" => "required",
            "about_who_we_are_sub_title" => "required",
            "about_who_we_are_content" => "required",
            "about_who_we_are_invention_image" =>
                 "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
            "about_who_we_are_invention_image_two" =>
                 "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
            "about_mission_title" => "required",
            "about_mission_content" => "required",
            "about_mission_image" => "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
            "about_global_reach_title" => "required",
            "about_global_reach_sub_title" => "required",
            "about_global_reach_content" => "required",
            "about_global_reach_image" => "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
            "about_global_reach_number_of_employees" => "required",
            "about_global_reach_number_of_r_and_staff" => "required",
            "about_global_reach_number_of_r_and_d_centers" => "required",
            "about_global_reach_number_of_global_markets" => "required",
            "about_recognitions_title" => "required",
            "about_recognitions_sub_title" => "required",
           
            "about_trust_global_title" => "required",
            "about_trust_global_sub_title" => "required",
            "about_trust_global_image" => "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
            "about_energy_storage_title" => "required",
            "about_energy_storage_sub_title" => "required",
            
            
        ]);
        if ($validator->fails()) {
            return redirect("admin/about-page")
                ->withErrors($validator)
                ->withInput();
        }
        $filename_about_banner_video = $this->handleFileUpload(
            $request,
            "about_banner_video",
            "assets/videos/compressed/"
        );
        $filename_about_mobile_banner_video = $this->handleFileUpload(
            $request,
            "about_mobile_banner_video",
            "assets/videos/compressed/"
        );
        $filename_about_who_we_are_invention_image = $this->handleFileUpload(
            $request,
            "about_who_we_are_invention_image",
            "assets/about_us/"
        );
        $filename_about_who_we_are_invention_image_two = $this->handleFileUpload(
            $request,
            "about_who_we_are_invention_image_two",
            "assets/about_us/"
        );
        $filename_about_mission_image = $this->handleFileUpload(
            $request,
            "about_mission_image",
            "assets/about_us/"
        );
        $filename_about_global_reach_image = $this->handleFileUpload(
            $request,
            "about_global_reach_image",
            "assets/about_us/"
        );
        
        $filename_about_trust_global_image = $this->handleFileUpload(
            $request,
            "about_trust_global_image",
            "assets/about_us/"
        );
        


        $type = $input["type"];
        $aboutpagecontent = [
            "about_banner_video_title" => $input["about_banner_video_title"],
            "about_banner_video" => $filename_about_banner_video,
            "about_mobile_banner_video" => $filename_about_mobile_banner_video,
            "about_who_we_are_title" => $input["about_who_we_are_title"],
            "about_who_we_are_sub_title" => $input["about_who_we_are_sub_title"],
            "about_who_we_are_content" => $input["about_who_we_are_content"],
            "about_who_we_are_invention_image" => $filename_about_who_we_are_invention_image,
            "about_who_we_are_invention_image_two" => $filename_about_who_we_are_invention_image_two,
            "about_mission_title" => $input["about_mission_title"],
            "about_mission_content" => $input["about_mission_content"],
            "about_mission_image" => $filename_about_mission_image,
            "about_global_reach_title" => $input["about_global_reach_title"],
            "about_global_reach_sub_title" => $input["about_global_reach_sub_title"],
            "about_global_reach_content" => $input["about_global_reach_content"],
            "about_global_reach_number_of_employees" => $input["about_global_reach_number_of_employees"],
            "about_global_reach_number_of_r_and_staff" => $input["about_global_reach_number_of_r_and_staff"],
            "about_global_reach_number_of_r_and_d_centers" => $input["about_global_reach_number_of_r_and_d_centers"],
            "about_global_reach_number_of_global_markets" => $input["about_global_reach_number_of_global_markets"],
            "about_global_reach_image" => $filename_about_global_reach_image,
            "about_recognitions_title" => $input["about_recognitions_title"],
            "about_recognitions_sub_title" => $input["about_recognitions_sub_title"],
            "about_trust_global_title" => $input["about_trust_global_title"],
            "about_trust_global_sub_title" => $input["about_trust_global_sub_title"],
            "about_trust_global_image" => $filename_about_trust_global_image,
            "about_energy_storage_title" => $input["about_energy_storage_title"],
            "about_energy_storage_sub_title" => $input["about_energy_storage_sub_title"],
            
        ];

        if (isset($input["save_and_preview"])) {
            foreach ($aboutpagecontent as $key => $value) {
                TempAsset::updateOrCreate(
                    ["key" => $key], // Find by the 'key' column
                    [
                        "type" => $type, // Update 'type' and 'value'
                        "value" => $value, // Update 'value'
                    ]
                );
            }
        }
        if (isset($input["save_and_publish"])) {
            TempAsset::where("type", "about")->delete();
            foreach ($newspagecontent as $key => $value) {
                Asset::updateOrCreate(
                    ["key" => $key], // Find by the 'key' column
                    [
                        "type" => $type, // Update 'type' and 'value'
                        "value" => $value, // Update 'value'
                    ]
                );
            }
        }
        DB::commit();
        Session::flash(
            "message",
            "AboutPageContent has been added successfully."
        );
        Session::flash("alert-class", "alert-success");
        Session::flash("icon-class", "icon fa fa-check");
        return redirect("/admin/about-page");
    } catch (\Exception $e) {
        DB::rollBack();
        Session::flash("message", "Something went wrong");
        Session::flash("alert-class", "alert-success");
        Session::flash("icon-class", "icon fa fa-ban");
        return redirect("/admin/about-page");
    }
 }
 public function blogsindex(Request $request){
    try {
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
        return view(
            "blog-page.index",
            compact("blogspagecontent")
        );
    } catch (\Exception $e) {
        return redirect("admin/blogs-page")->withErrors([
            "error" =>
                "An error occurred while loading the blog page content.",
        ]);
    }
 }
 public function blogssave(Request $request){
    
    try {
        DB::beginTransaction();
        $input = $request->all();
        $file_size = env("FILE_SIZE");

        $validator = Validator::make($request->all(), [
            "type" => "required",
            "blogs_banner_image" => "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
            "blogs_section_title" => "required",
            "blogs_section_content" => "required",
        ]);
        if ($validator->fails()) {
            return redirect("admin/blogs-page")
                ->withErrors($validator)
                ->withInput();
        }
        $filename_blogs_banner_image = $this->handleFileUpload(
            $request,
            "blogs_banner_image",
            "assets/blog/"
        );


        $type = $input["type"];
        $blogspagecontent = [
            "blogs_banner_image" => $filename_blogs_banner_image,
            "blogs_section_title" => $input["blogs_section_title"],
            "blogs_section_content" => $input["blogs_section_content"],
            
        ];
        
        if (isset($input["save_and_preview"])) {
            foreach ($blogspagecontent as $key => $value) {
                TempAsset::updateOrCreate(
                    ["key" => $key], // Find by the 'key' column
                    [
                        "type" => $type, // Update 'type' and 'value'
                        "value" => $value, // Update 'value'
                    ]
                );
            }
        }
        if (isset($input["save_and_publish"])) {
            TempAsset::where("type", "blogs")->delete();
            foreach ($blogspagecontent as $key => $value) {
                Asset::updateOrCreate(
                    ["key" => $key], // Find by the 'key' column
                    [
                        "type" => $type, // Update 'type' and 'value'
                        "value" => $value, // Update 'value'
                    ]
                );
            }
        }
        DB::commit();
        Session::flash(
            "message",
            "blogsPageContent has been added successfully."
        );
        Session::flash("alert-class", "alert-success");
        Session::flash("icon-class", "icon fa fa-check");
        return redirect("/admin/blogs-page");
    } catch (\Exception $e) {
        DB::rollBack();
        Session::flash("message", "Something went wrong");
        Session::flash("alert-class", "alert-success");
        Session::flash("icon-class", "icon fa fa-ban");
        return redirect("/admin/blogs-page");
    }
 }
 
 public function successStoriesIndex(Request $request){
    try {
        $successstoriespagecontent = TempAsset::where("type", "success_stories")
            ->get()
            ->keyBy("key")
            ->toArray();
        if (empty($successstoriespagecontent)) {
            $successstoriespagecontent = Asset::where("type", "success_stories")
                ->get()
                ->keyBy("key")
                ->toArray();
        }
        return view(
            "success-stories-page.index",
            compact("successstoriespagecontent")
        );
    } catch (\Exception $e) {
        return redirect("admin/success_stories_page")->withErrors([
            "error" =>
                "An error occurred while loading the success stories page content.",
        ]);
    }
 }
 public function successStoriesSave(Request $request){
    
    try {
        DB::beginTransaction();
        $input = $request->all();
        $file_size = env("FILE_SIZE");

        $validator = Validator::make($request->all(), [
            "type" => "required",
            "success_stories_banner_video_title" => "required",
            "success_stories_banner_video_sub_title" => "required",
            "success_stories_banner_video" => "file|mimes:mp4|max:" . $file_size,
            "success_stories_mobile_banner_video" => "file|mimes:mp4|max:" . $file_size,
            "success_stories_testimonial_title" => "required",
            "success_stories_testimonial_sub_title" => "required",
            "success_stories_testimonial_one_client_name" => "required",
            "success_stories_testimonial_one_content" => "required",
            "success_stories_testimonial_one_client_profile" => "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,
            "success_stories_testimonial_two_client_name" => "required",
            "success_stories_testimonial_two_content" => "required",
            "success_stories_testimonial_two_client_profile" => "file|mimes:gif,jpeg,jpg,png,webp|max:" . $file_size,

        ]);
        if ($validator->fails()) {
            return redirect("admin/success_stories_page")
                ->withErrors($validator)
                ->withInput();
        }
        $filename_success_stories_banner_video = $this->handleFileUpload(
            $request,
            "success_stories_banner_video",
            "assets/videos/compressed/"
        );
        $filename_success_stories_mobile_banner_video = $this->handleFileUpload(
            $request,
            "success_stories_mobile_banner_video",
            "assets/videos/compressed/"
        );
        $filename_success_stories_testimonial_one_client_profile = $this->handleFileUpload(
            $request,
            "success_stories_testimonial_one_client_profile",
            "assets/"
        );
        $filename_success_stories_testimonial_two_client_profile = $this->handleFileUpload(
            $request,
            "success_stories_testimonial_two_client_profile",
            "assets/"
        );


        $type = $input["type"];
        $success_storiespagecontent = [
            "success_stories_banner_video_title" => $input["success_stories_banner_video_title"],
            "success_stories_banner_video_sub_title" => $input["success_stories_banner_video_sub_title"],
            "success_stories_banner_video" => $filename_success_stories_banner_video,
            "success_stories_mobile_banner_video" => $filename_success_stories_mobile_banner_video,
            "success_stories_testimonial_title" => $input["success_stories_testimonial_title"],
            "success_stories_testimonial_sub_title" => $input["success_stories_testimonial_sub_title"],
            "success_stories_testimonial_one_client_name" => $input["success_stories_testimonial_one_client_name"],
            "success_stories_testimonial_one_content" => $input["success_stories_testimonial_one_content"],
            "success_stories_testimonial_one_client_profile" => $filename_success_stories_testimonial_one_client_profile,
            "success_stories_testimonial_two_client_name" => $input["success_stories_testimonial_two_client_name"],
            "success_stories_testimonial_two_content" => $input["success_stories_testimonial_two_content"],
            "success_stories_testimonial_two_client_profile" => $filename_success_stories_testimonial_two_client_profile,
        ];
        
        if (isset($input["save_and_preview"])) {
            foreach ($success_storiespagecontent as $key => $value) {
                TempAsset::updateOrCreate(
                    ["key" => $key], // Find by the 'key' column
                    [
                        "type" => $type, // Update 'type' and 'value'
                        "value" => $value, // Update 'value'
                    ]
                );
            }
        }
        if (isset($input["save_and_publish"])) {
            TempAsset::where("type", "success_stories")->delete();
            foreach ($success_storiespagecontent as $key => $value) {
                Asset::updateOrCreate(
                    ["key" => $key], // Find by the 'key' column
                    [
                        "type" => $type, // Update 'type' and 'value'
                        "value" => $value, // Update 'value'
                    ]
                );
            }
        }
        DB::commit();
        Session::flash(
            "message",
            "successstoriespagecontent has been added successfully."
        );
        Session::flash("alert-class", "alert-success");
        Session::flash("icon-class", "icon fa fa-check");
        return redirect("/admin/success-stories-page");
    } catch (\Exception $e) {
        DB::rollBack();
        Session::flash("message", "Something went wrong");
        Session::flash("alert-class", "alert-success");
        Session::flash("icon-class", "icon fa fa-ban");
        return redirect("/admin/success-stories-page");
    }
 }


    private function handleFileUpload($request, $inputName, $path)
    {
        try {
            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);
                $filename = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path($path), $filename);
                return $filename;
            } else {
                return $request->input($inputName . "_old");
            }
        } catch (\Exception $e) {
            throw new \Exception(
                "File upload failed for " . $inputName . ": " . $e->getMessage()
            );
        }
    }
}
