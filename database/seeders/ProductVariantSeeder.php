<?php

namespace Database\Seeders;

use App\Models\Products;
use App\Models\ProductVariation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laptop = Products::where('name', 'Laptop')->first();
        $smartphone = Products::where('name', 'Smartphone')->first();

        if ($laptop) {
            ProductVariation::create([
                'product_id' => $laptop->id,
                'sku' => 'LAP123',
                'color' => 'Silver',
                'size' => '15 inch',
                'price' => 1250.00,
                'stock' => 10
            ]);
        }

        if ($smartphone) {
            ProductVariation::create([
                'product_id' => $smartphone->id,
                'sku' => 'SMT456',
                'color' => 'Black',
                'size' => '6.5 inch',
                'price' => 850.00,
                'stock' => 15
            ]);
        }
    }
}
