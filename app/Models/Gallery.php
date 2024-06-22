<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    // fillable fields
    protected $fillable = ['name', 'image', 'refrence'];

    // gallery model
    protected $table = 'gallery';

    // gallery images

    // fillable fields
    
}
