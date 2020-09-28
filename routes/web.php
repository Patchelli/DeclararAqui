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
    return view('index');
});

Route::post('/dados', 'site\SiteController@formCliente')->name('form-cliente');
Route::post('/anos', 'site\SiteController@salvarCliente')->name('salvar-cliente');

Route::post('/declaracao', 'site\SiteController@salvarAnos')->name('salvar-cliente');

Route::post('/salvardeclaracao', 'site\SiteController@salvarDeclaracao')->name('salvar-declaracao');
Route::get('/finalizar/{id_cliente}', 'site\SiteController@finalizar')->name('finalizar-declaracao');
Route::get('/cartaoaprovado', 'site\SiteController@cartaoaprovado')->name('cartaoaprovado');

Route::post('/finalizado', 'site\SiteController@finalizadoDeclaracao')->name('finaliza-declaracao');
Route::get('/valor', 'site\SiteController@valorDeclaracao')->name('valor-declaracao');
Route::post('/pagamento', 'site\SiteController@pagamentoDeclaracao')->name('pagamento-declaracao');
Route::post('/pagsegurotokenid', 'site\SiteController@pagsegurotokenid')->name('pagamento-tokenid');
Route::post('/pagamentocartao', 'site\SiteController@pagamentocartao')->name('pagamento-cartao');

Route::post('/pagseguro', 'site\SiteController@pagseguro')->name('pagseguro');
Route::post('/pagseguroboleto', 'site\SiteController@pagseguroboleto')->name('pagseguroboleto');
Route::get('/finalizateste', 'site\SiteController@finalizateste')->name('finalizateste');

Route::get('/testealair', 'site\SiteController@teste')->name('teste');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});