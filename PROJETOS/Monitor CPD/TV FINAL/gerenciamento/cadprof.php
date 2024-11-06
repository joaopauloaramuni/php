<?php

require_once 'professor.class.php';

$nome = $_POST['professor'];
$x = $_GET['x'];

$professor = new professor('', $nome);
if ($nome == "Professor" || $nome == ""){
	include 'atualiza.php';
	header("location:../interface/buscaprof.php?msg=Nome do Professor Inválido");
} else {	
	try{
		$professores = $professor->cadastrar();
		include 'update.php';
		if ($x == 0){
			header("location:../interface/buscaprof.php?msg=Professor Cadastrado Com Sucesso!");
		} else {
			header("location:../interface/docbusca.php?msg=Professor Cadastrado Com Sucesso!&dia=".$x."");
		}
	} catch(Exception $e){
		if ($x == 0){
			header("location:../interface/buscaprof.php?msg=".$e->getMessage()."&erro=1");
		} else {
			header("location:../interface/docbusca.php?msg=".$e->getMessage()."&erro=1&dia=".$x."");
		}
	}
}
?>