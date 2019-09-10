<? 
	$sql = "SELECT 
				name_$lg AS name, info_$lg AS info, file, seo_$lg AS seo, author
			FROM
				items
			WHERE 
				favorite = 1 AND author = {$par['author']} 
			ORDER BY
				prior DESC";
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
				<? if (strlen($row['file']) > 1) : ?>
				<a href="<?=$site_url.$lg.'/'.$seo_author[$row['author']].'/favorites/'.$row['seo'].'/'?>"><img class="news-pic" src="<?=$site_url?>works/preview/<?=$row['file']?>" alt=""></a>
				<? endif; ?>
			</div>
			<div class="col-md-5 text-left">
				<div class="news-about text-left">
					<h3><?=$row['name']?></h3>
					<p><?=$row['info']?></p>
					<p class="news-link"><a href="<?=$site_url.$lg.'/'.$seo_author[$row['author']].'/favorites/'.$row['seo'].'/'?>"><?=$read_more?></a></p>
				</div>
			</div>
		</div>
		<? endwhile; ?>
	</div>
	<? else : ?>
	<div class="container">
		<div class="row text-center">
		<h2><?=$no_entries?></h2>
		</div>
	</div>
	<? endif; ?>
	</div>
</div>