<div class="offcanvas open">
	<div class="offcanvas-wrap">
		<div class="offcanvas-user clearfix">
			<a class="offcanvas-user-account-link" href="<?=$site_url . $alt_lg . substr($_SERVER['REQUEST_URI'],3)?>"><?=$switch_lang?></a>
		</div>
		<nav class="offcanvas-navbar letters-my">
			<ul class="offcanvas-nav">
				<? foreach ( $menu_aut as $key => $val ) : ?>
				<li><a href="<?=$main_url.$lg.'/'.$seo_author[$key].'/biography/'?>"><?=$val?></a></li>
				<? endforeach; ?>							
			</ul>
		</nav>
	</div>
</div>
<div id="wrapper" class="wide-wrap">
	<div class="offcanvas-overlay"></div>
	<header class="header-container header-type-center header-navbar-center header-scroll-resize">
		<div class="navbar-container">
			<div class="navbar navbar-default -navbar-scroll-fixed">
				<div class="navbar-default-wrap">
					<div class="container">
						<div class="row">
							<div class="navbar-default-col">
								<div class="navbar-wrap">
									<div class="navbar-header">
										<div class="navbar-header-left">
											<div class="social">
												<a class="lang_a" href="<?=$site_url . $alt_lg . substr($_SERVER['REQUEST_URI'],3)?>"><?=$switch_lang?></a>
												<br>
												<a href="<?=$main_url.$lg.'/'?>">
													<i class="fa fa-angle-left"></i>&ensp;<span class="to_main"><?=$to_main?></span>
												</a>	
											</div>
										</div>
										<div class="navbar-header-center">
											<button type="button" class="navbar-toggle">
												<span class="sr-only"></span>
												<span class="icon-bar bar-top"></span>
												<span class="icon-bar bar-middle"></span>
												<span class="icon-bar bar-bottom"></span>
											</button>
											<nav class="collapse navbar-collapse primary-navbar-collapse">
												<ul class="nav navbar-nav primary-nav letters-my">
													<? foreach ( $menu_aut as $key => $val ) : ?>
													<li><a href="<?=$main_url.$lg.'/'.$seo_author[$key].'/biography/'?>"><?=$val?></a></li>
													<? endforeach; ?>							
												</ul>
											</nav>
										</div>
										<div class="navbar-header-right">
												<a href="<?=$main_url.$lg.'/'?>"><img class="logo-img-my" src="<?=$main_url?>images/logo_<?=$lg?>.png"></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>