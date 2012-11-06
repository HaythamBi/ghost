<?php

View::name('admin::layouts.main', 'layout');

Asset::bundle('admin')->add('bootstrap', 'components/bootstrap/css/bootstrap.css');

# Public Routes

Route::get('admin/login', array('as' => 'login', function ()
{
	return View::of('layout')->with('content', View::make('admin::login.main'));
}));

# Private Routes

Route::group(array('before' => 'auth'), function()
{
	# Dashboard

	Route::get('(:bundle)', array('as' => 'dashboard', 'before' => 'auth', function ()
	{
		return 'dashboard';
	}));

	# Posts

	Route::get('(:bundle)/posts', array('as' => 'blog', function ()
	{
		return 'blog';
	}));

	# New Post

	Route::get('(:bundle)/posts/new', function ()
	{
		return 'new post';
	});

	# Edit Post

	Route::get('(:bundle)/posts/(:num)', function ()
	{
		return 'edit post';
	});

	# Authors

	Route::get('(:bundle)/authors', array('as' => 'authors', function ()
	{
		return 'authors';
	}));

	# Edit Author

	Route::get('(:bundle)/authors/(:num)', function ($id)
	{
		return 'author ' . $id;
	});

	# Analytics

	Route::get('(:bundle)/analytics', array('as' => 'analytics', function ()
	{
		return 'analytics';
	}));

	# Settings

	Route::get('(:bundle)/settings', array('as' => 'dashboard', function ()
	{
		return 'settings';
	}));

});
