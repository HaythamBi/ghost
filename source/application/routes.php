<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

# Home

Route::get('/', array('as' => 'home', function()
{
	return View::make('home.index');
}));

# Login

Route::get('login', array('as' => 'login', function ()
{
	return 'login';
}));

# Admin Filter

Route::filter('pattern: admin/*', 'auth');

# Dashboard

Route::get('admin', array('as' => 'dashboard', 'before' => 'auth', function ()
{
	return 'dashboard';
}));

# Blog

Route::get('admin/blog', array('as' => 'blog', function ()
{
	return 'blog';
}));

Route::get('admin/blog/new', function ()
{
	return 'new post';
});

Route::get('admin/blog/(:num)', function ()
{
	return 'edit post';
});

# Authors

Route::get('admin/authors', array('as' => 'authors', function ()
{
	return 'authors';
}));

# Analytics

Route::get('admin/analytics', array('as' => 'analytics', function ()
{
	return 'analytics';
}));

# Settings

Route::get('admin/settings', array('as' => 'dashboard', function ()
{
	return 'settings';
}));

# Individual Posts

Route::get('(:any)', function ($slug)
{
	return $slug;
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});
