<?
$site_url = 'https://' . $_SERVER['HTTP_HOST'] . '/';
$main_url = 'https://' . str_replace('catalog.', '', $_SERVER['HTTP_HOST']) . '/';

$lg = 'ru';
$alt_lg = 'en';


$db_server='localhost';
$db_name = 'pshasm6j_ch';
$db_user = 'pshasm6j_ch';
$db_password = '33aea385a';
if(!isset($db))
{
	$db=@mysql_connect($db_server,$db_user,$db_password);
	mysql_select_db($db_name);
	mysql_query ("set character_set_client='utf8'"); 
	mysql_query ("set character_set_results='utf8'"); 
	mysql_query ("set collation_connection='utf8_general_ci'"); 
	mysql_query("SET names utf8");
}

$seo_author[1] = 'evgeniy_charskiy';
$seo_author[2] = 'irina_charskaya';
$seo_author[3] = 'evgeniy_irina_charskie';

$default_lg = 'ru';
$alt_lg = 'en';
	
?>