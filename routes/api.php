<?php

use App\Http\Controllers\LivroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('livros', [LivroController::class, 'index']);
Route::post('livro', [LivroController::class, 'create']);
Route::get('livro/{id}', [LivroController::class, 'show']);
Route::put('livro/{id}', [LivroController::class, 'edit']);
Route::delete('livro/{id}', [LivroController::class, 'delete']);