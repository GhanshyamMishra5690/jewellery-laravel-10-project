<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Services\AdminService;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function login_form()
    {
        return view('admin.login-form');
    }

    public function adminLogin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::check('web')->attempt($credentials)) {
            return redirect()->route('dashboard');
        }else{
            Session::flash('error-message','Invalid Email or Password');
            return back();
        }
    }

    public function register()
    {
        return view('admin.register-form');
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function adminRegister(Request $request){
        
        $request->validate([
            'name'=>'string',
            'email'=>'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
         
        $admin = new User();
        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        $admin->status = '1';
        $admin->userType = 'admin';
        $admin->password = Hash::make($request->get('password')); 
        if($admin->save()){
            return redirect()->route('admin.login');
        } else {
            Session::flash('error-message','Something Went wrong.');
            return back();
        } 
    } 

    
    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('admin.login');
    }

    public function profile()
    {
        $admin = Auth::guard('web')->user(); 
        
        return view('admin.profile', compact('admin'));
    }

    public function profileUpdate(Request $request){

        $image = '';
        if(!empty($request->file('profile_image')) && $request->hasFile('profile_image')){
            $request->validate([
                'profile_image'=>'required|mimes:jpg,jpeg,png,bmp',
            ]);
            $image = $request->file('profile_image');  
        }   
        $profile =  $this->adminService->profileUpdate($request->all(), $image);  
         return response()->json($profile);
    }

    
}
