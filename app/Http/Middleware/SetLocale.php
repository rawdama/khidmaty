<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {   
        // Get available languages from the configuration
        $languages = array_keys(config('app.languages'));

        // Check if the 'lang' header is present and valid
        if ($request->hasHeader('lang') && in_array($request->header('lang'), $languages)) {
            // Set the application locale
            App::setLocale($request->header('lang'));
        }

        return $next($request);
    }
}