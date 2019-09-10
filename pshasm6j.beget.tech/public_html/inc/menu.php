<div class="offcanvas open">
	<div class="offcanvas-wrap">
<!--		<div class="offcanvas-user clearfix">-->
<!--			<a class="offcanvas-user-account-link" href="--><?//=$site_url . $alt_lg . substr($_SERVER['REQUEST_URI'],3)?><!--">--><?//=$switch_lang?><!--</a>-->
<!--		</div>-->
		<nav class="offcanvas-navbar letters-my">
			<ul class="offcanvas-nav">
				<li><a href="<?=$site_url.$lg.'/'.$seo_author[$par['author']].'/'.$menu[1]?>" <?=($par['menu']==$menu[1])?'class="m-selected"':''?>><?=$menu1?></a></li>
				<!--<li><a href="<?=$site_url.$lg.'/'.$seo_author[$par['author']].'/'.$menu[2]?>" <?=($par['menu']==$menu[2])?'class="m-selected"':''?>><?=$menu2?></a></li>
				<li><a href="<?=$site_url.$lg.'/'.$seo_author[$par['author']].'/'.$menu[3]?>" <?=($par['menu']==$menu[3])?'class="m-selected"':''?>><?=$menu3?></a></li>
				<li><a href="<?=$site_url.$lg.'/'.$seo_author[$par['author']].'/'.$menu[4]?>" <?=($par['menu']==$menu[4])?'class="m-selected"':''?>><?=$menu4?></a></li>
				<li><a href="<?=$site_url.$lg.'/'.$seo_author[$par['author']].'/'.$menu[5]?>" <?=($par['menu']==$menu[5])?'class="m-selected"':''?>><?=$menu5?></a></li>-->
				<li><a href="<?=$catalog_url.$lg.'/'.$seo_author[$par['author']].'/'?>"><?=$menu6?></a></li>
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
											<div class="menu-offset-l"></div>
<!--												<a class="lang_a" href="--><?//=$site_url . $alt_lg . substr($_SERVER['REQUEST_URI'],3)?><!--">-->
<!--													--><?//=$switch_lang?>
<!--												</a>-->
												<br>
												<a href="<?=$site_url.$lg.'/'?>">
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
                                                <? if (isset($author_name)) : ?>
												<p class="artist-name"><?=$author_name?></p>
                                                <? endif ?>
												<ul class="nav navbar-nav primary-nav letters-my">
                                                    <? if (isset($author_name)) : ?>
                                                    <li><a href="<?=$site_url.$lg.'/'.$seo_author[$par['author']].'/'.$menu[1].'/'?>" <?=($par['menu']==$menu[1])?'class="m-selected"':''?>><?=$menu1?></a></li>
													<!--<li><a href="<?=$site_url.$lg.'/'.$seo_author[$par['author']].'/'.$menu[2].'/'?>" <?=($par['menu']==$menu[2])?'class="m-selected"':''?>><?=$menu2?></a></li>
													<li><a href="<?=$site_url.$lg.'/'.$seo_author[$par['author']].'/'.$menu[3].'/'?>" <?=($par['menu']==$menu[3])?'class="m-selected"':''?>><?=$menu3?></a></li>
													<li><a href="<?=$site_url.$lg.'/'.$seo_author[$par['author']].'/'.$menu[4].'/'?>" <?=($par['menu']==$menu[4])?'class="m-selected"':''?>><?=$menu4?></a></li>
													<li><a href="<?=$site_url.$lg.'/'.$seo_author[$par['author']].'/'.$menu[5].'/'?>" <?=($par['menu']==$menu[5])?'class="m-selected"':''?>><?=$menu5?></a></li>-->
													<li><a href="<?=$catalog_url.$lg.'/'.$seo_author[$par['author']].'/'?>"><?=$menu6?></a></li>
                                                    <? else : ?>
                                                    <li></li>
                                                    <? endif ?>
                                                </ul>
											</nav>
										</div>
										<div class="navbar-header-right">
											<div class="menu-offset-r"></div>
											<div>
												<a href="<?=$site_url.$lg.'/'?>"><img class="logo-img-my" src="<?=$site_url?>images/logo_<?=$lg?>.png"></a>
											</div>	
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