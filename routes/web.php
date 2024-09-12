<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;

Route::get('/', [LivroController::class, 'index'])->name('livros.index');
Route::get('/livro/create', [LivroController::class, 'create'])->name('livros.create');
Route::post('/livro', [LivroController::class, 'store'])->name('livros.store');
Route::get('/livro/{livro}/edit', [livroController::class, 'edit'])->name('livros.edit');
Route::put('/livro/{livro}/update', [LivroController::class, 'update'])->name('livros.update');
Route::delete('/livro/{livro}/delete', [LivroController::class, 'delete'])->name('livros.delete');
