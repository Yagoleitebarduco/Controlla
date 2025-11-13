<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroTransaçãoController extends Controller
{
    public function showToRegistroTransacao()
    {
        return view('admin.RdT.registroTransacao');
    }
}
