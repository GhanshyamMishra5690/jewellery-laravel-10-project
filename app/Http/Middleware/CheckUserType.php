<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        // $user = Auth::user(); 
        // if ($user && $user->status == '1' && $user->userType == '2') {
        //     return redirect()->route('pending-page')->with('status', 'Your account is pending approval.');
        // }
        // return $next($request);
    }
}
