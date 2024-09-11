<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\ImageUploadTrait;
use App\Models\Ring;
use Illuminate\Support\Facades\Auth;
class FrontEndController extends Controller
{
    use ImageUploadTrait;
     public function user(){
      
        return view('user-account.dashboard');
     }

     public function wholesaler (){ 
        $addressId = $street_address = $city = $state = $country = $postal_code = $is_shipping ='';
        if(Auth::user()->addresses){
            $addressId       = Auth::user()->addresses->id;
            $street_address  = auth()->user()->addresses->street_address;
            $city            = auth()->user()->addresses->city;
            $state           = auth()->user()->addresses->state;
            $country         = auth()->user()->addresses->country;
            $postal_code     = auth()->user()->addresses->postal_code;
            $is_shipping     = auth()->user()->addresses->is_shipping;
        }
        return view('wholesaler-account.dashboard', compact('addressId','street_address','city','state','country','postal_code','is_shipping',));
     }

     public function profile(Request $request) {
      
      $rules = []; 
      if ($request->filled('password') && !empty($request->get('password'))) {
          $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
      }
      if ($request->hasFile('avatar') && !empty($request->file('avatar'))) {
          $rules['avatar'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'];
      } 
      $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
  
        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        if (!empty($request->get('password'))) {
            $user->password = Hash::make($request->password);
        }
        if (!empty($request->file('avatar'))) {
            $avatarPath = $this->uploadImage($request->file('avatar'), 'images/wholesaler');
            $user->avatar = $avatarPath;
        } 
        
        if ($user->save()) {
            return response()->json(['success' => true, 'message' =>'Profile updated successfully.'], 200);
        } 
         return response()->json(['success' => false, 'message' =>'Something went wrong.'], 500);
         
       
     }
     public function address(Request $request) {
         $validator = Validator::make($request->all(), [
            'street_address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'postal_code' => ['required', 'string', 'digits_between:6,10'],
            'country' => ['required', 'string'],
        ], [
            'street_address.required' => 'This field is required.',
            'city.required' => 'This field is required.',
            'state.required' => 'This field is required.',
            'postal_code.required' => 'This field is required.',
            'postal_code.digits_between' => 'Postal code must be between :min and :max digits long.',
            'country.required' => 'This field is required.',
        ]);
        if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ]);
            }
            $params = [];
            if(!empty($request->get('address_id'))){
                $address = Address::findOrFail($request->get('address_id'));
            } else {
                $address = new Address();
            }
            $address->user_id = $request->get('user_id');  
            $address->street_address = $request->get('street_address');  
            $address->city = $request->get('city');  
            $address->state = $request->get('state');  
            $address->postal_code = $request->get('postal_code');  
            $address->country = $request->get('country');  
            
            if($request->filled('is_shipping')  && !empty($request->filled('is_shipping'))){
                $address->ship_street_address = $request->get('street_address');  
                $address->ship_city = $request->get('city');  
                $address->ship_state = $request->get('state');  
                $address->ship_postal_code = $request->get('postal_code');  
                $address->ship_country = $request->get('country');  
                $address->is_shipping = '1';  
            }  
            if($address->save()){
                return response()->json(['success' => true, 'message' =>'Address updated successfully.'], 200);
            } 
            return response()->json(['success' => false, 'message' =>'Something went wrong.'], 500);
        }
        
    

}
