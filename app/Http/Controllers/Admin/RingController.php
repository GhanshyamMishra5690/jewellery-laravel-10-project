<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ring;
use App\Models\Jewellery;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class RingController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function index()
    {
         
        $rings = Ring::all(); 
        return view('admin.ring.index', compact('rings')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shapes = DB::table('shapes')->get()->toArray();
        $metal_types = DB::table('metal_types')->get()->toArray();
        $setting_styles = DB::table('setting_styles')->get()->toArray();
        $band_types = DB::table('band_types')->get()->toArray();
        $setting_profiles = DB::table('setting_profiles')->get()->toArray();
        $stone_types = DB::table('stone_types')->get()->toArray();
        $jewellery = Jewellery::all(); 
        return view('admin.ring.create',compact('shapes','metal_types','setting_styles','band_types','setting_profiles','stone_types','jewellery')) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    { 
        
        $result= array();
        $validatedData = $request->validated(); 
        $ring = new Ring(); 
        foreach ($request->all() as $key => $value) {
            if (is_null($value)) {
                throw new NullValueException("The field {$key} contains a null value.");
            }else {
                if($key != '_token'){
                    $ring->$key = trim($request->get($key));
                    \Log::info('$ring->' . $key . ' = $request->get("' . $key . '");');
                }
            }  
        } 
       
         $settingImageName = 'setting_image_' . time() . '.' . $request->setting_image->getClientOriginalExtension();
         $stoneImageName = 'stone_image_' . time() . '.' . $request->stone_image->getClientOriginalExtension();
 
         $settingImagePath = $request->file('setting_image')->storeAs('images/ring', $settingImageName, 'public');
         $stoneImagePath = $request->file('stone_image')->storeAs('images/ring', $stoneImageName, 'public');
        
         $ring->setting_image = $settingImagePath;
         $ring->stone_image = $stoneImagePath;
        
         if($ring->save()){
            Session::flash('success','Ring created successfully!');
            return response()->json([
                'success' => true,
                'url' => route('ring.index'),
                'message' => 'Ring created successfully!',
            ]);
         } else {
           return response()->json([
                'success' => false,
                'message' => 'Something went wrong!'
            ]);
         }  
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Ring $ring)
    {
        
        $ring = Ring::find($ring->id);
        return view('admin.ring.show', compact('ring'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ring $ring)
    {
        $ring = Ring::find($ring->id);
        return view('admin.ring.edit', compact('ring'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Ring $rings)
    {
        $result= array();
        $validatedData = $request->validated(); 
        $ring = Ring::find($rings->id);
        
        foreach ($request->all() as $key => $value) {
            if (is_null($value)) {
                throw new NullValueException("The field {$key} contains a null value.");
            }else {
                if($key != '_token' && $key != '_method' && $key != 'id'){
                    $result[$key] = $request->get($key); 
                }
            }
        } 
        if(!empty($request->get('setting_image'))) {
            $settingImageName = 'setting_image_' . time() . '.' . $request->setting_image->getClientOriginalExtension(); 
            $settingImagePath = $request->file('setting_image')->storeAs('images/ring', $settingImageName, 'public');
            $result['setting_image'] = $settingImagePath; 
        }
        if(!empty($request->get('stone_image'))) {
            $stoneImageName = 'stone_image_' . time() . '.' . $request->stone_image->getClientOriginalExtension();
            $stoneImagePath = $request->file('stone_image')->storeAs('images/ring', $stoneImageName, 'public');  
            $result['stone_image']   = $stoneImagePath;
        } 
       
        $res = Ring::where('id', $request->get('id'))->update($result);
         if($res){
            Session::flash('success','Ring updated successfully!');
            return response()->json([
                'success' => true,
                'url' => route('ring.index')
            ]);
         } else {
           return response()->json([
                'success' => false,
                'message' => 'Something went wrong!'
            ]);
         }  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ring $ring)
    {
        $ring->delete();
        Session::flash('success','Ring Delete Successfully.');
        return redirect()->route('ring.index'); 
    }
}
