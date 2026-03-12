<?php

use App\Http\Controllers\BonusController;
use App\Http\Controllers\PaymentsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('introduction');
});

  Route::resource('payments', PaymentsController::class);
// Route::get('/pagos', [PaymentsController::class, 'index'])->name('payments');
// Route::get('/pagos/crear', [PaymentsController::class, 'create'])->name('payments-create');
// 
 
Route::get('punto-extra', [BonusController::class, 'index'])->name('extra-point');