<?php

require_once "header.php";

echo '<div class="container text-center">';
echo '<div class="row">';
echo '<div class="col-5 mx-auto">';

$user = $_POST['user'];
$pass = $_POST['pass'];
 
if($user == "admin" && $pass == "123")
{?>
	<p>Логин и пароль указаны верно!</p>
	<form method="POST" action="admin.php">
		<input class="form-control" type="hidden" name="user" value="<? echo $user ?>"></input>
		<input class="form-control" type="hidden" name="pass" value="<? echo $pass ?>"></input>
		<input class="btn btn-warning btn btn-default" type="submit" name="submit" value="Обновить"></input>
	</form>
<?}
else
{
	if(isset($_POST))
	{?>
		<h3>Для работы нужен логин и пароль</h3>
		<form method="POST" action="">
			Логин <input class="form-control" type="text" name="user"></input><br/>
			Пароль <input class="form-control" type="password" name="pass"></input><br/>
			<input class="btn btn-warning btn btn-default" type="submit" name="submit" value="Войти"></input>
		</form>
    <?}
}

echo '</div>';
echo '</div>';
echo '</div>';

?>