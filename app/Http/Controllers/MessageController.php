<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Artisan;
class MessageController extends Controller
{
   public function pending(){

    if (Session::has('status')) {
      return view('layouts.pending');
    } else{
      return redirect('/');
    }
       
   }

   public function clearCacheAndRoutes()
    {
        // Clear application cache
        Artisan::call('cache:clear');
        
        // Clear route cache
        Artisan::call('route:clear');
         
        Artisan::call('config:clear');
        // Artisan::call('view:clear');
        
        return redirect()->back()->with('status', 'Cache and Routes cleared successfully!');
    }


}
