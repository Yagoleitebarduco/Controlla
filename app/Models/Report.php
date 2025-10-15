<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Report extends Model
{
    protected $fillable = [
        'type_report',
        'period',
        'date_reportGeneratio',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
