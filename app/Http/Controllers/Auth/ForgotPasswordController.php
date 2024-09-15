<?php

namespace App\Http\Controllers\Auth;


// use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // use SendsPasswordResetEmails;
    public function showForgotForm($identifier)
    {
          $value = config('constants.identifier.' . $identifier, null);
          
        if ($value === null) {
           return redirect()->route('login')->with('error-message', 'Invalid User .');
        }
       
        return view('auth.passwords.forgot', compact('identifier'));
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'The entered email does not exist in our records.', // Custom message for exists rule
        ]);
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);

        $resetLink = route('password.reset', ['token' => $token, 'email' => $request->email]);
        try {
            Mail::send('template.emails.password-reset', ['resetLink' => $resetLink], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Password Reset Request');
            }); 
        } catch (\Exception $e) {
            \Log::error('Error sending password reset email: ' . $e->getMessage());
            return back()->withErrors(['email' => 'There was an issue sending the reset email. Please try again later.']);
        }

        return back()->with('status', 'We have emailed your password reset link!');
    }
}
