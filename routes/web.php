<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');

});


Route::get('/user', function () {
    return view('user');
})->name('user');

Route::get('/tax', function () {
    return view('tax');
})->name('tax');

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');



Route::get('/reg', function () {
    return view('registration');
})->name('registration');

Route::get('/logout', function () {
    return view('logout');
})->name('logout');

Route::get('/layout', function () {
    return view('layout');
})->name('layout');
