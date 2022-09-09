<?php

require_once 'materia.class.php';


$nome = $_POST['materia'];
$x = $_GET['x'];

$materia = new materia('', $nome);
if ($nome == "Matéria" || $nome == ""){
	include 'atualiza.php';
	header("location:../interface/buscamat.php?msg=Nome da Matéria Inválido");
} else {
	try{
		$materias = $materia->cadastrar();
		include 'update.php';
		if ($x == 0){
			header("location:../interface/buscamat.php?msg=Materia Cadastrada Com Sucesso!");
		} else {
			header("location:../interface/docbusca.php?msg=Materia Cadastrada Com Sucesso!&dia=".$x."");
		}
	} catch(Exception $e){
	if ($x == 0){
			header("location:../interface/buscamat.php?msg=".$e->getMessage()."&erro=1");
		} else {
			header("location:../interface/docbusca.php?msg=".$e->getMessage()."&erro=1&dia=".$x."");
		}
	}
}
?>