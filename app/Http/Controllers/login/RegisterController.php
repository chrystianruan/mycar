<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegisterView() {
        return view('/register');
    }
    public function newUser(Request $req) {

        $this->validate($req, [
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'regex:/^.*(?=[^a-z]*[a-z])(?=\D*\d)(?=[^!@?]*[!@?]).*$/'],
        ], [
            'name.required' => 'Nome é obrigatório.',
            'name.max' => 'O máximo de caracteres para nome é 100.',
            'email.required' =>  'Email é obrigatório.',
            'email.email' => 'O Email está fora do padrão.',
            'email.unique' => 'Esse email já está sendo usado.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha precisa ter no mínimo 6 dígitos.',
            'password.regex' => 'A senha precisa conter, no mínimo, uma letra maiúscula, minúscula, um número e um caractere especial (Ex.: @)'
        ]);

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->save();

        return redirect('/login')->with('msg-sucess', 'Muito bom! Agora faça login com suas credencias para ter acesso ao site!');

    }
}
