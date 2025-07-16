<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\EditoraController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ExemplarController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\MultaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('emprestimos', EmprestimoController::class)->only(['index']);
    Route::resource('reservas', ReservaController::class)->only(['create', 'show', 'store']);
    Route::resource('livros', LivroController::class)->only(['index', 'show']);
    Route::get('minhas-multas', [MultaController::class, 'minhasMultas'])->name('multas.usuarias');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categorias', CategoriaController::class);
    Route::resource('autores', AutorController::class);
    Route::resource('editoras', EditoraController::class);
    Route::resource('livros', LivroController::class)->except(['index', 'show']);
    Route::resource('exemplares', ExemplarController::class);
     Route::resource('reservas', ReservaController::class)->only(['index', 'show']);
    Route::resource('emprestimos', EmprestimoController::class)->except(['index']);
    Route::resource('multas', MultaController::class)->except(['show']);
});

require __DIR__.'/auth.php';
