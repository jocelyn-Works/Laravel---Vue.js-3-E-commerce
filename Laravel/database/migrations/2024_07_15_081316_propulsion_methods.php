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
        Schema::create('propulsion_methods', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->integer('max_speed');
            $table->integer('autonomie');
            $table->integer('price');
            $table->string('image');
            $table->integer('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propulsion_methods');
    }
};
