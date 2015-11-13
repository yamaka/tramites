<?php
/*

|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('prueba',function(){
    return "hola desde route prueba";
});
Route::get('nombre/{nombre}',function($nombre){
        return "mi nombre es ".$nombre;
    });
Route::resource('controller','pruebaController');
Route::get('/',['as'=>'home', function () {
    return view('welcome');
}]);

Route::resource('users','userController');
//Route::resource('entidad','EntidadPublicaController');
Route::resource('tramite','TramiteController',['only'=>['index','store','show','create']]);
Route::get('requisito/create',[
    'as'=>'requisito.create',
    'middleware'=>['auth','admin'],
    'uses'=>'RequisitoController@create'
]);

Route::resource('requisito','RequisitoController',['only'=>['index','show']]);

Route::post('requisito.store','RequisitoController@store');

Route::get('tramite/create',[
    'as'=>'tramite.create',
    'middleware' => ['auth','admin'],
    'uses'=>'TramiteController@create'
]);
Route::get('admin',[
    'as'=>'admin.index',
    'middleware' => ['auth','admin'],
    'uses' => 'AdminController@index'
]);
