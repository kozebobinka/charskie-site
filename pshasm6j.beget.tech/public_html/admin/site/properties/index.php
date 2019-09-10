<style>
    .user-table 
	{
	width: 900px;
	}
</style>
<?
	$param = $_GET['property'];
	if ( (isset($_POST['cmd'])) and ($_POST['cmd'] == "add") )
	{
		$sql = "SELECT *
				FROM langs
				ORDER BY id";
		$res = @mysql_query($sql);
		while ( $row = mysql_fetch_array($res,MYSQL_ASSOC) ) {
			$lang[] = $row['pref'];
		}
		
		$ids = "";
		for ($i=1; $i<=$_POST['i']; $i++)
		{
			if ( (isset($_POST["id$i"])) and ($_POST["id$i"] != 'NEW') )
			{
				$set = "";
				foreach ( $lang as $val )
					$set .= ",name_$val='{$_POST['name_'.$val.$i]}'";
				$set = substr($set, 1);
				$sql = "UPDATE $param
						SET $set
						WHERE id = {$_POST["id$i"]}";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$ids .= ", " . $_POST["id$i"];
			}
			elseif ( (isset($_POST["id$i"])) and ($_POST["id$i"] == 'NEW') and ($_POST["name_ru$i"] != '') )
			{
				$keys = "";
				$vals = "";
				foreach ( $lang as $val ) {
					$keys .= ",name_$val";
					$vals .= ",'{$_POST['name_'.$val.$i]}'";
				}
				$keys = substr($keys, 1);
				$vals = substr($vals, 1);
				$sql = "INSERT INTO $param
						( $keys )
						VALUES
						( $vals )";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$ids .= ", " . mysql_insert_id();
			}		
		}
		if ( $ids != "" )
		{
			$sql = "DELETE FROM $param WHERE id NOT IN ( ".substr($ids,2)." ) ";
			$res  = mysql_query($sql);		
		}
		
		print'
		<script> 
			document.location.href="'.$hname.'admin/index.php?property='.$param.'";
		</script>
		';
	}

	$sql = "SELECT *
			FROM langs
			ORDER BY id";
	$res = @mysql_query($sql);
	while ( $row = mysql_fetch_array($res,MYSQL_ASSOC) ) {
		$lang[$row['pref']] = $row['name'];
	}
	$col_md = (int) (10 / count($lang)); 
	$colspan =  count($lang) + 2;

	$sql = "SELECT *
			FROM $param
			ORDER BY id";
	$res = @mysql_query($sql);
	
?>

<form enctype="multipart/form-data" type="submit" method="POST">
	<input type="hidden" name="cmd" value="add">
	<table class="table user-table table-striped table-condensed" >
		<thead>
		<tr>
			<th class="text-muted text-right" colspan="<?=$colspan?>"><a href="javascript:void(0)" onclick="add_st();" class="btn btn-info glyphicon glyphicon-plus" title="Добавить"></a></th>
		</tr>
		<tr class="success">
			<td class="col-md-1 text-center"><small>ID</small></td>
			<? foreach ($lang as $val) : ?>
			<td class="text-center col-md-<?=$col_md?>"><small><?=$val?></small></td>
			<? endforeach; ?>
			<td class="col-md-1"><small></small></td>
		</tr>
		</thead>
		<tbody>
		<? $i = 1; ?>
		<? while ( $row = mysql_fetch_array($res,MYSQL_ASSOC) ) : ?>
		<tr id="tr<?=$i?>">
			<td class="col-md-1"><input type="text" name="id<?=$i?>" id="id<?=$i?>" class="form-control" value="<?=$row['id']?>" readonly></td>
			<? foreach ($lang as $pr => $val) : ?>
			<td class="col-md-<?=$col_md?>"><input type="text" name="name_<?=$pr.$i?>" id="name_<?=$pr.$i?>" class="form-control" value="<?=htmlspecialchars($row['name_'.$pr])?>"></td>
			<? endforeach; ?>
			<td class="col-md-1"><a href="javascript:void(0)" onclick="del_st('<?=$i?>');" class="btn btn-sm btn-default glyphicon glyphicon-remove" title="Удалить"></a></td>
		</tr>
		<? $i++; ?>
		<? endwhile; ?>
		<tr id="end_vac">
		</tr>
		</tbody>
		<tfoot>
		<tr>
			<th class="text-muted text-right" colspan="7">
				<button type="submit" class="btn btn-success">Сохранить</button>
			</th>
		</tr>
		</tfoot>
		
	</table>
	<input type="hidden" id="i" name="i" value="<?=$i?>">
</form>

<script>
"use strict"
	function add_st()
	{
		var i = $("#i").val();
		$("#i").val(++i);
		var row = '<tr id="tr'+i+'">';
		row += '<td class="col-md-1"><input type="text" name="id'+i+'" id="id'+i+'" class="form-control" value="NEW" readonly></td>';
		<? foreach ($lang as $pr => $val) : ?>
		row += '<td class="col-md-<?=$col_md?>"><input type="text" name="name_<?=$pr?>'+i+'" id="name_<?=$pr?>'+i+'" class="form-control" value=""></td>';
		<? endforeach; ?>
		row += '<td class="col-md-1"><a href="javascript:void(0)" onclick="del_st('+"'tr"+i+"'"+');" class="btn btn-default glyphicon glyphicon-remove" title="Удалить станцию"></a></td>';
		row += '</tr>';
		$( row ).insertBefore( "#end_vac" );
	}
	
	function del_st(id)
	{
		$.ajax(
		{
			async: false,
			type: "POST", 
			url: "<?=$hname?>" + "admin/_ajax.php?check_del",
			data: "&id="+$('#id'+id).val()+"&param=<?=substr($param,0,strlen($param)-1)?>",
			success: function(msg){
				if (msg==1)
					alert("Этот параметр используется в одной или нескольких работах. Его нельзя удалить");
				else
					$('#tr'+id).remove();
			},
			error:  function(xhr, str)
			{
				alert('Возникла ошибка: ' + xhr.responseCode);
			}
		});		
	}

</script>


