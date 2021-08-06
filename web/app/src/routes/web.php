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

	Router::get('/contact', 'DefaultController@contact')->setName('contact');

	Router::basic('/companies/{id?}', 'DefaultController@companies')->setName('companies');

    // API

	Router::group(['prefix' => '/api', 'middleware' => ApiVerification::class], function () {
		Router::resource('/demo', 'ApiController');
	});

    // CALLBACK EXAMPLES

    Router::get('/foo', function() {
        return 'foo';
    });

    Router::get('/foo-bar', function() {
        return 'foo-bar';
    });

});