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

Route::get('/', function () {
    return view('login');
});
Route::get('registro', function () {
    return view('register');
});
Route::get('bienvenida', function () {
    return view('bienvenida');
});
Route::get('adminrutas', function () {
    return view('cruds.rutas');
});
Route::get('adminmonedas', function () {
    return view('cruds.monedas');
});
Route::get('adminpaises', function () {
    return view('cruds.paises');
});
Route::get('adminregiones', function () {
    return view('cruds.regiones');
});
Route::get('admintipo_usuarios', function () {
    return view('cruds.tipo_usuarios');
});
Route::get('visita', function () {
    return view('cruds.visitas');
});
Route::get('error', function () {
    return view('usuarionoencontrado');
});


Route::apiResource('rutascontrol','ApiRutasController');
Route::apiResource('municipioscontrol','ApiMunicipiosController');
Route::apiResource('paisescontrol','ApiPaisesController');
Route::apiResource('regionescontrol','ApiRegionesController');
Route::apiResource('monedascontrol','ApiMonedasController');
Route::apiResource('tipousuarioscontrol','ApiTipo_UsuariosController');
Route::apiResource('usuarioscontrol','ApiUsuariosController');
Route::apiResource('sitioscontrol','ApiSitiosController');
Route::apiResource('registroVisita','ApiRegistroVisitasController');

Route::get('validar','AccesoController@validar'); 
Route::get('salir','AccesoController@salir');
Route::get('getEstados/{id}',
    ['as'=>'getEstados',
    'uses'=>'ApiPaisesController@getEstados',]);
Route::get('getMunicipios/{id}',
    ['as'=>'getMunicipios',
    'uses'=>'ApiMunicipiosController@getMunicipios',]);
Route::get('getSitios/{id}',
    ['as'=>'getSitios',
    'uses'=>'ApiSitiosController@getSitios',]);