<style>
    .user-table 
	{
		width: 900px;
	}
</style>
<?
	$rows4page = 20;

	$get = '?texts';

	$where = "(TRUE)";
	$table = "a_text";
	
	
	// поиск
	$search_str = '';
	if ( !isset($_GET['no_search']) and isset($_GET['search']) and (trim($_GET['search']) != ''))
	{
		$search_str = $_GET['search'];
		$where .= " AND ((id='$search_str') OR (LOWER(name) LIKE LOWER('%$search_str%'))) ";
	}
		
	// сортировка
	$order = " ORDER BY id ";
	
	// странички
	$paging = FALSE;
	$page   = 1;
	$limit  = '';
	if ( isset($_GET['p']) )
		$page = $_GET['p'];
	$sql = "SELECT COUNT(id) as cid 
		 	FROM $table
			WHERE $where";
	$res = @mysql_query($sql);
	$cnt = mysql_fetch_array($res,MYSQL_ASSOC);
	if ( $cnt['cid'] > $rows4page ) {
		$paging = TRUE;
		$pages  = ceil($cnt['cid'] / $rows4page);
		$offset = ($page-1)*$rows4page;
		$limit  = " LIMIT $rows4page OFFSET $offset";	
		// рассчеты для листинга
		$dots1  = 0;
		$dots2  = 0;
		$pstart = 1;
		$pend   = $pages;
		$eight  = 0;
		if ($pages > 10) 
		{
			$dots2 = 1;
			$pend  = 8;
			if ($page > 8) 
			{
				$dots1  = 1;
				$eight   = floor($page/8);
				if ( $page%8 == 0 ) 
					$eight--;
				$pstart = $eight * 8 + 1;
				$pend   = $pstart + 7;
				if ($pend >= $pages) 
				{
					$pend = $pages;
					$pstart = $pages - 7;
					$dots2 = 0;
				}
			}
		}	
	}
	$sql = "SELECT id, name 
		 	FROM $table
			WHERE $where $order $limit";
	$res = @mysql_query($sql);
?>

<table class="table table-striped table-hover user-table table-condensed">
<thead>
	<td colspan="3" class="info">
		<span class="col-md-7 text-left">&nbsp;</span>
		<span class="col-md-4 text-right">
			<div class="input-group">
				<input type="text" class="form-control" id="search" value="<?=$search_str?>" onkeydown="javascript:if(event.keyCode == 13) do_search();" >
				<span class="input-group-btn">
					<button id="do_search" class="btn btn-default" type="button" onclick="do_search();" title="Поиск"><span class="glyphicon glyphicon-search"></span></button>
				</span>
				<span class="input-group-btn">
					<button class="btn btn-default" type="button" onclick="do_clean_search();" title="Сбросить поиск"><span class="glyphicon glyphicon-remove"></span></button>
				</span>
			</div>			
		</span>		
		<span class="col-md-1 text-right">
			<a href="<?=$hname?>admin/index.php<?=$get?>&text_id=new" class="btn btn-default" type="button"  title="Добавить запись"><span class="glyphicon glyphicon-plus"></span><span class="glyphicon glyphicon-file"></span></a>	
		</span>		

	</td>
</thead>
<? while ( $texts = mysql_fetch_array($res,MYSQL_ASSOC) ) : ?>
<tr>
	<td class="col-md-1"><?=$texts['id']?></td>
	<td class="col-md-9"><a href="<?=$hname?>admin/index.php<?=$get?>&text_id=<?=$texts['id']?>"><?=$texts['name']?></a></td>
	<td class="col-md-2 text-right">
		<a href="<?=$hname?>admin/index.php<?=$get?>&text_id=<?=$texts['id']?>" class="glyphicon glyphicon-edit" title="Редактировать"></a>
		&emsp;
		<a href="javascript:void(0)" onclick="do_del(<?=$texts['id']?>, '<?=$table?>');" class="glyphicon glyphicon-remove" title="Удалить"></a>
	</td>
</tr>	
<? endwhile; ?>
<tfoot>
	<td colspan=3></td>
</tfoot>
</table>
<? if ($paging) : ?>
<div class="text-center user-table">
	<div class="text-left text-muted" style="position:absolute; margin:5px 10px">
		Всего записей: <span class="text-primary"><b><?=$cnt['cid']?></b></span>
	</div>
	<ul class="pagination pagination-sm" style="margin:0 0 0 0">
		<li class="<?=($page==1)?'disabled':''?>"><a href="<?=$hname?>admin/index.php<?=$get?>&p=<?=$page-1?>">&laquo;</a></li>
		<? if ($dots1 == 1) : ?>
			<li><a href="<?=$hname?>admin/index.php<?=$get?>&p=1">1</a></li>
			<li><a href="<?=$hname?>admin/index.php<?=$get?>&p=<?=$eight*8?>">...</a></li>
		<? endif; ?>	
		<? for ($i = $pstart; $i <= $pend; $i++) : ?>
		<li class="<?=($page==$i)?'active':''?>"><a href="<?=$hname?>admin/index.php<?=$get?>&p=<?=$i?>"><?=$i?></a></li>
		<? endfor; ?>
		<? if ($dots2 == 1) : ?>
			<li><a href="<?=$hname?>admin/index.php<?=$get?>&p=<?=$eight*8+9?>">...</a></li>
			<li><a href="<?=$hname?>admin/index.php<?=$get?>&p=<?=$pages?>"><?=$pages?></a></li>
		<? endif; ?>	
		<li class="<?=($page==$pages)?'disabled':''?>"><a href="<?=$hname?>admin/index.php<?=$get?>&p=<?=$page+1?>">&raquo;</a></li>
	</ul>
</div>
<? else : ?>
<div class="text-left text-muted" style="margin:5px 10px">
	Всего записей: <span class="text-primary"><b><?=$cnt['cid']?></b></span>
</div>
<? endif; ?>

<script>

function do_search()
{
	location.href = '<?=$hname?>admin/index.php<?=$get?>&search=' + $('#search').val();
}

function do_clean_search()
{
	$('#search').val('');
	location.href = '<?=$hname?>admin/index.php<?=$get?>&no_search=1';
}

function do_del(id, table)
{
	if ( confirm("Вы уверены, что хотите удалить эту запись?") ) 
	{
		$.ajax(
		{
			async: false,
			type: "POST", 
			url: "<?=$hname?>" + "admin/_ajax.php?do_del",
			data: "&id="+id+"&table="+table,
			success: function(msg)
			{
				location.href = '<?=$hname?>admin/index.php<?=$get?>&p=<?=$page?>';
			},
			error:  function(xhr, str)
			{
				alert('Возникла ошибка: ' + xhr.responseCode);
			}
		});
    }
}
</script>
