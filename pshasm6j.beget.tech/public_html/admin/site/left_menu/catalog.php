<a href="<?=$hname?>admin/index.php" type="button" class="btn btn-sm btn-default btn-lg btn-block"><span class="glyphicon glyphicon-arrow-left"></span> Назад</a>
<div class="text-success text-center"><br>Справочники<br><small>(выводится на сайт)</small></div>
<a href="<?=$hname?>admin/index.php?property=authors" type="button" class="btn btn-sm btn-<?=((isset($_GET['property'])and($_GET['property']=='authors'))?'info':'default')?> btn-lg btn-block">Автор</a>
<a href="<?=$hname?>admin/index.php?property=types" type="button" class="btn btn-sm btn-<?=((isset($_GET['property'])and($_GET['property']=='types'))?'info':'default')?> btn-lg btn-block">Вид</a>
<a href="<?=$hname?>admin/index.php?property=techs" type="button" class="btn btn-sm btn-<?=((isset($_GET['property'])and($_GET['property']=='techs'))?'info':'default')?> btn-lg btn-block">Техника</a>
<a href="<?=$hname?>admin/index.php?property=series" type="button" class="btn btn-sm btn-<?=((isset($_GET['property'])and($_GET['property']=='series'))?'info':'default')?> btn-lg btn-block">Серия</a>
<a href="<?=$hname?>admin/index.php?property=periods" type="button" class="btn btn-sm btn-<?=((isset($_GET['property'])and($_GET['property']=='periods'))?'info':'default')?> btn-lg btn-block">Период</a>
<a href="<?=$hname?>admin/index.php?property=genres" type="button" class="btn btn-sm btn-<?=((isset($_GET['property'])and($_GET['property']=='genres'))?'info':'default')?> btn-lg btn-block">Жанр</a>
<div class="text-success text-center"><br>Справочники<br><small>(не выводится на сайт)</small></div>
<a href="<?=$hname?>admin/index.php?property=states" type="button" class="btn btn-sm btn-<?=((isset($_GET['property'])and($_GET['property']=='states'))?'info':'default')?> btn-lg btn-block">Статус</a>
<a href="<?=$hname?>admin/index.php?property=places" type="button" class="btn btn-sm btn-<?=((isset($_GET['property'])and($_GET['property']=='places'))?'info':'default')?> btn-lg btn-block">Местонахождение работы</a>
<a href="<?=$hname?>admin/index.php?property=types2" type="button" class="btn btn-sm btn-<?=((isset($_GET['property'])and($_GET['property']=='types2'))?'info':'default')?> btn-lg btn-block">Тип (подвид)</a>
<a href="<?=$hname?>admin/index.php?property=groups" type="button" class="btn btn-sm btn-<?=((isset($_GET['property'])and($_GET['property']=='groups'))?'info':'default')?> btn-lg btn-block">Тематическая группа</a>
<a href="<?=$hname?>admin/index.php?property=depicts" type="button" class="btn btn-sm btn-<?=((isset($_GET['property'])and($_GET['property']=='depicts'))?'info':'default')?> btn-lg btn-block">Что изображено</a>
<a href="<?=$hname?>admin/index.php?property=extras" type="button" class="btn btn-sm btn-<?=((isset($_GET['property'])and($_GET['property']=='extras'))?'info':'default')?> btn-lg btn-block">Относительный признак</a>
