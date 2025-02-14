<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categories::insert([
            ['name' => 'Electronics', 'created_at' => now()],
            ['name' => 'Clothing', 'created_at' => now()],
            ['name' => 'Home & Garden', 'created_at' => now()]
        ]);
    }
}
