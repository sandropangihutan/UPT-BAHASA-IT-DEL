<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role->id == 1){
            return $next($request);
        } else {
            return redirect('dashboard')->with('error','Anda tidak memiliki akses');
        }
    }
}
