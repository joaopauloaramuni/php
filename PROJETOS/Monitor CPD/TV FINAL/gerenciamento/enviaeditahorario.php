<?php

require_once 'horario.class.php';

$idhorario=$_GET['idhorario'];
$professor = $_POST['professor'];
$materia = $_POST['materia'];
$laboratorio = $_POST['laboratorio'];
$horarioinicial = $_POST['hora'];

if(isset($_POST['dia'])){
	$dias = $_GET['dia'];	
}else $dias = 1;

if(isset($_POST['miSelect'])){
	$diasemana = $_POST['miSelect'];
} else $diasemana = "0";

if(isset($_POST['dia']) && isset($_POST['mes']) && isset($_POST['ano'])){
	$dia = $_POST['dia'];
	$mes = $_POST['mes'];
	$ano = $_POST['ano'];
	$diames = "$ano-$mes-$dia";
	if($dia == "Dia") header("location:../interface/docbusca.php?dia=".$dias."&msg=Dia Inválido");
} else $diames = "0";

if ($horarioinicial == 1800){
	$horariofinal = 2039;
}
if (($horarioinicial == 2040)){
	$horariofinal = 2235;
}

if ($horarioinicial == 740){
	$horariofinal = 920;
}

if (($horarioinicial == 940)){
	$horariofinal = 1120;
}

//echo "<br>Professor: $professor - Matéria: $materia - Laboratorio: $laboratorio - Hora Ini: $horarioinicial - Hora Fim: $horariofinal - Dia Mes: $diames - Dia Semana: $diasemana";

$erro = "";

if ($professor == "Professor"){
	$erro = "Professor Inválido!";
}
if ($materia == "Matéria"){
	$erro = "Matéria Inválida!";
}
if ($laboratorio == 0){
	$erro = "Laboratório Inválido!";
}
if ($horarioinicial != 700 && $horarioinicial != 940 && $horarioinicial != 1800 && $horarioinicial != 2040){
	$erro = "Horário Inválido";
}
if ($diasemana == "0" && $diames == "2011-Mes-Dia"){
	$erro = "Você Deve Escolher a Data";
}

if ($erro != ""){
	header("location:../interface/docbusca.php?dia=".$dias."&msg=".$erro."");
}

//MANDA OS DADOS PARA A CLASSE PARA SEREM EDITADOS
try {
	$horarios = new horario($idhorario, $professor, $materia, $laboratorio, $horarioinicial, $horariofinal, $diames, $diasemana);
	$horarios->editar();
	if ($dias >= 1 && $dias <= 9) header("location:../interface/docbusca.php?dia=".$dias."&msg=Horário Editado Com Sucesso!");
	else if ($dias >= 10 && $dias <= 21) header("location:../interface/buscames.php?mes=".$dias."&msg=Horário Editado Com Sucesso!");
} catch (Exception $e) {
	if ($dias >= 1 && $dias <= 9) header("location:../interface/docbusca.php?dia=".$dias."&msg=".$e->getMessage()."");
	else if ($dias >= 10 && $dias <= 21) header("location:../interface/buscames.php?mes=".$dias."&msg=".$e->getMessage()."");
}

?>