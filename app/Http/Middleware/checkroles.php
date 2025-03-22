<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class checkroles
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Ensure the user is logged in
        if (!Auth::check()) {
            return redirect(route('login'))->with('error', 'You must be logged in to access this page');
        }

        // Ensure the user has the required role
        if (Auth::user()->role !== $role) {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
