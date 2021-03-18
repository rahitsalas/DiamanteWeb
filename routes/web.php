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

Route::get('/administracion', 'AdministracionController@administracion')->name('getadministracion');
Route::post('/administracion','AdministracionController@administracion')->name('postadministracion');

//Route::get('/temp', 'logintwoController@temp')->name('temp');
//Route::get('/temp2', 'logintwoController@temp2')->name('temp2');
//Route::post('/temp3', 'logintwoController@temp3')->name('temp3');

//Route::get('hash',function (){
//    return bcrypt(1);
//});


Route::prefix('/administracion')->group(function (){
    Route::get('/almacen','AdministracionController@almacen')->name('getadministracionalmacen');
    Route::get('/contabilidad','AdministracionController@contabilidad')->name('getadministracioncontabilidad');
    Route::get('/compras','AdministracionController@compras')->name('getadministracioncompras');
    Route::get('/creditos','AdministracionController@creditos')->name('getadministracioncreditos');
    Route::get('/finanzas','AdministracionController@finanzas')->name('getadministracionfinanzas');
    Route::get('/tesoreria','AdministracionController@tesoreria')->name('getadministraciontesoreria');
    Route::get('/rrhh','AdministracionController@rrhh')->name('getadministracionrrhh');

});

Route::prefix('/comercial')->group(function (){
    Route::get('/ventas','ComercialController@ventas')->name('getcomercialventas');
    Route::get('/marketing','ComercialController@marketing')->name('getcomercialmarketing');
    Route::get('/postventa','ComercialController@postventa')->name('getcomercialpostventa');
});


Route::prefix('backoffice/vendedor')->group(function (){
    Route::get('/deposito','SellerController@deposit')->name('sdeposit');
    Route::get('/pago','SellerController@payment')->name('spayment');
    Route::get('/planes','SellerController@plans')->name('splans');

    Route::post('updateprofile','SellerController@updateprofile')->name('updateS');
    Route::post('updatepass','SellerController@updatepass')->name('updatepassS');
    Route::post('updatewallet','SellerController@updatewallet')->name('updateWS');
    Route::get('/perfil','SellerController@profile')->name('sprofile');

});
