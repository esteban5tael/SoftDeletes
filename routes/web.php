<?php

use App\Http\Controllers\_SiteController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Importando los controladores y la clase Route necesarios

Route::get('/', [_SiteController::class, 'index'])->name('index');
// Ruta GET para la URL raíz que apunta al método 'index' del controlador '_SiteController' y se le asigna el nombre 'index'

Route::middleware('auth')->group(function () {
    // Grupo de rutas bajo el middleware 'auth'
    Route::get('admin/customers/restore_all/', [CustomerController::class, 'restore_all'])->name('admin.customers.restore_all');
    // Ruta GET para 'admin/customers/restore_all/' que apunta al método 'restore_all' del controlador 'CustomerController' y se le asigna el nombre 'admin.customers.restore_all'
    Route::resource('admin/customers', CustomerController::class)->names('admin.customers');
    // Rutas RESTful para la gestión de clientes en el subdirectorio 'admin/customers' con el nombre base 'admin.customers'
    Route::get('admin/customers/restore/{id}', [CustomerController::class, 'restore'])->name('admin.customers.restore');
    // Ruta GET para restaurar clientes específicos usando el método 'restore' del controlador 'CustomerController' con el nombre 'admin.customers.restore'
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Ruta GET para '/dashboard' que devuelve la vista 'dashboard' con middleware 'auth' y 'verified' y se le asigna el nombre 'dashboard'

Route::middleware('auth')->group(function () {
    // Grupo de rutas bajo el middleware 'auth'
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Ruta GET para '/profile' que apunta al método 'edit' del controlador 'ProfileController' con el nombre 'profile.edit'
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Ruta PATCH para '/profile' que apunta al método 'update' del controlador 'ProfileController' con el nombre 'profile.update'
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Ruta DELETE para '/profile' que apunta al método 'destroy' del controlador 'ProfileController' con el nombre 'profile.destroy'
});

require __DIR__ . '/auth.php';
// Inclusión de las rutas de autenticación desde el archivo 'auth.php'
