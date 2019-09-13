<?

include "inc/conf.php";

// маршрутизация

$uri = explode("/", $_SERVER['REQUEST_URI']);
$page_file = '';

if ( ! in_array($uri[1],array($default_lg, $alt_lg)) ) {
	header("Location: {$site_url}{$default_lg}{$_SERVER['REQUEST_URI']}");
	exit;
}

if ( (isset($uri[2])) and ($uri[2] != '') and ($uri[2] == "404.php") ) {
	include "404.php";
	exit;
}
if ( (isset($uri[2])) and ($uri[2] == 'policy')) {
    $page_file = "articles/policy.php";
} elseif ( (isset($uri[2])) and ($uri[2] != '') and (!in_array($uri[2], $seo_author)) ) {
	header("Location: {$site_url}{$default_lg}/404.php");
	exit;
} elseif ( in_array($uri[2], $seo_author) ) {
	$par['author'] = array_search($uri[2], $seo_author);
	if ( (isset($uri[3])) and ($uri[3] != '') ) {
		$par['menu'] = $uri[3];
		if ( isset($uri[4]) and (trim($uri[4]) != '') ) {
			$par['article'] = $uri[4];
		}
	} else {
		header("Location: {$site_url}{$uri[1]}/{$uri[2]}/{$menu[1]}");
	}
}

$lg = $uri[1];

$alt_lg = ($lg == $default_lg) ? $alt_lg : $default_lg;

if ( isset($uri[5]) and (trim($uri[5]) != '') ) {
	header("Location: {$site_url}{$lg}{$_SERVER['REQUEST_URI']}");
	exit;
}

// язык
include "lang/$lg.php";

if ( (isset($par['menu'])) and (isset($par['author'])) or ($uri[2] == 'policy')) {

	$header_tilda = '';
	$content = '';

	$sql = "SELECT name_$lg as name FROM authors WHERE id={$par['author']}";
	$res = mysql_query($sql);
	$author_name = mysql_fetch_row($res)[0];
	switch ($par['menu']) {
		case 'biography' :
			if ( isset($par['article']) ) {
				header("Location: {$site_url}{$lg}{$_SERVER['REQUEST_URI']}");
				exit;
			}
//			$content = load_from_tilda("http://charskie.tilda.ws/{$par['author']}_$lg", $header_tilda);
			$page_file = "bio_{$par['author']}.php";
			break;
		case 'favorites' :
			if ( isset($par['article']) ) {
				$page_file = "favorite.php";
				$sql = "SELECT 
							items.id AS id, `file`, items.name_$lg AS name, authors.name_$lg AS author, 
							items.author AS author_id, series.name_$lg AS seria, periods.name_$lg AS period, 
							genre2s.name_$lg AS genre2, items.tech, items.sizex, items.sizey, items.info_$lg AS info
						FROM 
							items
						LEFT JOIN 
							series ON series.id = items.seria
						LEFT JOIN 
							authors ON authors.id = items.author
						LEFT JOIN 
							periods ON periods.id = items.period
						LEFT JOIN 
							genre2s ON genre2s.id = items.genre2
						WHERE (items.seo_ru='{$par['article']}' OR items.seo_en='{$par['article']}')";

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
				}
				else {
					header("Location: {$site_url}{$lg}{$_SERVER['REQUEST_URI']}");
					exit;
				}
			} else {
				$page_file = "favorites_list.php";
			}
			break;

		case 'publications' :
		case 'expositions' :
		case 'memories' :
			if ( isset($par['article']) ) {
				$page_file = "article.php";
				$sql = "SELECT text_$lg AS text, name_$lg AS name
						FROM articles
						WHERE (seo_ru='{$par['article']}' OR seo_en='{$par['article']}')
								AND type='{$par['menu']}'";
				$res = mysql_query($sql);
				if ( mysql_num_rows($res) > 0 ) {
					$art = mysql_fetch_array($res);
					$content = load_from_tilda($art['text'], $header_tilda);
				}
				else {
					header("Location: {$site_url}{$lg}{$_SERVER['REQUEST_URI']}");
					exit;
				}
			} else {
				$page_file = "articles_list.php";
			}
			break;
		default :
//			header("Location: {$site_url}{$lg}{$_SERVER['REQUEST_URI']}");
//			exit;

	}


	include "inc/header.php";
	include "inc/menu.php";
	include $page_file;
	echo $content;
	include "inc/footer.php";
} else {
	$par['author'] = 0;
	include "inc/header.php";
	include "main.php";
	include "inc/footer.php";
}

function swich_lang()
{
	return 0;
}

function load_from_tilda($link, &$header_tilda)
{
	$content = file_get_contents($link);
	$pos_start = strpos($content, '<link rel="stylesheet" href="//static.tildacdn.com/css/tilda-grid');
	$pos_end = strpos($content, '<script src="//static.tildacdn.com/js/bootstrap');
	if ($pos_end === FALSE)
		$pos_end = strpos($content, '<script type="text/javascript" src="https://rentafont.ru/');

	$header_tilda = substr($content, $pos_start, $pos_end-$pos_start);
	$pos_start = strpos($content, '<body');
	$pos_start = strpos($content, '>', $pos_start) + 1;
	$pos_end = strpos($content, '</body>');
	$content = substr($content, $pos_start, $pos_end);

	return $content;
}

function cool_index($id, $aid)
{
	$prefs = array(1 => 'ECh', 2 => 'ICh', 3 => 'EICh');
	return $prefs[$aid] . '_' . substr(strval($id + 1000000), 1);
}