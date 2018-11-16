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
Route::group(['middleware'=> 'auth', 'namespace'=> 'RendelCar'], function(){
    //--------------------------------------------------------------------------------------------
    //LOCAÇÃO DE CARROS
    //--------------------------------------------------------------------------------------------
    //============================================================================================
    //busca dados do Cliente  e do carro 
    Route::get('RendelCar/location-create', 'LocationController@create')->name('RendelCar.location-create');
    Route::post('RendelCar/location-search', 'LocationController@search')->name('RendelCar.location-search');
    //============================================================================================
    //vai abri formulário de locação
    Route::post('RendelCar/location-effect', 'LocationController@getEffect')->name('RendelCar.location-effect');
    //vai lista os contratos de locação
    Route::get('RendelCar/location-list', 'LocationController@getList')->name('RendelCar.location-list');
    //===========================================================================================
    //vai fecha o contrado
    Route::get('RendelCar/Close-Contract/{id}', 'LocationController@closeContract')->name('RendelCar.Close-Contract');
    Route::post('RendelCar/Terminate-Contract/{id}', 'LocationController@terminateContract')->name('RendelCar.Terminate-Contract');
    // vai ver informação da locação 
    Route::get('RendelCar/show-Contract/{id}', 'LocationController@showContract')->name('RendelCar.Show-Contract');
    //rota que vai leva para oficina
    Route::get('RendelCar/Car-Workshop/{id}', 'CarController@workShop')->name('RendelCar.Car-Workshop');
    
    
    //--------------------------------------------------------------------------------------------
    //CARROS
    
    //rota para lista os carros
    Route::get('RendelCar/Car-list', 'CarController@index')->name('RendelCar.Car-list');
    //rota para ver informações dos carros
    Route::get('RendelCar/car-show/{id}', 'CarController@show')->name('RendelCar.car-show');
    //rota para abri fomulário CARROS
    Route::get('RendelCar/Car-create', 'CarController@create')->name('RendelCar.Car-create');
    Route::post('RendelCar/Car-store', 'CarController@store')->name('RendelCar.Car-store');

     //rota para atualiza dados do carros
     Route::get('RendelCar/car-edit/{id}', 'CarController@edit')->name('RendelCar.car-edit');
     //rota para salvar update 
     Route::post('RendelCar/car-update/{id}', 'CarController@update')->name('RendelCar.car-update');
//========================================================================================================
// lista carro que esta na oficina
Route::get('RendelCar/workshop-list', 'WorkShopController@index')->name('RendelCar.workshop-list');
//rota que vai por o carro na oficina.
    Route::get('RendelCar/car-workshop/{id}', 'WorkShopController@create')->name('RendelCar.car-workshop');
    Route::post('RendelCar/workshop-create', 'WorkShopController@store')->name('RendelCar.workshop-create');
    //rota que vai da baixa nos carros que estao na  oficina 
    Route::get('RendelCar/workshop-available/{id}', 'WorkShopController@available')->name('RendelCar.workshop-available');
    //rota que vai vizualizar o problema do carro que está na oficina
    Route::get('RendelCar/workshop-show/{id}', 'WorkShopController@show')->name('RendelCar.workshop-show');


//====================================================================================================
//--------------------------------------------------------------------------------------------------
//CLIENTES
    
    
    //rota para lista registros do clientes
    Route::get('RendelCar/index', 'ClientController@index')->name('RendelCar.clientes');
    
    //rota para atualiza dados do cliente
    Route::get('RendelCar/edit/{id}', 'ClientController@edit')->name('RendelCar.edit');
    //rota para salvar update 
    Route::post('RendelCar/update/{id}', 'ClientController@update')->name('RendelCar.update');
    //rota da visualizar cliente
    
     Route::get('RendelCar/show/{id}', 'ClientController@show')->name('RendelCar.show');

    //rota para cadastra clientes
    Route::get('RendelCar/create', 'ClientController@create')->name('RendelCar.create');
    Route::post('RendelCar/store', 'ClientController@store')->name('RendelCar.store');
    
//====================================================================================================
//--------------------------------------------------------------------------------------------------
//Perfil
//--------------------------------------------------------------------------------------------------
//rota da lista perfil
Route::get('RandelCar/perfil-lista', 'ProfileController@index')->name('RandelCar.perfil-lista');
//rota de salvar perfil
Route::get('RandelCar/perfil-create', 'ProfileController@create')->name('RandelCar.perfil-create');
Route::post('RandelCar/perfil-strore', 'ProfileController@store')->name('RandelCar.perfil-store');
//rota do show perfil
Route::get('RandelCar/perfil-show/{id}', 'ProfileController@create')->name('RandelCar.perfil-show');
//rota de lista usuário com perfil
Route::get('RandelCar/usuario-perfil/{id}', 'ProfileController@listUsers')->name('RandelCar.usuario-perfil');
//Rota para cadastra usuario ao perfil
Route::get('RandelCar/perfil/{id}/usuario/cadastra', 'ProfileController@createUserProfile')->name('RandelCar.perfil.usuario.cadastra');
//Rota para salvar usuario com perfil
Route::post('RandelCar/perfil/{id}/usuario/strore', 'ProfileController@storeUserProfile')->name('RandelCar.perfil.usuario.strore');
//ROTA que vai apaga reslacionamento de usuario com o perfil
Route::get('RandelCar/perfil/{id}/usuario/{userId}', 'ProfileController@delete')->name('RandelCar.perfil.usuario.delete');

/*
*
========================================================================================================= |
    PERMISSÃO
========================================================================================================= |

*
*/
//ROTA PARA PERMISSÃO 
//ROTA QUE VAI LISTA AS PERMISSÃO
Route::get('RandelCar/permissoes/lista', 'PermissionController@index')->name('RandelCar.permissoes.lista');

//ROTA QUE VAI CRIAR AS PERMISSÕES
Route::get('RandelCar/permissoes/create', 'PermissionController@create')->name('RandelCar.permissoes.create');
Route::post('RandelCar/permissoes/store', 'PermissionController@store')->name('RandelCar.permissoes.store');
//LISTA PERMISSOES QUE POSSUI UM PERFIL CADASTRO NELA
Route::get('RandelCar/permissoes/{id}/perfil', 'PermissionController@listaPerfil')->name('RandelCar.permissoes.perfil');
//ROTA QUE VAI VINCULAR A PEMISSÃO AO PERFIL
Route::get('RandelCar/permissoes/{id}/perfil/create', 'PermissionController@createBond')->name('RandelCar.permissoes.perfil.create');
Route::post('RandelCar/permissoes/{id}/perfil/strore', 'PermissionController@storeBond')->name('RandelCar.permissoes.perfil.strore');
//ROTA PARA APAGAR O VINCULO DE PERMISSOES COM PERFIL
Route::get('RandelCar/permissoes/{id}/perfil/{cod}/delete', 'PermissionController@delete')->name('RandelCar.permissoes.perfil.delete');


/*
========================================================================================================= |
    PERMISSÃO
========================================================================================================= |

*/
//ROTA DE LISTA OS USUÁRIO
Route::get('RandelCar/usuario/lista', 'UserController@index')->name('RandelCar.usuario.lista');

//ROTA PARA ABRI O FORMULARIO PARA CADASTRO DE USUÁRIIO
Route::get('RandelCar/create/usuario', 'UserController@create')->name('RandelCar.create.usuario');
Route::post('RandelCar/store/usuario', 'UserController@store')->name('RandelCar.store.usuario');


});
//Chama a view de aprecentação do sistema.
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/RendelCar', 'HomeController@index')->name('home');
