<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

    // Clients
    Route::post('/clients-filter',  [ClientController::class, 'index'])->name('client-filter');
    Route::get('/client/{id}',      [ClientController::class, 'show']);
    Route::post('/clients',         [ClientController::class, 'store'])->name('store-client');
    Route::put('/clients/{id}',     [ClientController::class, 'update'])->name('update-client');
    Route::delete('/clients/{id}',  [ClientController::class, 'delete'])->name('delete-client');
    Route::put('/clients-active',   [ClientController::class, 'active'])->name('active-client');
    Route::put('/clients-unactive', [ClientController::class, 'unactive'])->name('unactive-client');
    Route::get('/clients-dropdown', [ClientController::class, 'getDropdown']);

    
