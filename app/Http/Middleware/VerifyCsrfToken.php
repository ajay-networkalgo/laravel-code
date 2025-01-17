<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Closure;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];

    public function handle($request, Closure $next){
	    $response = $next($request);

	    return $response->header('Cache-Control', 'no-cache, no-store, must-revalidate')
	                    ->header('Pragma', 'no-cache')
	                    ->header('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');
	}
}
