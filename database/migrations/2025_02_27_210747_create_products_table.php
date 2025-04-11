<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('weight');
            $table->string('temp_max');
            $table->string('temp_min');
            $table->integer('shelf_life');
            $table->integer('quantity_big')->nullable();
            $table->integer('quantity_medium')->nullable();
            $table->integer('quantity_small')->nullable();
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
