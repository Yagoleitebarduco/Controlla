<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'title', 'filename']; // Campos que podem ser preenchidos em massa

    protected $casts = [
        'generated_at' => 'datetime', // Garante que o campo seja tratado como DateTime
    ];
}