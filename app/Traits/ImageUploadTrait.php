<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait ImageUploadTrait
{
    /**
     * Upload an image to the specified storage disk.
     *
     * @param UploadedFile $image
     * @param string $directory
     * @return string
     */
    public function uploadImage(UploadedFile $image, string $directory): string
    { 
        $fileName = time() . '.' . $image->getClientOriginalExtension(); 
        $path = $image->storeAs($directory, $fileName, 'public'); 
        return $path;
    }
}
