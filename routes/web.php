<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/registro', function () {
    return view('register');
});

Route::get('/control-panel', function () {
    return view('mainPage');
});
