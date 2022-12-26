<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login\AuthController;
use App\Http\Controllers\login\RegisterController;
use App\Http\Controllers\login\UserController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ModeloUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [UserController::class, 'showLoginView'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'showRegisterView']);
Route::post('/register/user', [RegisterController::class, 'newUser']);
Route::middleware('auth')->group(function() {
    Route::get('/home', [MaintenanceController::class, 'getMaintenancesNextSevenDays']);
    Route::get('/my-vehicles/vehicles', [ModeloUserController::class, 'getAllVehicles']);
    Route::post('/new/vehicle', [ModeloUserController::class, 'newVehicle']);
    Route::get('/vehicle/{id}', [ModeloUserController::class, 'showVehicle']);
    Route::delete('/delete/vehicle/{id}', [ModeloUserController::class, 'deleteVehicle']);
    Route::put('/update/vehicle/{id}', [ModeloUserController::class, 'updateVehicle']);
    Route::get('/maintenance/{id}', [MaintenanceController::class, 'showMaintenance']);
    Route::get('/my-maintenances/maintenances', [MaintenanceController::class, 'getAllMaintenances']);
    Route::post('/new/maintenance', [MaintenanceController::class, 'newMaintenance']);
    Route::put('/update/maintenance/{id}', [MaintenanceController::class, 'updateMaintenance']);
    Route::get('/all-vehicles-user', [ModeloUserController::class, 'getAllVehiclesJson']);
    Route::delete('/delete/maintenance/{id}', [MaintenanceController::class, 'deleteMaintenance']);
});
