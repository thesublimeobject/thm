			<footer class="footer">

			</footer>
		</div>
		<?php if ( strpos($_SERVER['HTTP_HOST'], 'com') > -1 || strpos($_SERVER['HTTP_HOST'], 'io') > -1 ) { 
			echo '<script src="/bld/app.min.js?' . time() . '"></script>';
		} else {
			echo '<script src="/public/bundle.js"></script>';
		}
		wp_footer(); ?>
	</body>
</html>
