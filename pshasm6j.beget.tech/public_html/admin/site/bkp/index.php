<style>
    .user-table 
	{
	width: 900px;
	}
</style>
<?
	$dir  = "../bkp/"; 	
	$files = array();
	
	// Открыть заведомо существующий каталог и начать считывать его содержимое 
	if (is_dir($dir)) { 
		if ($dh = opendir($dir)) { 
			while (($file = readdir($dh)) !== false) { 
				if (strlen($file) > 4) {
					$files[] = $file;
				}
			} 
			closedir($dh); 
		} 
	} 
?>
<form enctype="multipart/form-data" type="submit" method="POST">
	<input type="hidden" name="cmd" value="add">
	<table class="table user-table table-striped table-condensed" >
		<thead>
		<tr class="success">
			<td class="col-md-1 text-center"><small>#</small></td>
			<td class="col-md-9 text-center"><small>Имя файла</small></td>
			<td class="col-md-2 text-center"><small>Восстановить</small></td>
		</tr>
		</thead>
		<tbody>
		<? $i = 1; ?>
		<? foreach ( $files as $val ) : ?>
		<tr id="tr<?=$i?>">
			<td class="text-center"><?=$i?></td>
			<td><?=$val?></td>
			<td class="text-center"><a href="javascript:void(0)" onclick="restore_dump('<?=$val?>');" class="btn btn-default glyphicon glyphicon-export" title="Восстановить"></a></td>
		</tr>
		<? $i++; ?>
		<? endforeach; ?>
		<tr id="end_table">
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<th class="text-muted text-left" colspan="7">
				<a href="javascript:void(0)" onclick="create_dump();" class="btn btn-success">Создать резервную копию базы</a>
			</th>
		</tr>
		</tfoot>
		
	</table>
	<input type="hidden" id="i" name="i" value="<?=$i?>">
</form>

<script>
	"use strict"
	function restore_dump(f)
	{
		if ( confirm('Вы уверены?') ) {
			$.ajax(
			{
				async: false,
				type: "POST", 
				url: "<?=$hname?>" + "admin/_ajax.php?restore_dump",
				data: "&file=" + f,
				success: function(msg){
					alert ('Восстановлено!');
				},
				error:  function(xhr, str)
				{
					alert('Возникла ошибка: ' + xhr.responseCode);
				}
			});			
		}
	}
	
	function create_dump()
	{
		$.ajax(
		{
			async: false,
			type: "POST", 
			url: "<?=$hname?>" + "admin/_ajax.php?create_dump",
			success: function(msg){
				location.reload();
			},
			error:  function(xhr, str)
			{
				alert('Возникла ошибка: ' + xhr.responseCode);
			}
		});			

	}

</script>


