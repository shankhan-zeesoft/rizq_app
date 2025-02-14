<?php

namespace App\Repositories\Admin;

use App\Models\Products;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\ProductVariation;

class ProductRepository extends Repository
{
    private static $title = 'products';
    private static $path = 'products/';

    public static function model()
    {
        return new Products();
    }

    public static function storeByRequest(ProductRequest $request)
    {
        DB::transaction(function () use ($request) {
            $data = $request->only('name', 'description', 'price');
            $post = self::create($data);
            // product categories
            $post->categories()->attach($request->categories);

            //variations
            foreach ($request->variations as $key => $value) {
                ProductVariation::create([
                    'product_id' => $post->id,
                    'color' => $value['color'],
                    'size' => $value['size'],
                    'price' => $value['price'],
                    'stock' => $value['stock'],
                    'sku' => "sku-" . $post->id . "-" . rand(1000, 9999),
                ]);
            }
            return $post;
        });
    }
    public static function updateByRequest(Products $product, ProductRequest $request)
    {
        DB::transaction(function () use ($request, $product) {
            $data = $request->only('name', 'description', 'price');
            self::update($product, $data);

            // product categories
            $product->categories()->attach($request->categories);

            //variations
            ProductVariation::where('product_id', $product->id)->delete();
            foreach ($request->variations as $key => $value) {
                ProductVariation::create([
                    'product_id' => $product->id,
                    'color' => $value['color'],
                    'size' => $value['size'],
                    'price' => $value['price'],
                    'stock' => $value['stock'],
                    'sku' => "sku-" . $product->id . "-" . rand(1000, 9999),
                ]);
            }
        });
        $updatedModel = self::find($product->id);
        return $updatedModel;
    }

    public static function search($search)
    {
        $user = self::query()->where(function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        });
        return $user;
    }
}
