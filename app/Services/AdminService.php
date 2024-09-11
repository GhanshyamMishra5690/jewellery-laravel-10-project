<?php

namespace App\Services;

use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Storage;
class AdminService
{   
    use ImageUploadTrait;
    public function profileUpdate(array $data, $image)
    {
        $response = array(); 
        
        $admin = User::find($data['admin_id']);
        $admin->username = $data['username'];
        $admin->name = $data['name']; 
        $admin->email = $data['email']; 
        if(!empty($image)){ 
            $admin->avatar = $this->uploadImage($image, 'images/admin'); ; 
        } 
        $admin->phone = $data['phone'];  
        $admin->dob = $data['dob'];  
        if($admin->save()){
           $response['success'] =true;
            $response['message'] ='Profile updated successfully!'; 
         } else {
            $response['success'] =false;
            $response['message'] ='Something went wrong!'; 
         } 
         return $response;

    }

    public function update(User $user, array $data)
    {
        // Logic for updating a user
        $user->update($data);
        return $user;
    }

    public function delete(User $user)
    {
        // Logic for deleting a user
        $user->delete();
    }
}
