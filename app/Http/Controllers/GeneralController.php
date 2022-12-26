<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index() {

        return view('/home');
    }

}
