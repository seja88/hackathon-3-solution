<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\IndexController@index')->name('index');

Route::get('/animal/{id}/{visit_id?}', 'App\Http\Controllers\AnimalController@show')->name('animal.show');

Route::get('/admin/animal/create', 'App\Http\Controllers\Admin\AnimalController@create')->name('animal.create');
Route::post('/admin/animal', 'App\Http\Controllers\Admin\AnimalController@store');
Route::get('/admin/animal/{id}/edit', 'App\Http\Controllers\Admin\AnimalController@edit');
Route::put('/admin/animal/{id}', 'App\Http\Controllers\Admin\AnimalController@update');
Route::delete('/admin/animal/{id}', 'App\Http\Controllers\Admin\AnimalController@delete');

Route::post('/visit/{animal_id}', 'App\Http\Controllers\VisitController@store')->name('visit.store');
Route::put('/visit/{id}', 'App\Http\Controllers\VisitController@update')->name('visit.update');
