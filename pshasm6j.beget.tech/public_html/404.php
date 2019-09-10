<?	
include "inc/conf.php";

$uri = explode("/", $_SERVER['REQUEST_URI']);
$lg = $uri[1];
$alt_lg = ($lg == $default_lg) ? $alt_lg : $default_lg;
$par['author'] = 3;
$sql = "SELECT name_$lg as name FROM authors WHERE id={$par['author']}";
$res = mysql_query($sql);
$author_name = mysql_fetch_row($res)[0];

include "lang/$lg.php";
include "inc/header.php"; 
include "inc/menu.php"; 
?>
<div class="content-container no-padding container-grey">	
		<div class="container">
			<div class="row text-center attention-my">
				<div class="col-md-3">
				</div>
				<div class="col-md-6">
					<p><?=$contact_main_str1?></p>
					<p id="change_p"><a href="javascript:void(0)" onclick="show_form('<?=$contact_main_str3?>')"><?=$contact_main_str2?></a></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8">
					<? include "inc/contact_form.php"?>
				</div>
			</div>
		</div>	
</div>
	

<?
include "inc/footer.php";
?>