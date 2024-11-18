<?php

use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/produtos/create', function () {
//    return view('formulario-produtos');
//});

Route::resource('/produtos', ProdutosController::class)->names('produtos')->except('show');

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

