<?php

use App\Http\Controllers\AmountController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\TownshipController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);

Route::apiResources([
    'amounts' => AmountController::class,
    'transferhistories' => HistoryController::class,
    'accountnumbers' => NumberController::class,
    'phones' => PhoneController::class,
    'roles' => RoleController::class,
    'states' => StateController::class,
    'townships' => TownshipController::class,
]);