<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryCharValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_char_values')->insert([
            'value_name' => "ILSAC value1",
            'char_id' => 1,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "ILSAC value2",
            'char_id' => 1,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "SAE value1",
            'char_id' => 2,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "SAE value2",
            'char_id' => 2,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "API value1",
            'char_id' => 3,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "API value2",
            'char_id' => 3,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "TransOilChar1 value1",
            'char_id' => 4,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "TransOilChar1 value2",
            'char_id' => 4,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "TransOilChar2 value1",
            'char_id' => 5,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "TransOilChar2 value2",
            'char_id' => 5,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "TransOilChar3 value1",
            'char_id' => 6,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "TransOilChar3 value2",
            'char_id' => 6,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "TechOilChar1 value1",
            'char_id' => 7,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "TechOilChar1 value2",
            'char_id' => 7,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "TechOilChar2 value1",
            'char_id' => 8,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "TechOilChar2 value2",
            'char_id' => 8,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "TechOilChar3 value1",
            'char_id' => 9,
        ]);
        DB::table('category_char_values')->insert([
            'value_name' => "TechOilChar3 value2",
            'char_id' => 9,
        ]);
    }
}
