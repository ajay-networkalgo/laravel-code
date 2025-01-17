<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $currentRouteName = Route::currentRouteName();
    }

    public function createSlug($title)
    {
        $delimiter = '-';
        // Convert the string to lowercase
        $slug = strtolower($title);

        // Remove special characters and spaces
        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);

        // Replace spaces and multiple hyphens with the delimiter
        $slug = preg_replace('/[\s-]+/', $delimiter, $slug);

        // Trim any leading or trailing delimiters
        $slug = trim($slug, $delimiter);

        return $slug;
    }
}
