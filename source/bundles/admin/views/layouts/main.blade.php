<!DOCTYPE html>
<html class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		{{ Asset::bundle('admin')->styles() }}
	</head>
	<body>
	@render('admin::navbar.main')
	{{ $content }}
	</body>
</html>
