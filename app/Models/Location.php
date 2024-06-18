<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    // fillable fields
    protected $fillable = ['name'];

    // name of the table
    protected $table = 'locations';

    public function sectors()
    {
        return $this->hasMany(Sector::class);
    }


}
