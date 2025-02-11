<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the table name explicitly (optional if it matches the model name)
    protected $table = 'products';

    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url', // Optional: If you want to store product images
    ];

    // Define any additional methods or relationships here
    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }
    }
}