<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest');

Route::get('/', function () {
    return view('pages.index');
})->middleware('auth');

Route::group(['middleware' => 'auth'], function() {
    Route::resources([
        'rooms' => RoomController::class,
        'occupants' => OccupantController::class,
        'placements' => PlacementController::class,
        'locations' => LocationController::class
    ]);
});
