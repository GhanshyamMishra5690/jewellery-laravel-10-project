<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ring;
use App\Services\ProductListServices;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */  
    public function __construct()
    {   
        // $this->middleware('auth'); 
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $products =  ProductListServices::getProductList('4');   
       $latest_product =  ProductListServices::getLatestProduct('4');   
       
       return view('index', compact('products','latest_product'));
    }

    public function contactUs()
    {
       return view('pages.contactus');
    }

    public function aboutUs()
    {
        return view('pages.aboutus');
    }

    public function privacyPolicy()
    {
        return view('pages.privacyPolicy');
    }

    public function termsCondition()
    {
        return view('pages.termsCondition');
    }
}
