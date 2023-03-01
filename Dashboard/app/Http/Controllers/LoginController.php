<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session(['user_id' => $user->id]);

            if ($user->roll === 'Admin') {
                return view('admin.priAdm');
            } elseif ($user->roll === 'Auxiliar') {
                return view('auxiliar.priAux');
            } elseif ($user->roll === 'Cliente') {
                return view('cliente.priCli');
            }
        }
        return redirect()->back()->withErrors(['email' => 'Las credenciales proporcionadas son incorrectas.']);
    }
}
