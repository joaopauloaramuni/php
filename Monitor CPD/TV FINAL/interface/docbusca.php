<html>
<head>
	<META HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=UTF-8'>
	<script type='text/javascript' src='../gerenciamento/global.js'></script>
	<link href='../gerenciamento/estilos.css' rel='stylesheet' type='text/css' />
	<title>Laboratórios CPD - Busca Semana</title>
</head>
<body style='overflow-x: hidden;'>
<center>
	<!-- COMECO DO MENU-->
	<div>
		<ul id="qm0" class="qmmc">
			<li><a onMouseOver="this.className='Anormal'" onMouseOut="this.className='Normal'" href="index.php">Inicio</a></li>
			<li><a onMouseOver="this.className='Anormal'" onMouseOut="this.className='Normal'" href="view.php">Visualizar</a></li>
			<li><a onmouseover="this.className='Anormal'" onmouseout="this.className='Normal'" href="docbusca.php?dia=2">Busca</a></li>
			<li><a onmouseover="this.className='Anormal'" onmouseout="this.className='Normal'" href="../gerenciamento/atualiza.php">Atualiza XML</a></li>
			<li class="qmclear">&nbsp;</li>
		</ul>
	</div>
	<!-- TERMINO DO MENU -->
<div class="divgeraldocbusca">
<?php 

