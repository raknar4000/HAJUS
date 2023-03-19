<?php

use App\Http\Controllers\WeatherController;
use App\Http\Controllers\MapsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/weather', [WeatherController::class, 'index']);

Route::get('/map', [MapsController::class, 'index'])->name("map");
Route::post('/map', [MapsController::class, 'store'])->name('add.marker');
Route::post('/map/marker/{id}', [MapsController::class, 'update'])->name("update.marker");
Route::get('/map/marker/{id}', [MapsController::class, 'show'])->name('edit.marker');
Route::delete('/map/{id}', [MapsController::class, 'delete'])->name('delete.marker');


require __DIR__.'/auth.php';    
