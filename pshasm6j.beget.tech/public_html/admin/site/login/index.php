<link href="<?=$hname?>admin/site/login/signin.css" rel="stylesheet">

<div class="container">
	<form class="form-signin" method="POST">
		<h2 class="form-signin-heading">Панель администратора</h2>
		<label for="login" class="sr-only">Логин</label>
		<input type="text" id="login" name="login" class="form-control" placeholder="Login" required autofocus>
		<label for="pw" class="sr-only">Пароль</label>
		<input type="password" id="pw" name="pw" class="form-control" placeholder="Password" required>
		<? if ( isset($err) and ($err != "") ) : ?>
		<h5 class="text-danger"><?=$err?></h5>
		<? endif; ?>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button>
	</form>		
</div> 

