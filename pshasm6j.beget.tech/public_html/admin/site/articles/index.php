<style>
.user-table { 
	width: 1000px; 
}
.img_div {
	display: table-cell;
	vertical-align: middle;
	height:120px;
	width:120px;
	background:#b5b5b5;
}

.img_prv {
	margin: auto;
	position: relative;
	max-height:120px;
	max-width:120px;
	display: block;   
}
.descr {
	line-height: 14px;
}
</style>

<? include "site/articles/func.php"; ?>

<table class="table table-bordered user-table table-condensed">
<tbody>

<? while ( $row = mysql_fetch_array($art, MYSQL_ASSOC) ) : ?>
	<tr>
		<td class="col-md-2">
			<a href="<?=$hname?>admin/index.php?articles&article_id=<?=$row['id']?>">
				<div class="media img_div" >
					<img class="img_prv" src="<?=$hname?>images/articles/preview/<?=$row['file'].'?'.time()?>">
				</div>		
			</a>
			<small class="text-muted">Id:</small><?=$row['id']?>		
		</td>
		<td class="col-md-9">
			<div class="descr">
				<small class="text-muted">Приоритет:</small> <?=$row['prior']?><br>
				<small class="text-muted">Добавлено:</small> <?=$row['date_add']?><br>
				<?=$types[$row['type']]?><?=$row['author']?><br>
				<small class="text-muted">Год события:</small> <?=$row['year_event']?><br>
				<small class="text-muted">Название:</small> <?=$row['name']?><br>
				<small class="text-muted">Автор:</small> <?=$row['author_ru']?><br>
				<small class="text-muted">Страна, год:</small> <?=$row['country_ru']?><br>
				<small class="text-muted">Издание:</small> <?=$row['issue_ru']?><br>
			</div>
		</td>
	</tr>
<? endwhile; ?>

</tbody>
</table>

<? if ($paging) : ?>
<div class="text-center user-table" style="padding:20px 0 0 0">
	<div class="text-left text-muted" style="position:absolute; margin:5px 10px">
		Всего записей: <span class="text-primary"><b><?=$cnt['cid']?></b></span>
	</div>
	<ul class="pagination pagination-sm" style="margin:0 0 20px 0">
		<li class="<?=($page==1)?'disabled':''?>"><a href="<?=($page==1)?"#":($hname."admin/index.php?articles$get&p=".($page-1))?>">&laquo;</a></li>
		<? if ($dots1 == 1) : ?>
			<li><a href="<?=$hname?>admin/index.php?articles<?=$get?>&p=1">1</a></li>
			<li><a href="<?=$hname?>admin/index.php?articles<?=$get?>&p=<?=$eight*8?>">...</a></li>
		<? endif; ?>	
		<? for ($i = $pstart; $i <= $pend; $i++) : ?>
		<li class="<?=($page==$i)?'active':''?>"><a href="<?=$hname?>admin/index.php?articles<?=$get?>&p=<?=$i?>"><?=$i?></a></li>
		<? endfor; ?>
		<? if ($dots2 == 1) : ?>
			<li><a href="<?=$hname?>admin/index.php?articles<?=$get?>&p=<?=$eight*8+9?>">...</a></li>
			<li><a href="<?=$hname?>admin/index.php?articles<?=$get?>&p=<?=$pages?>"><?=$pages?></a></li>
		<? endif; ?>	
		<li class="<?=($page==$pages)?'disabled':''?>"><a href="<?=($page==$pages)?"#":($hname."admin/index.php?articles$get&p=".($page+1))?>">&raquo;</a></li>
	</ul>
</div>
<? else : ?>
<div class="text-left text-muted" style="margin:5px 10px">
	Всего записей: <span class="text-primary"><b><?=$cnt['cid']?></b></span>
</div>
<? endif; ?>
