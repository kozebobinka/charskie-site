<? 
	$sql = "SELECT 
				id, date_add, file, about, name_$lg AS name, short_text_$lg AS short_text, text_$lg AS text,  seo_$lg AS seo, type
			FROM
				articles
			WHERE 
				type='{$par['menu']}' AND about = {$par['author']} AND name_$lg <> ''
			ORDER BY
				date_add DESC, prior DESC";
	$res = mysql_query($sql);

?>

<div class="content-container no-padding container-grey">	
	<? if ( mysql_num_rows($res) > 0 ) : ?>
	<div class="container-full">
		<? while ( $row = mysql_fetch_array($res, MYSQL_ASSOC) ) : ?>
		<div class="row row-fluid news-block">
			<div class="col-md-1 col-lg-2 visible-md visible-lg">
			</div>
			<div class="col-md-4 col-lg-3 text-right">
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
				</div>
			</div>
		</div>
	</div>
	<? endwhile; ?>
	<? else : ?>
	<div class="container">
		<div class="row text-center">
		<h2><?=$no_entries?></h2>
		</div>
	</div>
	<? endif; ?>
	</div>
</div>