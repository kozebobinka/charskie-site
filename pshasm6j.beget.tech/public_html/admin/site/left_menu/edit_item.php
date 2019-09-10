<a href="<?=($_SESSION['back_uri']!='') ? $_SESSION['back_uri'] : ($hname . 'admin/index.php?items') ?>" type="button" class="btn btn-sm btn-default btn-lg btn-block"><span class="glyphicon glyphicon-arrow-left"></span> Назад</a>
<div style="padding-top:25px;">
	<a href="javascript:void(0)" class="btn btn-info pull-left" onclick="duplicate_work()"><b>Дублировать</b></a>
</div>
<br>
<div style="padding-top:25px;">
	<a href="javascript:void(0)" class="btn btn-warning pull-left" onclick="delete_work()"><b>Удалить</b></a>
</div>