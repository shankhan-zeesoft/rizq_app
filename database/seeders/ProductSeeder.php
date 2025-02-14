<?php

namespace Database\Seeders;

use App\Models\Products;
use App\Models\Categories;
use App\Models\CategoryProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laptop = Products::create([
            'name' => 'Laptop',
            'description' => 'A high-performance laptop',
            'price' => 1200.00,
        ]);

        $smartphone = Products::create([
            'name' => 'Smartphone',
            'description' => 'A powerful smartphone with a great camera',
            'price' => 800.00,
        ]);

        $headphones = Products::create([
            'name' => 'Headphones',
            'description' => 'Wireless noise-canceling headphones',
            'price' => 150.00,
        ]);

        // Attach categories
        $electronics = Categories::where('name', 'Electronics')->first();
        $accessories = Categories::where('name', 'Accessories')->first();
        $mobileDevices = Categories::where('name', 'Clothing')->first();

        if ($electronics) {
            $laptop->categories()->attach($electronics);
            $smartphone->categories()->attach($electronics);
        }

        if ($accessories) {
            $headphones->categories()->attach($accessories);
        }

        if ($mobileDevices) {
            $smartphone->categories()->attach($mobileDevices);
        }
    }
}