require_once '../gerenciamento/horario.class.php';
		
	if(isset($_GET['dia'])){
		$dia = $_GET['dia'];	
	}
		
	//TURNO = 1 É MANHÃ / TURNO = 2 É NOITE
	if(isset($_GET['turno'])){
		$turno = $_GET['turno'];	
	} else $turno = 2;
		
	if ($dia == 1){
		if(isset($_GET['msg'])){
			$msg = $_GET['msg'];
			header("location:../interface/hoje.php?msg=".$msg."");
		} else {
			header("location:../interface/hoje.php");
		}
	}
		
	$horario = new horario ("", "", "", "", "", "", "", "");
	try {
		$horarios = $horario->buscadoc($dia, $turno);
	} catch (Exception $e) {
		$horarios = "";
	}
	
	$selecionado = "this.className=\"butaoselecionado\"";
	$classname = "this.className=\"butao\"";

	echo"  <div class='divmenulateral'>";
				if ($dia == 1)					
	echo "			<div class='butaoselecionado' id='1' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut=".$selecionado.">HOJE</div>";
				else 
	echo "			<div class='butao' id='1' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut=".$classname.">HOJE</div>";
				
				if ($dia == 2)					
	echo "			<div class='butaoselecionado' id='2' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut=".$selecionado.">SEGUNDA-FEIRA</div>";
				else 
	echo "			<div class='butao' id='2' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut=".$classname.">SEGUNDA-FEIRA</div>";
					
				if ($dia == 3)				
	echo "			<div class='butaoselecionado' id='3' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut=".$selecionado.">TERÇA-FEIRA</div>";
				else
	echo "			<div class='butao' id='3' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut=".$classname.">TERÇA-FEIRA</div>";
	 
				if ($dia == 4)								
	echo "			<div class='butaoselecionado' id='4' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut=".$selecionado.">QUARTA-FEIRA</div>";
				else 
	echo "			<div class='butao' id='4' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut=".$classname.">QUARTA-FEIRA</div>";
	
	
				if ($dia == 5)					
	echo "			<div class='butaoselecionado' id='5' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut=".$selecionado.">QUINTA-FEIRA</div>";
				else
	echo "			<div class='butao' id='5' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut=".$classname.">QUINTA-FEIRA</div>";
	
	
				if ($dia == 6)					
	echo "			<div class='butaoselecionado' id='6' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut=".$selecionado.">SEXTA-FEIRA</div>";
				else
	echo "			<div class='butao' id='6' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut=".$classname.">SEXTA-FEIRA</div>";
	
	
				if ($dia == 7)					
	echo "			<div class='butaoselecionado' id='7' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut=".$selecionado.">SÁBADO</div>";
				else 
	echo "			<div class='butao' id='7' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut=".$classname.">SÁBADO</div>";
					
	echo "			<div class='butao' id='8' onClick='location.href=\"buscaprof.php?dia=".$dia."&turno=".$turno."\"' onMouseOver='this.className=\"butaoh\"' onMouseOut=".$classname.">PROFESSORES</div>
					<div class='butao' id='9' onClick='location.href=\"buscamat.php?dia=".$dia."&turno=".$turno."\"' onMouseOver='this.className=\"butaoh\"' onMouseOut=".$classname.">MATÉRIAS</div>
				</div>";
		
	//"LIMPA" OS VETORES PARA SEREM NOVAMENTE UTILIZADOS
	for ($i = 1; $i<=11; $i++){
		for ($j = 0; $j <=5; $j++){
			$array[$i][$j] = "";	
		}
	}
		
	if ($horarios){
		foreach ($horarios as $horario) {
			for ($i = 1; $i <= 11; $i++){
				if ($turno == 1){
					//HORARIOS DA PARTE DA MANHÃ
					if ($horario->lab == $i && ($horario->horario_inicial == 740 || $horario->horario_inicial == 940)){
						//1º HORÁRIO DA MANHÃ
						if ($horario->horario_inicial == 740){
							$array[$i][0] = $horario->idhorario;
							$array[$i][1] = $horario->prof;
							$array[$i][2] = $horario->mat;
						} else if ($horario->horario_inicial == 940){
							//2º HORÁRIO DA MANHÃ
							$array[$i][3] = $horario->idhorario;
							$array[$i][4] = $horario->prof;
							$array[$i][5] = $horario->mat;
						}
					}
				} else {
					//HORARIOS DA PARTE DA NOITE
					if ($horario->lab == $i && ($horario->horario_inicial == 1800 || $horario->horario_inicial == 2040)){
						//1º HORÁRIO DA NOITE
						if ($horario->horario_inicial == 1800){
							$array[$i][0] = $horario->idhorario;
							$array[$i][1] = $horario->prof;
							$array[$i][2] = $horario->mat;
						} else if ($horario->horario_inicial == 2040){
							//2º HORÁRIO DA NOITE
							$array[$i][3] = $horario->idhorario;
							$array[$i][4] = $horario->prof;
							$array[$i][5] = $horario->mat;
						}
					}	
				}
			}	
		}
	}
	
	for($i=1;$i<=11; $i++){
		if($array[$i][1] == "" && $array[$i][2] == ""){
			$array[$i][0]="0";
			$array[$i][1]="&nbsp;";
			$array[$i][2]="&nbsp;";
		}
		if($array[$i][4] == "" && $array[$i][5] == ""){
			$array[$i][3]="0";
			$array[$i][4]="&nbsp;";
			$array[$i][5]="&nbsp;";
		}
	}
	
		echo "	
				<div class='divladomenu'>
					<div class='divcabecalho'>
						<span style='color: black; font-size: 30px; font-weight: bold;'>BUSCA</span>";
						if ($turno == 1) echo "<br><span style='font-size: 18px;'><u><b>Manhã</b></u></span>"; else echo "<br><span style='font-size: 18px;'><b><u>Noite</u></b></span>";
						if (isset($_GET ['msg']) && isset($_GET['erro'])){
		echo "				<div class='divmsgerro'>".$_GET ['msg']."</div>";
						} else if (isset($_GET ['msg'])){
		echo "				<div class='divmsg'>".$_GET ['msg']."</div>";
						} 
		echo "		</div>		

					<div style='margin-left: 24%; margin-top: 5px;'>
						<div style='margin-left: 4px;' class='mes' id='10' onClick='buscahorariomes(id, ".$turno.")' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>JANEIRO</div>
						<div style='margin-left: 4px;' class='mes' id='11' onClick='buscahorariomes(id, ".$turno.")' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>FEVEREIRO</div>
						<div style='margin-left: 4px;' class='mes' id='12' onClick='buscahorariomes(id, ".$turno.")' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>MARÇO</div>
						<div style='margin-left: 4px;' class='mes' id='13' onClick='buscahorariomes(id, ".$turno.")' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>ABRIL</div>
						<div style='margin-left: 4px;' class='mes' id='14' onClick='buscahorariomes(id, ".$turno.")' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>MAIO</div>
						<div style='margin-left: 4px;' class='mes' id='15' onClick='buscahorariomes(id, ".$turno.")' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>JUNHO</div>
						<br>
						<div style='margin-left: 4px; margin-top: 3px;' class='mes' id='16' onClick='buscahorariomes(id, ".$turno.")' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>JULHO</div>
						<div style='margin-left: 4px; margin-top: 3px;' class='mes' id='17' onClick='buscahorariomes(id, ".$turno.")' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>AGOSTO</div>
						<div style='margin-left: 4px; margin-top: 3px;' class='mes' id='18' onClick='buscahorariomes(id, ".$turno.")' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>SETEMBRO</div>
						<div style='margin-left: 4px; margin-top: 3px;' class='mes' id='19' onClick='buscahorariomes(id, ".$turno.")' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>OUTUBRO</div>
						<div style='margin-left: 4px; margin-top: 3px;' class='mes' id='20' onClick='buscahorariomes(id, ".$turno.")' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>NOVEMBRO</div>
						<div style='margin-left: 4px; margin-top: 3px;' class='mes' id='21' onClick='buscahorariomes(id, ".$turno.")' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>DEZEMBRO</div>			
					</div>
		
					<div style='margin-top: 25px; margin-left: 11px;'>
						<input type='button' value='Manhã' onClick='location.href=\"docbusca.php?dia=".$dia."&turno=1\"'>
						<input style='margin-left: 15px;' type='button' value='Noite' onClick='location.href=\"docbusca.php?dia=".$dia."&turno=2\"'>
					</div>
					
					<div style='margin-top: 8px; margin-left: 30%;' >
						<div class='menu' onClick='location.href=\"../interface/docbusca.php?idhorario=0&dia=".$dia."&novo=1\"' onMouseOver='this.className=\"menuh\"' onMouseOut='this.className=\"menu\"' >Novo Horário</div>
						<div class='menu' onClick='location.href=\"../interface/buscaprof.php?idprofessor=0\"' onMouseOver='this.className=\"menuh\"' onMouseOut='this.className=\"menu\"' >Novo Professor</div>
						<div class='menu' onClick='location.href=\"../interface/buscamat.php?idmateria=0\"' onMouseOver='this.className=\"menuh\"' onMouseOut='this.className=\"menu\"' >Nova Matéria</div>				
					</div>
					
					<div style='width: 500px; height:20px; margin-top: 30px; margin-bottom: -12;'>Clique na Tabela para Cadastrar/Editar Horários</div>
					
					<table style='margin-top: 15px; background-color: gray; width: 90%;'>
						<tr class='trbusca' align='center' style='cursor: default;'>
							<td id='lab' class='tdlab' style='cursor: default;' rowspan='2'>
								LAB
							</td>
							<td class='tdbusca'  colspan='2'>
								1º Horário
							</td>
							<td class='tdbusca' colspan='2'>
								2º Horário
							</td>
						</tr>
						<tr class='trbusca' align='center'  style='cursor: default;'>
							<td class='tdbusca'>
								PROFESSOR
							</td>
							<td class='tdbusca'>
								MATERIA
							</td>
							<td class='tdbusca'>
								PROFESSOR
							</td>
							<td class='tdbusca'>
								MATERIA
							</td>
						</tr>";
	
						if($array[1][2] == "LIVRE"){
		echo"				<tr class='trbusca' align='center'>
								<td id='lab1' id='lab' class='tdlab' style='cursor: default;' style='cursor: default;'>
									1
								</td>";
									$lab = 1;
		echo"					<td id='1a' class='livre' onClick=\"cliquebusca('".$array[1][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('1a', '1b', 'lab1')\" onMouseOut=\"mouseoutlivre('1a', '1b', 'lab1')\">";
		echo 						$array[1][1];
		echo "					</td>
								<td id='1b' class='livre' onClick=\"cliquebusca('".$array[1][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('1a', '1b', 'lab1')\" onMouseOut=\"mouseoutlivre('1a', '1b', 'lab1')\">";
		echo 						$array[1][2];
		echo "					</td>";

						} else {
		echo"				<tr class='trbusca' align='center'>
								<td id='lab1' id='lab' class='tdlab' style='cursor: default;' style='cursor: default;'>
									1
								</td>";
									$lab = 1;
		echo"					<td id='1a' class='tdbusca' onClick=\"cliquebusca('".$array[1][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('1a', '1b', 'lab1')\" onMouseOut=\"mouseout('1a', '1b', 'lab1')\">";
		echo 						$array[1][1];
		echo "					</td>
								<td id='1b' class='tdbusca' onClick=\"cliquebusca('".$array[1][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('1a', '1b', 'lab1')\" onMouseOut=\"mouseout('1a', '1b', 'lab1')\">";
		echo 						$array[1][2];
		echo "					</td>";
						}
						
						if ($array[1][5] == "LIVRE"){
							
		echo "					<td id='1c' class='livre' onClick=\"cliquebusca('".$array[1][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('1c', '1d', 'lab1')\" onMouseOut=\"mouseoutlivre('1c', '1d', 'lab1')\">";
		echo 						$array[1][4];								
		echo "					</td>
								<td id='1d' class='livre' onClick=\"cliquebusca('".$array[1][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('1c', '1d', 'lab1')\" onMouseOut=\"mouseoutlivre('1c', '1d', 'lab1')\">";
		echo 						$array[1][5];
		echo "					</td>";
						} else {
							
		echo "					<td id='1c' class='tdbusca' onClick=\"cliquebusca('".$array[1][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('1c', '1d', 'lab1')\" onMouseOut=\"mouseout('1c', '1d', 'lab1')\">";
		echo 						$array[1][4];								
		echo "					</td>
								<td id='1d' class='tdbusca' onClick=\"cliquebusca('".$array[1][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('1c', '1d', 'lab1')\" onMouseOut=\"mouseout('1c', '1d', 'lab1')\">";
		echo 						$array[1][5];
		echo "					</td>";							
						}
	
						
						//LABORATORIO 02 - 1º HORARIO
						if($array[2][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab2' class='tdlab' style='cursor: default;' style='cursor: default;'>
									2
								</td>";
									$lab = 2;
		echo"					<td id='2a' class='livre' onClick=\"cliquebusca('".$array[2][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('2a', '2b', 'lab2')\" onMouseOut=\"mouseoutlivre('2a', '2b', 'lab2')\">";
		echo 						$array[2][1];
		echo "					</td>
								<td id='2b' class='livre' onClick=\"cliquebusca('".$array[2][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('2a', '2b', 'lab2')\" onMouseOut=\"mouseoutlivre('2a', '2b', 'lab2')\">";
		echo 						$array[2][2];
		echo "					</td>";
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab2' class='tdlab' style='cursor: default;'>
									2
								</td>";
									$lab = 2;
		echo"					<td id='2a' class='tdbusca' onClick=\"cliquebusca('".$array[2][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('2a', '2b', 'lab2')\" onMouseOut=\"mouseout('2a', '2b', 'lab2')\">";
		echo 						$array[2][1];
		echo "					</td>
								<td id='2b' class='tdbusca' onClick=\"cliquebusca('".$array[2][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('2a', '2b', 'lab2')\" onMouseOut=\"mouseout('2a', '2b', 'lab2')\">";
		echo 						$array[2][2];
		echo "					</td>";
						}
	
						if ($array[2][5] == "LIVRE") {
		echo "					<td id='2c' class='livre' onClick=\"cliquebusca('".$array[2][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('2c', '2d', 'lab2')\" onMouseOut=\"mouseoutlivre('2c', '2d', 'lab2')\">";
		echo 						$array[2][4];
		echo "					</td>
								<td id='2d' class='livre' onClick=\"cliquebusca('".$array[2][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('2c', '2d', 'lab2')\" onMouseOut=\"mouseoutlivre('2c', '2d', 'lab2')\">";
		echo 						$array[2][5];
		echo "					</td>";		
							
						} else {
		echo "					<td id='2c' class='tdbusca' onClick=\"cliquebusca('".$array[2][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('2c', '2d', 'lab2')\" onMouseOut=\"mouseout('2c', '2d', 'lab2')\">";
		echo 						$array[2][4];
		echo "					</td>
								<td id='2d' class='tdbusca' onClick=\"cliquebusca('".$array[2][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('2c', '2d', 'lab2')\" onMouseOut=\"mouseout('2c', '2d', 'lab2')\">";
		echo 						$array[2][5];
		echo "					</td>";						
						}				

		echo "			</tr>";
						
						
						//LABORATORIO 03 - 1º HORARIO
						if($array[3][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab3' class='tdlab' style='cursor: default;'>
									3
								</td>";
									$lab = 3;
		echo"					<td id='3a' class='livre' onClick=\"cliquebusca('".$array[3][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('3a', '3b', 'lab3')\" onMouseOut=\"mouseoutlivre('3a', '3b', 'lab3')\">";
		echo 						$array[3][1];
		echo "					</td>
								<td id='3b' class='livre' onClick=\"cliquebusca('".$array[3][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('3a', '3b', 'lab3')\" onMouseOut=\"mouseoutlivre('3a', '3b', 'lab3')\">";
		echo 						$array[3][2];
		echo "					</td>";
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab3' class='tdlab' style='cursor: default;'>
									3
								</td>";
									$lab = 3;
		echo"					<td id='3a' class='tdbusca' onClick=\"cliquebusca('".$array[3][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('3a', '3b', 'lab3')\" onMouseOut=\"mouseout('3a', '3b', 'lab3')\">";
		echo 						$array[3][1];
		echo "					</td>
								<td id='3b' class='tdbusca' onClick=\"cliquebusca('".$array[3][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('3a', '3b', 'lab3')\" onMouseOut=\"mouseout('3a', '3b', 'lab3')\">";
		echo 						$array[3][2];
		echo "					</td>";								
						}

						if($array[3][5] == "LIVRE"){
		echo "				<td id='3c' class='livre' onClick=\"cliquebusca('".$array[3][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('3c', '3d', 'lab3')\" onMouseOut=\"mouseoutlivre('3c', '3d', 'lab3')\">";
		echo 					$array[3][4];
		echo "				</td>
							<td id='3d' class='livre' onClick=\"cliquebusca('".$array[3][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('3c', '3d', 'lab3')\" onMouseOut=\"mouseoutlivre('3c', '3d', 'lab3')\">";
		echo 					$array[3][5];
		echo "				</td>";
						} else {	
		echo "				<td id='3c' class='tdbusca' onClick=\"cliquebusca('".$array[3][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('3c', '3d', 'lab3')\" onMouseOut=\"mouseout('3c', '3d', 'lab3')\">";
		echo 					$array[3][4];
		echo "				</td>
							<td id='3d' class='tdbusca' onClick=\"cliquebusca('".$array[3][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('3c', '3d', 'lab3')\" onMouseOut=\"mouseout('3c', '3d', 'lab3')\">";
		echo 					$array[3][5];
		echo "				</td>";
						}
						
		echo"					</tr>";

		
						//LABORATORIO 04
						if($array[4][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab4' class='tdlab' style='cursor: default;'>
									4
								</td>";
									$lab = 4;
		echo"					<td id='4a' class='livre' onClick=\"cliquebusca('".$array[4][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('4a', '4b', 'lab4')\" onMouseOut=\"mouseoutlivre('4a', '4b', 'lab4')\">";
		echo 						$array[4][1];
		echo "					</td>
								<td id='4b' class='livre' onClick=\"cliquebusca('".$array[4][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('4a', '4b', 'lab4')\" onMouseOut=\"mouseoutlivre('4a', '4b', 'lab4')\">";
		echo 						$array[4][2];
		echo "					</td>";						
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab4' class='tdlab' style='cursor: default;'>
									4
								</td>";
									$lab = 4;
		echo"					<td id='4a' class='tdbusca' onClick=\"cliquebusca('".$array[4][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('4a', '4b', 'lab4')\" onMouseOut=\"mouseout('4a', '4b', 'lab4')\">";
		echo 						$array[4][1];
		echo "					</td>
								<td id='4b' class='tdbusca' onClick=\"cliquebusca('".$array[4][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('4a', '4b', 'lab4')\" onMouseOut=\"mouseout('4a', '4b', 'lab4')\">";
		echo 						$array[4][2];
		echo "					</td>";
						}
						
						if($array[4][5] == "LIVRE"){
		echo "					<td id='4c' class='livre' onClick=\"cliquebusca('".$array[4][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('4c', '4d', 'lab4')\" onMouseOut=\"mouseoutlivre('4c', '4d', 'lab4')\">";
		echo 						$array[4][4];
		echo "					</td>
								<td id='4d' class='livre' onClick=\"cliquebusca('".$array[4][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('4c', '4d', 'lab4')\" onMouseOut=\"mouseoutlivre('4c', '4d', 'lab4')\">";
		echo 						$array[4][5];
		echo "					</td>
							</tr>";							
						} else {
		echo "					<td id='4c' class='tdbusca' onClick=\"cliquebusca('".$array[4][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('4c', '4d', 'lab4')\" onMouseOut=\"mouseout('4c', '4d', 'lab4')\">";
		echo 						$array[4][4];
		echo "					</td>
								<td id='4d' class='tdbusca' onClick=\"cliquebusca('".$array[4][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('4c', '4d', 'lab4')\" onMouseOut=\"mouseout('4c', '4d', 'lab4')\">";
		echo 						$array[4][5];
		echo "					</td>
							</tr>";
							
						}
	
						//LABORATORIO 05
						if($array[5][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab5' class='tdlab' style='cursor: default;'>
									5
								</td>";
									$lab = 5;
		echo"					<td id='5a' class='livre' onClick=\"cliquebusca('".$array[5][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('5a', '5b', 'lab5')\" onMouseOut=\"mouseoutlivre('5a', '5b', 'lab5')\">";
		echo 						$array[5][1];
		echo "					</td>
								<td id='5b' class='livre' onClick=\"cliquebusca('".$array[5][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('5a', '5b', 'lab5')\" onMouseOut=\"mouseoutlivre('5a', '5b', 'lab5')\">";
		echo 						$array[5][2];
		echo "					</td>";						
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab5' class='tdlab' style='cursor: default;'>
									5
								</td>";
									$lab = 5;
		echo"					<td id='5a' class='tdbusca' onClick=\"cliquebusca('".$array[5][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('5a', '5b', 'lab5')\" onMouseOut=\"mouseout('5a', '5b', 'lab5')\">";
		echo 						$array[5][1];
		echo "					</td>
								<td id='5b' class='tdbusca' onClick=\"cliquebusca('".$array[5][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('5a', '5b', 'lab5')\" onMouseOut=\"mouseout('5a', '5b', 'lab5')\">";
		echo 						$array[5][2];
		echo "					</td>";									
						}
						
						if($array[5][5] == "LIVRE"){							
		echo "					<td id='5c' class='livre' onClick=\"cliquebusca('".$array[5][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('5c', '5d', 'lab5')\" onMouseOut=\"mouseoutlivre('5c', '5d', 'lab5')\">";
		echo 						$array[5][4];
		echo "					</td>
								<td id='5d' class='livre' onClick=\"cliquebusca('".$array[5][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('5c', '5d', 'lab5')\" onMouseOut=\"mouseoutlivre('5c', '5d', 'lab5')\">";
		echo 						$array[5][5];
		echo "					</td>
							</tr>";
						} else {							
		echo "					<td id='5c' class='tdbusca' onClick=\"cliquebusca('".$array[5][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('5c', '5d', 'lab5')\" onMouseOut=\"mouseout('5c', '5d', 'lab5')\">";
		echo 						$array[5][4];
		echo "					</td>
								<td id='5d' class='tdbusca' onClick=\"cliquebusca('".$array[5][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('5c', '5d', 'lab5')\" onMouseOut=\"mouseout('5c', '5d', 'lab5')\">";
		echo 						$array[5][5];
		echo "					</td>
							</tr>";
						}
							
						//LABORATORIO 06
						if($array[6][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab6' class='tdlab' style='cursor: default;'>
									6A
								</td>";
									$lab = 6;
		echo"					<td id='6a' class='livre' onClick=\"cliquebusca('".$array[6][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('6a', '6b', 'lab6')\" onMouseOut=\"mouseoutlivre('6a', '6b', 'lab6')\">";
		echo 						$array[6][1];
		echo "					</td>
								<td id='6b' class='livre' onClick=\"cliquebusca('".$array[6][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('6a', '6b', 'lab6')\" onMouseOut=\"mouseoutlivre('6a', '6b', 'lab6')\">";
		echo 						$array[6][2];
		echo "					</td>";						
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab6' class='tdlab' style='cursor: default;'>
									6A
								</td>";
									$lab = 6;
		echo"					<td id='6a' class='tdbusca' onClick=\"cliquebusca('".$array[6][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('6a', '6b', 'lab6')\" onMouseOut=\"mouseout('6a', '6b', 'lab6')\">";
		echo 						$array[6][1];
		echo "					</td>
								<td id='6b' class='tdbusca' onClick=\"cliquebusca('".$array[6][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('6a', '6b', 'lab6')\" onMouseOut=\"mouseout('6a', '6b', 'lab6')\">";
		echo 						$array[6][2];
		echo "					</td>";		
						}
						
						if ($array[6][5] == "LIVRE"){
		echo "					<td id='6c' class='livre' onClick=\"cliquebusca('".$array[6][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('6c', '6d', 'lab6')\" onMouseOut=\"mouseoutlivre('6c', '6d', 'lab6')\">";
		echo 						$array[6][4];
		echo "					</td>
								<td id='6d' class='livre' onClick=\"cliquebusca('".$array[6][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('6c', '6d', 'lab6')\" onMouseOut=\"mouseoutlivre('6c', '6d', 'lab6')\">";
		echo 						$array[6][5];
		echo "					</td>
							</tr>";								
						} else {
		echo "					<td id='6c' class='tdbusca' onClick=\"cliquebusca('".$array[6][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('6c', '6d', 'lab6')\" onMouseOut=\"mouseout('6c', '6d', 'lab6')\">";
		echo 						$array[6][4];
		echo "					</td>
								<td id='6d' class='tdbusca' onClick=\"cliquebusca('".$array[6][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('6c', '6d', 'lab6')\" onMouseOut=\"mouseout('6c', '6d', 'lab6')\">";
		echo 						$array[6][5];
		echo "					</td>
							</tr>";							
						}
	
						//LABORATORIO 11 (6B)
						if($array[11][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab11' class='tdlab' style='cursor: default;'>
									6B
								</td>";
									$lab = 11;
		echo"					<td id='11a' class='livre' onClick=\"cliquebusca('".$array[11][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('11a', '11b', 'lab11')\" onMouseOut=\"mouseoutlivre('11a', '11b', 'lab11')\">";
		echo 						$array[11][1];
		echo "					</td>
								<td id='11b' class='livre' onClick=\"cliquebusca('".$array[11][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('11a', '11b', 'lab11')\" onMouseOut=\"mouseoutlivre('11a', '11b', 'lab11')\">";
		echo 						$array[11][2];
		echo "					</td>";						
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab11' class='tdlab' style='cursor: default;'>
									6B
								</td>";
									$lab = 11;
		echo"					<td id='11a' class='tdbusca' onClick=\"cliquebusca('".$array[11][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('11a', '11b', 'lab11')\" onMouseOut=\"mouseout('11a', '11b', 'lab11')\">";
		echo 						$array[11][1];
		echo "					</td>
								<td id='11b' class='tdbusca' onClick=\"cliquebusca('".$array[11][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('11a', '11b', 'lab11')\" onMouseOut=\"mouseout('11a', '11b', 'lab11')\">";
		echo 						$array[11][2];
		echo "					</td>";		
						}
						
						if($array[11][5] == "LIVRE"){
		echo "					<td id='11c' class='livre' onClick=\"cliquebusca('".$array[11][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('11c', '11d', 'lab11')\" onMouseOut=\"mouseoutlivre('11c', '11d', 'lab11')\">";
		echo 						$array[11][4];
		echo "					</td>
								<td id='11d' class='livre' onClick=\"cliquebusca('".$array[11][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('11c', '11d', 'lab11')\" onMouseOut=\"mouseoutlivre('11c', '11d', 'lab11')\">";
		echo 						$array[11][5];	
		echo "					</td>
							</tr>";
							
						} else {
		echo "					<td id='11c' class='tdbusca' onClick=\"cliquebusca('".$array[11][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('11c', '11d', 'lab11')\" onMouseOut=\"mouseout('11c', '11d', 'lab11')\">";
		echo 						$array[11][4];
		echo "					</td>
								<td id='11d' class='tdbusca' onClick=\"cliquebusca('".$array[11][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('11c', '11d', 'lab11')\" onMouseOut=\"mouseout('11c', '11d', 'lab11')\">";
		echo 						$array[11][5];	
		echo "					</td>
							</tr>";
						}
	
						//LABORATORIO 07
						if($array[7][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab7' class='tdlab' style='cursor: default;'>
									7
								</td>";
									$lab = 7;
		echo"					<td id='7a' class='livre' onClick=\"cliquebusca('".$array[7][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('7a', '7b', 'lab7')\" onMouseOut=\"mouseoutlivre('7a', '7b', 'lab7')\">";
		echo 						$array[7][1];
		echo "					</td>
								<td id='7b' class='livre' onClick=\"cliquebusca('".$array[7][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('7a', '7b', 'lab7')\" onMouseOut=\"mouseoutlivre('7a', '7b', 'lab7')\">";
		echo 						$array[7][2];
		echo "					</td>";
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab7' class='tdlab' style='cursor: default;'>
									7
								</td>";
									$lab = 7;
		echo"					<td id='7a' class='tdbusca' onClick=\"cliquebusca('".$array[7][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('7a', '7b', 'lab7')\" onMouseOut=\"mouseout('7a', '7b', 'lab7')\">";
		echo 						$array[7][1];
		echo "					</td>
								<td id='7b' class='tdbusca' onClick=\"cliquebusca('".$array[7][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('7a', '7b', 'lab7')\" onMouseOut=\"mouseout('7a', '7b', 'lab7')\">";
		echo 						$array[7][2];
		echo "					</td>";
						}
						
						if($array[7][5] == "LIVRE"){
		echo "					<td id='7c' class='livre' onClick=\"cliquebusca('".$array[7][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('7c', '7d', 'lab7')\" onMouseOut=\"mouseoutlivre('7c', '7d', 'lab7')\">";
		echo 						$array[7][4];
		echo "					</td>
								<td id='7d' class='livre' onClick=\"cliquebusca('".$array[7][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('7c', '7d', 'lab7')\" onMouseOut=\"mouseoutlivre('7c', '7d', 'lab7')\">";
		echo 						$array[7][5];
		echo "					</td>
							</tr>";							
						} else {
		echo "					<td id='7c' class='tdbusca' onClick=\"cliquebusca('".$array[7][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('7c', '7d', 'lab7')\" onMouseOut=\"mouseout('7c', '7d', 'lab7')\">";
		echo 						$array[7][4];
		echo "					</td>
								<td id='7d' class='tdbusca' onClick=\"cliquebusca('".$array[7][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('7c', '7d', 'lab7')\" onMouseOut=\"mouseout('7c', '7d', 'lab7')\">";
		echo 						$array[7][5];
		echo "					</td>
							</tr>";
						}
	
						//LABORATORIO 08
						if($array[8][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab8' class='tdlab' style='cursor: default;'>
									8
								</td>";
									$lab = 8;
		echo"					<td id='8a' class='livre' onClick=\"cliquebusca('".$array[8][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('8a', '8b', 'lab8')\" onMouseOut=\"mouseoutlivre('8a', '8b', 'lab8')\">";
		echo 						$array[8][1];
		echo "					</td>
								<td id='8b' class='livre' onClick=\"cliquebusca('".$array[8][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('8a', '8b', 'lab8')\" onMouseOut=\"mouseoutlivre('8a', '8b', 'lab8')\">";
		echo 						$array[8][2];
		echo "					</td>";						
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab8' class='tdlab' style='cursor: default;'>
									8
								</td>";
									$lab = 8;
		echo"					<td id='8a' class='tdbusca' onClick=\"cliquebusca('".$array[8][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('8a', '8b', 'lab8')\" onMouseOut=\"mouseout('8a', '8b', 'lab8')\">";
		echo 						$array[8][1];
		echo "					</td>
								<td id='8b' class='tdbusca' onClick=\"cliquebusca('".$array[8][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('8a', '8b', 'lab8')\" onMouseOut=\"mouseout('8a', '8b', 'lab8')\">";
		echo 						$array[8][2];
		echo "					</td>";	
						}
	
						if($array[8][5] == "LIVRE"){
		echo "					<td id='8c' class='livre' onClick=\"cliquebusca('".$array[8][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('8c', '8d', 'lab8')\" onMouseOut=\"mouseoutlivre('8c', '8d', 'lab8')\">";
		echo 						$array[8][4];
		echo "					</td>
								<td id='8d' class='livre' onClick=\"cliquebusca('".$array[8][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('8c', '8d', 'lab8')\" onMouseOut=\"mouseoutlivre('8c', '8d', 'lab8')\">";
		echo 						$array[8][5];
		echo "					</td>
							</tr>";
						} else {
		echo "					<td id='8c' class='tdbusca' onClick=\"cliquebusca('".$array[8][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('8c', '8d', 'lab8')\" onMouseOut=\"mouseout('8c', '8d', 'lab8')\">";
		echo 						$array[8][4];
		echo "					</td>
								<td id='8d' class='tdbusca' onClick=\"cliquebusca('".$array[8][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('8c', '8d', 'lab8')\" onMouseOut=\"mouseout('8c', '8d', 'lab8')\">";
		echo 						$array[8][5];
		echo "					</td>
							</tr>";
						}
						
						//LABORATORIO 09
						if($array[9][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab9' class='tdlab' style='cursor: default;'>
									9
								</td>";
									$lab = 9;
		echo"					<td id='9a' class='livre' onClick=\"cliquebusca('".$array[9][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('9a', '9b', 'lab9')\" onMouseOut=\"mouseoutlivre('9a', '9b', 'lab9')\">";
		echo 						$array[9][1];
		echo "					</td>
								<td id='9b' class='livre' onClick=\"cliquebusca('".$array[9][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('9a', '9b', 'lab9')\" onMouseOut=\"mouseoutlivre('9a', '9b', 'lab9')\">";
		echo 						$array[9][2];
		echo "					</td>";						
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab9' class='tdlab' style='cursor: default;'>
									9
								</td>";
									$lab = 9;
		echo"					<td id='9a' class='tdbusca' onClick=\"cliquebusca('".$array[9][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('9a', '9b', 'lab9')\" onMouseOut=\"mouseout('9a', '9b', 'lab9')\">";
		echo 						$array[9][1];
		echo "					</td>
								<td id='9b' class='tdbusca' onClick=\"cliquebusca('".$array[9][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('9a', '9b', 'lab9')\" onMouseOut=\"mouseout('9a', '9b', 'lab9')\">";
		echo 						$array[9][2];
		echo "					</td>";		
						}
						
						if($array[9][5] == "LIVRE"){
		echo "					<td id='9c' class='livre' onClick=\"cliquebusca('".$array[9][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('9c', '9d', 'lab9')\" onMouseOut=\"mouseoutlivre('9c', '9d', 'lab9')\">";
		echo 						$array[9][4];
		echo "					</td>
								<td id='9d' class='livre' onClick=\"cliquebusca('".$array[9][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('9c', '9d', 'lab9')\" onMouseOut=\"mouseoutlivre('9c', '9d', 'lab9')\">";
		echo 						$array[9][5];
		echo "					</td>
							</tr>";
						} else {
		echo "					<td id='9c' class='tdbusca' onClick=\"cliquebusca('".$array[9][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('9c', '9d', 'lab9')\" onMouseOut=\"mouseout('9c', '9d', 'lab9')\">";
		echo 						$array[9][4];
		echo "					</td>
								<td id='9d' class='tdbusca' onClick=\"cliquebusca('".$array[9][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('9c', '9d', 'lab9')\" onMouseOut=\"mouseout('9c', '9d', 'lab9')\">";
		echo 						$array[9][5];
		echo "					</td>
							</tr>";
							
						}
	
						//LABORATORIO 10
						if($array[10][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab10' class='tdlab' style='cursor: default;'>
									10
								</td>";
									$lab = 10;
		echo"					<td id='10a' class='livre' onClick=\"cliquebusca('".$array[10][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('10a', '10b', 'lab10')\" onMouseOut=\"mouseoutlivre('10a', '10b', 'lab10')\">";
		echo 						$array[10][1];
		echo "					</td>
								<td id='10b' class='livre' onClick=\"cliquebusca('".$array[10][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('10a', '10b', 'lab10')\" onMouseOut=\"mouseoutlivre('10a', '10b', 'lab10')\">";
		echo 						$array[10][2];
		echo "					</td>";						
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab10' class='tdlab' style='cursor: default;'>
									10
								</td>";
									$lab = 10;
		echo"					<td id='10a' class='tdbusca' onClick=\"cliquebusca('".$array[10][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('10a', '10b', 'lab10')\" onMouseOut=\"mouseout('10a', '10b', 'lab10')\">";
		echo 						$array[10][1];
		echo "					</td>
								<td id='10b' class='tdbusca' onClick=\"cliquebusca('".$array[10][0]."', '".$dia."', '".$lab."', '1800', ".$turno.")\" onMouseOver=\"mouseover('10a', '10b', 'lab10')\" onMouseOut=\"mouseout('10a', '10b', 'lab10')\">";
		echo 						$array[10][2];
		echo "					</td>";	
						}
						
						if($array[10][5] == "LIVRE"){
		echo "					<td id='10c' class='livre' onClick=\"cliquebusca('".$array[10][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('10c', '10d', 'lab10')\" onMouseOut=\"mouseoutlivre('10c', '10d', 'lab10')\">";
		echo 						$array[10][4];
		echo "					</td>
								<td id='10d' class='livre' onClick=\"cliquebusca('".$array[10][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('10c', '10d', 'lab10')\" onMouseOut=\"mouseoutlivre('10c', '10d', 'lab10')\">";
		echo 						$array[10][5];
		echo "					</td>
							</tr>";
						} else {
		echo "					<td id='10c' class='tdbusca' onClick=\"cliquebusca('".$array[10][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('10c', '10d', 'lab10')\" onMouseOut=\"mouseout('10c', '10d', 'lab10')\">";
		echo 						$array[10][4];
		echo "					</td>
								<td id='10d' class='tdbusca' onClick=\"cliquebusca('".$array[10][3]."', '".$dia."', '".$lab."', '2040', ".$turno.")\" onMouseOver=\"mouseover('10c', '10d', 'lab10')\" onMouseOut=\"mouseout('10c', '10d', 'lab10')\">";
		echo 						$array[10][5];
		echo "					</td>
							</tr>";
						}
						
		echo "		</table>";
		echo " <script> fundoverde() </script>";
		
?>
</div>
</center>
<?php

	
	if(isset($_GET['idhorario'])){
		
		$idhorario = $_GET['idhorario'];
		
		echo "	<div onClick=\"removefundo('".$dia."', '".$turno."')\" id='divabsolute' style='display:block;'></div>";
		echo "	<div id='caixaeex' style='display:block;'>";
	
		require_once '../gerenciamento/horario.class.php';
		require_once '../gerenciamento/professor.class.php';
		require_once '../gerenciamento/materia.class.php';
							
		$professor = new professor("", "");
		try {
			$professores = $professor->buscar();
		} catch ( Exception $e ) {
			echo $e->getMessage ();
			$professor = new professor("", "");
		}
		
		$materia = new materia("", "");
		try {
			$materias = $materia->buscar();
		} catch ( Exception $e ) {
			echo $e->getMessage ();
			$materia = new materia("", "");
		}
		
		if ($idhorario != 0){				
			$horario = new horario($idhorario, "", "", "", "", "", "", "");
			try{
				$horario->buscarId($idhorario);
			}catch(Exception $e){
				header("location:docbusca.php?msg=".$e->getMessage());
			}
		}
		
		/*Para controle do JavaScript, usado para saber onde o usuario clicou para cadastrar novo horário,
		se foi na opçãoo "Novo Horário" ou foi na tabela*/
		if (isset($_GET['novo'])) $novo = 1; else $novo = 0; 
		
		echo "	<center>";
		
		if ($idhorario == 0){
		echo "		<form name='formgeral' action='../gerenciamento/enviacadhorario.php?dia=".$dia."&turno=".$turno."' method='post'>
					<div class='divgeralhorario'>
					<br><div style='border: solid 1px black; margin-top: -10px; cursor: pointer; margin-left: 30px; height: 20px; width: 20px; float: left; background-color: green;' onClick='deixalivre()' onMouseOver=\"document.getElementById('displaylivre').style.display = 'block'\" onMouseOut=\"document.getElementById('displaylivre').style.display = 'none'\"></div><div id='displaylivre' style='display: none; font-size: 10px; font-family: Verdana, Arial, sans-serif; position: absolute; top: 15px; left: 60px;'>LIVRE</div>
						<div style='border: solid 1px black; margin-top: -10px; cursor: pointer; margin-right: 30px; height: 20px; width: 20px; float: right; background-color: red;' onClick='deixafechado()' onMouseOver=\"document.getElementById('displayfechado').style.display = 'block'\" onMouseOut=\"document.getElementById('displayfechado').style.display = 'none'\"></div><div id='displayfechado' style='display: none; font-size: 10px; font-family: Verdana, Arial, sans-serif;  position: absolute; top: 15px; left: 140px;'>FECHADO</div>";
		} else {
		echo "		<form name='formgeral' action='../gerenciamento/enviaeditahorario.php?idhorario=".$idhorario."&dia=".$dia."' method='post'>
					<div class='divgeralhorario'>
						<div class='divexcluir' onClick=\"confimadel('".$horario->idhorario."', '".$dia."', '".$turno."')\"></div>Excluir
						<br><div style='border: solid 1px black; margin-top: -30px; cursor: pointer; margin-left: 30px; height: 20px; width: 20px; float: left; background-color: green;' onClick='deixalivre()' onMouseOver=\"document.getElementById('displaylivre').style.display = 'block'\" onMouseOut=\"document.getElementById('displaylivre').style.display = 'none'\"></div><div id='displaylivre' style='display: none; font-size: 10px; font-family: Verdana, Arial, sans-serif; position: absolute; top: 50px; left: 25px;'>LIVRE</div>
						<div style='border: solid 1px black; margin-top: -30px; cursor: pointer; margin-right: 30px; height: 20px; width: 20px; float: right; background-color: red;' onClick='deixafechado()' onMouseOver=\"document.getElementById('displayfechado').style.display = 'block'\" onMouseOut=\"document.getElementById('displayfechado').style.display = 'none'\"></div><div id='displayfechado' style='display: none; font-size: 10px; font-family: Verdana, Arial, sans-serif;  position: absolute; top: 50px; left: 190px;'>FECHADO</div>";
		}

				//MOSTRA OS PROFESSORES DO SQL
		echo "	<div class='divprof'>
					<div style='margin-top: 5px; font-size: 15px; font-family: Verdana, Arial, sans-serif;'>
						Selecione o Prof:
					</div>
					<div>
						<select id='cadprof' name='professor' onChange='avanca(".$novo.")'>
							<option style='color: gray' value='0' class='option'>Professor</option>";
							foreach ($professores as $professor){
		echo "					<option id='".$professor->idprofessor."' value='".$professor->idprofessor."'>".$professor->prof."</option>";	
							}
				
		echo "			</select> <br/>
					<div class='novoprof' onClick='location.href=\"buscaprof.php?idprofessor=0&x=".$dia."\"' onMouseOver=\"this.className = 'novoprofh'\" onMouseOut=\"this.className = 'novoprof'\">NOVO PROFESSOR</div>
					</div>
				</div>";
				//FECHA DIV DO PROFESSOR 
					
				//MOSTRA AS MATERIAS DO SQL
		echo "	<div class='divmat'>
					<div class='matcadhora'>
						Selecione a Matéria:
					</div>
					<div class='divmateria'>
						<select id='cadmat' name='materia' onChange='avanca(".$novo.")'>
							<option style='color: gray' value='0' class='option'>Matéria</option>";
							foreach ($materias as $materia ){
		echo "					<option id='".$materia->idmateria."' value='".$materia->idmateria."'>".$materia->mat."</option>";	
							}
		echo "			</select><br/>
						<div class='novoprof' onClick='location.href=\"buscamat.php?idmateria=0&x=".$dia."\"' onMouseOver=\"this.className = 'novoprofh'\" onMouseOut=\"this.className = 'novoprof'\">NOVA MATÉRIA</div>
					</div>	
				</div>";
				//FECHA DIV DA MATERIA
						
				//MOSTRA OS LABORATORIOS
		echo "	<div class='divlab'>
					<div class='labcadhora'>
						Laboratórios:
					</div>
					<div class='divlaboratoro'>
						<select name='laboratorio' onChange='avanca(".$novo.")'>
							<option value='0'>Laboratório</option>";
						for($i=1;$i<=11;$i++){
								if ($i==6){
		echo "						<option value='6'>Laboratório 6A</option>";				
								}
								if ($i == 7) {
		echo "						<option value='11'>Laboratório 6B</option>
									<option value='7'>Laboratório 7</option>";
									$i == 8;							
								} else if($i != 6 && $i != 11) echo "<option value='".$i."'>Laboratório ".$i."</option>";
							}
						
		echo "			</select>
					</div>		
				</div>";
				//FECHA DIV LABORATORIO
							
				//MOSTRA OS HORORIOS, 1º e 2º
		echo "	<div class='divhorariocadhorario'>
					<div id='divsegsex' class='divhora'>
						<div class='escritohorariocadhora'>
							Selecione o Horário: 
						</div>
						<div class='firstcadhora'>
							<input type='radio' value='740' name='hora' id='hora1' />1º Horário - <b>Manhã</b>
						</div>
						<div class='secondcadhora'>
							<input type='radio' value='940' name='hora' id='hora2' />2º Horário - <b>Manhã</b>
						</div>
						<div class='thirdhora'>
							<input type='radio' value='1800' name='hora' id='hora3' />1º Horário - <b>Noite</b>
						</div>
						<div class='fouthhora'>
							<input type='radio' value='2040' name='hora' id='hora4' />2º Horário - <b>Noite</b>
						</div>
					</div>
				</div>";
							
				//MOSTRA AS OPÇÕES DO DIA DA SEMANA	
		echo "	<div class='divsemana'>
					<div class='diasemanacadhora'>
						Selecione o Dia da Semana:
					</div>
					<select name='miSelect' onChange='oculta()'>
						<option value='0' style='color: gray'>Dia da Semana</option>
						<option value='2'>Segunda-Feira</option>
						<option value='3'>Terça-Feira</option>
						<option value='4'>Quarta-Feira</option>
						<option value='5'>Quinta-Feira</option>
						<option value='6'>Sexta-Feira</option>
						<option value='7'>Sábado</option>
					</select>
					<div class='ou'>
							OU
					</div>";
		
					//MOSTRA AS CAIXAS PARA DIGITAR DIA, MES E ANO
		echo "		<div class='diamescadhora'>
						Digite o dia do mês:
					</div>
					<input class='india' type='text' name='dia' id='dia' value='Dia' maxlength='2' onClick='ocultadia()' onBlur='escrevedia()' style='color:gray' onKeyUp='EnterTab(1)' />
					<input class='inmes' type='text' name='mes' id='mes' value='Mes' maxlength='2' onClick='ocultames()' onBlur='escrevemes()' style='color:gray' onKeyUp='EnterTab(2)' />
					<input class='inano' type='text' name='ano' id='ano' value='2011' maxlength='4' onClick='ocultaano()' onBlur='escreveano()' style='color:gray' onKeyUp='EnterTab(3)' />
				</div>
				";
		
				if ($idhorario == 0){
		echo "		<div class='divreset'>
						<input name='limpar' class='butreset' type='reset' value='Limpar' onClick='escrevetudo()' />
						<input name='cadastrar' class='butreset' type='submit' value='Cadastrar' />
					</div>";
					if (isset($_GET['lab']))$labo = $_GET['lab']; else $labo = 0;
					if (isset($_GET['hora']))$time = $_GET['hora']; else $time = 0;
					if (isset($_GET['novo'])) {
		echo "			<script>jogadados('".$labo."', '".$time."', '".$dia."', '".$turno."', 1)</script>";
		echo "			<script>avanca(".$novo.")</script>";
					} else
		echo "			<script>jogadados('".$labo."', '".$time."', '".$dia."', '".$turno."', 0)</script>";
		echo "			<script>avanca(".$novo.")</script>";
		 		} else {
		echo "	 	<div class='divreset'>
						<input name='limpar' class='butreset' type='reset' value='Limpar' onClick='escrevetudo()' />
						<input name='editar' class='butreset' type='submit' value='Editar' />
						<script> edita('".$horario->prof."', '".$horario->mat."', '".$horario->lab."', '".$turno."', '".$horario->horario_inicial."', '".$horario->diames."', '".$horario->diasemana."') </script>
					</div>";
			 	}
		echo "	</form>
			</center>
		</div>";
	}
?>
</body>
</html>