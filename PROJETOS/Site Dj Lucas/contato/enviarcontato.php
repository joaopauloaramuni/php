<?php

require_once '../config.php';

$nome = $_POST['nome'];
$assunto = $_POST['assunto']; 
$email =  $_POST['email'];
$mensagem =  $_POST['mensagem'];

$result = mysql_query("INSERT INTO contato (nome, assunto, email, mensagem) VALUES ('$nome', '$assunto', '$email', '$mensagem')");

if ($result)
	header("location: ../contato/?Contato Registrado Com Sucesso!");
else
	header("location: ../contato/?Não Foi possivel registrar o contato!");
	
?>