<?php
;

use App\Http\Controllers\MootaIntegrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('account', App\Http\Controllers\AccountNumberController::class);

    Route::resource('mutation', App\Http\Controllers\MutationController::class);
});
