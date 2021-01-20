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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api', 'middleware' => 'autenticador'], function () use ($router) {
    $router->group(['prefix' => 'series'], function () use ($router) {
        $router->post('/', [
            'uses' => 'SerieController@store',
            'as' => 'series.store'
        ]);
        $router->get('/', [
            'uses' => 'SerieController@index',
            'as' => 'series.index'
        ]);
        $router->get('/{id}', [
            'uses' => 'SerieController@show',
            'as' => 'series.show'
        ]);
        $router->put('/{id}', [
            'uses' => 'SerieController@update',
            'as' => 'series.update'
        ]);
        $router->delete('/{id}', [
            'uses' => 'SerieController@destroy',
            'as' => 'series.destroy'
        ]);
        $router->get('/{id}/episodios', [
            'uses' => 'SerieController@todosEpisodios',
            'as' => 'series.todosEpisodios'
        ]);
    });

    $router->group(['prefix' => 'episodios'], function () use ($router) {
        $router->post('/', [
            'uses' => 'EpisodioController@store',
            'as' => 'episodios.store'
        ]);
        $router->get('/', [
            'uses' => 'EpisodioController@index',
            'as' => 'episodios.index'
        ]);
        $router->get('/{id}', [
            'uses' => 'EpisodioController@show',
            'as' => 'episodios.show'
        ]);
        $router->put('/{id}', [
            'uses' => 'EpisodioController@update',
            'as' => 'episodios.update'
        ]);
        $router->delete('/{id}', [
            'uses' => 'EpisodioController@destroy',
            'as' => 'episodios.destroy'
        ]);
    });
});

$router->post('/api/login', 'TokenController@gerarToken');
