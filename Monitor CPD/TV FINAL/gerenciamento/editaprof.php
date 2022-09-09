<?php

require_once 'professor.class.php';

$prof = $_POST['professor'];
$idprofessor=$_GET['idhorario'];

if ($prof == 'Professor'){
		header("location:buscaprof.php?msg=Não Foi Possível Editar");
} else {
	
	$professor = new professor($idprofessor, $prof);

	try{
		$professores = $professor->editar();
		include 'update.php';
		header("location:../interface/buscaprof.php?msg=Professor Editado Com Sucesso!");
	}catch(Exception $e){
		header("location:../interface/buscaprof.php?msg=Professor Não Foi Editado!&erro=1");
	}
}


?>