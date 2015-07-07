			<footer class="footer">

			</footer>
		</div>
		<script>
		function loadCSS(a,b,c,d){"use strict";var e=window.document.createElement("link"),f=b||window.document.getElementsByTagName("script")[0],g=window.document.styleSheets;return e.rel="stylesheet",e.href=a,e.media="only x",d&&(e.onload=d),f.parentNode.insertBefore(e,f),e.onloadcssdefined=function(b){for(var c,d=0;d<g.length;d++)g[d].href&&g[d].href.indexOf(a)>-1&&(c=!0);c?b():setTimeout(function(){e.onloadcssdefined(b)})},e.onloadcssdefined(function(){e.media=c||"all"}),e}
		var today = new Date().getTime();
		var filename = window.location.hostname.indexOf('localhost') ? "screen.css" : "screen.min.css";
		loadCSS( "//" + window.location.hostname + ( location.port ? ":" + location.port : "" ) + "/cnt/themes/" + dirname + "/bld/" + filename + '?v=' + today );
		</script>
		<?php wp_footer(); ?>
	</body>
</html>
