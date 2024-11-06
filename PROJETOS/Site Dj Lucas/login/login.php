<?php

require_once '../config.php';

$user = $_POST['usuariologin'];
$pass = md5(md5(md5($_POST['senhalogin'])));

$result = mysql_query("SELECT * FROM user WHERE USER = '$user' AND PASSWORD = '$pass'"); 

if(mysql_num_rows($result) == 1) {
	$row = mysql_fetch_assoc($result);
	
	$_SESSION['valida'] = 10;
	$_SESSION['user'] = $user;
	$_SESSION['user_id'] = $row['id'];
	$_SESSION['nome'] = $row['name'];
	
	header("location: ../restrito/");
} else {
	header("location: ../login/?error=Usuário e/ou Senha inválidos!");
}

?>