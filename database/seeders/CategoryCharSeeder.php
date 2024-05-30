<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryCharSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_chars')->insert([
            'char_name' => "ILSAC",
            'category_id' => 1,
        ]);

        DB::table('category_chars')->insert([
            'char_name' => "SAE",
            'category_id' => 1,
        ]);
        DB::table('category_chars')->insert([
            'char_name' => "API",
            'category_id' => 1,
        ]);
        DB::table('category_chars')->insert([
            'char_name' => "TransOilChar1",
            'category_id' => 2,
        ]);
        DB::table('category_chars')->insert([
            'char_name' => "TransOilChar2",
            'category_id' => 2,
        ]);
        DB::table('category_chars')->insert([
            'char_name' => "TransOilChar3",
            'category_id' => 2,
        ]);
        DB::table('category_chars')->insert([
            'char_name' => "TechOilChar1",
            'category_id' => 3,
        ]);
        DB::table('category_chars')->insert([
            'char_name' => "TechOilChar2",
            'category_id' => 3,
        ]);
        DB::table('category_chars')->insert([
            'char_name' => "TechOilChar3",
            'category_id' => 3,
        ]);
    }
}
