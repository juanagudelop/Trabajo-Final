<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [ProductoController::class,'index'])->name('home');
Route::post('/home/add', [ProductoController::class,'createProducto'])->name('add_product');
Route::get('/home/show/{id}', [ProductoController::class,'showProducto'])->name('mostrar_producto');
Route::put('/home/edit/{id}', [ProductoController::class,'updateProducto'])->name('editar_producto');
Route::get('/home/delete/{id}', [ProductoController::class,'deleteProducto'])->name('eliminar_producto');


Route::get('/proveedor', [ProveedorController::class , 'index'])->name('proveedor');
Route::post('/proveedor/add', [ProveedorController::class,'createProveedor'])->name('add_proveedor');
Route::get('/proveedor/show/{id}', [ProveedorController::class,'showProveedor'])->name('mostrar_proveedor');
Route::put('/proveedor/edit/{id}', [ProveedorController::class,'updateProveedor'])->name('editar_proveedor');
Route::get('/proveedor/delete/{id}', [ProveedorController::class,'deleteProveedor'])->name('eliminar_proveedor');


Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria');
Route::post('/categoria/add', [CategoriaController::class,'createCategory'])->name('add_categoria');
Route::get('/categoria/show/{id}', [CategoriaController::class,'showCategory'])->name('mostrar_categoria');
Route::put('/categoria/edit/{id}', [CategoriaController::class,'setCategory'])->name('editar_categoria');
Route::get('/categoria/delete/{id}', [CategoriaController::class,'deleteCategory'])->name('eliminar_categoria');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
