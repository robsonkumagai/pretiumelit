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

/*Route::get('/', function () {
    return view('index');
});*/


Route::get('/', function () {
    return view('index');
});

Auth::routes();

//Route::get('/', 'PortalController@index')->name('portal');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/buybox', 'HomeController@graficos')->name('buybox');
Route::get('/relatorio', 'HomeController@relatorio')->name('relatorio');
Route::resource('portal', 'PortalController');

Route::get('portal',
    ['as' => 'portal', 'uses' => 'PortalController@index']);

Route::post('portal',
    ['as' => 'portal_store', 'uses' => 'PortalController@store']);