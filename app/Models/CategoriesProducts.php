<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoriesProducts extends Model
{
    use HasFactory;

    protected $table = 'categories_products';
    protected $fillable = [
        'category_id',
        'product_id',
    ];
}
