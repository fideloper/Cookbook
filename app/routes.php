<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'ContentController@home');

Route::group(array('prefix' => 'admin'), function()
{
	Route::resource('articles', 'AdminController');
});

/*
	Similar to Routes, the order these are added is important.
	Last in, First out, so go from least to most specific when
	 defining error handlers.

	These error handlers are in routes as they return responses
	to the requester.
*/

// Other Exceptions
App::error(function(\Exception $e) {

	if( Config::get('app.debug') === true )
	{
		return null;
	}

	return View::make('error');

});

// 404
App::error(function(\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {

	if( Config::get('app.debug') === true )
	{
		return null;
	}

	return View::make('404');

});