<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\OccupantController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\LocationController;


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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/form', [RoomController::class, 'create']);
Route::post('/rooms', [RoomController::class, 'store']);
Route::get('/rooms/{id}', [RoomController::class, 'edit']);
Route::put('/rooms/{id}', [RoomController::class, 'update']);
Route::delete('/rooms/{id}', [RoomController::class, 'delete']);

Route::get('/occupants', [OccupantController::class, 'index']);
Route::get('/occupants/form', [OccupantController::class, 'create']);

Route::get('/placements', [PlacementController::class, 'index']);
Route::get('/placements/form', [PlacementController::class, 'create']);

Route::get('/locations', [LocationController::class, 'index']);
Route::get('/locations/form', [LocationController::class, 'create']);
