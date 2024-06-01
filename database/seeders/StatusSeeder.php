<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            'status_name' => "Ожидает обработки",
        ]);
        DB::table('statuses')->insert([
            'status_name' => "Обработан",
        ]);
        DB::table('statuses')->insert([
            'status_name' => "Готов к выдаче",
        ]);
    }
}
