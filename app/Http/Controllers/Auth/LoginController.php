<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->userType == config('constants.USER_TYPES.WHOLESALER')) {
            return redirect('/wholesaler/dashboard');
        } elseif ($user->userType == config('constants.USER_TYPES.USER')) {
            return redirect('/user/dashboard');
        } elseif ($user->userType == config('constants.USER_TYPES.ADMIN')) {
            return redirect('/admin/dashboard');
        } else {
            return redirect($this->redirectTo); // Default redirect
        }
    }
}
