<?php

namespace App\Repositories\Admin;

use App\Models\Products;
use App\Models\Categories;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryRepository extends Repository
{
    private static $title = 'category';
    private static $path = 'category/';

    public static function model()
    {
        return new Categories();
    }

    public static function storeByRequest(CategoryRequest $request)
    {
        $data = $request->except('action', '_token');
        $post = self::create($data);
        return $post;
    }
    public static function updateByRequest(CategoryRequest $request)
    {
        $product = self::find($request->id);
        $data = $request->except('action', '_token');
        self::update($product, $data);
        $updatedModel = self::find($product->id);
        return $updatedModel;
    }
    public static function search($search)
    {
        $user = self::query()->where(function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        });
        return $user;
    }
}
