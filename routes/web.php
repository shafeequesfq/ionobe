<?php

use App\Http\Controllers\RentController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('units', UnitController::class)->middleware('auth');
Route::resource('rent', RentController::class)->middleware('auth');

Route::get('payment_list', [RentController::class, 'paymentlist'])->name('payment_list')->middleware('auth');

require __DIR__.'/auth.php';
