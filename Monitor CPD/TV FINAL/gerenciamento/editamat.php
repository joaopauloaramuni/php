<?php

require_once 'materia.class.php';

$mat = $_POST['materia'];
$idmateria=$_GET['idhorario'];

if ($mat == 'Matéria'){
		header("location:../interface/buscamat.php?msg=Nome Inválido");
} else {
	
	$materia = new materia($idmateria, $mat);
		
	try{
		$materias = $materia->editar();
		include 'update.php';
		header("location:../interface/buscamat.php?msg=Matéria Editado Com Sucesso!");
	}catch(Exception $e){
		header("location:../interface/buscamat.php?msg=Matéria Não Foi Editado!&erro=1");
	}
}


?>