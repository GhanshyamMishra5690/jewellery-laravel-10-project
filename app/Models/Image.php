<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = [
        'jewel_id',
        'image_path',
    ];
    public $timestamps = true;

    public function jewellery() {
        return $this->belongsTo(Jewellery::class);
    }
}
