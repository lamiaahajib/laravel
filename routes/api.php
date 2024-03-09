<?php

use App\Http\Controllers\AvisPassageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DemandeSpecialeController;
use App\Http\Controllers\ReclamationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
    // Routes pour Reclamations
    Route::apiResource('reclamations', ReclamationController::class);

    // Routes pour Demandes Spéciales
    Route::apiResource('demande-speciales', DemandeSpecialeController::class);

    // Routes pour Clients
    Route::apiResource('clients', ClientController::class);

    // Routes pour Avis de Passage
    Route::apiResource('avis-passages', AvisPassageController::class);
