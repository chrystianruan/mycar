<?php

namespace App\Http\Controllers\login;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function authenticate(Request $request) {
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ], [
            'email.required' => 'email é obrigatório',
            'email.email' => 'email não está no padrão',
            'password.required' => 'senha é obrigatória',
            'password.min' => 'a senha precisa ter no mínimo 6 dígitos'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/home');
        } else {
            return redirect()->back()->with('danger', 'Nome de usuário ou senha incorretos');
        }

    }
}