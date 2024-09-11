<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ring;
class ProductController extends Controller
{
    public function searchProduct(Request $request){
        
        if ($request->name) {
            $data = Ring::select('name', 'stone_image', 'setting_image','slug')
                ->where('name', 'LIKE', $request->name . '%')
                ->orderBy('name', 'asc')
                ->get();
    
            return response()->json($data);
        }
     }
     
     public function productDetails($slug) {
       
        if ($slug) {
            $products = Ring::with('jewellery')->where('slug', 'LIKE', '%' . $slug . '%')
            ->orderBy('name', 'asc')
            ->first();
        } else {
            $products = collect([]);
        }
       
      return view('product-details', compact('products'));
     }
     public function productView($slug) {
       
        if ($slug) {
            $products = Ring::with('jewellery')->where('slug', 'LIKE', '%' . $slug . '%')
            ->orderBy('name', 'asc')
            ->first();
        } else {
            $products = collect([]);
        }
       
      return view('modal.product-view', compact('products'));
     }
}
