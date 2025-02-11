<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'location'; // Fixed: Table name should be plural (`locations`)
    protected $fillable = [
        'country',
        'district',
        'village',
        'image_url',
    ];

    /**
     * Scope to filter locations by country.
     */
    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['country'])) {
            $query->where('country', 'like', '%' . $filters['country'] . '%');
        }
    }
}