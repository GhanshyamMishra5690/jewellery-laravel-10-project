<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Otp;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class RegisterController extends Controller
{
    use ImageUploadTrait;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
         
         
        $data = [
            'name' => $data['name'],
            'username' => $fullName[0], 
            'password' => Hash::make($data['password']),
        ]; 
        return User::create();
    }

    protected function registered(Request $request, $user)
    {
        if ($user->userType === config('constants.USER_TYPES.WHOLESALER')) {
            return response()->json(['success' => true, 'url' =>route('wholesaler.dashboard')]);
           
        } elseif ($user->userType === config('constants.USER_TYPES.USER')) {
            return response()->json(['success' => true, 'url' =>route('user.dashboard')]); 
        } else {
            return response()->json(['success' => true, 'url' =>$this->redirectTo]);
       
        }
    }

    public function customRegister(Request $request)
    {
        
        $rules= [];
        $rules =[
               'name' => ['required', 'string', 'max:255'],
               'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
               'password' => ['required', 'string', 'min:8', 'confirmed'],
               'userType' => ['required'],
               'phone' => ['required', 'regex:/^[0-9]{10,15}$/'], 
        ];
        if($request->get('phone') > 0){
            $phone = User::where('phone', $request->get('phone'))->exists();
            if($phone){
                return response()->json([
                    'success' => true,
                    'message' => 'phone is already taken.'
                ]);
            }
        }

        if(!empty($request->file('document')) && $request->get('userType') === config('constants.USER_TYPES.WHOLESALER')){
            $rules['document'] = ['required', 'file', 'mimes:jpeg,png,jpg,gif,pdf', 'max:2048'];
        }
       
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        $fullName = explode(' ',  $request->get('name')) ;
        $status = '1';
        if($request->get('userType') == config('constants.USER_TYPES.WHOLESALER')){
            $status = '0';
        }   
        $data= []; 
        $data= [
            'name' => $request->get('name'), 
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'status' => $status ,
            'userType' => $request->get('userType') ,
            'password' => Hash::make($request->get('password')),
        ];
        if(!empty($request->file('document'))){ 
            $documentPath = $this->uploadImage($request->file('document'), 'images/wholesaler/document');
            $data['document'] = $documentPath;  
        } 
        $user = User::create($data);

        $otp = rand(100000, 999999);
        $otpExpiry =   Carbon::now()->addMinutes(5);
        Otp::create([
            'user_id' => $user->id,
            'otp' => $otp,
            'expires_at' => $otpExpiry,
        ]);
        return response()->json([
            'success' => true,
            'redirect_url' => route('otp.verify', ['user' =>$user->id ])
        ]);
         
        // event(new Registered($user));
        // Auth::login($user); 

        // if (Auth::user()->userType == config('constants.USER_TYPES.WHOLESALER')) {
        //     return response()->json(['success' => true, 'redirect_url' => route('wholesaler.dashboard')]);
        // } elseif (Auth::user()->userType == config('constants.USER_TYPES.USER')) {
        //     return response()->json(['success' => true, 'redirect_url' => route('user.dashboard')]);
        // } else {
        //     return response()->json(['success' => true, 'redirect_url' => $this->redirectTo]);
        // }
 
    }

    public function customAuth(User $user)
    {
        // Manually setting the session
        session(['user_id' => $user->id]);

        // Custom session regeneration
        request()->session()->regenerate();

        // Optionally, set user-related data in the session
        session(['user_name' => $user->name]);
    }

    public function showOtpVerificationForm(User $user)
    {
        $otp = Otp::where('user_id', $user->id)->where('is_verified', 0)->first();
        if($user && $otp){
             $expiresAt =  Carbon::parse($user->otp->expires_at)->format('M d, Y H:i:s'); 
              
            return view('auth.verify', compact('user','expiresAt','otp'));
        } else {
           Session::flash('error-message','Your Otp is expiry');
           return redirect()->route('register');
        }
       
    }
    public function expiryOtp(Otp $user, $otp){
        
        Otp::where('id', $user->id)->update(['is_verified' => 2]);
        Session::flash('error-message','Your Otp is expiry');
        return redirect()->route('register');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);

        $otp = Otp::where('user_id', $request->user_id)
                ->where('otp', $request->otp)
                ->where('expires_at', '>', now())
                ->first();
         $user = User::where('id', $request->get('user_id'))->first(); 
        if ($otp) {
            $otp->update(['is_verified' => true]); 
            event(new Registered($user));
            Auth::login($user); 

            if (Auth::user()->userType == config('constants.USER_TYPES.WHOLESALER')) {
                return response()->json(['success' => true, 'redirect_url' => route('wholesaler.dashboard')]);
            } elseif (Auth::user()->userType == config('constants.USER_TYPES.USER')) {
                return response()->json(['success' => true, 'redirect_url' => route('user.dashboard')]);
            } else {
                return response()->json(['success' => true, 'redirect_url' => $this->redirectTo]);
            }
        } else {
            return redirect()->back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }
    }
}
