<?php

namespace App\Http\Controllers\login;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function showLoginView() {
        return view('/login');
    }
    public function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
        
        return redirect('/');
    }

}   