<?php

Route::get('/autogen', '\AntonyForber\AutoGen\Http\Controllers\HomeController@index');

Route::get('/autogen/model',  ['uses' => '\AntonyForber\AutoGen\Http\Controllers\HomeController@model',  'as' => 'autogen.model.create']);
Route::get('/autogen/crud',   ['uses' => '\AntonyForber\AutoGen\Http\Controllers\HomeController@crud',   'as' => 'autogen.crud.create']);
Route::get('/autogen/module', ['uses' => '\AntonyForber\AutoGen\Http\Controllers\HomeController@module', 'as' => 'autogen.module.create']);
Route::get('/autogen/widget', ['uses' => '\AntonyForber\AutoGen\Http\Controllers\HomeController@widget', 'as' => 'autogen.widget.create']);