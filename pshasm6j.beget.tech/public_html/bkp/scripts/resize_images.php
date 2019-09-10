<?
	include "../conf.php";
	
	$dir = "../articles/origin/"; 
	$dir2 = "../articles/preview/"; 
	$dir3 = "../articles/fullsize/"; 
	
	// Открыть заведомо существующий каталог и начать считывать его содержимое 
	if (is_dir($dir)) { 
		if ($dh = opendir($dir)) { 
			while (($file = readdir($dh)) !== false) { 
				$arr = explode('.', $file);
				if ((strlen($file) > 4) and ($arr[0] >= 11)) {
					print "Файл: $file <br>"; 
					resize($dir.$file, $dir2.$file, 270, 270);
					// resize($dir.$file, $dir3.$file, 800, 800);
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