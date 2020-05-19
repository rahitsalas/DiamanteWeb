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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/temp', 'logintwoController@temp')->name('temp');
Route::get('/temp2', 'logintwoController@temp2')->name('temp2');
Route::post('/temp3', 'logintwoController@temp3')->name('temp3');

Route::get('hash',function (){
    return bcrypt(1);
});


