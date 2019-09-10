<?php
	
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	error_reporting(E_ALL);
	
	//include "func.php";
	include "../inc/conf.php";
	
	if (!isset($_SESSION['admin_logined']))
		$_SESSION['admin_logined'] = 0;
	
	$err = "";
	if ( isset($_POST['login']) )
	{
		$login = md5($_POST['login']);
		$pw    = md5($_POST['pw']);
		$sql   = "SELECT * 
				  FROM admin 
				  WHERE md5(login)='$login' AND md5(password)='$pw'";
	    $res   = @mysql_query($sql);
	    if ( mysql_num_rows($res) == 0 )
	    {
	    	$err = "Доступ запрещен!<br>Неверный логин или пароль.";
	    }
	    else 
	    {
	    	$_SESSION["admin_rows"]    = mysql_fetch_array($res);
	    	$_SESSION["admin_logined"] = 1;
	    }
	}
	if ( isset($_POST['logout']) and ($_POST['logout'] == "1") )
	{
	    unset($_SESSION["admin_rows"]);
	    $_SESSION["admin_logined"] = 0;
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Панель администратора</title>
		
		<link rel="stylesheet" href="<?=$hname?>admin/css/bootstrap.min.css">		
		<link rel="stylesheet" href="<?=$hname?>admin/js/chosen/chosen.css">
		<link rel="stylesheet" href="<?=$hname?>admin/js/summernote/summernote.css">
		
		<script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="<?=$hname?>admin/js/bootstrap.min.js"></script>
		<!--<script type="text/javascript" src="<?=$hname?>admin/js/ckeditor/ckeditor.js"></script>-->
		<script type="text/javascript" src="<?=$hname?>admin/js/summernote/summernote.js"></script>
		<script type="text/javascript" src="<?=$hname?>admin/js/AjexFileManager/ajex.js"></script>
		<script type="text/javascript" src="<?=$hname?>admin/js/moment/moment-with-locales.min.js"></script>
		<script type="text/javascript" src="<?=$hname?>admin/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="<?=$hname?>admin/js/chosen/chosen.jquery.min.js"></script>
		<!--<script type="text/javascript" src="<?=$hname?>admin/func.js"></script>-->
	</head>
	
	<body>
	<div id="my_popup" class="cls_error_win" ></div>	
		<? if ($_SESSION['admin_logined'] != 1) : ?>
			<? include "site/login/index.php"?>
		<? else : ?>
			<? include "site/index.php"?>
		<? endif; ?>
		
	</body>
</html>
