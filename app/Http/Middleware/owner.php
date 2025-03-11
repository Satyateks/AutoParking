<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class owner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(Auth::user());
        if (Auth::guard('owner')->user() && Auth::guard('owner')->user()->type == 'owner') {
            return $next($request);
        } else {
            return redirect('admin_login');
        }
        // return $next($request);
    }
}

