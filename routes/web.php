<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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


Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    
    Route::get('/register', function () {
        return view('auth.register');
    });
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/rooms/search', [RoomController::class, 'search']);
    Route::get('/occupants/search', [OccupantController::class, 'search']);
    Route::get('/placements/search', [PlacementController::class, 'search']);
    Route::get('/locations/search', [LocationController::class, 'search']);
    Route::resources([
        'rooms' => RoomController::class,
        'occupants' => OccupantController::class,
        'placements' => PlacementController::class,
        'locations' => LocationController::class
    ]);
    Route::post('/rooms/{id}/placements', [RoomController::class, 'store_placement']);
    Route::put('/placements/{id}/checkout', [PlacementController::class, 'checkout']);
});

