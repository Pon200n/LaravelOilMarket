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
        Schema::create('product_values', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('value_id');
            $table->unsignedBigInteger('product_id');

            $table->index('value_id', 'product_values_value_idx');
            $table->index('product_id', 'product_values_product_idx');

            $table->foreign('value_id', 'product_values_value_fk')->on('category_char_values')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id', 'product_values_product_fk')->on('products')->references('id')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_values');
    }
};
