<?php
	header('Content-type: text/html; charset=utf-8');
	
	error_reporting(0);
	
	session_start();
	
	include "../inc/conf.php";
	
	if(strstr($_SERVER["HTTP_REFERER"],$hname)===false)
	{
		echo $_SERVER["HTTP_REFERER"].' '.$hname;
		exit;
	}
	
	if(isset($_GET["do_del"]))
	{
		$sql = "DELETE FROM {$_POST['table']}
		WHERE id = {$_POST['id']}";
		$result=@mysql_query($sql) or die ($sql."<br />".mysql_error());
		exit;
	}
	
	if(isset($_GET["check_del"]))
	{
		$sql = "SELECT 1 FROM items WHERE {$_POST['param']}='{$_POST['id']}'";
		$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
		if ( mysql_num_rows( $res ) )
			echo "1";
		else
			echo "0";
		
		exit;
	}
	
	if(isset($_GET["create_dump"]))
	{
		exec("mysqldump -u pshasm6j_ch -hlocalhost -p33aea385a pshasm6j_ch > home/p/pshasm6j/pshasm6j.beget.tech/public_html/bkp/".date('d-m-y_H:i:s').".sql");	
		exit;
	}
	
	if(isset($_GET["restore_dump"]))
	{
		exec("mysql -u gb_charskie -hmysql86.1gb.ru -p33aea385a gb_charskie < ~/http/bkp/{$_POST['file']}");	
		exit;
	}
	
	if(isset($_GET["save_link"]))
	{
		$sql = "INSERT INTO links
				( name, link_get )
				VALUES
				( '{$_POST['name']}', '{$_POST['link']}' )";
		$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
		exit;
	}
	
	if(isset($_GET["make_seo"]))
	{
		function translit($s) {
			$s = (string) $s; // преобразуем в строковое значение
			$s = strip_tags($s); // убираем HTML-теги
			$s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
			$s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
			$s = trim($s); // убираем пробелы в начале и конце строки
			$s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
			$s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
			$s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
			$s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
			return $s; // возвращаем результат
		}
		
		$seo = translit($_POST['name']);
		$sql = "SELECT id FROM {$_POST['table']} WHERE seo_{$_POST['lang']}='$seo' OR seo_{$_POST['lang']}='$seo'";
		$res = mysql_query($sql);
		if ((mysql_num_rows($res) > 0) or ($seo=='')) {
			$id = ($_POST['id'] == 'new') ? time() : $_POST['id'];
			if ($seo == '')
				$seo = $id;
			else
				$seo .= '-' . $id;
		}
		
		echo $seo;
		exit;

	}
	
	echo "-1";
	?>
		