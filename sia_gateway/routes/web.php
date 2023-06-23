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

//no authentication
//$router->group([],function() use ($router){


//with authentication using the middleware
$router->group(['middleware' => 'client.credentials'],function() use ($router){

    //API GATEWAY ROUTES FOR BOOKS USERS
    $router->get('/books',['uses' => 'BooksController@show']); 

    $router->post('/books',['uses' => 'BooksController@add']); 

    $router->get('/books/{id}',['uses' => 'BooksController@find']); 

    $router->put('/books/{id}',['uses' => 'BooksController@update']); 

    $router->delete('/books/{id}',['uses' => 'BooksController@delete']); 


    //API GATEWAY ROUTES FOR AUTHORS USERS
    $router->get('/authors',['uses' => 'AuthorsController@show']); 

    $router->post('/authors',['uses' => 'AuthorsController@add']); 

    $router->get('/authors/{id}',['uses' => 'AuthorsController@find']); 

    $router->put('/authors/{id}',['uses' => 'AuthorsController@update']); 

    $router->delete('/authors/{id}',['uses' => 'AuthorsController@delete']); 

});