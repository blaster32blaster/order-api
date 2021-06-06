<?php

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

Route::resource('technicians', App\Http\Controllers\Api\TechnicianController::class)
    ->only('index');

Route::resource('keys', App\Http\Controllers\Api\KeyController::class)
    ->only('index');

Route::resource('orders', App\Http\Controllers\Api\OrderController::class);;
