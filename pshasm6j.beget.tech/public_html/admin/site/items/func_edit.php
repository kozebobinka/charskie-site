<?
	$new = ( $_GET['item_id'] == 'new' ) ? TRUE : FALSE;
	
	if ( !$new ) {
		$sql  = "SELECT *
			 	 FROM items
				 WHERE id={$_GET['item_id']}";
		$res  = @mysql_query($sql);
		$work = mysql_fetch_array($res,MYSQL_ASSOC);
	}

	$sql = "SELECT MAX(prior)+1 as next, MAX(prior_fav)+1 as next_fav
			FROM items";
	$res = @mysql_query($sql);
	$row = mysql_fetch_array($res,MYSQL_ASSOC);
	$next = $row['next'];
	$next_fav = $row['next_fav'];

	if ( (isset($_POST['cmd'])) and ($_POST['cmd'] == "add") ) {		

		$public = ( isset($_POST['public']) and ($_POST['public'] == 'on') ) ? 1 : 0;
		$favorite = ( isset($_POST['favorite']) and ($_POST['favorite'] == 'on') ) ? 1 : 0;
		$year = ( strlen($_POST['year']) < 4 ) ? "NULL" : "'{$_POST['year']}'";
		
		$names_keys = '';
		$names_vals = '';
		foreach ($lang as $pr => $val) {
			$names_keys .= 'name_' . $pr . ', info_' . $pr . ', seo_' . $pr . ', ';
			$names_vals .= "'" . mysql_real_escape_string($_POST['name_'.$pr]) . "', '" . 
								 mysql_real_escape_string($_POST['seo_'.$pr]) . "', '" . 
								 mysql_real_escape_string($_POST['info_'.$pr]) . "', ";
		}
		
		$sql = "INSERT INTO items
				( $names_keys author, year, period, sizex, sizey, type, type2, tech, genre, genre2, `group`, seria, 
				  depict, status, place, status_full, price, public, favorite, prior, prior_fav, extra )
				VALUES
				( $names_vals '{$_POST['author']}', $year, '{$_POST['period']}', 
				  '{$_POST['sizex']}', '{$_POST['sizey']}', '{$_POST['type']}', '{$_POST['type2']}', '{$_POST['techs']}', 
				  '{$_POST['genres']}', '{$_POST['genre2']}', '{$_POST['group']}', '{$_POST['seria']}', '{$_POST['depicts']}', 
				  '{$_POST['status']}', '{$_POST['place']}', '{$_POST['status_full']}', '{$_POST['price']}', '$public', 
				  '$favorite', '{$_POST['prior']}', '{$_POST['prior_fav']}', '{$_POST['extra']}')";
		$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
		$id  = mysql_insert_id();
		copy($_FILES['files']['tmp_name'][0], "../works/origin/".$id.".jpg");
		resize($_FILES['files']['tmp_name'][0], "../works/preview_adm/".$id.".jpg", 230, 230);
		resize($_FILES['files']['tmp_name'][0], "../works/preview/".$id.".jpg", 274, 274);
		resize($_FILES['files']['tmp_name'][0], "../works/fullsize/".$id.".jpg", 800, 800);
		$sql = "UPDATE items
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
				document.location.href="index.php?items&item_id=' . $id . '";
			</script>
			';
		}
	}
	
	if ( (isset($_POST['cmd'])) and ($_POST['cmd'] == "chg") ) {

		$public = ( isset($_POST['public']) and ($_POST['public'] == 'on') ) ? 1 : 0;
		$favorite = ( isset($_POST['favorite']) and ($_POST['favorite'] == 'on') ) ? 1 : 0;
		$year = ( strlen($_POST['year']) < 4 ) ? "NULL" : "'{$_POST['year']}'";
	
		$names_vals = '';
		foreach ($lang as $pr => $val) {
			$names_vals .= 'name_' . $pr . "='" . mysql_real_escape_string($_POST['name_'.$pr]) . "', " . 
						   'seo_' . $pr . "='" . mysql_real_escape_string($_POST['seo_'.$pr]) . "', " . 
						   'info_' . $pr . "='" . mysql_real_escape_string($_POST['info_'.$pr]) . "', ";
		}
		
		$sql = "UPDATE items
				SET
					$names_vals author='{$_POST['author']}', 
					year=$year, period='{$_POST['period']}', sizex='{$_POST['sizex']}', sizey='{$_POST['sizey']}', 
					type='{$_POST['type']}', type2='{$_POST['type2']}', tech='{$_POST['techs']}', genre='{$_POST['genres']}', 
					genre2='{$_POST['genre2']}', `group`='{$_POST['group']}', seria='{$_POST['seria']}', depict='{$_POST['depicts']}', 
					status='{$_POST['status']}', place='{$_POST['place']}', status_full='{$_POST['status_full']}', price='{$_POST['price']}', 
					prior='{$_POST['prior']}', prior_fav='{$_POST['prior_fav']}', public='$public', favorite='$favorite', 
					extra='{$_POST['extra']}'
				WHERE id = {$_POST['id']}";
		$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
		if ($_POST['files_a_del']) {
			$sql = "UPDATE items
					SET file = ''
					WHERE id = {$_POST['id']}";
			$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
			unlink("../works/preview_adm/{$_POST['id']}.jpg");
			unlink("../works/origin/{$_POST['id']}.jpg");
			unlink("../works/preview/{$_POST['id']}.jpg");
			unlink("../works/fullsize/{$_POST['id']}.jpg");
		} elseif (isset($_FILES['files']['tmp_name'][0]) and (strlen($_FILES['files']['tmp_name'][0]) > 1)) {
			$sql = "UPDATE items
					SET file = '{$_POST['id']}.jpg'
					WHERE id = {$_POST['id']}";
			$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
			copy($_FILES['files']['tmp_name'][0], "../works/origin/".$_POST['id'].".jpg");
			resize($_FILES['files']['tmp_name'][0], "../works/preview_adm/".$_POST['id'].".jpg", 230, 230);
			resize($_FILES['files']['tmp_name'][0], "../works/preview/".$_POST['id'].".jpg", 274, 274);
			resize($_FILES['files']['tmp_name'][0], "../works/fullsize/".$_POST['id'].".jpg", 800, 800);
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
				document.location.href="index.php?items&item_id=' . $_POST['id'] . '";
			</script>
			';
		}
	}

	if ( (isset($_POST['cmd'])) and ($_POST['cmd'] == "del") ) {
		$sql = "DELETE FROM items WHERE id = {$_POST['id']}";
		$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
		$_SESSION['back_uri'] = '';
		unlink("../works/preview_adm/{$_POST['id']}.jpg");
		unlink("../works/preview/{$_POST['id']}.jpg");
		unlink("../works/origin/{$_POST['id']}.jpg");
		unlink("../works/fullsize/{$_POST['id']}.jpg");
		print'
		<script>
			document.location.href="' . $hname . 'admin/index.php?items";
		</script>
		';
	}
 
	if ( (isset($_POST['cmd'])) and ($_POST['cmd'] == "dupl") ) {
		$sql = "CREATE TEMPORARY TABLE item_tmp AS SELECT * FROM items WHERE id = {$_POST['id']}";
		$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
		$sql = "UPDATE item_tmp SET id=NULL";
		$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
		$sql = "INSERT INTO items SELECT * FROM item_tmp";
		$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
		$id = mysql_insert_id();
		$sql = "DROP TABLE item_tmp;";
		$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
		$sql = "UPDATE items SET prior=prior+1 WHERE id=$id";
		$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
		
		$file = $id . ".jpg";
		$sql = "UPDATE items SET file='$file' WHERE id=$id";
		$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
		
		copy("../works/preview_adm/{$_POST['id']}.jpg","../works/preview_adm/{$id}.jpg");
		copy("../works/preview/{$_POST['id']}.jpg","../works/preview/{$id}.jpg");
		copy("../works/origin/{$_POST['id']}.jpg","../works/origin/{$id}.jpg");
		copy("../works/fullsize/{$_POST['id']}.jpg","../works/fullsize/{$id}.jpg");
		$_SESSION['back_uri'] = '';
		print'
		<script>
			document.location.href="' . $hname . 'admin/index.php?items&item_id=' . $id . '";
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
