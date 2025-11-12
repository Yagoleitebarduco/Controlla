<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Container\Attributes\Auth;

// Models
use App\Models\User;

class AuthController extends Controller
{
    public function showToFormLogin()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/user');
        }

        return back()->withErrors([
            'email' => 'Email Digitado esta Incorreto',
            'password' => 'Senha Digitada esta Incorreto',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function showToFormRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $date_min = Carbon::now()->subYears(18)->format('Y-m-d');

        if ($request->validate(
            [
                'date_nasc' => [
                    'required',
                    'date',
                    'before_or_equal:' . $date_min,
                ],
                'cpf' => [
                    'required',
                    'string',
                    'unique:users',
                ],
                'phone' => [
                    'required',
                    'string',
                    'unique:users',
                ],
                'email' => [
                    'required',
                    'email',
                    'unique:users',
                ],
            ],
            [
                'date_nasc.before_or_equal' => 'Precissa Ter Mais de 18 anos para usar o Controlla',
                'cpf.unique' => 'Este CPF ja esta sendo usado',
                'phone.unique' => 'Este NUMERO ja esta sendo usado',
                'email.unique' => 'Este EMAIL ja esta sendo usado'
            ],
        )) {

            User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'cpf' => $request->cpf,
                'phone' => $request->phone,
                'date_nasc' => $request->date_nasc,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('home');
    }

}
