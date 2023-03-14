<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('warga')) {
            return redirect()->route('warga.login');
        }

        return $next($request);
    }
}