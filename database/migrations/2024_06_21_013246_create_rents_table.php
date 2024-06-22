<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   
        // 'name',
        // 'description',
        // 'price',
        // 'bedrooms',
        // 'bathrooms',
        // 'area',
        // 'photo',
        // 'address',
        // 'city',
        // 'location',
        // 'sector',
        // 'geo',
        // 'status',
        // 'created_at',
        // 'updated_at'
    
    public function up(): void
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('area');
            $table->string('photo');
            $table->string('address');
            $table->string('city');
            $table->string('location');
            $table->string('sector');
            $table->string('geo');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
