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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return redirect(route('home'));
});

//
//Route::get('/','HomeController@index');

Auth::routes();

//Auth::route(register= falso);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/comercial', 'ComercialController@comercial')->name('getcomercial');
Route::post('/comercial','ComercialController@comercial')->name('postcomercial');

//Route::get('/temp', 'logintwoController@temp')->name('temp');
//Route::get('/temp2', 'logintwoController@temp2')->name('temp2');
//Route::post('/temp3', 'logintwoController@temp3')->name('temp3');

//Route::get('hash',function (){
//    return bcrypt(1);
//});



Route::prefix('backoffice/vendedor')->group(function (){
    Route::get('/deposito','SellerController@deposit')->name('sdeposit');
    Route::get('/pago','SellerController@payment')->name('spayment');
    Route::get('/planes','SellerController@plans')->name('splans');

    Route::post('updateprofile','SellerController@updateprofile')->name('updateS');
    Route::post('updatepass','SellerController@updatepass')->name('updatepassS');
    Route::post('updatewallet','SellerController@updatewallet')->name('updateWS');
    Route::get('/perfil','SellerController@profile')->name('sprofile');

});
