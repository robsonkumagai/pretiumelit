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
})->name('/');

Auth::routes();

//Route::get('/', 'PortalController@index')->name('portal');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/buybox', 'HomeController@graficos')->name('buybox');
Route::get('/relatorio', 'HomeController@relatorio')->name('relatorio');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::resource('portal', 'PortalController');

Route::get('portal',
    ['as' => 'portal', 'uses' => 'PortalController@index']);

//Rota que o form de envio de email do home utiliza
Route::post('portal',
    ['as' => 'cadastro_email', 'uses' => 'PortalController@cadastroEmail']);

//Rota que o form de envio de email de suporte utiliza
Route::post('contato',
    ['as' => 'contato_email', 'uses' => 'HomeController@contatoEmail']);

//Route::post('/contatoemail', 'HomeController@contatoEmail');