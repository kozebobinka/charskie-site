<?

	if ( !isset($_GET['item_id']) )
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
	
	$sql = "SELECT id, name_ru 
		 	FROM types";
	$typ = @mysql_query($sql);
	
	$sql = "SELECT id, name_ru 
		 	FROM types2";
	$ty2 = @mysql_query($sql);
	
	$sql = "SELECT id, name_ru 
		 	FROM techs";
	$tec = @mysql_query($sql);
	
	$sql = "SELECT id, name_ru 
		 	FROM genres";
	$gen = @mysql_query($sql);
	
	$sql = "SELECT id, name_ru 
		 	FROM genre2s";
	$ge2 = @mysql_query($sql);
	
	$sql = "SELECT id, name_ru 
		 	FROM groups";
	$gro = @mysql_query($sql);
	
	$sql = "SELECT id, name_ru 
		 	FROM places";
	$pla = @mysql_query($sql);
	
	$sql = "SELECT id, name_ru 
		 	FROM series";
	$ser = @mysql_query($sql);
	
	$sql = "SELECT id, name_ru 
		 	FROM depicts";
	$dep = @mysql_query($sql);
	
	$sql = "SELECT id, name_ru 
		 	FROM extras";
	$ext = @mysql_query($sql);

	$sql = "SELECT id, name_ru 
		 	FROM periods";
	$per = @mysql_query($sql);

	$sql = "SELECT id, name_ru 
		 	FROM states";
	$sta = @mysql_query($sql);

	$filters = $_GET;
	$where   = "(TRUE) ";
	if ( !isset($filters['f_search'])     ) 
		$filters['f_search']     = '';
	else
		$where .= "AND ((LOWER(items.name_ru) LIKE LOWER('%{$filters['f_search']}%')) OR (items.id='{$filters['f_search']}')) ";
	if ( !isset($filters['f_order'])      )
		$filters['f_order']      = 2;
	if ( !isset($filters['f_author'])     ) 
		$filters['f_author']     = 0;
	else
		$where .= "AND author = {$filters['f_author']} ";
	if ( !isset($filters['f_type'])       ) 
		$filters['f_type']       = 0;
	else
		$where .= "AND type = {$filters['f_type']} ";
	if ( !isset($filters['f_type2'])      ) 
		$filters['f_type2']      = 0;
	else
		$where .= "AND type2 = {$filters['f_type2']} ";
	if ( !isset($filters['f_tech'])       ) 
		$filters['f_tech']       = 0;
	else
		$where .= "AND (tech LIKE '{$filters['f_tech']},%' OR tech = {$filters['f_tech']} 
						OR tech LIKE '%,{$filters['f_tech']},%' OR tech LIKE '%,{$filters['f_tech']}' ) ";
	if ( !isset($filters['f_period'])     ) 
		$filters['f_period']     = 0;
	else
		$where .= "AND period = {$filters['f_period']} ";
	if ( !isset($filters['f_genre'])      ) 
		$filters['f_genre']      = 0;
	else
		$where .= "AND genre = {$filters['f_genre']} ";
	if ( !isset($filters['f_genre2'])     ) 
		$filters['f_genre2']     = 0;
	else
		$where .= "AND genre2 = {$filters['f_genre2']} ";
	if ( !isset($filters['f_group'])     ) 
		$filters['f_group']     = 0;
	else
		$where .= "AND `group` = {$filters['f_group']} ";
	if ( !isset($filters['f_place'])     ) 
		$filters['f_place']     = 0;
	else
		$where .= "AND place = {$filters['f_place']} ";
	if ( !isset($filters['f_seria'])      ) 
		$filters['f_seria']      = 0;
	else
		$where .= "AND seria = {$filters['f_seria']} ";
	if ( !isset($filters['f_depict'])     ) 
		$filters['f_depict']     = 0;
	else
		$where .= "AND (depict LIKE '{$filters['f_depict']},%' OR depict = {$filters['f_depict']} 
						OR depict LIKE '%,{$filters['f_depict']},%' OR depict LIKE '%,{$filters['f_depict']}' ) ";
	if ( !isset($filters['f_public'])     ) 
		$filters['f_public']     = 2;
	else
		$where .= "AND public = {$filters['f_public']} ";
	if ( !isset($filters['f_favorite'])     ) 
		$filters['f_favorite']   = 2;
	else
		$where .= "AND favorite = {$filters['f_favorite']} ";
	if ( !isset($filters['f_status'])     ) 
		$filters['f_status']     = 0;
	else
		$where .= "AND status = {$filters['f_status']} ";
	if ( !isset($filters['f_extra'])      ) 
		$filters['f_extra']      = 0;
	else
		$where .= "AND extra = {$filters['f_extra']} ";
	if ( !isset($filters['f_year_from'])  ) 
		$filters['f_year_from']  = '';
	else
		$where .= "AND year >= {$filters['f_year_from']} ";
	if ( !isset($filters['f_year_to'])    ) 
		$filters['f_year_to']    = '';
	else
		$where .= "AND year <= {$filters['f_year_to']} ";
	if ( !isset($filters['f_sizex_from']) ) 
		$filters['f_sizex_from'] = '';
	else
		$where .= "AND sizex >= {$filters['f_sizex_from']} ";
	if ( !isset($filters['f_sizex_to'])   ) 
		$filters['f_sizex_to']   = '';
	else
		$where .= "AND sizex <= {$filters['f_sizex_to']} ";
	if ( !isset($filters['f_sizey_from']) ) 
		$filters['f_sizey_from'] = '';
	else
		$where .= "AND sizey >= {$filters['f_sizey_from']} ";
	if ( !isset($filters['f_sizey_to'])   ) 
		$filters['f_sizey_to']   = '';
	else
		$where .= "AND sizey <= {$filters['f_sizey_to']} ";
	if ( !isset($filters['f_price_from']) ) 
		$filters['f_price_from'] = '';
	else
		$where .= "AND price >= {$filters['f_price_from']} ";
	if ( !isset($filters['f_price_to'])   ) 
		$filters['f_price_to']   = '';
	else
		$where .= "AND price <= {$filters['f_price_to']} ";
	
	
	switch ($filters['f_order']) {
	case 2 :	
		$order = " ORDER BY prior DESC";
		break;
	case 3 :	
		$order = " ORDER BY year";
		break;
	case 4 :	
		$order = " ORDER BY year DESC";
		break;
	case 5 :	
		$order = " ORDER BY prior_fav DESC";
		break;
	default :	
		$order = " ORDER BY id DESC";
		break;
	}
	
	
	
	$rows4page = 30;
	
	$get = '';
	foreach ( $_GET as $key => $val ) {
		if (( $key != "p" ) and ( $key != "items" ))
			$get .= "&$key=$val";
	}

	// странички
	$paging = FALSE;
	$page   = 1;
	$limit  = '';
	if ( isset($_GET['p']) )
		$page = $_GET['p'];
	$sql = "SELECT COUNT(id) as cid 
		 	FROM items WHERE $where";
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
				items.id AS id, items.prior AS prior, `file`, items.name_ru AS name, authors.name_ru AS author, 
				states.name_ru AS status
			FROM 
				items
			LEFT JOIN 
				states ON states.id = items.status
			LEFT JOIN 
				authors ON authors.id = items.author
			WHERE $where	
			$order
			$limit";
	
	$wor = @mysql_query($sql);
