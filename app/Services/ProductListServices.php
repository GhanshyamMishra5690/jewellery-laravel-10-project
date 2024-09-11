<?php

namespace App\Services;

use App\Models\Admin;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Storage;
use App\Models\Ring;
class ProductListServices
{   
    public static function getProductList($limit = '10')
    {
        $query = self::applyRelationships(); // Start with the base query
        $query = self::applySorting($query); // Pass the query to applySorting
        return self::applyPagination($query, $limit); // Pass the sorted query to applyPagination
    }

    public static function getLatestProduct($limit = '8')
    {
        $query = self::applyRelationships(); 
        $query = self::applySorting($query); 
        $query = self::latest($query); 
        return self::applyPagination($query, $limit); 
    }


    protected static function applyRelationships()
    {
        return Ring::query();
    } 
    
    protected static function latest($query)
    {
        return $query->latest();
    }

    protected static function applySorting($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    protected static function applyPagination($query, $limit)
    {
        return $query->paginate($limit);
    }
 
    public function product(){}
}
