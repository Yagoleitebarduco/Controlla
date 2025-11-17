<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TypeTransaction;
use App\Models\Category;
use App\Models\TypePayment;

class RegisterTransaction extends Model
{
    protected $fillable = [
        'TypeTransaction_id',
        'description_sale',
        'value_transaction',
        'entry_date',
        'Category_id',
        'TypePayment_id',
        'status_transaction',
    ];


    public function typeTransaction()
    {
        return $this->belongsTo(TypeTransaction::class, 'TypeTransaction_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'Category_id');
    }

    public function typePayment()
    {
        return $this->belongsTo(TypePayment::class, 'TypePayment_id');
    }

    public function stocks()
    {
        return $this->belongsToMany(Stock::class, 'stock_transaction')
                    ->withPivot('quantity', 'value_transaction')
                    ->withTimestamps();
    }
}
