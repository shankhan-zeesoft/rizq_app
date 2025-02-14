<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'sku', 'color', 'size', 'price', 'stock', 'status'];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
