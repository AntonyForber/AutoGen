<?php

Route::get('/autogen', '\AntonyForber\AutoGen\Http\Controllers\HomeController@index');

Route::get('/autogen/model', ['uses' => '\AntonyForber\AutoGen\Http\Controllers\ModelController@create', 'as' => 'autogen.model.create']);
Route::post('/autogen/model', ['uses' => '\AntonyForber\AutoGen\Http\Controllers\ModelController@create', 'as' => 'autogen.model.create']);

Route::get('/autogen/module', ['uses' => '\AntonyForber\AutoGen\Http\Controllers\ModuleController@create', 'as' => 'autogen.module.create']);
Route::post('/autogen/module', ['uses' => '\AntonyForber\AutoGen\Http\Controllers\ModuleController@create', 'as' => 'autogen.module.create']);

Route::get('/autogen/crud', ['uses' => '\AntonyForber\AutoGen\Http\Controllers\CrudController@create', 'as' => 'autogen.crud.create']);
Route::post('/autogen/crud', ['uses' => '\AntonyForber\AutoGen\Http\Controllers\CrudController@create', 'as' => 'autogen.crud.create']);

Route::get('/autogen/widget', ['uses' => '\AntonyForber\AutoGen\Http\Controllers\HomeController@widget', 'as' => 'autogen.widget.create']);