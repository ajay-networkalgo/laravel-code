<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\ModuleList;
use App\Models\SeoContent;
use Illuminate\Support\Facades\Auth;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layout.sidebar', function ($view) {
            $role_id = Auth::user()->role_id;

            if ($role_id == 1) {
                $modules = ModuleList::all(); // Admin gets all modules
            } else {
                // Non-admin roles get modules based on their permissions
                $modules = ModuleList::whereHas('permissions', function ($query) use ($role_id) {
                    $query->where('role_id', $role_id);
                })->get();
            }
            // Pass modules to the sidebar view
            $view->with('modules', $modules)->with('role_id', $role_id);;
        });

        View::composer('layout.frontend', function ($view) {
            $path = request()->path();
            // echo $path;exit;
            $seoContent = SeoContent::where('slug', $path)->first();
            $metaTitle = '';
            $metaDescription = '';
            $metaKeywords = '';
            if(!empty($seoContent)) {
                $metaTitle = $seoContent->meta_title;
                $metaDescription = $seoContent->meta_description;
                $metaKeywords = $seoContent->meta_keywords;
            }
            // Pass modules to the sidebar view
            $view->with('metaTitle', $metaTitle)->with('metaDescription', $metaDescription)->with('metaKeywords', $metaKeywords);
        });


    }
}
