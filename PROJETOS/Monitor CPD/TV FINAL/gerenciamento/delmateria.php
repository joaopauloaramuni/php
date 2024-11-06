<?php

require_once 'materia.class.php';

$idmateria = $_GET['idmat'];

$materia = new materia($idmateria, "");

	try{
		$materias = $materia->deletar();
		include 'update.php';
		header("location:../interface/buscamat.php?msg=Materia Apagada Com Sucesso!");
	}catch(Exception $e){
		header("location:../interface/buscamat.php?msg=".$e->getMessage()."&erro=1");
	}

?>