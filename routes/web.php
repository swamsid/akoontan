<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('project/autentikasi/login');
})->name('login');

Route::get('dashboard', function () {
    return view('project/dashboard');
})->name('dashboard');

    // data -> manajemen coa
        Route::get('data/manajemen-coa', function () {
            return view('project/data/coa/index');
        })->name('data.coa');

        Route::get('data/manajemen-coa/tambah', function () {
            return view('project/data/coa/form');
        })->name('data.coa.create');
    // end
