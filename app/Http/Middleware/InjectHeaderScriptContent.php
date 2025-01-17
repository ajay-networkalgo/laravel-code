<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Models\PageScript;

class InjectHeaderScriptContent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       
       
        $headerScript = PageScript::where('page', 'Header')->first();
        if ($headerScript) {
            View::share('customScripts', $headerScript->page_script);
        } else {
            View::share('customScripts', '');
        }

        return $next($request);
    }
}

