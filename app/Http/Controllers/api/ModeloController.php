<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Modelo;

class ModeloController extends Controller
{
    public function index() {
        //$modelos = Modelo::select('ndaidn')->with(['mark'])->get();

        $modelos = Modelo::select('modelos.id', 'modelos.name as modelo', 'marks.name as mark', 'mark_id')
        ->join('marks', 'marks.id', '=', 'modelos.mark_id')
        ->get();

        return $modelos;
    }


    public function show($id) {
        $modelo = Modelo::select('modelos.name as modelo', 'marks.name as mark', 'mark_id','modelos.id')
        ->join('marks', 'marks.id', '=', 'modelos.mark_id')
        ->findOrFail($id);
        return $modelo;
    }

    public function getModelsForMarkSelected($id) {
        $modelos = Modelo::select('modelos.name as modelo', 'marks.name as mark', 'mark_id','modelos.id')
        ->join('marks', 'marks.id', '=', 'modelos.mark_id')
        ->where('mark_id', $id)
        ->get();

        if (count($modelos) === 0) {
            $modelos = abort(404);
        }
        return $modelos;

    }
}
