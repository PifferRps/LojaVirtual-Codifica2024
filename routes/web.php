<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos/create', function () {
    return view('formulario-produtos');
});

Route::get('/user', function () {
    return view('user._layouts.user');
});

