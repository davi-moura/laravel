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

Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato'); 

Route::get('/login', function(){return 'Login';})->name('site.login'); 



Route::prefix('/app')->group(function(){
    Route::get('/clientes',     function(){return 'clientes';})->name('site.clientes'); 
    Route::get('/fornecedores', 'FornecedorController@index')->name('site.fornecedores'); 
    Route::get('/produtos',     function(){return 'produtos';})->name('site.produtos'); 
});



// Route::get('/rota1', function(){
//     echo "rota 1";
// })->name('site.rota1');
//TIPOS DE REDIRECT, caso acessar tal pagina, da pra fazer redirect para outra pagina
// Route::get('/rota2', function(){
//     return redirect()->route('site.rota1');
// })->name('site.rota2');

// Route::redirect('rota2', 'rota1');


Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');







//ROTA FALLBACK, se o usuario tentar acessar uma pagina q n existe ele faz isso aquia abxio, isso é fallback
 //pra n retornar um erro, mas sim uma mensagem customizada
Route::fallback(function(){
     echo 'A rota acessada nao existe, <a href="'.route('site.index').'">cleqie aqui</a> pra ir para a pagina inicial.';
 });