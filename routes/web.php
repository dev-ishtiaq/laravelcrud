<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
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


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/',[ProductController::class,'index'])->name('products.index');
Route::get('/create_product',[ProductController::class,'create_product'])->name('products.create');
Route::post('/products_store',[ProductController::class,'products_store'])->name('products.store');
Route::get('products/{id}/edit',[ProductController::class,'products_edit'])->name('products.edit');
Route::put('products/{id}/update',[ProductController::class,'products_update'])->name('products.update');
Route::delete('products/{id}/delete',[ProductController::class,'products_delete'])->name('products.delete');
Route::get('products/{id}/show',[ProductController::class,'products_show'])->name('products.show');

require __DIR__.'/auth.php';
