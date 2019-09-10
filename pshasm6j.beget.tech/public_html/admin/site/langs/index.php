<style>
    .user-table 
	{
	width: 900px;
	}
</style>
<?
	if ( (isset($_POST['cmd'])) and ($_POST['cmd'] == "add") )
	{
		
		$ids = "";
		for ($i=1; $i<=$_POST['i']; $i++)
		{
			if ( (isset($_POST["id$i"])) and ($_POST["id$i"] != 'NEW') )
			{
				$sql = "UPDATE langs
						SET name='{$_POST['name'.$i]}'
						WHERE id = {$_POST["id$i"]}";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$ids .= ", " . $_POST["id$i"];
			}
			elseif ( (isset($_POST["id$i"])) and ($_POST["id$i"] == 'NEW') and ($_POST["name$i"] != '') )
			{
				$sql = "INSERT INTO langs
						( pref, name )
						VALUES
						( '{$_POST['pref'.$i]}', '{$_POST['name'.$i]}' )";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$ids .= ", " . mysql_insert_id();
				$sql = "ALTER TABLE items ADD info_{$_POST['pref'.$i]} VARCHAR( 500 ) NOT NULL DEFAULT  ''";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$sql = "ALTER TABLE items ADD name_{$_POST['pref'.$i]} VARCHAR( 200 ) NOT NULL DEFAULT  '' AFTER  name_ru";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$sql = "ALTER TABLE items ADD seo_{$_POST['pref'.$i]} VARCHAR( 200 ) NOT NULL DEFAULT  '' AFTER  name_ru";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$sql = "ALTER TABLE authors ADD name_{$_POST['pref'.$i]} VARCHAR( 100 ) NOT NULL DEFAULT  ''";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$sql = "ALTER TABLE depicts ADD name_{$_POST['pref'.$i]} VARCHAR( 100 ) NOT NULL DEFAULT  ''";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$sql = "ALTER TABLE extras ADD name_{$_POST['pref'.$i]} VARCHAR( 100 ) NOT NULL DEFAULT  ''";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$sql = "ALTER TABLE genre2s ADD name_{$_POST['pref'.$i]} VARCHAR( 100 ) NOT NULL DEFAULT  ''";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$sql = "ALTER TABLE genres ADD name_{$_POST['pref'.$i]} VARCHAR( 100 ) NOT NULL DEFAULT  ''";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$sql = "ALTER TABLE techs ADD name_{$_POST['pref'.$i]} VARCHAR( 100 ) NOT NULL DEFAULT  ''";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$sql = "ALTER TABLE types ADD name_{$_POST['pref'.$i]} VARCHAR( 100 ) NOT NULL DEFAULT  '';";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				
				$sql = "ALTER TABLE articles ADD name_{$_POST['pref'.$i]} VARCHAR( 200 ) NOT NULL DEFAULT  '' AFTER  name_ru";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$sql = "ALTER TABLE articles ADD seo_{$_POST['pref'.$i]} VARCHAR( 200 ) NOT NULL DEFAULT  '' AFTER  name_ru";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$sql = "ALTER TABLE articles ADD short_text_{$_POST['pref'.$i]} TEXT NOT NULL DEFAULT  '';";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$sql = "ALTER TABLE articles ADD text_{$_POST['pref'.$i]} TEXT NOT NULL DEFAULT  '';";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$sql = "ALTER TABLE articles ADD country_{$_POST['pref'.$i]} TEXT NOT NULL DEFAULT  '';";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$sql = "ALTER TABLE articles ADD author_{$_POST['pref'.$i]} VARCHAR( 200 ) NOT NULL DEFAULT  '';";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
				$sql = "ALTER TABLE articles ADD issue_{$_POST['pref'.$i]} VARCHAR( 300 ) NOT NULL DEFAULT  '';";
				$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
			}		
		}
		if ( $ids != "" )
		{
			$sql = "SELECT pref FROM langs WHERE id NOT IN ( ".substr($ids,2)." ) ";
			$res  = mysql_query($sql);		
			while ( $row = mysql_fetch_array($res,MYSQL_ASSOC) ) {
				$sqld = "ALTER TABLE items DROP info_{$row['pref']}";
				$resd = mysql_query($sqld);		
				$sqld = "ALTER TABLE items DROP name_{$row['pref']}";
				$resd = mysql_query($sqld);		
				$sqld = "ALTER TABLE authors DROP name_{$row['pref']}";
				$resd = mysql_query($sqld);		
				$sqld = "ALTER TABLE depicts DROP name_{$row['pref']}";
				$resd = mysql_query($sqld);		
				$sqld = "ALTER TABLE extras DROP name_{$row['pref']}";
				$resd = mysql_query($sqld);		
				$sqld = "ALTER TABLE genre2s DROP name_{$row['pref']}";
				$resd = mysql_query($sqld);		
				$sqld = "ALTER TABLE genres DROP name_{$row['pref']}";
				$resd = mysql_query($sqld);		
				$sqld = "ALTER TABLE techs DROP name_{$row['pref']}";
				$resd = mysql_query($sqld);		
				$sqld = "ALTER TABLE types DROP name_{$row['pref']}";
				$resd = mysql_query($sqld);		
				
				$sqld = "ALTER TABLE articles DROP title_{$row['pref']}";
				$resd = mysql_query($sqld);		
				$sqld = "ALTER TABLE articles DROP short_text_{$row['pref']}";
				$resd = mysql_query($sqld);		
				$sqld = "ALTER TABLE articles DROP text_{$row['pref']}";
				$resd = mysql_query($sqld);		
				$sqld = "ALTER TABLE articles DROP country_{$row['pref']}";
				$resd = mysql_query($sqld);		
				$sqld = "ALTER TABLE articles DROP author_{$row['pref']}";
				$resd = mysql_query($sqld);		
				$sqld = "ALTER TABLE articles DROP issue_{$row['pref']}";
				$resd = mysql_query($sqld);		
				
				$sqld = "DELETE FROM langs WHERE pref='{$row['pref']}'";
				$resd  = mysql_query($sqld);		
			}			
		}
		
		print'
		<script>
			document.location.href="'.$hname.'admin/index.php?langs";
		</script>
		';
	}

	$sql = "SELECT *
			FROM langs
			ORDER BY id";
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
			<td class="col-md-1 text-center"><small>ID</small></td>
			<td class="col-md-3 text-center"><small>Префикс (латиница, 2-3 буквы)</small></td>
			<td class="col-md-7 text-center"><small>Название</small></td>
			<td class="col-md-1"><small></small></td>
		</tr>
		</thead>
		<tbody>
		<? $i = 1; ?>
		<? while ( $row = mysql_fetch_array($res,MYSQL_ASSOC) ) : ?>
		<tr id="tr<?=$i?>">
			<td class="col-md-1"><input type="text" name="id<?=$i?>" id="id<?=$i?>" class="form-control" value="<?=$row['id']?>" readonly></td>
			<td class="col-md-3"><input type="text" name="pref<?=$i?>" id="pref<?=$i?>" class="form-control" value="<?=$row['pref']?>" readonly></td>
			<td class="col-md-7"><input type="text" name="name<?=$i?>" id="name<?=$i?>" class="form-control" value="<?=$row['name']?>"></td>
			<td class="col-md-1"><a href="javascript:void(0)" onclick="del_st('<?=$i?>');" class="btn btn-default glyphicon glyphicon-remove" title="Удалить"></a></td>
		</tr>
		<? $i++; ?>
		<? endwhile; ?>
		<tr id="end_table">
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
		row += '<td class="col-md-3"><input type="text" name="pref'+i+'" id="pref'+i+'" class="form-control" value=""></td>';
		row += '<td class="col-md-7"><input type="text" name="name'+i+'" id="name'+i+'" class="form-control" value=""></td>';
		row += '<td class="col-md-1"><a href="javascript:void(0)" onclick="del_st('+"'tr"+i+"'"+');" class="btn btn-default glyphicon glyphicon-remove" title="Удалить станцию"></a></td>';
		row += '</tr>';
		$( row ).insertBefore( "#end_table" );
	}
	
	function del_st(id)
	{
		if ( id == 1 ) {
			alert("Русский язык нельзя удалить!");
		}
		else if ( confirm('Вы действително уверены, что надо удалить этот язык?') ) {
			$('#tr'+id).remove();
			alert("Пока вы не нажали 'Сохранить' язык еще не удален, подумайте хорошо!")
		} 
	}

</script>


