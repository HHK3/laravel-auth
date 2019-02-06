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

Auth::routes();


Route::middleware(['auth'])->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/admin/user-list', 'UserListController@showList')
        ->name('admin.profile_list')->middleware('is.admin');

    Route::get('/change-password', 'ProfileController@showPasswordForm')
        ->name('change');

    Route::put('/change-password', 'ProfileController@updatePassword')
        ->name('change.confirm');
});

