<?
	switch ($_GET['translations']) {
		case 'cat_ru':
		$file = '/home/p/pshasm6j/pshasm6j.beget.tech/public_html/admin/site/translate/ru.php';
		break;
		case 'cat_en':
		$file = '/home/p/pshasm6j/pshasm6j.beget.tech/public_html/admin/site/translate/en.php';
		break;
		case 'site_ru':
		$file = '/home/p/pshasm6j/pshasm6j.beget.tech/public_html/lang/ru.php';
		break;
		case 'site_en':
		$file = '/home/p/pshasm6j/pshasm6j.beget.tech/public_html/lang/en.php';
		break;
	}
	if ( (isset($_POST['cmd'])) and ($_POST['cmd'] == 'do') ) {
		file_put_contents($file, '<?'.$_POST['filephp']);
	}
?>

<form type="submit" method="POST">
<input type="hidden" name="cmd" value="do">
<textarea class="form-control" rows="40" name='filephp'>
	<?=substr(file_get_contents($file),2)?>
</textarea>
<button type="submit" class="btn btn-success" style="width:200px"><b>Сохранить</b></button>
</form>