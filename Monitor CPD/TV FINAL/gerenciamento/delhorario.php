<?php

require_once 'horario.class.php';

$dia = $_GET['dia'];
$idhorario = $_GET['idhorario'];
$turno = $_GET['turno'];

$horario = new horario($idhorario, "", "", "", "", "", "", "");
if ($dia < 8){
	try{
		$clientes = $horario->deletar();
		include 'update.php';
		header("location:../interface/docbusca.php?msg=Horário Apagado Com Sucesso!&dia=$dia&turno=".$turno."");
	}catch(Exception $e){
		header("location:../interface/docbusca.php?msg=".$e->getMessage()."&dia=$dia"."&erro=1&turno=".$turno."");
	}
} else {
	try{
		$clientes = $horario->deletar();
		include 'update.php';
		header("location:../interface/buscames.php?msg=Horário Deletado Com Sucesso!&mes=$dia");
	}catch(Exception $e){
		header("location:../interface/buscames.php?&msg=".$e->getMessage()."&mes=$dia"."&erro=1");
	}
}

?>