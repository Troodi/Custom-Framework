<?php

use App\Router\Route;

/**
 * Routes
 */
Route::get('/', 'IndexController@index');
Route::post('/remove', 'IndexController@remove');
Route::post('/create', 'IndexController@create');
Route::post('/edit', 'IndexController@edit');