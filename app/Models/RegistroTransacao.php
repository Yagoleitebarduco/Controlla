<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroTransacao extends Model
{
    protected $fillable = [
        'type_Transaction',
        'descricao_Venda',
        'valor',
        'categoria',
        // Alterar para uma tabela Externa
        'type_pagament', 
        // Alterar para uma tabela Externa
        'date_entrada',
        'status_Transacao',
    ];
    
}
