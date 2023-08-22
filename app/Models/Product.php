<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product';

    // сделать вместо new_price old_price 
    protected $fillable = [
        'name',
        'description',
        'price',
        'new_price',
        'image_id',
    ];

    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }
}
