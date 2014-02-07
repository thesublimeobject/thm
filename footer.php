			<footer class="footer">
				<div class="fix-wrap">
					<div class="footer-inner">
						<div class="ftr-logos">
							<div class="ftr-logo-ctn">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ftr-logo-nav.png" alt="Navigate">
							</div>
							<div class="ftr-logo-ctn">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ftr-logo-jfcs.png" alt="JFCS">
							</div>
						</div>
						<div class="ftr-contact">
							<h5 class="ftr-heading">Sponsors</h5>
							<ul>
								<li class="each-ftr-contact address-ic">42821 Klempner Way<br>Lousville, KY 40205</li>
								<li class="each-ftr-contact phone-ic">502.452.6341</li>
								<li class="each-ftr-contact email-ic"><a href="#">email@domain.com</a></li>
								<li class="each-ftr-contact url-ic"><a href="#">www.example-site.com</a></li>
							</ul>
						</div>
						<div class="ftr-sponsors">
							<h5 class="ftr-heading">Sponsors</h5>
							<ul class="ftr-list">
								<li>United Way</li>
								<li>Logo 2</li>
								<li>KFDA</li>
							</ul>
						</div>
						<div class="ftr-connect">
							<h5 class="ftr-heading">Stay Connected</h5>
							<div class="ftr-newsletter">
								<p>Enter your email address here to receive our newsletter and updates:</p>
								<form action="#" method="#" class="email-sub-form">
									<input class="email-input" name="email" autocomplete="off"/>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="ftr-btm">
					<div class="fix-wrap">
						<div class="ftr-btm-inner">
							<p class="copyright">Copyright &copy;2014 by Jewish Family & Career Services</p>
							<?php get_template_part( 'social-media' ); ?>
						</div>
					</div>
				</div>
			</footer>
			<? wp_footer(); ?>
		</div>
	</body>
</html>