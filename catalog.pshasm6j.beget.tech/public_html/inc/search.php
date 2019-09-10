<?
	$sql = "SELECT DISTINCT CONCAT('a_', authors.id) AS id, authors.name_$lg as name
		 	FROM `authors` JOIN `items`
			ON (`authors`.`id` = `items`.`author`) AND (authors.name_$lg <> '')
			ORDER BY authors.id";
	$aut = @mysql_query($sql);
	$filters['a'] = 'author';
	
	$sql = "SELECT DISTINCT CONCAT('b_', types.id) AS id, types.name_$lg as name
		 	FROM `types` JOIN `items`
			ON (`types`.`id` = `items`.`type`) AND (types.name_$lg <> '')";
	$typ = @mysql_query($sql);
	$filters['b'] = 'type';
	
	$sql = "SELECT DISTINCT CONCAT('c_', genres.id) AS id, genres.name_$lg as name
		 	FROM `genres` JOIN `items`
			ON (`genres`.`id` = `items`.`genre`) AND (genres.name_$lg <> '')";
	$gen = @mysql_query($sql);
	$filters['c'] = 'genre';
	
	$sql = "SELECT CONCAT('d_', id) AS id, name_$lg as name 
		 	FROM techs
			WHERE techs.name_$lg <> ''
			ORDER BY name";
	$tec = @mysql_query($sql);
	$filters['d'] = 'tech';
	
	$sql = "SELECT DISTINCT CONCAT('e_', periods.id) AS id, periods.name_$lg as name
		 	FROM `periods` JOIN `items`
			ON (`periods`.`id` = `items`.`period`) AND (periods.name_$lg <> '')
			ORDER BY name";
	$per = @mysql_query($sql);
	$filters['e'] = 'period';
	
	$sql = "SELECT DISTINCT CONCAT('f_', series.id) AS id, series.name_$lg as name
		 	FROM `series` JOIN `items`
			ON (`series`.`id` = `items`.`seria`) AND (series.name_$lg <> '')
			ORDER BY name";
	$ser = @mysql_query($sql);
	$filters['f'] = 'seria';
	
	$selected_items = array();
?>

<style>
.navbar-nav ul:before {
    position: absolute;
    top: -10px;
    left: 20px;
    width: 0;
    height: 0;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 10px solid #fff;
}
.filters_name {
	font-family: "FuturaPT-Demi";
}
.filters_div {
	margin-top:5px;
}

