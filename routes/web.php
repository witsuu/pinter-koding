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

Route::get('/','UserController@index')->name('home');
Route::post('subscribe','UserController@newsLetter')->name('subscribe');
Route::get('tutorial','UserController@tutorial')->name('tutorial');
Route::get('materi/{id}','UserController@materi')->name('materi');

Route::get('admin', function(){
    return redirect()->route('admin.dashboard');
})->name('admin');


Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    Route::get('dashboard','BlogController@index')->name("dashboard");

    Route::get('login','Auth\LoginController@index')->name('login');
    Route::post('login/verify','Auth\LoginController@authenticate')->name('logged');
    Route::get('bye/logout','Auth\LoginController@logout')->name('logout');
    
    Route::get('artikel/new','BlogController@newArtikel')->name('new-artikel');
    Route::post('artikel/new/saved','BlogController@savedNew')->name('save-artikel');
    Route::get('artikel/edit/{id}','BlogController@editArtikel')->name('edit-artikel');
    Route::post('artikel/save-edit/{id}','BlogController@saveEdit')->name('save-edit-artikel');

    Route::get('kategori','KategoriController@index')->name('kategori');
    Route::get('kategori/new','KategoriController@new')->name('new-kategori');
    Route::post('kategori/new/saved','KategoriController@store')->name('saved-kategori');
    Route::get('kategori/deleted/{id}','KategoriController@delete')->name('delete-kategori');

    Route::get('komentar','KomentarController@index')->name('komentar');
    Route::get('komentar/delete/{id}','KomentarController@delete')->name('delete-komentar');
});