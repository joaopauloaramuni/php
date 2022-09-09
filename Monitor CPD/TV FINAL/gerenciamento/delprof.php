<?php

require_once 'professor.class.php';

$idprofessor = $_GET['idprof'];

$professor = new professor($idprofessor, "");

	try{
		$professores = $professor->deletar();
		include 'update.php';
		header("location:../interface/buscaprof.php?msg=Professor Apagado Com Sucesso!");
	}catch(Exception $e){
		header("location:../interface/buscaprof.php?msg=".$e->getMessage()."&erro=1");
	}

?>