<?php

HTML::macro('nav_item', function($title) {
	$link = HTML::link_to_route($title, $title, array(), array('title' => $title, 'class' => 'uppercase'));
	if (Request::route()->is($title))
	{
		return "<li class='active'>$link</li>";
	}
	elseif(URI::is(Str::slug($title) . '/*'))
	{
		# the first uri segment matches a slug based on the route title
		# strictly speaking we aren't on this page, we're in a 'child' route
		return '<li class="active">' . $link . '</li>';
	}
	else
	{
		return "<li>$link</li>";
	}
});

HTML::macro('data', function($key, $value)
{
    return "<script>var $key = " . json_encode($value) . ";</script>";
});

HTML::macro('disqus', function ($shortname) {
	return '<div id="disqus_thread"></div>
	<script type="text/javascript">
	var disqus_shortname = "' . $shortname . '";
	(function() {
	var dsq = document.createElement("script"); dsq.type = "text/javascript"; dsq.async = true;
	dsq.src = "http://" + disqus_shortname + ".disqus.com/embed.js";
	(document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(dsq);
	})();
	</script>
	<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>';
});

function increment_string($str, $separator = '_', $first = 1)
{
	preg_match('/(.+)'.$separator.'([0-9]+)$/', $str, $match);
	return isset($match[2]) ? $match[1].$separator.($match[2] + 1) : $str.$separator.$first;
}
