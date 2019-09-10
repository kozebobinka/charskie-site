<? 
	$rows4page = 16;
	$where = "(`year`>1000 AND public=1) ";
	
	$a = $b = $c = $d = $e = $f = '';
	$_in = $_GET;
	unset($_in['all']);
	if (isset($par['author'])) {
		$_in['a_'.$par['author']] = '';
	}
	$get = '?';
	foreach ($_in as $k => $v) {
		if ( $k != 'search' ) {
			$lett = substr($k,0,1);
			$$lett .= "," . substr($k,2);
		} else {
			$where .= " AND items.name_$lg LIKE '%$v%' ";
		}
		$get .= $k . '&';
	}
		
	if ($a != '') {
		$a = substr($a,1);
		$where .= " AND items.author IN ($a) ";
	}
	if ($b != '') {
		$b = substr($b,1);
		$where .= " AND items.type IN ($b) ";
	}
	if ($c != '') {
		$c = substr($c,1);
		$where .= " AND items.genre IN ($c) ";
	}
	if ($d != '') {
		$d = substr($d,1);
		$d_arr = explode(',', $d);
		$where .= "AND (";
		foreach ($d_arr as $d_item) {
			$where .= " (items.tech LIKE '$d_item,%') OR (items.tech LIKE '%,$d_item') OR (items.tech LIKE '%,$d_item,%') OR (items.tech = '$d_item') OR ";
		}
		$where =  substr($where, 0, (strlen($where)-3)) . ")";
	}
	if ($e != '') {
		$e = substr($e,1);
		$where .= " AND items.period IN ($e) ";
	}
	if ($f != '') {
		$f = substr($f,1);
		$where .= " AND items.seria IN ($f) ";
	}

	
	// странички
	$paging = FALSE;
	$page   = 1;
	$limit  = '';
	if ( isset($_GET['page']) )
		$page = $_GET['page'];
	if ( isset($_GET['all']) )
		$page = 'all';
	
	$sql = "SELECT COUNT(id) as cid 
			FROM items WHERE $where";
	$res = mysql_query($sql);
	$cnt = mysql_fetch_array($res);
	$dots1  = 0;
	$dots2  = 0;
	$pstart = 1;
	$pages  = ceil($cnt['cid'] / $rows4page);
	$pend   = $pages;
	$eight  = 0;
	if ( ($cnt['cid'] > $rows4page) and ($page != "all") ) {
		$paging = TRUE;
		$offset = ($page-1)*$rows4page;
		$limit  = " LIMIT $rows4page OFFSET $offset";	
		// рассчеты для листинга
		if ($pages > 10) 
		{
			$dots2 = 1;
			$pend  = 8;
			if ($page > 8) 
			{
				$dots1  = 1;
				$eight  = floor($page/8);
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
				items.id AS id, `file`, items.name_$lg AS name, authors.name_$lg AS author, 
				items.author AS author_id, series.name_$lg AS seria, periods.name_$lg AS period,
				items.seo_$lg AS seo
			FROM 
				items
			LEFT JOIN 
				series ON series.id = items.seria
			LEFT JOIN 
				authors ON authors.id = items.author
			LEFT JOIN 
				periods ON periods.id = items.period
			WHERE $where	
			ORDER BY prior DESC
			$limit";
	// echo $sql;
	$wor = mysql_query($sql);
	
	if (!function_exists('mb_ucfirst') && extension_loaded('mbstring'))
	{
		function mb_ucfirst($str, $encoding='UTF-8')
		{
			$str = mb_ereg_replace('^[\ ]+', '', $str);
			$str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
				   mb_substr($str, 1, mb_strlen($str), $encoding);
			return $str;
		}
	}
?>

