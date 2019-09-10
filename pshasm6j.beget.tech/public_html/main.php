<? 
	$sql = "SELECT 
				id, date_add, file, about, name_$lg AS name, short_text_$lg AS short_text, text_$lg AS text, seo_$lg AS seo, type
			FROM
				articles
			WHERE
				 name_$lg <> ''
			ORDER BY
				date_add DESC, prior DESC
			LIMIT 3";
	$res = mysql_query($sql);
?>
<div class="content-container no-padding">	
	<div class="container-full">
		<div class="row row-fluid first-bg">
			<div class="col-sm-12">
<!--				<div class="lang-block">-->
<!--					<p><a href="--><?//=$site_url.$alt_lg.'/'?><!--">--><?//=$switch_lang?><!--</a></p>-->
<!--				</div>-->
				<div class="main-links">
					<p><a href="<?=$site_url.$lg.'/'.$seo_author[3].'/biography/'?>"><img class="logo-img-white" src="<?=$hname?>images/logo-white_<?=$lg?>.png"></a>
					</p>
					<p><a id="ir" href="#evgeniy"><?=$evgeniy?> <nobr>(1919-1993)</nobr></a></p>
					<p><a href="#irina"><?=$irina?> <nobr>(1923-2015)</nobr></a></p>
					<p><small><?=$artists?></small></p>
				</div>
			</div>
		</div>
	</div>
	<div class="container-full">
		<div class="row row-fluid second-bg">
			<div class="shadow-bg">
				<div class="col-sm-12">
					<div class="main-links main-links-2">
						<p><?=$family_str1?></p>
						<p><?=$family_str2?></p>
						<p><?=$family_str3?></p>
						<p><a href="<?=$site_url.$lg.'/'.$seo_author[3].'/biography/'?>"><?=$read_more?></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-full" id="irina">
		<div class="row row-fluid irina-bg">
			<div class="col-md-1 col-lg-2 visible-md visible-lg">
			</div>
			<div class="col-md-5 text-left">
				<div class="short-about">
					<img class="big-name" src="<?=$site_url?>images/irina_<?=$lg?>.png" alt="<?=$irina?>">
					<p><?=$bio_irina?></p>
					<p><a href="<?=$site_url.$lg.'/'.$seo_author[2].'/biography/'?>"><?=$read_more?></a></p>
				</div>
			</div>
			<div class="col-md-4 col-lg-3 text-right">
				<img class="big-pic" src="<?=$site_url?>images/irina_pic.jpg" alt="<?=$irina?>">
			</div>
		</div>
	</div>
	<div class="container-full" id="evgeniy">
		<div class="row row-fluid evgeniy-bg">
			<div class="col-md-1 col-lg-2 visible-md visible-lg">
			</div>
			<div class="col-md-4 col-lg-3">
				<img class="big-pic" src="<?=$site_url?>images/evgeniy_pic.jpg" alt="<?=$evgeniy?>">
			</div>
			<div class="col-md-5 text-right">
				<div class="short-about short-about-2 text-right">
					<img class="big-name" src="<?=$site_url?>images/evgeniy_<?=$lg?>.png" alt="<?=$evgeniy?>">
					<div class="text-right">
					<p><?=$bio_evgeniy?></p>
					<p><a href="<?=$site_url.$lg.'/'.$seo_author[1].'/biography/'?>"><?=$read_more?></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-full">
		<? while ( $row = mysql_fetch_array($res, MYSQL_ASSOC) ) : ?>
		<div class="row row-fluid news-block">
			<div class="col-md-1 col-lg-2 visible-md visible-lg">
			</div>
			<div class="col-md-4 col-lg-3 text-right" style="padding-top:5px">
				<img class="news-pic" src="<?=$site_url?>images/articles/preview/<?=$row['file']?>" alt="">
			</div>
			<div class="col-md-5 text-left">
				<div class="news-about text-left">
					<p class="news-date"><?=date("d.m.Y", strtotime($row['date_add']))?></p>
					<h3><?=$row['name']?></h3>
					<p><?=$row['short_text']?></p>
					<? if ( $row['text'] != '' ) : ?>
					<p class="news-link"><a href="<?=$site_url.$lg.'/'.$seo_author[$row['about']].'/'.$row['type'].'/'.$row['seo'].'/'?>"><?=$art_link1[$row['type']][$row['about']]?></a></p>
					<? endif; ?>
					<p class="news-link"><a href="<?=$site_url.$lg.'/'.$seo_author[$row['about']].'/'.$row['type'].'/'?>"><?=$art_link2[$row['type']][$row['about']]?></a></p>
				</div>
			</div>
		</div>
		<? endwhile; ?>
	</div>
</div>

<? include "footer.php"; ?>