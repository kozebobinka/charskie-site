<a href="<?=$hname?>admin/index.php" type="button" class="btn btn-sm btn-default btn-lg btn-block"><span class="glyphicon glyphicon-arrow-left"></span> Назад</a>
<div class="text-success text-center"><br>Статьи</div>
<a href="<?=$hname?>admin/index.php?articles" type="button" class="btn btn-sm btn-<?=((isset($_GET['articles']) and !isset($_GET['type']))?'info':'default')?> btn-lg btn-block">Все статьи</a>
<a href="<?=$hname?>admin/index.php?articles&type=publication" type="button" class="btn btn-sm btn-<?=((isset($_GET['articles']) and isset($_GET['type']) and ($_GET['type']=='publication'))?'info':'default')?> btn-lg btn-block">Публикации</a>
<a href="<?=$hname?>admin/index.php?articles&type=exhibition" type="button" class="btn btn-sm btn-<?=((isset($_GET['articles']) and isset($_GET['type']) and ($_GET['type']=='exhibition'))?'info':'default')?> btn-lg btn-block">Выставки</a>
<a href="<?=$hname?>admin/index.php?articles&type=memory" type="button" class="btn btn-sm btn-<?=((isset($_GET['articles']) and isset($_GET['type']) and ($_GET['type']=='memory'))?'info':'default')?> btn-lg btn-block">Воспоминания</a>

<div style="padding:30px;text-align:center">
	<a href="<?=$hname?>admin/index.php?articles&article_id=new" class="btn btn-success btn-sm" type="button"  title="Добавить статью"><span class="glyphicon glyphicon-plus"></span> Добавить статью</a>	
</div>		
<div class="input-group input-group-sm">
	<span class="input-group-addon glyphicon glyphicon-sort" title="Сортировка"></span>
	<select id="f_order" class="form-control">
		<option value="1" <?=($_GET['f_order']==1)?'selected="selected"':''?>>Сорт. по добавлению</option>
		<option value="2" <?=($_GET['f_order']==2)?'selected="selected"':''?>>Сорт. по приоритету</option>
		<option value="3" <?=($_GET['f_order']==3)?'selected="selected"':''?>>Сорт. по году</option>
		<option value="4" <?=($_GET['f_order']==4)?'selected="selected"':''?>>Сорт. по изданию</option>
	</select>
</div>	
<div style="padding:5px 0;text-align:right">
	<a href="javascript:void(0)" class="btn btn-info btn-sm" type="button"  title="Применить" onclick="do_filter()">Применить</a>	
</div>	

<script>
	"use strict"

	function do_filter()
	{
		window.location.href = "<?=$hname?>admin/index.php?articles&f_order="+$("#f_order").val()+ '<?=(isset($_GET['type'])) ? "&type={$_GET['type']}" : ''?>';
		return false;	
	}
</script>