.clear-my:hover {
  color: #CDCCCC !important;
  background-color: white !important;
}
</style>
<div class="widget widget_tag_cloud text-center">
	
	<div class="masonry-filter">
		<div class="filter-action filter-action-center">
				<ul class="nav navbar-nav primary-nav">
					<li>
						<a href="javascript:void(0)" ><?=$author?> <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu">
							<? while ( $row = mysql_fetch_array($aut,MYSQL_ASSOC) ) : ?>
							<li><a href="javascript:void(0)" onclick="check_search('<?=$row['id']?>')"><i id="<?=$row['id']?>" class="fa <?=(isset($_in[$row['id']])) ? 'fa-check-square' : 'fa-square-o'?>"></i>&ensp;<?=$row['name']?></a></li>
							<?
								if (isset($_in[$row['id']])) {
									$selected_items[$row['id']] = $row['name'];
								}
							?>
							<? endwhile; ?>
						</ul>
					</li>
					
					<li>
						<a href='javascript:void(0)'><?=$type?> <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu">
							<? while ( $row = mysql_fetch_array($typ,MYSQL_ASSOC) ) : ?>
							<li><a href="javascript:void(0)" onclick="check_search('<?=$row['id']?>')"><i id="<?=$row['id']?>" class="fa <?=(isset($_in[$row['id']])) ? 'fa-check-square' : 'fa-square-o'?>"></i>&ensp;<?=$row['name']?></a></li>
							<?
								if (isset($_in[$row['id']])) {
									$selected_items[$row['id']] = $row['name'];
								}
							?>
							<? endwhile; ?>
						</ul>
					</li>
					
					<li>
						<a href='javascript:void(0)'><?=$genre?> <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu">
							<? while ( $row = mysql_fetch_array($gen,MYSQL_ASSOC) ) : ?>
							<li><a href="javascript:void(0)" onclick="check_search('<?=$row['id']?>')"><i id="<?=$row['id']?>" class="fa <?=(isset($_in[$row['id']])) ? 'fa-check-square' : 'fa-square-o'?>"></i>&ensp;<?=$row['name']?></a></li>
							<?
								if (isset($_in[$row['id']])) {
									$selected_items[$row['id']] = $row['name'];
								}
							?>
							<? endwhile; ?>
						</ul>
					</li>
					
					<li>
						<a href='javascript:void(0)'><?=$tech?> <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu">
							<? while ( $row = mysql_fetch_array($tec,MYSQL_ASSOC) ) : ?>
							<li><a href="javascript:void(0)" onclick="check_search('<?=$row['id']?>')"><i id="<?=$row['id']?>" class="fa <?=(isset($_in[$row['id']])) ? 'fa-check-square' : 'fa-square-o'?>"></i>&ensp;<?=$row['name']?></a></li>
							<?
								if (isset($_in[$row['id']])) {
									$selected_items[$row['id']] = $row['name'];
								}
							?>
							<? endwhile; ?>
						</ul>
					</li>
					
					<li>
						<a href='javascript:void(0)'><?=$period?> <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu">
							<? while ( $row = mysql_fetch_array($per,MYSQL_ASSOC) ) : ?>
							<li><a href="javascript:void(0)" onclick="check_search('<?=$row['id']?>')"><i id="<?=$row['id']?>" class="fa <?=(isset($_in[$row['id']])) ? 'fa-check-square' : 'fa-square-o'?>"></i>&ensp;<?=$row['name']?></a></li>
							<?
								if (isset($_in[$row['id']])) {
									$selected_items[$row['id']] = $row['name'];
								}
							?>
							<? endwhile; ?>
						</ul>
					</li>
					
					<li>
						<a href='javascript:void(0)'><?=$seria?> <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu">
							<? while ( $row = mysql_fetch_array($ser,MYSQL_ASSOC) ) : ?>
							<li><a href="javascript:void(0)" onclick="check_search('<?=$row['id']?>')"><i id="<?=$row['id']?>" class="fa <?=(isset($_in[$row['id']])) ? 'fa-check-square' : 'fa-square-o'?>"></i>&ensp;<?=$row['name']?></a></li>
							<?
								if (isset($_in[$row['id']])) {
									$selected_items[$row['id']] = $row['name'];
								}
							?>
							<? endwhile; ?>
						</ul>
					</li>
					
					<li>
					<a class="clear-my" href="javascript:void(0)" onclick="do_filter()"><?=$apply?></a>
					</li>
					<li>
					<a class="clear-my" href="<?=$site_url?>"><?=$clear_filtres?></a>
					</li>
					<span class="mailchimp-form-content ">
						<nobr>
							<input type="text" id="search" class="form-control find-my" placeholder="Поиск..." value="<?=(isset($_in['search']))?$_in['search']:''?>">
							<a href='javascript:void(0)' onclick='do_search()' class="find-b-my"><i class="fa fa-search" aria-hidden="true"></i></a>
						</nobr>
					</span>				
				</ul>
		</div>
	</div>
	
	
	
	
	<div class="tagcloud filter-block-my-<?=$lg?> text-left">
		<div class="filters_div">
		<? $last_lett = ''; ?>
		<? foreach ( $selected_items as $k => $v ) : ?>
		<?
			$lett = substr($k,0,1);
			if ( $last_lett != $lett ) {
				if ( $last_lett != '' ) {
					echo '</div><div  class="filters_div">';
				}
				echo '<span class="filters_name">'.$$filters[$lett].':</span>';
				$last_lett = $lett;
			}
		?>
		
		&ensp;<?=$v?>&nbsp;<a href='<?=$site_url.str_replace("$k&",'',$get)?>'><i class="fa fa-times cross-cancel" aria-hidden="true"></i></a>
		<!--&ensp;<?=$v?>&nbsp;<a href='javascript:void(0)' onclick="del_filter('<?=$k?>')"><i class="fa fa-times cross-cancel" aria-hidden="true"></i></a>-->
		<? endforeach; ?>
		</div>
	</div>
</div>



<script>
"use strict";

function check_search(id) 
{
	jQuery('#'+id).toggleClass('fa-square-o');
	jQuery('#'+id).toggleClass('fa-check-square');
}

function do_filter() 
{
	var get = '?';
	var elements = document.getElementsByClassName("fa-check-square");
	for( var i = 0; i < elements.length; i++ ) {
		get = get + elements[i].id + '&';
	}
	document.location.href = get;
}

function del_filter(id) 
{
	var get = '<?=$get?>';
	get = get.replace (new RegExp (id +'&' , 'g'), '');
	
	document.location.href = get;
}


function do_search() 
{
	var get = '<?=$get?>';
	if ( get.lenght == 0 ) {
		document.location.href = '?search=' + jQuery('#search').val();
	}
	document.location.href = get + '&search=' + jQuery('#search').val();
}



</script>