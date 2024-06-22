<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rent extends Model
{
    use HasFactory;

    // renta modelo de datos

    protected $table = 'rent';

    // rent apartment
    protected $fillable = [
        'name',
        'description',
        'price',
        'bedrooms',
        'bathrooms',
        'area',
        'photo',
        'address',
        'city',
        'location',
        'sector',
        'geo',
        'status',
        'created_at',
        'updated_at'
    ];
    
}
