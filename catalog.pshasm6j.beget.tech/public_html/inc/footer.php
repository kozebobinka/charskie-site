		<footer id="footer" class="footer">
			<div class="footer-widget ">
				<div class="container">
					<div class="footer-widget-wrap">
						<div class="row">
							<div class="footer-widget-col col-md-3 col-sm-6">
								<div class="widget widget_nav_menu">
									<div class="menu-infomation-container">
										<ul class="menu">
											<li><a href="<?=$main_url?>"><?=$to_main?></a></li>
											<? foreach ( $menu_aut as $key => $val ) : ?>
											<li><a href="<?=$main_url.$lg.'/'.$seo_author[$key].'/biography/'?>"><?=$val?></a></li>
											<? endforeach; ?>	
										</ul>
									</div>
								</div>
							</div>
							<div class="footer-widget-col col-md-6 visible-md visible-lg col-sm-6">
							</div>
							<div class="footer-widget-col col-md-3 col-sm-6">
								<div class="widget widget_text">
									<div class="textwidget">
										<ul class="address">
											<li>
												<p><?=$contact1?></p>
												<p><?=$contact2?></p>
												<p><?=$contact3?></p>
											</li>
											<li>
												<p><?=$contact4?></p>
												<p><?=$contact5?></p>
											</li>
											<li>
												<p><?=$contact6?></p>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		
		<script type='text/javascript' src='<?=$site_url?>res/js/jquery.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/jquery-migrate.min.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/jquery.themepunch.tools.min.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/jquery.themepunch.revolution.min.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/easing.min.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/imagesloaded.pkgd.min.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/bootstrap.min.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/superfish-1.7.4.min.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/jquery.appear.min.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/swatches-and-photos.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/jquery.cookie.min.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/jquery.prettyPhoto.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/jquery.prettyPhoto.init.min.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/jquery.selectBox.min.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/jquery.touchSwipe.min.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/jquery.transit.min.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/jquery.carouFredSel.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/jquery.magnific-popup.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/isotope.pkgd.min.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/script.js'></script>
		<script type='text/javascript' src='<?=$site_url?>res/js/my.js?1'></script>
	</body>
</html>																