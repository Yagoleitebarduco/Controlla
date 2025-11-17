<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'cod',
        'name_product',
        'Category_id',
        'unit_value',
        'unit_measure',
        'min_stock',
        'max_stock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'Category_id');
    }
    
}
