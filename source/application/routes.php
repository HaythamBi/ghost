<?php

# Views

View::name('layouts.main', 'layout');

# Assets

Asset::add('bootstrap', 'components/bootstrap/css/bootstrap.css');
Asset::add('stylez', 'css/app/main.css');

Asset::container('footer')->add('require', 'components/require/require.js', null, array('data-main' => URL::to_asset('js/app/main.js')));

# Home

Route::get('/', array('as' => 'Home', function()
{
	return View::make('home.index');
}));

Route::get('login', array('as' => 'Login', function ()
{
	$view = new \Laravel\Fluent(array(
		'title' => 'Ghost - Login'
	));
	return View::make('layouts.login')
		->with('view', $view)
		->with('content', View::make('login.main'));
}));

Route::get('logout', array('as' => 'Logout', function ()
{
	Auth::logout();
	return Redirect::to_route('Login');
}));

Route::post('login/do', function ()
{
	$credentials = array(
		'username' => Input::get('email'),
		'password' => Input::get('password')
	);

	if (Auth::attempt($credentials))
	{
		return Redirect::to_route('Dashboard');
	}

	return Redirect::to_route('Login');
});

# Admin Filter

Route::filter('pattern: admin/*', 'auth');

# Dashboard

Route::get('admin', array('as' => 'Dashboard', 'before' => 'auth', function ()
{
	$view = new \Laravel\Fluent(array(
		'title' => 'Ghost - Dashboard'
	));
	return View::of('layout')
		->with('view', $view)
		->with('content', View::make('dashboard.main'));
}));

# Posts

Route::get('admin/posts', array('as' => 'Posts', function ()
{
	$view = new \Laravel\Fluent(array(
		'title' => 'Ghost - Blog'
	));
	return View::of('layout')
		->with('view', $view)
		->with('content', View::make('posts.main'));
}));

# New Post

Route::get('admin/posts/new', array('as' => 'New Post', function ()
{
	$post = Post::create();
	return Redirect::to('admin/posts/' . $post->id);
}));

# Edit Post

Route::get('admin/posts/(:num)', function ($id)
{
	$post = Post::find($id);

	$view = new \Laravel\Fluent(array(
		'title' => 'Ghost - ' . $post->title
	));

	return View::of('layout')
		->with('view', $view)
		->with('content', View::make('post.edit')->with('post', $post));
});

# Authors

Route::get('admin/authors', array('as' => 'Authors', function ()
{
	$view = new \Laravel\Fluent(array(
		'title' => 'Ghost - Authors'
	));
	return View::of('layout')
		->with('view', $view)
		->with('content', View::make('authors.main'));
}));

# Edit Author

Route::get('admin/authors/(:num)', function ($id)
{
	return 'author ' . $id;
});

# Analytics

Route::get('admin/analytics', array('as' => 'Analytics', function ()
{
	$view = new \Laravel\Fluent(array(
		'title' => 'Ghost - Analytics'
	));
	return View::of('layout')
		->with('view', $view)
		->with('content', 'Analytics');
}));

# Settings

Route::get('admin/settings', array('as' => 'Settings', function ()
{
	$view = new \Laravel\Fluent(array(
		'title' => 'Ghost - Settings'
	));
	return View::of('layout')
		->with('view', $view)
		->with('content', View::make('settings.main'));
}));

# Posts by Tag

Route::get('tag/(:any)', function ($tag)
{
	return 'tagged: ' . $tag;
});

# Posts by Author

Route::get('author/(:any)', function ($id)
{
	$view = new \Laravel\Fluent(array(
		'title' => 'Ghost - Author'
	));
	return View::of('layout')
		->with('view', $view)
		->with('content', View::make('author.main'));
});

# Single Post

Route::get('(:any)', function ($slug)
{
	$post = Post::where_slug($slug)->first()->to_array();

	dd($post);
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
