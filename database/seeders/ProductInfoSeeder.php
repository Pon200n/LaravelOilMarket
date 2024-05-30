<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_infos')->insert([
            'product_id' => "1",
            'description' => "some big text for 1st product blalblalbalblalblalbabllblalblalblablalbllalblalblabllablab",
        ]);
        DB::table('product_infos')->insert([
            'product_id' => "2",
            'description' => "some big text for 2nd product blalblalbalblalblalbabllblalblalblablalbllalblalblabllablab",
        ]);
    }
}
