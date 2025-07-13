<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            // Redirect ke halaman sesuai role
            if (Auth::check() && Auth::user()->role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif (Auth::check() && Auth::user()->role === 'user') {
                return redirect('/homepage');
            }
            return redirect('/login');
        }
        return $next($request);
    }
}
