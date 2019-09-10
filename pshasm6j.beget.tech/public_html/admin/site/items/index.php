<style>
.user-table { 
	width: 1000px; 
}
.img_div {
	display: table-cell;
	vertical-align: middle;
	height:190px;
	width:200px;
	background:#b5b5b5;
}

.img_prv {
	margin: auto;
	position: relative;
	max-height:190px;
	max-width:190px;
	display: block;   
}
.descr {
	line-height: 14px;
}
.descr a {
	color: black;
}
</style>

<? include "site/items/func.php"; ?>

<table class="table table-bordered user-table table-condensed">
<tbody>

<? $i = 1; ?>
<? while ( $row = mysql_fetch_array($wor,MYSQL_ASSOC) ) : ?>
<? if ($i % 5 == 1) : ?>
	<tr>
<? endif; ?>
		<td class="col-md-2">
			<a href="<?=$hname?>admin/index.php?items&item_id=<?=$row['id']?>">
				<div class="media img_div" >
					<img  class="img_prv" src="<?=$hname?>works/preview_adm/<?=$row['file'].'?'.time()?>">
				</div>	
			</a>
			<div class="descr">
				<?=$row['author']?>
				<br>
				<small>
					<a href="<?=$hname?>admin/index.php?items&item_id=<?=$row['id']?>"><?=$row['name']?></a>
					<br>
					<span class="text-muted"><?=$row['status']?></span>
					<br>
					<span class="text-muted">Приоритет: </span>
				</small>
				<?=$row['prior']?>
			</div>
		</td>
<? if ($i % 5 == 0) : ?>
	</tr>
<? endif; ?>
<? $i++; ?>
<? endwhile; ?>
<? $i--; ?>
<? if ($i % 5 != 0) : ?>
	<? for ( $j = $i % 5; $j < 5; $j++ ) : ?> 
		<td class="col-md-2">&nbsp;</td>
	<? endfor; ?>
	</tr>
<? endif; ?>
	

</tbody>
</table>

<? if ($paging) : ?>
<div class="text-center user-table" style="padding:20px 0 0 0">
	<div class="text-left text-muted" style="position:absolute; margin:5px 10px">
		Всего записей: <span class="text-primary"><b><?=$cnt['cid']?></b></span>
	</div>
	<ul class="pagination pagination-sm" style="margin:0 0 20px 0">
		<li class="<?=($page==1)?'disabled':''?>"><a href="<?=($page==1)?"#":($hname."admin/index.php?items$get&p=".($page-1))?>">&laquo;</a></li>
		<? if ($dots1 == 1) : ?>
			<li><a href="<?=$hname?>admin/index.php?items<?=$get?>&p=1">1</a></li>
			<li><a href="<?=$hname?>admin/index.php?items<?=$get?>&p=<?=$eight*8?>">...</a></li>
		<? endif; ?>	
		<? for ($i = $pstart; $i <= $pend; $i++) : ?>
		<li class="<?=($page==$i)?'active':''?>"><a href="<?=$hname?>admin/index.php?items<?=$get?>&p=<?=$i?>"><?=$i?></a></li>
		<? endfor; ?>
		<? if ($dots2 == 1) : ?>
			<li><a href="<?=$hname?>admin/index.php?items<?=$get?>&p=<?=$eight*8+9?>">...</a></li>
			<li><a href="<?=$hname?>admin/index.php?items<?=$get?>&p=<?=$pages?>"><?=$pages?></a></li>
		<? endif; ?>	
		<li class="<?=($page==$pages)?'disabled':''?>"><a href="<?=($page==$pages)?"#":($hname."admin/index.php?items$get&p=".($page+1))?>">&raquo;</a></li>
	</ul>
</div>
<? else : ?>
<div class="text-left text-muted" style="margin:5px 10px">
	Всего записей: <span class="text-primary"><b><?=$cnt['cid']?></b></span>
</div>
<? endif; ?>