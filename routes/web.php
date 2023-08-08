<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddonController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\QuotationController;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // DASHBOARD
    Route::middleware(['auth:sanctum', 'verified'])->get('/home', [HomeController::class, 'index'])->name('home');
});




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



// PRODUCT CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/product', [ProductController::class, 'index'])->name('product.index');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/product/store', [ProductController::class, 'store'])->name('product.store');
    // EDIT
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/product/edit/{unique_key}', [ProductController::class, 'edit'])->name('product.edit');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/product/delete/{unique_key}', [ProductController::class, 'delete'])->name('product.delete');
});



// ADDON CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/addon', [AddonController::class, 'index'])->name('addon.index');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/addon/store', [AddonController::class, 'store'])->name('addon.store');
    // EDIT
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/addon/edit/{unique_key}', [AddonController::class, 'edit'])->name('addon.edit');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/addon/delete/{unique_key}', [AddonController::class, 'delete'])->name('addon.delete');
});



// CUSTOMER CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/customer', [CustomerController::class, 'index'])->name('customer.index');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/customer/store', [CustomerController::class, 'store'])->name('customer.store');
    // EDIT
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/customer/edit/{unique_key}', [CustomerController::class, 'edit'])->name('customer.edit');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/customer/delete/{unique_key}', [CustomerController::class, 'delete'])->name('customer.delete');
    // CHECK DUPLICATE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/customer/checkduplicate', [CustomerController::class, 'checkduplicate'])->name('customer.checkduplicate');
});


// VENDOR CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/vendor', [VendorController::class, 'index'])->name('vendor.index');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/vendor/store', [VendorController::class, 'store'])->name('vendor.store');
    // EDIT
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/vendor/edit/{unique_key}', [VendorController::class, 'edit'])->name('vendor.edit');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/vendor/delete/{unique_key}', [VendorController::class, 'delete'])->name('vendor.delete');
    // CHECK DUPLICATE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/vendor/checkduplicate', [VendorController::class, 'checkduplicate'])->name('vendor.checkduplicate');
});



// QUOTATION CONTROLLER
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // INDEX
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/quotation', [QuotationController::class, 'index'])->name('quotation.index');
    // CREATE
    Route::middleware(['auth:sanctum', 'verified'])->get('/zworktech-anandtraders/quotation/create', [QuotationController::class, 'create'])->name('quotation.create');
    // STORE
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/quotation/store', [QuotationController::class, 'store'])->name('quotation.store');
    // EDIT
    Route::middleware(['auth:sanctum', 'verified'])->post('/zworktech-anandtraders/quotation/edit/{unique_key}', [QuotationController::class, 'edit'])->name('quotation.edit');
    // DELETE
    Route::middleware(['auth:sanctum', 'verified'])->put('/zworktech-anandtraders/quotation/delete/{unique_key}', [QuotationController::class, 'delete'])->name('quotation.delete');
});





Route::get('getProducts/', [ProductController::class, 'getProducts']);
