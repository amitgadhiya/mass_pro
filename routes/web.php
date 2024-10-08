<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');

});


Route::get('/user', function () {
    return view('user');
});



Route::get('/reg', function () {
    return view('registration');
});

