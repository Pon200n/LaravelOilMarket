<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => "lux",
            'price' => 555555,
            'category_id' => 1,
            'brand_id' => 2,

        ]);
        DB::table('products')->insert([
            'name' => "lux2",
            'price' => 555777,
            'category_id' => 2,
            'brand_id' => 2,
        ]);
    }
}
