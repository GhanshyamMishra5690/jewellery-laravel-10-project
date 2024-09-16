<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
class WholesalerAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $user = Auth::user();  
        if ($user && $user->userType === config('constants.USER_TYPES.WHOLESALER')) {
                if ($user->status == 0) {
                    return redirect()->route('verification')->with('status', 'Your account is not approved yet. Please wait for admin approval.');
                } 
            return $next($request);
        }

        // If not authenticated as wholesaler, redirect to login
        return redirect('/login')->with('error', 'You must be logged in as a wholesaler to access this page.'); 
    }
}

       