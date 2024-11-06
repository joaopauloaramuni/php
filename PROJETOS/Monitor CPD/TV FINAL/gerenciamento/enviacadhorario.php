<?php

require_once 'horario.class.php';

if (isset($_GET['dia'])){
	$dias = $_GET['dia'];
	$id = 1;
} else $id = 0;

if (isset($_GET['turno'])){
	$turno = $_GET['turno'];
} else $turno = 2;

$professor = $_POST['professor'];
$materia = $_POST['materia'];
$laboratorio = $_POST['laboratorio'];
$horarioinicial = $_POST['hora'];

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
	$horariofinal = 1500;
}

$erro = "";
if ($professor == 0) $erro = "Você Deve Selecionar o Professor.";
elseif ($materia == 0)	$erro = "Você Deve Selecionar a Matéria.";
elseif ($laboratorio == 0)	$erro = "Você Deve Selecionar o Laboratório.";
elseif ($horarioinicial != 740 && $horarioinicial != 940 && $horarioinicial != 1800 && $horarioinicial != 2040) $erro = "Você Deve Selecionar o Horário.";
/*
echo "Erro: $erro <br>
 Prof: $professor <br>
 Mat: $materia <br>
 Lab: $laboratorio <br>
 Hora Ini: $horarioinicial <br>
 Hora Fim: $horariofinal <br>
 Dia: $diames <br>
 Semana: $diasemana <br>";
*/
	$banco = new banco();
	$banco->conecta();
	
	$sql = "select * from horario where (laboratorio = '$laboratorio' && horario_inicial = '$horarioinicial' && diames = '$diames' && diasemana = '$diasemana') ";
	$rs=mysql_query($sql);

	if (@mysql_num_rows($rs)){
		echo "<br>Horário Ocupado";
		header("location:../interface/docbusca.php?dia=".$dias."&msg=Horário Já Ocupado!");
	}else if ($erro == ""){
		$horario = new horario("", "$professor", "$materia", "$laboratorio", "$horarioinicial", "$horariofinal", "$diames", "$diasemana");
		/*
		echo "<br><br>Erro: $erro <br>
		 Prof: $horario->prof <br>
		 Mat: $horario->mat <br>
		 Lab: $horario->lab <br>
		 Hora Ini: $horario->horario_inicial <br>
		 Hora Fim: $horario->horario_final <br>
		 Dia: $horario->diames <br>
		 Semana: $horario->diasemana <br>";
		*/
		include 'update.php';
		
		try{
			$horarios = $horario->cadastrar();
			if ($id == 0){
				header("location:../interface/cadHorario.php?msg=Horário Não Cadastrado Com Sucesso!");
			} else header("location:../interface/docbusca.php?msg=Horário Cadastro Com Sucesso!&dia=".$dias."&turno=".$turno."");
		}catch(Exception $e){
			if ($id == 0){
				header("location:../interface/cadHorario.php?msg=".$e->getMessage());
			} else header("location:../interface/docbusca.php?msg=".$e->getMessage()."&dia=".$dias."&turno=".$turno."");
		}
	} else header("location:../interface/docbusca.php?msg=".$erro."&dia=".$dias."&turno=".$turno."");

?>