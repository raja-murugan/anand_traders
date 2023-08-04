<?php

use App\Http\Controllers\BankController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// BANK CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/bank', [BankController::class, 'index'])->name('bank.index');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/bank/store', [BankController::class, 'store'])->name('bank.store');
    // EDIT
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/bank/edit/{unique_key}', [BankController::class, 'edit'])->name('bank.edit');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/bank/delete/{unique_key}', [BankController::class, 'delete'])->name('bank.delete');
});
