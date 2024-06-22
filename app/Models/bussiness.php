<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bussiness extends Model
{
    use HasFactory;

    // bussiness model

    protected $table = 'bussiness';

    // bussiness

    protected $fillable = [
        'name',
        'description',
        'location',
        'sector',
        'city',
        'created_at',
        'updated_at'
    ];
}
