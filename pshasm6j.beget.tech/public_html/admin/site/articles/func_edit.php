<?
	$new = ( $_GET['article_id'] == 'new' ) ? TRUE : FALSE;
	
	if ( !$new ) {
		$sql  = "SELECT *
			 	 FROM articles
				 WHERE id={$_GET['article_id']}";
		$res  = @mysql_query($sql);
		$article = mysql_fetch_array($res,MYSQL_ASSOC);
	}

	$sql = "SELECT MAX(prior)+1 as next
			FROM articles";
	$res = @mysql_query($sql);
	$row = mysql_fetch_array($res,MYSQL_ASSOC);
	$next = is_null($row['next']) ? 1 : $row['next'];

	if ( (isset($_POST['cmd'])) and ($_POST['cmd'] == "add") ) {		

		$public = ( isset($_POST['public']) and ($_POST['public'] == 'on') ) ? 1 : 0;
		$year_event = ( strlen($_POST['year_event']) < 4 ) ? "" : "{$_POST['year_event']}";
		
		$names_keys = '';
		$names_vals = '';
		foreach ($lang as $pr => $val) {
			$names_keys .= 'name_' . $pr . ', seo_' . $pr . ', short_text_' . $pr . ', text_' . $pr . 
						   ', country_' . $pr . ', author_' . $pr . ', issue_' . $pr  . ', ';
			$names_vals .= "'" . mysql_real_escape_string($_POST['name_'.$pr]) . "', '" . 
							     mysql_real_escape_string($_POST['seo_'.$pr]) . "', '" . 
							     mysql_real_escape_string($_POST['short_text_'.$pr]) . "', '" . 
							     mysql_real_escape_string($_POST['text_'.$pr]) . "', '" . 
							     mysql_real_escape_string($_POST['country_'.$pr]) . "',  '" . 
							     mysql_real_escape_string($_POST['author_'.$pr]) . "',  '" . 
								 mysql_real_escape_string($_POST['issue_'.$pr]) . "', ";
		}
		
		$sql = "INSERT INTO articles
				( $names_keys type, about, date_add, date_event, year_event, issue_n, prior, public)
				VALUES
				( $names_vals '{$_POST['type']}', '{$_POST['about']}', '{$_POST['date_add']}', 
				  '{$_POST['date_event']}', '$year_event', '{$_POST['issue_n']}', '{$_POST['prior']}', '$public' )";
		$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
		$id  = mysql_insert_id();
		copy($_FILES['files_a']['tmp_name'][0], "../images/articles/origin/".$id.".jpg");
		resize($_FILES['files_a']['tmp_name'][0], "../images/articles/preview/".$id.".jpg", 270, 270);
		$sql = "UPDATE articles
				SET file = '$id.jpg'
				WHERE id = $id";
		$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
		if ( $_POST['cmd_ex'] == 1) {
			print'
			<script>
				document.location.href="'.$_SESSION['back_uri'].'";
			</script>
			';
		} else {
			print'
			<script>
				document.location.href="index.php?articles&article_id=' . $id . '";
			</script>
			';
		}
	}
	
	if ( (isset($_POST['cmd'])) and ($_POST['cmd'] == "chg") ) {

		$public = ( isset($_POST['public']) and ($_POST['public'] == 'on') ) ? 1 : 0;
		$year_event = ( strlen($_POST['year_event']) < 4 ) ? "" : "{$_POST['year_event']}";
		
		$names_vals = '';
		foreach ($lang as $pr => $val) {
			$names_vals .= "name_$pr = '" . mysql_real_escape_string($_POST['name_'.$pr]) . "', 
							seo_$pr = '" . mysql_real_escape_string($_POST['seo_'.$pr]) . "', 
							short_text_$pr = '" . mysql_real_escape_string($_POST['short_text_'.$pr]) . "', 
							text_$pr = '" . mysql_real_escape_string($_POST['text_'.$pr]) . "', 
							country_$pr = '" . mysql_real_escape_string($_POST['country_'.$pr]) . "', 
							author_$pr = '" . mysql_real_escape_string($_POST['author_'.$pr]) . "', 
							issue_$pr = '" . mysql_real_escape_string($_POST['issue_'.$pr]) . "', ";
		}
		
		$sql = "UPDATE articles
				SET
					$names_vals type='{$_POST['type']}', about='{$_POST['about']}', date_add='{$_POST['date_add']}',
					date_event='{$_POST['date_event']}', year_event='$year_event', issue_n='{$_POST['issue_n']}', 
					prior='{$_POST['prior']}', public='$public'
				WHERE id = {$_POST['id']}";
		$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
		
		if ($_POST['files_a_del']) {
			$sql = "UPDATE articles
					SET file = ''
					WHERE id = {$_POST['id']}";
			$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
			unlink("../images/articles/preview/{$_POST['id']}.jpg");
			unlink("../images/articles/origin/{$_POST['id']}.jpg");
		} elseif (isset($_FILES['files_a']['tmp_name'][0]) and (strlen($_FILES['files_a']['tmp_name'][0]) > 1)) {
			$sql = "UPDATE articles
					SET file = '{$_POST['id']}.jpg'
					WHERE id = {$_POST['id']}";
			$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
			copy($_FILES['files_a']['tmp_name'][0], "../images/articles/origin/".$_POST['id'].".jpg");
			resize($_FILES['files_a']['tmp_name'][0], "../images/articles/preview/".$_POST['id'].".jpg", 270, 270);
		}
		if ( $_POST['cmd_ex'] == 1) {
			print'
			<script>
				document.location.href="'.$_SESSION['back_uri'].'";
			</script>
			';
		} else {
			print'
			<script>
				document.location.href="index.php?articles&article_id=' . $_POST['id'] . '";
			</script>
			';
		}
	}

	if ( (isset($_POST['cmd'])) and ($_POST['cmd'] == "del") ) {
		$sql = "DELETE FROM articles WHERE id = {$_POST['id']}";
		$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
		$_SESSION['back_uri'] = '';
		unlink("../images/articles/preview/{$_POST['id']}.jpg");
		unlink("../images/articles/origin/{$_POST['id']}.jpg");
		print'
		<script>
			document.location.href="' . $hname . 'admin/index.php?articles";
		</script>
		';
	}
 
	function resize($file_name, $new_file_name, $width, $height)
	{
		$im          = imagecreatefromjpeg($file_name);
		list($w, $h) = getimagesize($file_name);           
		$k           = $w / $width;            
		$new_w		 = $width;
		$new_h       = ceil($h / $k);  
		if ($new_h > $height) {
			$k       = $h / $height;            
			$new_w   = ceil($w / $k);  
			$new_h   = $height;
		}
		$im1         = imagecreatetruecolor($new_w, $new_h); 
		imagecopyresampled($im1,$im,0,0,0,0,$new_w,$new_h,imagesx($im),imagesy($im)); 
		imagejpeg($im1, $new_file_name, 100);  
		imagedestroy($im); 
		imagedestroy($im1); 
	}	
