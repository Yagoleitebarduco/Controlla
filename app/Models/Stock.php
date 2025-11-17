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
<<<<<<< HEAD
    
=======

    public function transactions()
    {
        return $this->belongsToMany(RegisterTransaction::class, 'stock_transaction')
                    ->withPivot('quantity', 'value_transaction')
                    ->withTimestamps();
    }
>>>>>>> d581b674f845499e6c96e58dab6b4b605f15a1fd
}
