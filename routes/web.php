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
Route::middleware('auth.basic')->group(function(){

    Route::get('/', function () {
        return redirect()->route('record.index');
    });

    Auth::routes();

    Route::get('record/search','RecordsController@search')->name('record.search');
    Route::resource('record','RecordsController')->middleware('auth');
});
