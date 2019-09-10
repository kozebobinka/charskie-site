<a href="<?=$hname?>admin/index.php" type="button" class="btn btn-sm btn-default btn-lg btn-block"><span class="glyphicon glyphicon-arrow-left"></span> Назад</a>
<br>
<a href="<?=$hname?>admin/index.php?translations=cat_ru" type="button" class="btn btn-sm btn-<?=((isset($_GET['translations'])and($_GET['translations']=='cat_ru'))?'info':'default')?> btn-lg btn-block">Каталог - RUS</a>
<a href="<?=$hname?>admin/index.php?translations=cat_en" type="button" class="btn btn-sm btn-<?=((isset($_GET['translations'])and($_GET['translations']=='cat_en'))?'info':'default')?> btn-lg btn-block">Каталог - ENG</a>
<br>
<a href="<?=$hname?>admin/index.php?translations=site_ru" type="button" class="btn btn-sm btn-<?=((isset($_GET['translations'])and($_GET['translations']=='site_ru'))?'info':'default')?> btn-lg btn-block">Сайт - RUS</a>
<a href="<?=$hname?>admin/index.php?translations=site_en" type="button" class="btn btn-sm btn-<?=((isset($_GET['translations'])and($_GET['translations']=='site_en'))?'info':'default')?> btn-lg btn-block">Сайт - ENG</a>
<br>
<br>

<div class="bg-danger">
	<p>Важно не забывать:</p>
	<p>- Менять только текст внутри одинарных кавычек;</p>
	<p>- Если нужна одинарная кавычка в тексте - экранируем ее так: <span class="text-danger"><strong>\'</strong></span>;</p>
	<p>- Если решили, что где-то вообще текст не нужен, оставляем просто пустые кавычки.</p>
	
</div>
