<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Exceptions\HttpResponseException;

class Authenticate extends Middleware
{

    protected $params = [];

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if ( $request->is('api/*')){
            throw new HttpResponseException(response()->json(['failure_reason'=>'Fresh Access Token Required'], 401));  
        }
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
