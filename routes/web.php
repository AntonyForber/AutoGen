<?php

Route::get('/autogen', '\AntonyForber\AutoGen\Http\Controllers\HomeController@index');
Route::get('/autogen/model', ['uses' => '\AntonyForber\AutoGen\Http\Controllers\HomeController@model', 'as' => 'autogen.model.create']);