<!DOCTYPE html>
<html class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>{{ $view->get('title', 'Ghost') }}</title>
		<meta name="description" content="{{ $view->get('description', 'Ghost - Just a blogging platform') }}">
		<meta name="viewport" content="width=device-width">
		{{ Asset::bundle('admin')->styles() }}
	</head>
	<body>
	{{ $content }}
	</body>
</html>
