<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;

class Product extends Model
{
    protected $fillable = [
        'cod',
        'name',
        'categorie_id',
        'amount',
        'unit_Value',
        'total_Value',
        'status',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
}
