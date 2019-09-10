<?
	if ( !isset($_GET['article_id']) )
		$_SESSION['back_uri'] = $hname.substr($_SERVER['REQUEST_URI'],1);
	$sql = "SELECT *
			FROM langs
			ORDER BY id";
	$res = @mysql_query($sql);
	while ( $row = mysql_fetch_array($res,MYSQL_ASSOC) ) {
		$lang[$row['pref']] = $row['name'];
	}
		
	$sql = "SELECT id, name_ru 
		 	FROM authors";
	$aut = @mysql_query($sql);
		
	$rows4page = 10;
	
	$get = '';
	foreach ( $_GET as $key => $val ) {
		if (( $key != "p" ) and ( $key != "articles" ))
			$get .= "&$key=$val";
	}

	$order = " ORDER BY id DESC";
	if (isset($_GET['f_order'])) {
		switch ($_GET['f_order']) {
		case 2 :	
			$order = " ORDER BY prior DESC";
			break;
		case 3 :	
			$order = " ORDER BY year_event DESC";
			break;
		case 4 :	
			$order = " ORDER BY issue_ru DESC";
			break;
		default :	
			$order = " ORDER BY id DESC";
			break;
		}
	}
	
	$where   = "(TRUE) ";
	
	if (isset($_GET['type'])) {
		$where   = "type = '{$_GET['type']}' ";
	}
	// странички
	$paging = FALSE;
	$page   = 1;
	$limit  = '';
	if ( isset($_GET['p']) )
		$page = $_GET['p'];
	$sql = "SELECT COUNT(id) as cid 
		 	FROM articles WHERE $where";
	$res = @mysql_query($sql);
	$cnt = mysql_fetch_array($res,MYSQL_ASSOC);
	if ( ($cnt['cid'] > $rows4page) and ($page != "all") ) {
		$paging = TRUE;
		$pages  = ceil($cnt['cid'] / $rows4page);
		$offset = ($page-1)*$rows4page;
		$limit  = " LIMIT $rows4page OFFSET $offset";	
		// рассчеты для листинга
		$dots1  = 0;
		$dots2  = 0;
		$pstart = 1;
		$pend   = $pages;
		$eight  = 0;
		if ($pages > 10) 
		{
			$dots2 = 1;
			$pend  = 8;
			if ($page > 8) 
			{
				$dots1  = 1;
				$eight   = floor($page/8);
				if ( $page%8 == 0 ) 
					$eight--;
				$pstart = $eight * 8 + 1;
				$pend   = $pstart + 7;
				if ($pend >= $pages) 
				{
					$pend = $pages;
					$pstart = $pages - 7;
					$dots2 = 0;
				}
			}
		}	
	}
	$sql = "SELECT 
				articles.id as id, file, date_add, year_event, author_ru, country_ru, issue_ru, 
				authors.name_ru as author, articles.name_ru as name, prior, type, short_text_ru, year_event
		 	FROM articles, authors
			WHERE authors.id=articles.about AND $where
			$order
			$limit";
	$art = mysql_query($sql);

	$types = array('publication'=>'Публикации_','exhibition'=>'Выставки_','memory'=>'Воспоминания_');