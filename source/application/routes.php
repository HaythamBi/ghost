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

# Views

View::name('layouts.main', 'layout');

# Assets

Asset::add('bootstrap', 'components/bootstrap/css/bootstrap.css');
Asset::container('footer')->bundle('admin')->add('jquery', 'components/jquery/jquery.js');
Asset::container('footer')->bundle('admin')->add('bootstrap-js', 'components/bootstrap/js/bootstrap.js');

# Home

Route::get('/', array('as' => 'home', function()
{
	return View::make('home.index');
}));

Route::get('login', array('as' => 'login', function ()
{
	return View::make('layouts.login')
		->with('content', View::make('login.main'));
}));

Route::get('logout', array('as' => 'logout', function ()
{
	Auth::logout();
	return Redirect::to_route('login');
}));

Route::post('login/do', function ()
{
	$credentials = array(
		'username' => Input::get('email'),
		'password' => Input::get('password')
	);

	if (Auth::attempt($credentials))
	{
		return Redirect::to_route('dashboard');
	}

	return Redirect::to_route('login');
});

# Admin Filter

Route::filter('pattern: admin/*', 'auth');

# Dashboard

Route::get('admin', array('as' => 'dashboard', 'before' => 'auth', function ()
{
	return View::of('layout')->with('content', View::make('dashboard.main'));
}));

# Posts

Route::get('admin/posts', array('as' => 'posts', function ()
{
	return 'posts';
}));

# New Post

Route::get('admin/posts/new', array('as' => 'new post', function ()
{
	return 'new post';
}));

# Edit Post

Route::get('admin/posts/(:num)', function ()
{
	return 'edit post';
});

# Authors

Route::get('admin/authors', array('as' => 'authors', function ()
{
	return 'authors';
}));

# Edit Author

Route::get('admin/authors/(:num)', function ($id)
{
	return 'author ' . $id;
});

# Analytics

Route::get('admin/analytics', array('as' => 'analytics', function ()
{
	return 'analytics';
}));

# Settings

Route::get('admin/settings', array('as' => 'settings', function ()
{
	return 'settings';
}));

# Posts by Tag

Route::get('tag/(:any)', function ($tag)
{
	return 'tagged: ' . $tag;
});

# Posts by Author

Route::get('author/(:any)', function ($id)
{
	return 'author: ' . $id;
});

# Single Post

Route::get('(:any)', function ($slug)
{
	return 'post: ' . $slug;
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
