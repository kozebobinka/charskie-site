﻿<?
	include "../conf.php";
	
	$dir = "../tmp/"; 
	$dir2 = "../works/origin/"; 
	$dir3 = "../works/preview_adm/"; 
	
	// Открыть заведомо существующий каталог и начать считывать его содержимое 
	if (is_dir($dir)) { 
		if ($dh = opendir($dir)) { 
			while (($file = readdir($dh)) !== false) { 
				if (strlen($file) > 4) {
					print "Файл: $file <br>"; 
					$sql = "INSERT INTO items
							( author, type, genre )
							VALUES
							( 2, 1, 3 )";
					$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
					$id  = mysql_insert_id();
					copy($dir.$file, $dir2.$id.".jpg");
					resize($dir.$file, $dir3.$id.'.jpg', 230, 230);
					$sql = "UPDATE items
							SET file = '$id.jpg'
							WHERE id = $id";
					$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				}
			} 
			closedir($dh); 
		} 
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