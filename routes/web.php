<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->group(['prefix' => 'banner'], function () use ($router) {
    $router->get('/', "BannerController@index");
    $router->get('/{id}', "BannerController@show");
    $router->post('/input', "BannerController@store");
    $router->put('/update/{id}', "BannerController@update");
    $router->delete('/delete/{id}', "BannerController@destroy");
});

$router->group(['prefix' => 'makanan'], function () use ($router) {
    $router->get('/', "MakananController@index");
    $router->get('/{id}', "MakananController@show");
    $router->post('/input', "MakananController@store");
    $router->put('/update/{id}', "MakananController@update");
    $router->delete('/delete/{id}', "MakananController@destroy");
});
