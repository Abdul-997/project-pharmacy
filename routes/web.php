<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineCategoryController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StockController;
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
    return view('login');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', function (){
    return view('test');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/medicine/category', [MedicineCategoryController::class, 'index'])->name('medicine.category');
Route::get('/category/create', [MedicineCategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [MedicineCategoryController::class, 'store'])->name('category.store');
Route::get('/category/{category}/edit', [MedicineCategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/update', [MedicineCategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{category}/delete', [MedicineCategoryController::class, 'destroy'])
    ->name('category.destroy');

Route::get('/medicine', [MedicineController::class, 'index'])->name('medicine');
Route::get('/medicine/create', [MedicineController::class, 'create'])->name('medicine.create');
Route::post('/medicine/store', [MedicineController::class, 'store'])->name('medicine.store');
Route::get('/medicine/{medicine}/edit', [MedicineController::class, 'edit'])->name('medicine.edit');
Route::put('/medicine/{medicine}/update', [MedicineController::class, 'update'])->name('medicine.update');
Route::delete('/medicine/{medicine}/destroy', [MedicineController::class, 'destroy'])
    ->name('medicine.destroy');

Route::get('/stock', [StockController::class, 'index'])->name('stock');
Route::get('/stock/create', [StockController::class, 'create'])->name('stock.create');
Route::post('/stock/store', [StockController::class, 'store'])->name('stock.store');
Route::put('/stock/{stock}/activate', [StockController::class, 'activate'])->name('stock.activate');
Route::put('stock/{stock}/deactivate', [StockController::class, 'deactivate'])->name('stock.deactivate');
Route::get('stock/{stock}/edit', [StockController::class, 'edit'])->name('stock.edit');
Route::put('/stock/{stock}/update', [StockController::class, 'update'])->name('stock.update');
Route::delete('/stock/{stock}/destroy', [StockController::class, 'destroy'])->name('stock.destroy');


Route::get('/sale', [SaleController::class, 'index'])->name('sale');
Route::get('/sale/create', [SaleController::class, 'create'])->name('sale.create');
Route::post('/stock/to/cart', [SaleController::class, 'addToCart'])->name('stock.add.cart');
Route::delete('/cart/{cart}/destroy', [SaleController::class,'cartDestroy'])->name('cart.destroy');
Route::post('/sale/to/confirm', [SaleController::class, 'store'])->name('cart.confirm');







