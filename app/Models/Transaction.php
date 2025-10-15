<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Product;
use App\Models\Categorie;
use App\Models\User;
use App\Models\Payment;

class Transaction extends Model
{
    protected $fillable = [
        'document',
        'product_id',
        'categorie_id',
        'user_id',
        'payment_id',
        'value',
        'date_transaction',
        'status',
        'description',
        'expense',
    ];

    public function product()
    {
        return $this->BelongsTo(Product::class, 'product_id');
    }

    public function categorie() 
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payment() 
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}
