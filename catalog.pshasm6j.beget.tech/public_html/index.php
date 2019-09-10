<?
include "inc/conf.php";

$uri = explode('/', $_SERVER['REQUEST_URI']);

if ( ! in_array($uri[1],array($default_lg, $alt_lg)) ) {
	header("Location: {$site_url}{$default_lg}{$_SERVER['REQUEST_URI']}"); 
	exit;
}

if ( (isset($uri[2])) and ($uri[2] != '') and ($uri[2] == "404.php") ) {
	// TODO
	echo "404";
	exit;
}
if ( (isset($uri[2])) and ($uri[2] != '') and (!in_array($uri[2], $seo_author)) and (substr($uri[2],0,1) != '?') ) {
	header("Location: {$site_url}{$default_lg}/404.php"); 
	exit;
} elseif ( in_array($uri[2], $seo_author) ) {
	$par['author'] = array_search($uri[2], $seo_author);
	if ( (isset($uri[3])) and ($uri[3] != '') ) {
		if (substr($uri[3],0,1) == '?') {
		} else {
			$par['work'] = $uri[3];
		}
	} else {
		// header("Location: {$site_url}{$uri[1]}/{$uri[2]}/{$menu[1]}"); 
	}
}

$lg = $uri[1];

$alt_lg = ($lg == $default_lg) ? $alt_lg : $default_lg;

	
$sql = "SELECT id, name_$lg as name FROM authors";
$aut = mysql_query($sql);
$menu_aut = array();
while ( $row = mysql_fetch_array($aut) ) 
	$menu_aut[$row['id']] = $row['name'];
	
include "lang/$lg.php";

include "inc/header.php";
include "inc/menu.php";
		
if ( isset($par['author']) and isset($par['work']) ) {
	$sql = "SELECT 
			items.id AS id, `file`, items.name_$lg AS name, authors.name_$lg AS author, 
			items.author AS author_id, series.name_$lg AS seria, periods.name_$lg AS period, 
			genres.name_$lg AS genre, items.tech, items.sizex, items.sizey, items.info_$lg AS info
		FROM 
			items
		LEFT JOIN 
			series ON series.id = items.seria
		LEFT JOIN 
			authors ON authors.id = items.author
		LEFT JOIN 
			periods ON periods.id = items.period
		LEFT JOIN 
			genres ON genres.id = items.genre
		WHERE (items.seo_ru='{$par['work']}' OR items.seo_en='{$par['work']}')";
	$res = mysql_query($sql);
	if ( mysql_num_rows($res) > 0 ) {
		
		$work = mysql_fetch_array($res);
		
		$tech = '';
		if ( strlen($work['tech']) > 0 ) {
			$sql = "SELECT name_$lg AS name FROM techs WHERE id IN ({$work['tech']})";
			$res = mysql_query($sql);
			while ( $row = mysql_fetch_array($res) ) {
				$tech .= ', ' . $row['name'];
			}
			$tech = substr($tech, 2);
		}
		
		include "work.php";
		
	} else {
		include "404.php";
	}
} else {	
	include "inc/func.php";
	include "main.php";
}
// $page = 'catalog';


function cool_index($id, $aid)
{
	$prefs = array(1 => 'ECh', 2 => 'ICh', 3 => 'EICh');
	return $prefs[$aid] . '_' . substr(strval($id + 1000000), 1);
}
include "inc/footer.php";
	
?>