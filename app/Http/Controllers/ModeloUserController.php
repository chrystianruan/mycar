<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Modelo_user;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class ModeloUserController extends Controller
{
    public function newVehicle(Request $request) {
        $vehicle = new Modelo_user;
        if($request->image != null) {
            $vehicle->image = $request->image->store('public/img');           
        }
        $vehicle->nickname = $request->nickname;
        $vehicle->user_id = auth()->user()->id;
        $vehicle->modelo_id = $request->modelo_id;
        $vehicle->version = $request->version;
        $vehicle->save();

        return redirect()->back()->with('msg-accomplished', 'Veículo adicionado com sucesso');

    }

    public function getAllVehicles() {
        $vehicles = Modelo_user::where('user_id', auth()->user()->id)
        ->get();

        $modelosReq = Request::create(url('api/modelos'), 'GET');
        $modelos = json_decode(Route::dispatch($modelosReq)->getContent());
        
        return view('/my-vehicles/vehicles', compact(['vehicles', 'modelos']));
    }

    public function getAllVehiclesJson() {
        $vehicles = Modelo_user::where('user_id', auth()->user()->id)
        ->get();

        $modelosReq = Request::create(url('api/modelos'), 'GET');
        $modelos = json_decode(Route::dispatch($modelosReq)->getContent());
        
        return $vehicles;
    }

    public function filterVehicles(Request $request) {

    }


    public function updateVehicle(Request $request, $id) {
        $vehicle = Modelo_user::findOrFail($id);
        $vehicle->nickname = $request->nickname_edit;
        if ($request->image_edit) {
            Storage::delete($vehicle->image);
            $vehicle->image = $request->image_edit->store('public/img');
        }
        $vehicle->version = $request->version_edit;
        $vehicle->modelo_id = $request->modelo_id_edit;
        $vehicle->save();

        return redirect()->back()->with('msg-accomplished', 'Veículo atualizado com sucesso');

    }

    public function showVehicle($id) {
        $vehicle = Modelo_user::findOrFail($id);
        if (auth()->user()->id === $vehicle->user_id) {
            return $vehicle;
        } else { 
            return abort(404);
        }
        
    }

    public function deleteVehicle($id) {
        $modelo = Modelo_user::findOrFail($id);
        Storage::delete($modelo->image);
        $modelo->delete();

        return redirect()->back()->with('msg-denied', 'Veículo excluído com sucesso');
    }
}
