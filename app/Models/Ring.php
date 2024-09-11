<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Scopes\RingUserPriceScope;
class Ring extends Model
{
    use HasFactory;
    protected $table ='rings';
    protected $fillable = [
        'name', 
        'slug',
        'shape',
        'metal_type',
        'setting_style',
        'band_type',
        'setting_profile',
        'setting_image',
        'setting_description',
        'stoneType',
        'stone_shape_type',
        'stone_carat',
        'stone_price',
        'stone_color',
        'stone_cut',
        'stone_clarity',
        'stone_depth',
        'stone_table',
        'stone_ratio',
        'stone_image',  
        'stone_user_price',
        'stone_wholesaler_price',
        'created_at',
        'updated_at',
    ];
    
    protected $appends = ['full_stone_image','full_setting_image','product_price'];

    public function getFullStoneImageAttribute()
    {
        return url(asset('storage/' . $this->attributes['stone_image']));
    }
    public function getFullSettingImageAttribute()
    {
        return url(asset('storage/' . $this->attributes['setting_image']));
    }
    protected static function booted()
    {
        // Add the global scope to every query
        static::addGlobalScope(new RingUserPriceScope);
    }
 
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = static::generateUniqueSlug($product->name);
        });
        //for update slug while update product
        // static::updating(function ($product) {
        //     if ($product->isDirty('name')) {
        //         $product->slug = static::generateUniqueSlug($product->name);
        //     }
        // });
    }

    protected static function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }
}
 