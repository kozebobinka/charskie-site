<style>
    .user-table 
	{
	width: 900px;
	}
</style>
<?
	$sql = "SELECT *
			FROM links
			ORDER BY dt DESC";
	$res = @mysql_query($sql);

?>
<form enctype="multipart/form-data" type="submit" method="POST">
	<input type="hidden" name="cmd" value="add">
	<table class="table user-table table-striped table-condensed" >
		<thead>
		<tr>
			<th class="text-muted text-right" colspan="4"><a href="javascript:void(0)" onclick="add_st();" class="btn btn-info glyphicon glyphicon-plus" title="Добавить"></a></th>
		</tr>
		<tr class="success">
			<td class="col-md-2 text-center"><small>Дата</small></td>
			<td class="col-md-4 text-center"><small>Название</small></td>
			<td class="col-md-5 text-center"><small>Ссылка</small></td>
			<td class="col-md-1 text-center"><small>Удалить</small></td>
		</tr>
		</thead>
		<tbody>
		<? while ( $row = mysql_fetch_array($res,MYSQL_ASSOC) ) : ?>
		<tr id="tr<?=$i?>">
			<td class="text-center"><?=$row['dt']?></td>
			<td class="text-center"><?=$row['name']?></td>
			<td class="text-center"><a href="<?=$hname?>admin/index.php?items<?=$row['link_get']?>"><?=$row['link_get']?></a></td>
			<td class="text-center"><a href="javascript:void(0)" onclick="del_link('<?=$row['id']?>');" class="btn btn-sm btn-default glyphicon glyphicon-remove" title="Удалить"></a></td>
		</tr>
		<? endwhile; ?>
		<tr id="end_table">
		</tr>
		</tbody>
		
	</table>
</form>

<script>
	"use strict"
	
	function del_link(id)
	{
		if ( confirm('Вы уверены?') ) {
			$.ajax(
			{
				async: false,
				type: "POST", 
				url: "<?=$hname?>" + "admin/_ajax.php?do_del",
				data: "&id=" + id + "&table=links",
				success: function(msg) {
					location.reload();
				},
				error:  function(xhr, str)
				{
					alert('Возникла ошибка: ' + xhr.responseCode);
				}
			});			
		}
	}

</script>


