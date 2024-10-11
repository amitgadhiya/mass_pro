<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');

});


Route::get('/user', function () {
    return view('user');
});
Route::get('/user-list', function () {
    return view('pages.user.list');
})->name('user');
Route::get('/user-add', function () {
    return view('pages.user.add');
})->name('user-add');
Route::get('/user-edit', function () {
    return view('pages.user.edit');
})->name('user-edit');


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


