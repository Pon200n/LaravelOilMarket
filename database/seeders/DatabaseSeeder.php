<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductInfo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            CategorySeeder::class,
            CategoryCharSeeder::class,
            CategoryCharValueSeeder::class,
            BrandSeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            ProductInfoSeeder::class,
            StatusSeeder::class,
        ]);
        Product::factory(10)->create();
    }
}
