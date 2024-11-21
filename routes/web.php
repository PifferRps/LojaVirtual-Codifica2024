<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function () {
    Route::resource('produtos', ProdutosController::class)->names('produtos')->except('show');
});

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login/auth', [LoginController::class, 'auth'])->name('login.auth');

Route::get('/user', function () {
    return view('user._layouts.user');
});

Route::get('/cadastro', function() {
    return view('user.auth.cadastro');
})->name('user.auth.cadastro');

Route::get('/admin', function () {
    return view('admin.pages.index');
});

Route::get('/admin/categorias', function () {
    return view('admin.pages.categorias');
});

Route::get('/api', [\App\Http\Controllers\CepController::class, 'get'])->name('api.get');
Route::post('/api/resultado', [\App\Http\Controllers\CepController::class, 'post'])->name('api.post');
