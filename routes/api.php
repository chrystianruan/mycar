<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\MarkController;
use App\Http\Controllers\api\ModeloController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('marks', MarkController::class);
Route::get('mark-selected/modelos/{id}', [ModeloController::class, 'getModelsForMarkSelected']);
Route::apiResource('modelos', ModeloController::class);
