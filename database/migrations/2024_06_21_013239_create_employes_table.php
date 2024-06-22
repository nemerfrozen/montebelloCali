<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
    //  */
    // 'name',
    //     'description',
    //     'salary',
    //     'requirements',
    //     'location',
    //     'sector',
    //     'city'
    public function up(): void
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('salary', 10, 2);
            $table->text('requirements');
            $table->string('location');
            $table->string('sector');
            $table->string('city');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
