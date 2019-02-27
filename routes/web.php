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



Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/getImages', 'WelcomeController@getImages')->name('getImages');
Route::get('/logout', 'Auth\LoginController@logout', function () {
    return abort(404);
})->name('log_out');


Route::get('/admin', function () {
    return view('admin.index');
})->middleware('admin');





Auth::routes();

Route::get('/images', 'ImagesController@index')->name('images');
Route::get('/settings', 'SettingsController@settings')->name('settings');
Route::post('/settings-store', 'SettingsController@store')->name('settingsStore');



Route::get('/delete-image/{id}','ImagesController@deleteImage')->name('imageDelete')->middleware('admin');
Route::get('/all-images','ImagesController@allImages')->name('allImages')->middleware('admin');



Route::get('/home', function () { return view('admin.index');})->name('home');



