<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\FetchController;
use App\Http\Controllers\UpdateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RedirectController::class, 'redirectToHomepage']);

Route::get('/dashboard', [RedirectController::class, 'redirectToDashboard']);

Route::get('/trackers', [RedirectController::class, 'redirectToTrackers']);

Route::get('/boats', [RedirectController::class, 'redirectToBoats']);

Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/register/owner', [RegisterController::class, 'registerOwner']);

Route::post('/register/boat', [RegisterController::class, 'registerBoat']);

Route::post('/register/account', [RegisterController::class, 'registerAccount']);

Route::post('/register/tracker', [RegisterController::class, 'registerTracker']);

Route::post('/delete/tracker', [DeleteController::class, 'deleteTracker']);

Route::post('/delete/boat', [DeleteController::class, 'deleteBoat']);

Route::get('/get/tracker', [FetchController::class, 'getTracker']);

Route::get('/get/boat', [FetchController::class, 'getBoat']);

Route::post('/update/tracker', [UpdateController::class, 'updateTracker']);

Route::post('/update/boat', [UpdateController::class, 'updateBoat']);
