<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classifieds extends Model
{
    use HasFactory;

    // Table Name classifieds
    protected $table = 'classifieds';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    // fillable fields
    protected $fillable = [
        'title',
        'short_description',
        'description',
        'price',
        'category',
        'user_id',
        'location',
        'phone',
        'image',
        'status',
        'created_at',
        'updated_at'
    ];
}
