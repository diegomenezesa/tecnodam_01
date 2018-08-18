<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Painel', 'prefix' => 'painel'], function(){
    Route::get('/', 'PainelController@index');
    Route::get('cliente', 'ClienteController@index');
    Route::post('cadastrar', 'ClienteController@cadastrar')->name('cadastrar.cliente');

});

Route::get('/', 'Site\SiteController@index');


Auth::routes();
