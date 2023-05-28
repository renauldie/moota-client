<?php

use App\Http\Controllers\MootaIntegrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/sync', [MootaIntegrationController::class, 'synchronizeAccount']);
Route::post('/auth', [MootaIntegrationController::class, 'generateToken']);
