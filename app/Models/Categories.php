<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];

    // Many-to-Many
    public function products()
    {
        return $this->belongsToMany(Products::class);
    }
}
