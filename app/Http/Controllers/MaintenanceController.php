<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Maintenance;
use App\Models\Modelo_user;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class MaintenanceController extends Controller
{
    public function getMaintenancesNextSevenDays() {
        $nextDate= date('Y-m-d', strtotime('+7days'));
        $todayDate = date('Y-m-d');
        $maintenances = Maintenance::select('maintenances.*', 'maintenances.id as maint_id', 'modelo_users.*', 'modelo_users.id as user_vehicle_id')
        ->where('maintenances.user_id', auth()->user()->id)
        ->whereDate('next_date_maintenance', '>=', $todayDate)
        ->whereDate('next_date_maintenance', '<=', $nextDate)
        ->join("modelo_users", "maintenances.modelo_user_id", "=","modelo_users.id")
        ->get();

        $modelosReq = Request::create(url('api/modelos'), 'GET');
        $modelos = json_decode(Route::dispatch($modelosReq)->getContent());

        return view('/home', compact(['maintenances', 'modelos', 'nextDate']));
    }
    public function getAllMaintenances() {
        $maintenances = Maintenance::select('maintenances.*', 'maintenances.id as maint_id', 'modelo_users.*', 'modelo_users.id as user_vehicle_id')
        ->where('maintenances.user_id', auth()->user()->id)
        ->join("modelo_users", "maintenances.modelo_user_id", "=","modelo_users.id")
        ->get();
        
        $vehicles = Modelo_user::where('user_id', auth()->user()->id)
        ->get();

        $modelosReq = Request::create(url('api/modelos'), 'GET');
        $modelos = json_decode(Route::dispatch($modelosReq)->getContent());

        return view('/my-maintenances/maintenances', compact(['modelos', 'maintenances', 'vehicles']));
    }

    public function newMaintenance(Request $request) {
        $maintenance = new Maintenance;
        $maintenance->user_id = auth()->user()->id;
        $maintenance->modelo_user_id = $request->modelo_user_id;
        $maintenance->next_date_maintenance = $request->next_date_maintenance;
        $maintenance->save();

        return redirect()->back()->with('msg-accomplished', 'Manutenção adicionada com sucesso');

    }

    public function filterMaintenances(Request $request) {

    }

    public function showMaintenance($id) {
        $maintenance = Maintenance::select('maintenances.*', 'maintenances.id as maint_id', 'modelo_users.*', 'modelo_users.id as user_vehicle_id')
        ->where('maintenances.user_id', auth()->user()->id)
        ->join("modelo_users", "maintenances.modelo_user_id", "=","modelo_users.id")
        ->findOrFail($id);
        if (auth()->user()->id === $maintenance->user_id) {
            return $maintenance;
        } else {
            abort(404);
        }
    }

    public function updateMaintenance(Request $request, $id) {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->modelo_user_id = $request->modelo_user_idEdit;
        $maintenance->user_id = auth()->user()->id;
        $maintenance->next_date_maintenance = $request->next_dateEdit;
        $maintenance->save();

        return redirect()->back()->with('msg-accomplished', 'Manutenção atualizada com sucesso');

    }

    public function deleteMaintenance($id) {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->delete();

        return redirect()->back()->with('msg-accomplished', 'Manutenção deletada com sucesso');
    }
}
