<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id'];

    // Define relationships if needed
     
    public function user()
    {
        return $this->belongsTo(User::class);
    } 
    public function product()
    {
        return $this->belongsTo(Ring::class);
    }
}
