<div class="content-container no-padding container-grey">
	<div class="container-full">
		<div class="main-content">
			<div class="container">
				<div class="row row-fluid mt-2">
					<div class="col-sm-12">
						<div data-layout="masonry" data-masonry-column="4" class="commerce products-masonry masonry">										
							<div class="row row-fluid">
								<div class="col-sm-12">
									<h3 class="text-center heading-center-my">
										<?=$works_title?>
									</h3>
									
									<? include "inc/search.php";?>
									
									<div class="post-grid-wrap">
										<ul class="row grid col-4">
											<? while ( $row = mysql_fetch_array($wor) ) : ?>
											<li class="col-md-3 col-sm-6 ">
												<article class="hentry">
													<div class="hentry-wrap">
														<div class="entry-featured text-center div-img-work">
															<a href="<?=$site_url.$lg.'/'.$seo_author[$row['author_id']].'/'.$row['seo']?>" title="<?=$row['name']?>">
																<img style="max-height:274px" src="<?=$main_url?>works/preview/<?=$row['file']?>" alt="<?=$row['name']?>"/>
															</a>
														</div>
														<div class="entry-info">
															<div class="entry-content">
																<p><?=$row['author']?></p>
																<? if ($row['name'] != '') : ?>
																<p><?=$row['name']?></p>
																<? endif; ?>
																<? if ($row['seria'] != '') : ?>
																<p><?=$seria?>: <?=$row['seria']?></p>
																<? endif; ?>
																<p><?=$row['period']?></p>
															</div>
															
														</div>
													</div>
												</article>
											</li>
											<? endwhile; ?>
										</ul>
									</div>
								</div>
							</div>
							
							<? if ( ($cnt['cid'] > $rows4page) and (!isset($_GET['all'])) ) include "inc/pages.php"?>
							<? if ($cnt['cid'] == 0) : ?>
							<div class="row row-fluid text-center ">
								<h4><?=$no_works?></h4>
							</div>
							<? endif; ?>
							
							<div class="row row-fluid text-center attention-my">
								<p><?=$contact_main_str1?></p>
								<p><?=$contact_main_str2?></p>
								<p id="change_p"><a href="javascript:void(0)" onclick="show_form('<?=$contact_main_str3?>')"><?=$contact_main_str3?></a></p>
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
