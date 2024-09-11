<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Jewellery extends Model
{
    use HasFactory;
    protected $fillable = [
            'category_id',
            'product_id',
            'slug',
            'name',
            'gross_weight',
            'size',
            'price', 
            'gender',
            'description',
            'product_type',
            'pendant_width',
            'pendant_height',
            'earring_width',
            'earring_height',
            'nothing_extra',
            'watch_width',
            'watch_height',
            'occasion',
            'material_color',
            'jewellery_type',
            'diamond_clarity',
            'diamond_color',
            'diamond_weight',
            'no_of_diamonds',
            'diamond_shape',
            'diamond_setting',
            'diamond_price',
            'metal',
            'gold_purity',
            'gold_price_per_gram',
            'gold_weight_in_gm',
            'making_charge',
            'gst',
    ];
    
    public function images() {
        return $this->hasMany(Image::class, 'jewel_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }
}

