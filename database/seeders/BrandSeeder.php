<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            'brand_name' => "Motul",
            'brand_country' => "Germany",
        ]);
        DB::table('brands')->insert([
            'brand_name' => "Lukoil",
            'brand_country' => "Russia",

        ]);
        DB::table('brands')->insert([
            'brand_name' => "Rowe",
            'brand_country' => "Germany",

        ]);
    }
}
