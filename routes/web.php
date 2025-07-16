<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\EditoraController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ExemplarController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\MultaController;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (autenticado e verificado)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas para usuários autenticados
Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Livros (somente visualização)
    Route::resource('livros', LivroController::class)->only(['index', 'show']);

    // Empréstimos (somente index do usuário)
    Route::resource('emprestimos', EmprestimoController::class)->only(['index']);

    // Reservas (usuário pode criar e visualizar sua própria)
    Route::resource('reservas', ReservaController::class)->only(['create', 'store', 'show']);

    // Multas do usuário
    Route::get('minhas-multas', [MultaController::class, 'minhasMultas'])->name('multas.usuarias');
});

// Rotas exclusivas para administradores
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categorias', CategoriaController::class);
    Route::resource('autores', AutorController::class);
    Route::resource('editoras', EditoraController::class);
    Route::resource('livros', LivroController::class)->except(['index', 'show']);
    Route::resource('exemplares', ExemplarController::class);

    // Reservas (admin pode listar todas e ver detalhes)
    Route::resource('reservas', ReservaController::class)->only(['index', 'edit', 'update', 'destroy']);

    Route::resource('emprestimos', EmprestimoController::class)->except(['index']);
    Route::resource('multas', MultaController::class)->except(['show']);
});

// Autenticação
require __DIR__.'/auth.php';
