<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminPanelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = Auth::user()->role;
        // dump('admin middle');
        // dump(auth()->id());
        // dd(auth()->user()->role);
        //* $role=auth()->user()->role;
        if($role==='user'){
            return new Response('role is user');
        //    dd('redirect');
            
           
        }
        if($role==='admin'){

        return $next($request);
    }
}
}
