<?php


$router->group(['middleware' => 'client.credentials'], function () use ($router) {

    $router->get('/clothing', 'ClotheByUserController@index');
    $router->post('/clothing', 'ClotheByUserController@store');
    $router->delete('/clothing/{clothes}', 'ClotheByUserController@destroy');
    $router->put('/clothing/{clothes}', 'ClotheByUserController@update');
    $router->get('/clothing/{clothes}', 'ClotheByUserController@show');
    
    
    $router->get('/categories', 'ClotheCategoryController@index');
    $router->post('/categories', 'ClotheCategoryController@store');
    $router->delete('/categories/{category}', 'ClotheCategoryController@destroy');
    $router->put('/categories/{category}', 'ClotheCategoryController@update');
    $router->get('/categories/{category}', 'ClotheCategoryController@show');
    /**
     * Users routes
     */
    $router->get('/users', 'UserController@index');
    $router->post('/users', 'UserController@store');
    $router->get('/users/{user}', 'UserController@show');
    $router->put('/users/{user}', 'UserController@update');
    $router->delete('/users/{user}', 'UserController@destroy'); 
});


/**
 * Routes protected by user credentials
 */
$router->group(['middleware' => 'auth:api'], function () use ($router) {
    $router->get('/users/me', 'UserController@me');
});