<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jewellery;
use App\Models\Category;
use App\Http\Requests\StoreJewelleryRequest;
use App\Http\Requests\UpdateJewelleryRequest;
use App\Services\JewelleryService;
class JewelleryController extends Controller
{
    protected $jewelleryService;

    public function __construct(JewelleryService $jewelleryService)
    {
        $this->jewelleryService = $jewelleryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jewelleries = $this->jewelleryService->getAllJewelleries();
        return view('admin.jewelleries.index', compact('jewelleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Assuming Category logic is handled elsewhere
        return view('admin.jewelleries.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJewelleryRequest $request)
    {
       $validatedData = $request->validated();  
       $this->jewelleryService->createJewellery($validatedData);
        return response()->json([
            'success' => true,
            'redirect' => route('jewelleries.index'),
            'message' => 'Jewellery created successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jewellery = $this->jewelleryService->getJewelleryById($id);
        
        return view('admin.jewelleries.show', compact('jewellery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jewellery = $this->jewelleryService->getJewelleryById($id);
       
        $categories = Category::all();
        return view('admin.jewelleries.edit', compact('jewellery','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJewelleryRequest $request, $id)
    {
        $this->jewelleryService->updateJewellery($request->validated(), $id);
        return response()->json([
            'success' => true,
            'redirect' => route('jewelleries.index'),
            'message' => 'Jewellery updated successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->jewelleryService->deleteJewellery($id);
        return response()->json([
            'success' => true,
            'message' => 'Jewellery deleted successfully!'
        ]);
    }

    public function checkProductId(Request $request)
    {
        $productId = $request->input('product_id');
        $id = $request->input('jwlid');
        if($id > 0) {
            $exists = Jewellery::where(['id'=> $id ,'product_id' => $productId])->exists(); 
            return response()->json(['exists' => false]);    
        } else{
            $exists = Jewellery::where('product_id', $productId)->exists(); 
            return response()->json(['exists' => $exists]);
        }
        
    }
} 