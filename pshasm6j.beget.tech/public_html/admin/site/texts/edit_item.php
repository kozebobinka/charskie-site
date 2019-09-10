<style>
    .user-table 
	{
		width: 900px;
	}
</style>
<?	
	if ( isset($_POST['id']) )
	{
		$names = "";
		$vals  = "";
		if ( $_POST['id'] == 'new' )
		{
			foreach ( $_POST as $key => $val )
				if ( $key != 'id' )
				{
					$names .= ",$key";
					$vals  .= ",'$val'";
				}
			$names = substr($names,1);
			$vals  = substr($vals,1);
			
			$sql = "INSERT INTO a_text 
					( $names )
					VALUES
					( $vals  )";
			$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
			$id  = mysql_insert_id();
		}
		else
		{
			foreach ( $_POST as $key => $val ) 
				$vals .= ",$key='$val'";	
			$vals = substr($vals,1);
			
			$sql = "UPDATE a_text 
					SET $vals
					WHERE id={$_POST["id"]}";
			$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
			$id  = $_POST["id"];
		}
		print'
			<script>
				document.location.href="'.$hname.'admin/index.php?texts";
			</script>
			';
	}
	
	$new = ( $_GET['text_id'] == 'new' ) ? TRUE : FALSE;
	
	if ( !$new )
	{
		$sql = "SELECT * 
				FROM a_text
				WHERE id={$_GET['text_id']}";
		$res = @mysql_query($sql);
		$row = mysql_fetch_array($res,MYSQL_ASSOC);
	}
?>

<form enctype="multipart/form-data" type="submit" method="POST">
<input type="hidden" name="id" value="<?=$_GET['text_id']?>">
<table class="table user-table">
	<tr>
		<th class="text-muted col-md-3"><b>Название</b></th>
		<td><input type="text" id="name" name="name" class="form-control" value="<?=($new)?'':$row['name']?>" required="required"></td>
	</tr>
	<tr>
		<th class="text-muted" colspan="2">
			<b>Текст на русском</b>
			<textarea name="text_ru" id="text_ru"><?=($new)?'':$row['text_ru']?></textarea>
		</th>
	</tr>
	<tr>
		<th class="text-muted" colspan="2">
			<b>Текст на украинском</b>
			<textarea name="text_ua" id="text_ua"><?=($new)?'':$row['text_ua']?></textarea>
		</th>
	</tr>
	<tr>
		<th class="text-muted" colspan="2">
			<b>Текст на английском</b>
			<textarea name="text_en" id="text_en"><?=($new)?'':$row['text_en']?></textarea>
		</th>
	</tr>
	<tr>
		<th class="text-muted" colspan="2">
			<b>Текст на турецком</b>
			<textarea name="text_tr" id="text_tr"><?=($new)?'':$row['text_tr']?></textarea>
		</th>
	</tr>
	<tr>
		<th class="text-muted col-md-3"><b>Мета тэг DESCRIPTION</b></th>
		<td><textarea class="form-control" name="descr" rows="4"><?=($new)?'':$row['descr']?></textarea></td>
	</tr>
	<tr>
		<th class="text-muted col-md-3"><b>Мета тэг KEYWORDS</b></th>
		<td><textarea class="form-control" name="keywords" rows="4"><?=($new)?'':$row['keywords']?></textarea></td>
	</tr>
	<tr>
	<th class="text-muted text-right" colspan="2">
		<button type="submit" class="btn btn-success">Сохранить</button>
		</th>
	</tr>

</table>
</form>
 
<script type="text/javascript">
	var komm_editor1 = CKEDITOR.replace('text_ru');
	var komm_editor2 = CKEDITOR.replace('text_ua');
	var komm_editor3 = CKEDITOR.replace('text_en');
	var komm_editor4 = CKEDITOR.replace('text_tr');
	AjexFileManager.init({
		returnTo: "ckeditor",
		editor: komm_editor1
	});
	AjexFileManager.init({
		returnTo: "ckeditor",
		editor: komm_editor2
	});
	AjexFileManager.init({
		returnTo: "ckeditor",
		editor: komm_editor3
	});
	AjexFileManager.init({
		returnTo: "ckeditor",
		editor: komm_editor4
	});

</script>


