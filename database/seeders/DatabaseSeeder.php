<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(1)->create(['id'=>1]);
        User::factory()->count(1)->create(['id'=>2]);

        Product::factory()->count(5)->create(['user_id' => 1]);
    }
}
