<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       

        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.user.create');
    }

    public function approve(Request $request)
    {
        $user = User::find($request->get('id'));
        $user->status = '1';
        if($user->save()){
            return response()->json(['success' => true, 'message' => 'Account Approved Successfully.'  ]);
        }
        return response()->json(['success' => false, 'message' => 'Something went wrong ?'  ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

   
    public function viewFile($id)
    {
        $file = User::where('id', $id)->first();
        $filename = $file->document;
    
        // Construct the full path to the file
        $path = storage_path('app/public/' . $filename);
    
        // Check if the file exists
        if (!file_exists($path)) {
            abort(404, 'File not found.');
        }
    
        // Extract the file extension
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    
        // Check if the file is a PDF
        if ($extension === 'pdf') {
            return response()->file($path);
        }
        // Check if the file is a JPG
        elseif ($extension === 'jpg' || $extension === 'jpeg' || $extension === 'png') {
            return response()->file($path, [
                'Content-Type' => 'image/' . $extension
            ]);
        } 
        else {
            abort(400, 'Unsupported file type.');
        }
    }
    public function downloadPdf($id)
    {
        $file = User::where('id', $id)->first();
        $filename = $file->document;
        $filePath = storage_path('app/public/' . $filename); 
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('info', 'File not found.'); 
        }

    }
}
