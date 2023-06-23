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


//books routers
$router->get('/books',['uses' => 'BooksController@show']); 

$router->post('/books',['uses' => 'BooksController@add']); 

$router->get('/books/{id}',['uses' => 'BooksController@find']); 

$router->put('/books/{id}',['uses' => 'BooksController@update']); 

$router->delete('/books/{id}',['uses' => 'BooksController@delete']); 












// //userjob routers
// $router->get('/usersjob',['uses' => 'UserJobController@showALLUSERSJOB']); //usersjob all

// $router->get('/usersjob/{id}',['uses' => 'UserJobController@showUSERJOB']); //usersjob by ID
