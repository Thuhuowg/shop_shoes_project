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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('size_id');
            $table->integer('category_id');
            $table->integer('quantity');
            $table->string('price_default');
            $table->string('price_sale');
            $table->integer('voucher_sale');
            $table->string('image');
            $table->string('images_list');
            $table->integer('star_counter');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
