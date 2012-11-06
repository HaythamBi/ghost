<?php

HTML::macro('nav_item', function($title) {
	$link = HTML::link_to_route($title, $title, array(), array('title' => $title, 'class' => 'uppercase'));
	if (Request::route()->is($title))
		return "<li class='active'>$link</li>";
	else
		return "<li>$link</li>";
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
