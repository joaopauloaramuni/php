<html>
<head>
	<META HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=UTF-8'>
	<script type='text/javascript' src='global.js'></script>
	<link href='estilos.css' rel='stylesheet' type='text/css' />
	<title>Laboratórios CPD - Início</title>
</head>
<body>
<center>
<div class="divgeraldocbusca">
<?php 

	require_once '../gerenciamento/horario.class.php';
	
	$dia = 1;
	
	$time = date("H");
		
	if ($time >= 7 && $time <=11) $turno = 1; else $turno = 2;
	
	if(isset($_GET['turno'])){
		$turno = $_GET['turno'];
	}
	
	if(!isset($_GET['msg'])){
		$horario = new horario("", "", "", "", "", "", "", "");
		try {
			$horarios = $horario->buscahoje($turno);
		} catch (Exception $e) {
			$horarios = "";
			header("location:index.php?turno=".$turno."&msg=".$e->getMessage()."");
		}
	} else $horarios = "";
			
	$selecionado = "this.className=\"butaoselecionado\"";
	$classname = "this.className=\"butao\"";
		
	for ($i = 1; $i<=11; $i++){
		for ($j = 0; $j <=5; $j++){
			$array[$i][$j] = "";	
		}
	}
		
	$horario = new horario("", "", "", "", "", "", "", "");
	try {
		$horarios = $horario->buscahoje($turno);
	} catch (Exception $e) {
		$horarios = "";
	}
	
	if ($horarios){
		foreach ($horarios as $horario) {
			for ($i = 1; $i <= 11; $i++){
				if ($horario->lab == $i){
					if ($turno == 2){
						if ($horario->horario_inicial == 1800){
							$array[$i][0] = $horario->idhorario;
							$array[$i][1] = $horario->prof;
							$array[$i][2] = $horario->mat;
						} else {
							$array[$i][3] = $horario->idhorario;
							$array[$i][4] = $horario->prof;
							$array[$i][5] = $horario->mat;
						}
					} else {
						if ($horario->horario_inicial == 740){
							$array[$i][0] = $horario->idhorario;
							$array[$i][1] = $horario->prof;
							$array[$i][2] = $horario->mat;
						} else {
							$array[$i][3] = $horario->idhorario;
							$array[$i][4] = $horario->prof;
							$array[$i][5] = $horario->mat;
						}						
					}
				}
			}
		}	
	}
	
	$horariosIso = new horario("", "", "", "", "", "", "", "");
	try {
		$horariosIso = $horario->buscaHojeIso($turno);
	} catch (Exception $e) {
		$horariosIso = "";
	}
	
	if ($horariosIso){
		foreach ($horariosIso as $horarioIso) {
			for ($i = 1; $i <= 11; $i++){
				if ($horarioIso->lab == $i){
					if ($turno == 2){
						if ($horarioIso->horario_inicial == 1800){
							$array[$i][0] = $horarioIso->idhorario;
							$array[$i][1] = $horarioIso->prof;
							$array[$i][2] = $horarioIso->mat;
						} else {
							$array[$i][3] = $horarioIso->idhorario;
							$array[$i][4] = $horarioIso->prof;
							$array[$i][5] = $horarioIso->mat;
						}
					} else {
						if ($horarioIso->horario_inicial == 740){
							$array[$i][0] = $horarioIso->idhorario;
							$array[$i][1] = $horarioIso->prof;
							$array[$i][2] = $horarioIso->mat;
						} else {
							$array[$i][3] = $horarioIso->idhorario;
							$array[$i][4] = $horarioIso->prof;
							$array[$i][5] = $horarioIso->mat;
						}						
					}
				}
			}
		}	
	}
		
		echo "
			<div class='divladomenu'>
					<div class='divcabecalho'>
						<span style='color: black; font-size: 38px; font-weight: bold;'>LABORATÓRIOS</span>";
						if ($turno == 1)
							echo "<br><span style='font-size: 25px;'><b>Manhã</b></span>";
								else
									echo "<br><span style='font-size: 25px;'><b>Noite</b></span>";
				
						if (isset($_GET ['msg'])){
		echo "				<div style='width: 50%; background-color: #ffeeaa; margin-top: 5px;
				border: solid 2px black; -moz-border-radius: 10px; -webkit-border-radius:10px; border-radius:10px;
				font-size: 22px; padding:10px; color:#cc0000;'><div style=' font-size: 25px;
				color: red;'>".$_GET ['msg']."</div></div>";
						}
						
		echo "		</div>		
	
					<!-- <div class='botoes'>
						<input type='button' value='Manhã'>
						<input type='button' value='Noite'>
					</div> -->
		
					
					<div style='margin-top: 50px;'>
						<input type='button' value='Manhã' onClick='location.href=\"index.php?turno=1\"'>
						<input type='button' value='Noite' onClick='location.href=\"index.php?turno=2\"'>
					</div>
					
					<table style='margin-top: 25px; background-color: gray; width: 90%;'>
						<tr class='trbusca' align='center'>
							<td id='lab' class='tdlab' rowspan='2'>
								LAB
							</td>
							<td class='tdbusca' colspan='2'>
								1º Horário
							</td>
							<td class='tdbusca' colspan='2'>
								2º Horário
							</td>
						</tr>
						<tr class='trbusca' align='center'>
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
								<td id='lab1' id='lab' class='tdlab'>
									1
								</td>";
									$lab = 1;
		echo"					<td id='1a' class='tdbuscah' onMouseOver=\"mouseover('1a', '1b', 'lab1')\" onMouseOut=\"mouseoutlivre('1a', '1b', 'lab1')\">";
		echo 						$array[1][1];
		echo "					</td>
								<td id='1b' class='tdbuscah' onMouseOver=\"mouseover('1a', '1b', 'lab1')\" onMouseOut=\"mouseoutlivre('1a', '1b', 'lab1')\">";
		echo 						$array[1][2];
		echo "					</td>";

						} else {
		echo"				<tr class='trbusca' align='center'>
								<td id='lab1' id='lab' class='tdlab'>
									1
								</td>";
									$lab = 1;
		echo"					<td id='1a' class='tdbusca' onMouseOver=\"mouseover('1a', '1b', 'lab1')\" onMouseOut=\"mouseout('1a', '1b', 'lab1')\">";
		echo 						$array[1][1];
		echo "					</td>
								<td id='1b' class='tdbusca' onMouseOver=\"mouseover('1a', '1b', 'lab1')\" onMouseOut=\"mouseout('1a', '1b', 'lab1')\">";
		echo 						$array[1][2];
		echo "					</td>";
						}
						
						if ($array[1][5] == "LIVRE"){
		echo "					<td id='1c' class='tdbuscah' onMouseOver=\"mouseover('1c', '1d', 'lab1')\" onMouseOut=\"mouseoutlivre('1c', '1d', 'lab1')\">";
		echo 						$array[1][4];								
		echo "					</td>
								<td id='1d' class='tdbuscah' onMouseOver=\"mouseover('1c', '1d', 'lab1')\" onMouseOut=\"mouseoutlivre('1c', '1d', 'lab1')\">";
		echo 						$array[1][5];
		echo "					</td>";
						} else {
							
		echo "					<td id='1c' class='tdbusca' onMouseOver=\"mouseover('1c', '1d', 'lab1')\" onMouseOut=\"mouseout('1c', '1d', 'lab1')\">";
		echo 						$array[1][4];								
		echo "					</td>
								<td id='1d' class='tdbusca' onMouseOver=\"mouseover('1c', '1d', 'lab1')\" onMouseOut=\"mouseout('1c', '1d', 'lab1')\">";
		echo 						$array[1][5];
		echo "					</td>";							
						}
	
						
						//LABORATORIO 02 - 1º HORARIO
						if($array[2][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab2' class='tdlab'>
									2
								</td>";
									$lab = 2;
		echo"					<td id='2a' class='tdbuscah' onMouseOver=\"mouseover('2a', '2b', 'lab2')\" onMouseOut=\"mouseoutlivre('2a', '2b', 'lab2')\">";
		echo 						$array[2][1];
		echo "					</td>
								<td id='2b' class='tdbuscah' onMouseOver=\"mouseover('2a', '2b', 'lab2')\" onMouseOut=\"mouseoutlivre('2a', '2b', 'lab2')\">";
		echo 						$array[2][2];
		echo "					</td>";
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab2' class='tdlab'>
									2
								</td>";
									$lab = 2;
		echo"					<td id='2a' class='tdbusca' onMouseOver=\"mouseover('2a', '2b', 'lab2')\" onMouseOut=\"mouseout('2a', '2b', 'lab2')\">";
		echo 						$array[2][1];
		echo "					</td>
								<td id='2b' class='tdbusca' onMouseOver=\"mouseover('2a', '2b', 'lab2')\" onMouseOut=\"mouseout('2a', '2b', 'lab2')\">";
		echo 						$array[2][2];
		echo "					</td>";
						}
	
						if ($array[2][5] == "LIVRE") {
			echo "				<td id='2c' class='tdbuscah' onMouseOver=\"mouseover('2c', '2d', 'lab2')\" onMouseOut=\"mouseoutlivre('2c', '2d', 'lab2')\">";
		echo 						$array[2][4];
		echo "					</td>
								<td id='2d' class='tdbuscah' onMouseOver=\"mouseover('2c', '2d', 'lab2')\" onMouseOut=\"mouseoutlivre('2c', '2d', 'lab2')\">";
		echo 						$array[2][5];
		echo "					</td>";		
							
						} else {
		echo "					<td id='2c' class='tdbusca' onMouseOver=\"mouseover('2c', '2d', 'lab2')\" onMouseOut=\"mouseout('2c', '2d', 'lab2')\">";
		echo 						$array[2][4];
		echo "					</td>
								<td id='2d' class='tdbusca' onMouseOver=\"mouseover('2c', '2d', 'lab2')\" onMouseOut=\"mouseout('2c', '2d', 'lab2')\">";
		echo 						$array[2][5];
		echo "					</td>";						
						}				

		echo "			</tr>";
						
						
						//LABORATORIO 03 - 1º HORARIO
						if($array[3][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab3' class='tdlab'>
									3
								</td>";
									$lab = 3;
		echo"					<td id='3a' class='tdbuscah' onMouseOver=\"mouseover('3a', '3b', 'lab3')\" onMouseOut=\"mouseoutlivre('3a', '3b', 'lab3')\">";
		echo 						$array[3][1];
		echo "					</td>
								<td id='3b' class='tdbuscah' onMouseOver=\"mouseover('3a', '3b', 'lab3')\" onMouseOut=\"mouseoutlivre('3a', '3b', 'lab3')\">";
		echo 						$array[3][2];
		echo "					</td>";
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab3' class='tdlab'>
									3
								</td>";
									$lab = 3;
		echo"					<td id='3a' class='tdbusca' onMouseOver=\"mouseover('3a', '3b', 'lab3')\" onMouseOut=\"mouseout('3a', '3b', 'lab3')\">";
		echo 						$array[3][1];
		echo "					</td>
								<td id='3b' class='tdbusca' onMouseOver=\"mouseover('3a', '3b', 'lab3')\" onMouseOut=\"mouseout('3a', '3b', 'lab3')\">";
		echo 						$array[3][2];
		echo "					</td>";								
						}

						if($array[3][5] == "LIVRE"){
		echo "				<td id='3c' class='tdbuscah' onMouseOver=\"mouseover('3c', '3d', 'lab3')\" onMouseOut=\"mouseoutlivre('3c', '3d', 'lab3')\">";
		echo 					$array[3][4];
		echo "				</td>
							<td id='3d' class='tdbuscah' onMouseOver=\"mouseover('3c', '3d', 'lab3')\" onMouseOut=\"mouseoutlivre('3c', '3d', 'lab3')\">";
		echo 					$array[3][5];
		echo "				</td>";
						} else {	
		echo "				<td id='3c' class='tdbusca' onMouseOver=\"mouseover('3c', '3d', 'lab3')\" onMouseOut=\"mouseout('3c', '3d', 'lab3')\">";
		echo 					$array[3][4];
		echo "				</td>
							<td id='3d' class='tdbusca' onMouseOver=\"mouseover('3c', '3d', 'lab3')\" onMouseOut=\"mouseout('3c', '3d', 'lab3')\">";
		echo 					$array[3][5];
		echo "				</td>";
						}
						
		echo"					</tr>";

		
						//LABORATORIO 04
						if($array[4][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab4' class='tdlab'>
									4
								</td>";
									$lab = 4;
		echo"					<td id='4a' class='tdbuscah' onMouseOver=\"mouseover('4a', '4b', 'lab4')\" onMouseOut=\"mouseoutlivre('4a', '4b', 'lab4')\">";
		echo 						$array[4][1];
		echo "					</td>
								<td id='4b' class='tdbuscah' onMouseOver=\"mouseover('4a', '4b', 'lab4')\" onMouseOut=\"mouseoutlivre('4a', '4b', 'lab4')\">";
		echo 						$array[4][2];
		echo "					</td>";						
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab4' class='tdlab'>
									4
								</td>";
									$lab = 4;
		echo"					<td id='4a' class='tdbusca' onMouseOver=\"mouseover('4a', '4b', 'lab4')\" onMouseOut=\"mouseout('4a', '4b', 'lab4')\">";
		echo 						$array[4][1];
		echo "					</td>
								<td id='4b' class='tdbusca' onMouseOver=\"mouseover('4a', '4b', 'lab4')\" onMouseOut=\"mouseout('4a', '4b', 'lab4')\">";
		echo 						$array[4][2];
		echo "					</td>";
						}
						
						if($array[4][5] == "LIVRE"){
		echo "					<td id='4c' class='tdbuscah' onMouseOver=\"mouseover('4c', '4d', 'lab4')\" onMouseOut=\"mouseoutlivre('4c', '4d', 'lab4')\">";
		echo 						$array[4][4];
		echo "					</td>
								<td id='4d' class='tdbuscah' onMouseOver=\"mouseover('4c', '4d', 'lab4')\" onMouseOut=\"mouseoutlivre('4c', '4d', 'lab4')\">";
		echo 						$array[4][5];
		echo "					</td>
							</tr>";							
						} else {
		echo "					<td id='4c' class='tdbusca' onMouseOver=\"mouseover('4c', '4d', 'lab4')\" onMouseOut=\"mouseout('4c', '4d', 'lab4')\">";
		echo 						$array[4][4];
		echo "					</td>
								<td id='4d' class='tdbusca' onMouseOver=\"mouseover('4c', '4d', 'lab4')\" onMouseOut=\"mouseout('4c', '4d', 'lab4')\">";
		echo 						$array[4][5];
		echo "					</td>
							</tr>";
							
						}
	
						//LABORATORIO 05
						if($array[5][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab5' class='tdlab'>
									5
								</td>";
									$lab = 5;
		echo"					<td id='5a' class='tdbuscah' onMouseOver=\"mouseover('5a', '5b', 'lab5')\" onMouseOut=\"mouseoutlivre('5a', '5b', 'lab5')\">";
		echo 						$array[5][1];
		echo "					</td>
								<td id='5b' class='tdbuscah' onMouseOver=\"mouseover('5a', '5b', 'lab5')\" onMouseOut=\"mouseoutlivre('5a', '5b', 'lab5')\">";
		echo 						$array[5][2];
		echo "					</td>";						
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab5' class='tdlab'>
									5
								</td>";
									$lab = 5;
		echo"					<td id='5a' class='tdbusca' onMouseOver=\"mouseover('5a', '5b', 'lab5')\" onMouseOut=\"mouseout('5a', '5b', 'lab5')\">";
		echo 						$array[5][1];
		echo "					</td>
								<td id='5b' class='tdbusca' onMouseOver=\"mouseover('5a', '5b', 'lab5')\" onMouseOut=\"mouseout('5a', '5b', 'lab5')\">";
		echo 						$array[5][2];
		echo "					</td>";									
						}
						
						if($array[5][5] == "LIVRE"){							
		echo "					<td id='5c' class='tdbuscah' onMouseOver=\"mouseover('5c', '5d', 'lab5')\" onMouseOut=\"mouseoutlivre('5c', '5d', 'lab5')\">";
		echo 						$array[5][4];
		echo "					</td>
								<td id='5d' class='tdbuscah' onMouseOver=\"mouseover('5c', '5d', 'lab5')\" onMouseOut=\"mouseoutlivre('5c', '5d', 'lab5')\">";
		echo 						$array[5][5];
		echo "					</td>
							</tr>";
						} else {							
		echo "					<td id='5c' class='tdbusca' onMouseOver=\"mouseover('5c', '5d', 'lab5')\" onMouseOut=\"mouseout('5c', '5d', 'lab5')\">";
		echo 						$array[5][4];
		echo "					</td>
								<td id='5d' class='tdbusca' onMouseOver=\"mouseover('5c', '5d', 'lab5')\" onMouseOut=\"mouseout('5c', '5d', 'lab5')\">";
		echo 						$array[5][5];
		echo "					</td>
							</tr>";
						}
							
						//LABORATORIO 06
						if($array[6][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab6' class='tdlab'>
									6A
								</td>";
									$lab = 6;
		echo"					<td id='6a' class='tdbuscah' onMouseOver=\"mouseover('6a', '6b', 'lab6')\" onMouseOut=\"mouseoutlivre('6a', '6b', 'lab6')\">";
		echo 						$array[6][1];
		echo "					</td>
								<td id='6b' class='tdbuscah' onMouseOver=\"mouseover('6a', '6b', 'lab6')\" onMouseOut=\"mouseoutlivre('6a', '6b', 'lab6')\">";
		echo 						$array[6][2];
		echo "					</td>";						
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab6' class='tdlab'>
									6A
								</td>";
									$lab = 6;
		echo"					<td id='6a' class='tdbusca' onMouseOver=\"mouseover('6a', '6b', 'lab6')\" onMouseOut=\"mouseout('6a', '6b', 'lab6')\">";
		echo 						$array[6][1];
		echo "					</td>
								<td id='6b' class='tdbusca' onMouseOver=\"mouseover('6a', '6b', 'lab6')\" onMouseOut=\"mouseout('6a', '6b', 'lab6')\">";
		echo 						$array[6][2];
		echo "					</td>";		
						}
						
						if ($array[6][5] == "LIVRE"){
		echo "					<td id='6c' class='tdbuscah' onMouseOver=\"mouseover('6c', '6d', 'lab6')\" onMouseOut=\"mouseoutlivre('6c', '6d', 'lab6')\">";
		echo 						$array[6][4];
		echo "					</td>
								<td id='6d' class='tdbuscah' onMouseOver=\"mouseover('6c', '6d', 'lab6')\" onMouseOut=\"mouseoutlivre('6c', '6d', 'lab6')\">";
		echo 						$array[6][5];
		echo "					</td>
							</tr>";								
						} else {
		echo "					<td id='6c' class='tdbusca' onMouseOver=\"mouseover('6c', '6d', 'lab6')\" onMouseOut=\"mouseout('6c', '6d', 'lab6')\">";
		echo 						$array[6][4];
		echo "					</td>
								<td id='6d' class='tdbusca' onMouseOver=\"mouseover('6c', '6d', 'lab6')\" onMouseOut=\"mouseout('6c', '6d', 'lab6')\">";
		echo 						$array[6][5];
		echo "					</td>
							</tr>";							
						}
						
						//LABORATORIO 11 (6B)
						if($array[11][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab11' class='tdlab'>
									6B
								</td>";
									$lab = 11;
		echo"					<td id='11a' class='tdbuscah' onMouseOver=\"mouseover('11a', '11b', 'lab11')\" onMouseOut=\"mouseoutlivre('11a', '11b', 'lab11')\">";
		echo 						$array[11][1];
		echo "					</td>
								<td id='11b' class='tdbuscah' onMouseOver=\"mouseover('11a', '11b', 'lab11')\" onMouseOut=\"mouseoutlivre('11a', '11b', 'lab11')\">";
		echo 						$array[11][2];
		echo "					</td>";						
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab11' class='tdlab'>
									6B
								</td>";
									$lab = 11;
		echo"					<td id='11a' class='tdbusca' onMouseOver=\"mouseover('11a', '11b', 'lab11')\" onMouseOut=\"mouseout('11a', '11b', 'lab11')\">";
		echo 						$array[11][1];
		echo "					</td>
								<td id='11b' class='tdbusca' onMouseOver=\"mouseover('11a', '11b', 'lab11')\" onMouseOut=\"mouseout('11a', '11b', 'lab11')\">";
		echo 						$array[11][2];
		echo "					</td>";		
						}
						
						if($array[11][5] == "LIVRE"){
		echo "					<td id='11c' class='tdbuscah' onMouseOver=\"mouseover('11c', '11d', 'lab11')\" onMouseOut=\"mouseoutlivre('11c', '11d', 'lab11')\">";
		echo 						$array[11][4];
		echo "					</td>
								<td id='11d' class='tdbuscah' onMouseOver=\"mouseover('11c', '11d', 'lab11')\" onMouseOut=\"mouseoutlivre('11c', '11d', 'lab11')\">";
		echo 						$array[11][5];	
		echo "					</td>
							</tr>";
							
						} else {
		echo "					<td id='11c' class='tdbusca' onMouseOver=\"mouseover('11c', '11d', 'lab11')\" onMouseOut=\"mouseout('11c', '11d', 'lab11')\">";
		echo 						$array[11][4];
		echo "					</td>
								<td id='11d' class='tdbusca' onMouseOver=\"mouseover('11c', '11d', 'lab11')\" onMouseOut=\"mouseout('11c', '11d', 'lab11')\">";
		echo 						$array[11][5];	
		echo "					</td>
							</tr>";
						}
	
						//LABORATORIO 07
						if($array[7][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab7' class='tdlab'>
									7
								</td>";
									$lab = 7;
		echo"					<td id='7a' class='tdbuscah' onMouseOver=\"mouseover('7a', '7b', 'lab7')\" onMouseOut=\"mouseoutlivre('7a', '7b', 'lab7')\">";
		echo 						$array[7][1];
		echo "					</td>
								<td id='7b' class='tdbuscah' onMouseOver=\"mouseover('7a', '7b', 'lab7')\" onMouseOut=\"mouseoutlivre('7a', '7b', 'lab7')\">";
		echo 						$array[7][2];
		echo "					</td>";
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab7' class='tdlab'>
									7
								</td>";
									$lab = 7;
		echo"					<td id='7a' class='tdbusca' onMouseOver=\"mouseover('7a', '7b', 'lab7')\" onMouseOut=\"mouseout('7a', '7b', 'lab7')\">";
		echo 						$array[7][1];
		echo "					</td>
								<td id='7b' class='tdbusca' onMouseOver=\"mouseover('7a', '7b', 'lab7')\" onMouseOut=\"mouseout('7a', '7b', 'lab7')\">";
		echo 						$array[7][2];
		echo "					</td>";
						}
						
						if($array[7][5] == "LIVRE"){
			echo "				<td id='7c' class='tdbuscah' onMouseOver=\"mouseover('7c', '7d', 'lab7')\" onMouseOut=\"mouseoutlivre('7c', '7d', 'lab7')\">";
		echo 						$array[7][4];
		echo "					</td>
								<td id='7d' class='tdbuscah' onMouseOver=\"mouseover('7c', '7d', 'lab7')\" onMouseOut=\"mouseoutlivre('7c', '7d', 'lab7')\">";
		echo 						$array[7][5];
		echo "					</td>
							</tr>";							
						} else {
			echo "				<td id='7c' class='tdbusca' onMouseOver=\"mouseover('7c', '7d', 'lab7')\" onMouseOut=\"mouseout('7c', '7d', 'lab7')\">";
		echo 						$array[7][4];
		echo "					</td>
								<td id='7d' class='tdbusca' onMouseOver=\"mouseover('7c', '7d', 'lab7')\" onMouseOut=\"mouseout('7c', '7d', 'lab7')\">";
		echo 						$array[7][5];
		echo "					</td>
							</tr>";
						}
	
						//LABORATORIO 08
						if($array[8][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab8' class='tdlab'>
									8
								</td>";
									$lab = 8;
		echo"					<td id='8a' class='tdbuscah' onMouseOver=\"mouseover('8a', '8b', 'lab8')\" onMouseOut=\"mouseoutlivre('8a', '8b', 'lab8')\">";
		echo 						$array[8][1];
		echo "					</td>
								<td id='8b' class='tdbuscah' onMouseOver=\"mouseover('8a', '8b', 'lab8')\" onMouseOut=\"mouseoutlivre('8a', '8b', 'lab8')\">";
		echo 						$array[8][2];
		echo "					</td>";						
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab8' class='tdlab'>
									8
								</td>";
									$lab = 8;
		echo"					<td id='8a' class='tdbusca' onMouseOver=\"mouseover('8a', '8b', 'lab8')\" onMouseOut=\"mouseout('8a', '8b', 'lab8')\">";
		echo 						$array[8][1];
		echo "					</td>
								<td id='8b' class='tdbusca' onMouseOver=\"mouseover('8a', '8b', 'lab8')\" onMouseOut=\"mouseout('8a', '8b', 'lab8')\">";
		echo 						$array[8][2];
		echo "					</td>";	
						}
	
						if($array[8][5] == "LIVRE"){
		echo "					<td id='8c' class='tdbuscah' onMouseOver=\"mouseover('8c', '8d', 'lab8')\" onMouseOut=\"mouseoutlivre('8c', '8d', 'lab8')\">";
		echo 						$array[8][4];
		echo "					</td>
								<td id='8d' class='tdbuscah' onMouseOver=\"mouseover('8c', '8d', 'lab8')\" onMouseOut=\"mouseoutlivre('8c', '8d', 'lab8')\">";
		echo 						$array[8][5];
		echo "					</td>
							</tr>";
						} else {
		echo "					<td id='8c' class='tdbusca' onMouseOver=\"mouseover('8c', '8d', 'lab8')\" onMouseOut=\"mouseout('8c', '8d', 'lab8')\">";
		echo 						$array[8][4];
		echo "					</td>
								<td id='8d' class='tdbusca' onMouseOver=\"mouseover('8c', '8d', 'lab8')\" onMouseOut=\"mouseout('8c', '8d', 'lab8')\">";
		echo 						$array[8][5];
		echo "					</td>
							</tr>";
						}
						
						//LABORATORIO 09
						if($array[9][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab9' class='tdlab'>
									9
								</td>";
									$lab = 9;
		echo"					<td id='9a' class='tdbuscah' onMouseOver=\"mouseover('9a', '9b', 'lab9')\" onMouseOut=\"mouseoutlivre('9a', '9b', 'lab9')\">";
		echo 						$array[9][1];
		echo "					</td>
								<td id='9b' class='tdbuscah' onMouseOver=\"mouseover('9a', '9b', 'lab9')\" onMouseOut=\"mouseoutlivre('9a', '9b', 'lab9')\">";
		echo 						$array[9][2];
		echo "					</td>";						
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab9' class='tdlab'>
									9
								</td>";
									$lab = 9;
		echo"					<td id='9a' class='tdbusca' onMouseOver=\"mouseover('9a', '9b', 'lab9')\" onMouseOut=\"mouseout('9a', '9b', 'lab9')\">";
		echo 						$array[9][1];
		echo "					</td>
								<td id='9b' class='tdbusca' onMouseOver=\"mouseover('9a', '9b', 'lab9')\" onMouseOut=\"mouseout('9a', '9b', 'lab9')\">";
		echo 						$array[9][2];
		echo "					</td>";		
						}
						
						if($array[9][5] == "LIVRE"){
		echo "					<td id='9c' class='tdbuscah' onMouseOver=\"mouseover('9c', '9d', 'lab9')\" onMouseOut=\"mouseoutlivre('9c', '9d', 'lab9')\">";
		echo 						$array[9][4];
		echo "					</td>
								<td id='9d' class='tdbuscah' onMouseOver=\"mouseover('9c', '9d', 'lab9')\" onMouseOut=\"mouseoutlivre('9c', '9d', 'lab9')\">";
		echo 						$array[9][5];
		echo "					</td>
							</tr>";
						} else {
		echo "					<td id='9c' class='tdbusca' onMouseOver=\"mouseover('9c', '9d', 'lab9')\" onMouseOut=\"mouseout('9c', '9d', 'lab9')\">";
		echo 						$array[9][4];
		echo "					</td>
								<td id='9d' class='tdbusca' onMouseOver=\"mouseover('9c', '9d', 'lab9')\" onMouseOut=\"mouseout('9c', '9d', 'lab9')\">";
		echo 						$array[9][5];
		echo "					</td>
							</tr>";
							
						}
	
						//LABORATORIO 10
						if($array[10][2] == "LIVRE"){
		echo "				<tr class='trbusca' align='center'>
								<td id='lab10' class='tdlab'>
									10
								</td>";
									$lab = 10;
		echo"					<td id='10a' class='tdbuscah' onMouseOver=\"mouseover('10a', '10b', 'lab10')\" onMouseOut=\"mouseoutlivre('10a', '10b', 'lab10')\">";
		echo 						$array[10][1];
		echo "					</td>
								<td id='10b' class='tdbuscah' onMouseOver=\"mouseover('10a', '10b', 'lab10')\" onMouseOut=\"mouseoutlivre('10a', '10b', 'lab10')\">";
		echo 						$array[10][2];
		echo "					</td>";						
						} else {
		echo "				<tr class='trbusca' align='center'>
								<td id='lab10' class='tdlab'>
									10
								</td>
								</td>";
									$lab = 10;
		echo"					<td id='10a' class='tdbusca' onMouseOver=\"mouseover('10a', '10b', 'lab10')\" onMouseOut=\"mouseout('10a', '10b', 'lab10')\">";
		echo 						$array[10][1];
		echo "					</td>
								<td id='10b' class='tdbusca' onMouseOver=\"mouseover('10a', '10b', 'lab10')\" onMouseOut=\"mouseout('10a', '10b', 'lab10')\">";
		echo 						$array[10][2];
		echo "					</td>";	
						}
						
						if($array[10][5] == "LIVRE"){
		echo "					<td id='10c' class='tdbuscah' onMouseOver=\"mouseover('10c', '10d', 'lab10')\" onMouseOut=\"mouseoutlivre('10c', '10d', 'lab10')\">";
		echo 						$array[10][4];
		echo "					</td>
								<td id='10d' class='tdbuscah' onMouseOver=\"mouseover('10c', '10d', 'lab10')\" onMouseOut=\"mouseoutlivre('10c', '10d', 'lab10')\">";
		echo 						$array[10][5];
		echo "					</td>
							</tr>";
						} else {
		echo "					<td id='10c' class='tdbusca' onMouseOver=\"mouseover('10c', '10d', 'lab10')\" onMouseOut=\"mouseout('10c', '10d', 'lab10')\">";
		echo 						$array[10][4];
		echo "					</td>
								<td id='10d' class='tdbusca' onMouseOver=\"mouseover('10c', '10d', 'lab10')\" onMouseOut=\"mouseout('10c', '10d', 'lab10')\">";
		echo 						$array[10][5];
		echo "					</td>
							</tr>";
						}
						
		echo "		</table>";
?>
</div>
</center>
</body>
</html>