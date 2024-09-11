<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'user_address';

    protected $fillable = [
        'user_id',
        'street_address',
        'city',
        'state',
        'postal_code',
        'country',
        'user_address',
        'is_shipping',
        'ship_street_address',
        'ship_city',
        'ship_state',
        'ship_postal_code',
        'ship_country_id' 
    ];

    // Define relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
