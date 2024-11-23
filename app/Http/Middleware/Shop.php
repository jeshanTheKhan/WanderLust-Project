<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Shop
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is not an admin and redirect them to the dashboard
        if(Auth::user()->user_role != 'shop_kepper'){
            return redirect()->route('dashboard');
        }
        

        // Allow the request to proceed for other roles
        return $next($request);
    }
}
