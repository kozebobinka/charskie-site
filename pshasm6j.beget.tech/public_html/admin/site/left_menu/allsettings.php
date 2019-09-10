<a href="<?=$hname?>admin/index.php" type="button" class="btn btn-sm btn-default btn-lg btn-block"><span class="glyphicon glyphicon-arrow-left"></span> Назад</a>
<div class="text-success text-center"><br>Настройки</div>
<a href="<?=$hname?>admin/index.php?settings" type="button" class="btn btn-sm btn-<?=((isset($_GET['settings']))?'info':'default')?> btn-lg btn-block">Доступ</a>
<a href="<?=$hname?>admin/index.php?langs" type="button" class="btn btn-sm btn-<?=((isset($_GET['langs']))?'info':'default')?> btn-lg btn-block">Языки</a>
<a href="<?=$hname?>admin/index.php?bkp" type="button" class="btn btn-sm btn-<?=((isset($_GET['bkp']))?'info':'default')?> btn-lg btn-block">Резервные копии</a>