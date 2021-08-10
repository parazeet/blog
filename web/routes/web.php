<?php
/**
 * This file contains all the routes for the project
 */

use App\Router;
use App\Middlewares\CsrfVerifier;
use App\Middlewares\ApiVerification;
use App\Handlers\CustomExceptionHandler;

Router::csrfVerifier(new CsrfVerifier());

Router::setDefaultNamespace('\App\Controllers');

Router::group(['exceptionHandler' => CustomExceptionHandler::class], function () {

	Router::get('/', 'HomeController@index')->setName('home');

    Router::get('/show/{id?}', 'HomeController@show')->setName('show');

    Router::get('/postsList', 'HomeController@postsList')->setName('postsList');

	Router::get('/login', 'AuthController@index')->setName('login');

    Router::post('/login', 'AuthController@loginPost')->setName('loginPost');

    Router::get('/register', 'AuthController@register')->setName('register');

    Router::post('/registerStore', 'AuthController@registerStore')->setName('registerStore');

	Router::get('/logout', 'AuthController@logout')->setName('logout');

    // API

	Router::group(['middleware' => ApiVerification::class], function () {
		Router::get('/admin', 'AdminController@index')->setName('myPosts');
        Router::get('/create', 'AdminController@create')->setName('createPost');
	});
});