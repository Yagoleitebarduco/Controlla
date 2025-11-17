<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showToUser()
    {
        $user = Auth::user();
        $nameInitial = strtoupper(substr($user->name, 0, 1));
        $lastnameInitial = strtoupper(substr($user->lastname, 0, 1));
        return view('admin.user.user', compact('nameInitial', 'lastnameInitial'));
    }
}
