<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Resource Routes
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\CarController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get( 'manufacturer', function() { echo 'here';});
Route::resource('manufacturer', ManufacturerController::class);
Route::resource('car', CarController::class);