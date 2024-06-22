<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bussinesses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('short_description');
            $table->text('description');           
            $table->string('category');
            $table->integer('user_id');
            $table->string('location'); 
            $table->string('geolocation')->nullable();           
            $table->string('sector')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bussinesses');
    }
};
