<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\UserRole;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if ($request->user()) {
            // Allow users with ADMIN or MANAGER role
            if ($request->user()->role === UserRole::ADMIN || $request->user()->role === UserRole::MANAGER) {
                return $next($request);
            }
        }

        // Redirect unauthorized users to the user dashboard
        return redirect()->route('dashboard');
    }
}
