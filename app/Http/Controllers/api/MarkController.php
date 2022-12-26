<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mark;

class MarkController extends Controller
{
    public function index() {
        $marks = Mark::select('id', 'name')->get();
        return $marks;
    }

    public function show($id) {
        $mark = Mark::findOrFail($id);
        return $mark;
    }

}
