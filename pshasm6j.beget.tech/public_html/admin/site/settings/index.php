<style>
    .user-table 
	{
	width: 900px;
	}
</style>
<?
	if ( isset($_POST['log']) )
	{
		$sql = "UPDATE admin
				SET login='{$_POST['log']}', password='{$_POST['pw']}'";
		$res = @mysql_query($sql) or die ($sql."<br />".mysql_error());
	}
		
	$sql = "SELECT * 
			FROM admin";
	$res = @mysql_query($sql) or die (mysql_error());	
	$adm = mysql_fetch_array($res,MYSQL_ASSOC);

?>

<form type="submit" method="POST">
<table class="table table-striped user-table -table-condensed">
	<tr><th>
		<h3>Настройки администратора</h3>
	</th></tr>
	<tr><td>
		Логин
		<input class="form-control" name="log" value="<?=$adm['login']?>">
	</td></tr>
	<tr><td>
		Пароль
		<input class="form-control" name="pw" value="<?=$adm['password']?>">
	</td></tr>
	<tr><th class="text-right" >
		<button type="submit" class="btn btn-success">Сохранить</button>
	</th></tr>
	<tr><th class="text-left" >
		<a href="http://charskie.com/bkp/dump.sql" class="btn btn-default">Скачать бэкап базы</a>  <-- Нажать правой кнопкой, "Сохранить ссылку как"
	</th></tr>
</table>
</form>

<script>
	function save_bkp()
	{
		$.ajax(
		{
			async: false,
			type: "POST", 
			url: "<?=$hname?>" + "admin/_ajax.php?do_save_bkp",
			data: "",
			success: function(msg){
				alert(msg);
			},
			error:  function(xhr, str)
			{
				alert('Возникла ошибка: ' + xhr.responseCode);
			}
		});		
	}
</script>