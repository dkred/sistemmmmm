<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('usuarios','UserController');

Route::resource('proyectos','ProyectoController');

Route::get('planos/verde', 'PlanoController@plano_verde')->name('verde');
Route::get('planos/amarillo', 'PlanoController@plano_amarillo')->name('amarillo');
Route::get('planos/blanco', 'PlanoController@plano_blanco')->name('blanco');

Route::post('planos/plano', 'PlanoController@post_plano')->name('postplano');
Route::get('formularios/salir','PlanoController@salir')->name('salir');
Route::get('formularios/autor_proyecto', 'PlanoController@autor_proyecto')->name('autor_proyecto');
Route::get('formularios/datos_control', 'PlanoController@datos_control')->name('datos_control');
Route::get('formularios/datos_localizacion_planos', 'PlanoController@datos_localizacion_planos')->name('atos_localizacion_planos');
Route::get('formularios/descripcion', 'PlanoController@descripcion')->name('descripcion');
Route::get('formularios/estado_general_bien', 'PlanoController@estado_general_bien')->name('estado_general_bien');
Route::get('formularios/fotografia', 'PlanoController@fotografia')->name('fotografia');
Route::get('formularios/observaciones', 'PlanoController@observaciones')->name('observaciones');
Route::get('formularios/otros', 'PlanoController@otros')->name('otros');
Route::get('formularios/regimen_propiedad', 'PlanoController@regimen_propiedad')->name('regimen_propiedad');
Route::get('formularios/ubicacion', 'PlanoController@ubicacion')->name('ubicacion');
Route::get('formularios/informacion_tecnica', 'PlanoController@informacion_tecnica')->name('informacion_tecnica');
Route::get('formularios/informacion_tecnica_1', 'PlanoController@informacion_tecnica_1')->name('informacion_tecnica_1');
Route::get('formularios/informacion_tecnica_2', 'PlanoController@informacion_tecnica_2')->name('informacion_tecnica_2');
Route::get('formularios/informacion_tecnica_3', 'PlanoController@informacion_tecnica_3')->name('informacion_tecnica_3');

Route::post('formularios/autor_proyecto', 'PlanoController@postautor_proyecto')->name('postautor_proyecto');
Route::post('formularios/datos_control', 'PlanoController@postdatos_control')->name('postdatos_control');
Route::post('formularios/datos_localizacion_planos', 'PlanoController@postdatos_localizacion_planos')->name('postdatos_localizacion_planos');
Route::post('formularios/descripcion', 'PlanoController@postdescripcion')->name('postdescripcion');
Route::post('formularios/estado_general_bien', 'PlanoController@postestado_general_bien')->name('postestado_general_bien');
Route::post('formularios/fotografia', 'PlanoController@postfotografia')->name('postfotografia');
Route::post('formularios/observaciones', 'PlanoController@postobservaciones')->name('postobservaciones');
Route::post('formularios/otros', 'PlanoController@postotros')->name('postotros');
Route::post('formularios/regimen_propiedad', 'PlanoController@postregimen_propiedad')->name('postregimen_propiedad');
Route::post('formularios/ubicacion', 'PlanoController@postubicacion')->name('postubicacion');
Route::post('formularios/informacion_tecnica', 'PlanoController@postinformacion_tecnica')->name('postinformacion_tecnica');
Route::post('formularios/informacion_tecnica_1', 'PlanoController@postinformacion_tecnica_1')->name('postinformacion_tecnica_1');
Route::post('formularios/informacion_tecnica_2', 'PlanoController@postinformacion_tecnica_2')->name('postinformacion_tecnica_2');
Route::post('formularios/informacion_tecnica_3', 'PlanoController@postinformacion_tecnica_3')->name('postinformacion_tecnica_3');


Route::resource('planos','PlanoController');