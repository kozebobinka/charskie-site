<?
	include "../../inc/conf.php";
	
	$sql = "update items set seo_ru='', seo_en=''";
	$res = mysql_query($sql);
		
	$sql = "select id, name_ru, name_en from items where name_ru<>'' or name_en<>''";
	$res = mysql_query($sql);
		
	while ( $row = mysql_fetch_array($res,MYSQL_ASSOC) ) {
		
		$seo_ru = translit($row['name_ru']);
		$sql = "select id from items where seo_ru='$seo_ru' or seo_en='$seo_ru'";
		$res1 = mysql_query($sql);
		if ((mysql_num_rows($res1) > 0) or ($seo_ru=='')) {
			if ($seo_ru == '')
				$seo_ru = $row['id'];
			else
				$seo_ru .= '-' . $row['id'];
		}
		
		$seo_en = translit($row['name_en']);
		$sql = "select id from items where seo_ru='$seo_en' or seo_en='$seo_en'";
		$res1 = mysql_query($sql);
		if ((mysql_num_rows($res1) > 0) or ($seo_en=='')) {
			if ($seo_en == '')
				$seo_en = $row['id'];
			else
				$seo_en .= '-' . $seo_en['id'];
		}
		$sql = "update items set seo_ru='$seo_ru', seo_en='$seo_en' where id={$row['id']}";
		$res3 = mysql_query($sql);
		
	}
	
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