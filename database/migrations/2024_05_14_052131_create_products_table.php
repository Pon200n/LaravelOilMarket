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
            $table->integer('price');
            $table->string('img');
            // $table->foreignId('category_id')->constrained(table: 'categories', indexName: 'id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('category_id')->constrained();
            $table->foreignId('brand_id')->constrained(table: 'brands', indexName: 'id_brand_fk');
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
