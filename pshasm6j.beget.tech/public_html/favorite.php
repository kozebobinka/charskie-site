<div class="content-container no-padding container-grey">
	<div class="container-full">
		<div class="main-content">
			<div class="container">
				<div class="row row-fluid mt-2">
					<div class="col-sm-2">
					</div>
					<div class="col-sm-8">
					<div class="page-breadcrumb">
						<ul class="breadcrumb">
							<li>
								<span>
									<a href="<?=$site_url.$lg.'/'.$seo_author[$par['author']].'/'.$par['menu'].'/'?>"><?=$menu3?></a>
								</span>
							</li>
							<li>
								<span><?=$work['name']?></span>
							</li>
						</ul>
					</div>
					<div class="row row-fluid">
							<div class="col-sm-12">
								
								<h2 class="art-header">
									<?=$work['name']?>
								</h2>
								
								<p class="art-text"><?=$work['info']?></p>
														
														
								<div class="posts">
									<div class="posts-wrap posts-layout-center">
										<article class="hentry">
											<div class="hentry-wrap">
												<div class="entry-featured">
													<img  height="800" src="<?=$site_url?>works/fullsize/<?=$work['file']?>" alt="<?=$work['name']?>"/>
												</div>
												<div class="entry-info">
													<div class="entry-content entry-content-my text-left">
														<p><?=$work['author']?></p>
														<? if ($work['name'] != '') : ?>
														<p><?=$work['name']?></p>
														<? endif; ?>
														<? if ($work['seria'] != '') : ?>
														<p><?=$seria?>: <?=$work['seria']?></p>
														<? endif; ?>
														<? if ($work['period'] != '') : ?>
														<p><?=$work['period']?></p>
														<? endif; ?>
														<? if ($work['genre2'] != '') : ?>
														<p><?=$work['seria']?></p>
														<? endif; ?>
														<? if ($tech != '') : ?>
														<p><?=ucfirst($tech)?></p>
														<? endif; ?>
														<? if ( ($work['sizex'] != '') and ($work['sizey'] != '') ) : ?>
														<p><?=$work['sizex']?>x<?=$work['sizey']?><?=$work_sm?></p>
														<? endif; ?>
														<br>
														<p>ID: <?=cool_index($work['id'],$work['author_id'])?></p>
														<br>
														
													</div>
												</div>
											</div>
										</article>
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
</div>

