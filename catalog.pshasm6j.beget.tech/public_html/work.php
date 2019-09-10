<div class="content-container no-padding container-grey">
	<div class="container-full">
		<div class="main-content">
			<div class="container">
				<div class="row row-fluid mt-2">
					<div class="col-sm-12">
						<div class="row row-fluid">
							<div class="col-sm-12">
								<h3 class="text-center heading-center-my">
									<?=$works_title?>
								</h3>
								
								
								<div class="back-my">
								<a href="<?=$site_url.$lg.'/'?>">
									<i class="fa fa-angle-left"></i>&ensp;<span class="to_main"><?=$return_to_catalog?></span>
								</a>
								</div>
								<div class="posts">
									<div class="posts-wrap posts-layout-center">
										<article class="hentry">
											<div class="hentry-wrap">
												<div class="entry-featured">
													<img  height="800" src="<?=$main_url?>works/fullsize/<?=$work['file']?>" alt="<?=$work['name']?>"/>
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
														<br>
														<p><?=$work['info']?></p>
														
													</div>
												</div>
											</div>
										</article>
									</div>	
								</div>	
								<div class="row row-fluid text-center attention-my">
									<p><?=$contact_work_str1?></p>
									<p id="change_p"><a href="javascript:void(0)" onclick="show_form('<?=$contact_work_str2?>')"><?=$contact_work_str2?></a></p>
								</div>
								
								<? include "inc/contact_form.php"?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

