<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employes extends Model
{
    use HasFactory;

    // empleos disponibles modelo de datos

    protected $table = 'employes';

    // empleos disponibles

    protected $fillable = [
        'name',
        'description',
        'salary',
        'requirements',
        'location',
        'sector',
        'city'
    ];
    
}
