<?php

namespace App\Http\Middleware;

use Closure;

class JWTMiddleware
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
        $message = '';

        try 
        {
            
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            $message = 'Token expired';
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            $message = 'Invalid token';
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            $message = 'Provide token';
        }
    }
}
