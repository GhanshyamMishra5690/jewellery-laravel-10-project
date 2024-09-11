<?php

namespace App\Services;

use App\Models\Jewellery;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class JewelleryService
{
    /**
     * Get all jewelleries.
     */
    public function getAllJewelleries()
    {
        return Jewellery::with('images')->get();
    }

    /**
     * Create a new jewellery.
     */
    public function createJewellery(array $data)
    {   
        
        $jewellery = Jewellery::create($data);

        if (isset($data['product_images'])) {
            foreach ($data['product_images'] as $image) {
               $filename= Str::uuid(). '.'.strtolower($image->getClientOriginalExtension());

                $path = $image->storeAs('images/jewellery', $filename, 'public');

                Image::create([
                    'jewel_id' => $jewellery->id,
                    'image_path' => $path
                ]);
            }
        }
    
        return $jewellery;
    }

    /**
     * Get a jewellery by id.
     */
    public function getJewelleryById($id)
    {
        return Jewellery::with('images')->findOrFail($id);;
    }

    /**
     * Update jewellery.
     */
    public function updateJewellery(array $data, $id)
    {
        $jewellery = Jewellery::findOrFail($id);
        $jewellery->update($data);
        return $jewellery;
    }

    /**
     * Delete a jewellery.
     */
    public function deleteJewellery($id)
    {
        $jewellery = Jewellery::findOrFail($id);
        return $jewellery->delete();
    }
}
