<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "Dmit",
            'second_name' => "Kutsenko",
            'patronymic' => "Konstantinovich",
            'phone' => "89234650914",
            'role' => "admin",
            'email' => "kutsenko.dmitrij2517@yandex.ru",
            'email_verified_at' => now(),
            'password' => Hash::make('25172517'),
            'remember_token' => Str::random(10),
        ]);
        DB::table('baskets')->insert([
            'user_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => "Dmit",
            'second_name' => "Kutsenko",
            'patronymic' => "Konstantinovich",
            'phone' => "89234650914",
            'email' => "kutsenko2.dmitrij2517@yandex.ru",
            'email_verified_at' => now(),
            'password' => Hash::make('25172517'),
            'remember_token' => Str::random(10),
        ]);
        DB::table('baskets')->insert([
            'user_id' => 2,
        ]);
    }
}
