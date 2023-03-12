<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AdminMiddleware
{
    use App\Models\User;
    
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->role == User::ROLE_ADMIN) {
            return $next($request);
        }
    
        return redirect()->route('home')->with('status', 'Anda tidak memiliki akses ke halaman ini.');
    }
    
}
