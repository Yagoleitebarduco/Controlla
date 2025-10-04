<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsideController extends Controller
{
    public function dashboard() {
        return view('painel.index');
    }

    public function relatorios() {
        return view('relatorios.index');
    }
}
