<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RegistroTransacao;

class RegistroTransaçãoController extends Controller
{
    public function showToRegistroTransacao()
    {
        $transacoes = RegistroTransacao::all();
        return view('admin.RdT.registroTransacao', compact('transacoes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_Transaction' => 'required',
        ]);

        RegistroTransacao::create([
            'type_Transaction' => $request->type_Transaction,
            'descricao_Venda' => $request->descricao,
            'valor' => $request->valor,
            'date_entrada' => $request->data_entrada,
            'categoria' => $request->categoria,
            'type_pagament' => $request->forma_pagamento,
            'status_Transacao' => $request->status,
        ]);

        return redirect()->route('registroTransacao');
    }
}
