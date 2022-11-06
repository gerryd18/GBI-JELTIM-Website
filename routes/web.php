<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/



Route::get('/information/all', 'App\Http\Controllers\PageController@allInfo')->name('getAllInformation');

Route::group(['middleware'=>'RoleAdmin'], function(){
    Route::get('/category', 'App\Http\Controllers\CategoryController@index')->name('categoryPage');
    Route::post('/category', 'App\Http\Controllers\CategoryController@store')->name('storeCategory');
    Route::delete('/category{id}', 'App\Http\Controllers\CategoryController@destroy')->name('deleteCategory');
    Route::get('/category{id}', 'App\Http\Controllers\CategoryController@edit')->name('editCategory');
    Route::put('/category{id}', 'App\Http\Controllers\CategoryController@update')->name('updateCategory');
});

Route::get('/information','App\Http\Controllers\InformationController@index');  
Route::post('/information','App\Http\Controllers\InformationController@store')->name('storeInformation');  
Route::delete('/information{id}','App\Http\Controllers\InformationController@destroy')->name('deleteInformation');
Route::put('/information{id}', 'App\Http\Controllers\InformationController@update')->name('updateInformation');  
Route::get('/information{id}','App\Http\Controllers\InformationController@edit')->name('editInformation');
// Route::get('/information','App\Http\Controllers\InformationController@search')->name('searchInformation');



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', 'App\Http\Controllers\PageController@index')->name('home');
Route::get('/home', 'App\Http\Controllers\PageController@index')->name('home');
Route::get('/hubungiKami', 'App\Http\Controllers\PageController@contact')->name('hubungiKami');

// Search Information
Route::post('information/search','App\Http\Controllers\InformationController@searchInformation')->name('searchInfo');