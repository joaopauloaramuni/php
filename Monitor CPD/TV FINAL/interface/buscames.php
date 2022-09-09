<html>
<head>
	<META HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=UTF-8'>
	<script type='text/javascript' src='../gerenciamento/global.js'></script>
	<link href='../gerenciamento/estilos.css' rel='stylesheet' type='text/css' />
	<title>Laboratórios CPD - Busca</title>
</head>
<body style='overflow: hidden;'>
<center>
<?php

	// COMECO DO MENU
	echo "
	<div>
		<ul id='qm0' class='qmmc'>
			<li><a onMouseOver=\"this.className='Anormal'\" onMouseOut=\"this.className='Normal'\" href='index.php'>Inicio</a></li>
			<li><a onMouseOver=\"this.className='Anormal'\" onMouseOut=\"this.className='Normal'\" href='view.php'>Visualizar</a></li>
			<li><a onmouseover=\"this.className='Anormal'\" onmouseout=\"this.className='Normal'\" href='docbusca.php?dia=2'>Busca</a></li>
			<li><a onmouseover=\"this.className='Anormal'\" onmouseout=\"this.className='Normal'\" href='../gerenciamento/atualiza.php'>Atualiza XML</a></li>
			<li class='qmclear'>&nbsp;</li>
		</ul>
	</div>";
	// TERMINO DO MENU -->


require_once '../gerenciamento/horario.class.php';
	if(isset($_GET['mes'])){
		
		$dia = $_GET['mes'];	
		if ($dia == 10){
			$diam = '01';
			$selecionado = "this.className=\"messelecionado\"";
		}
		elseif ($dia == 11){
			$diam = '02';
			$selecionado = "this.className=\"messelecionado\"";
		}
		elseif ($dia == 12){
			$diam = '03';
			$selecionado = "this.className=\"messelecionado\"";
		}
		elseif ($dia == 13){
			$diam = '04';
			$selecionado = "this.className=\"messelecionado\"";
		}
		elseif ($dia == 14){
			$diam = '05';
			$selecionado = "this.className=\"messelecionado\"";
		}
		elseif ($dia == 15){
			$diam = '06';
			$selecionado = "this.className=\"messelecionado\"";
		}
		elseif ($dia == 16){
			$diam = '07';
			$selecionado = "this.className=\"messelecionado\"";
		}
		elseif ($dia == 17){
			$diam = '08';
			$selecionado = "this.className=\"messelecionado\"";
		}
		elseif ($dia == 18){
			$diam = '09';
			$selecionado = "this.className=\"messelecionado\"";
		}
		elseif ($dia == 19){
			$diam = '10';
			$selecionado = "this.className=\"messelecionado\"";
		}
		elseif ($dia == 20){
			$diam = '11';
			$selecionado = "this.className=\"messelecionado\"";
		}
		elseif ($dia == 21){
			$diam = '12';
			$selecionado = "this.className=\"messelecionado\"";
		} else {
			header("location:docbusca.php?dia=$dia");
		}
		
		$horario = new horario ("", "", "", "", "", "", "", "");
		try {
			$horarios = $horario->buscames();
		} catch (Exception $e){
			header("location:buscames.php?dia=".$dia."&msg=".$e->getMessage()."");
		}
	}

	echo"
			<div class='divmenulateral'>
			  	<div class='butao' id='1' onClick='buscahorario(id)' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>HOJE</div>
				<div class='butao' id='2' onClick='buscahorario(id)' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>SEGUNDA-FEIRA</div>
				<div class='butao' id='3' onClick='buscahorario(id)' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>TERÇA-FEIRA</div>
				<div class='butao' id='4' onClick='buscahorario(id)' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>QUARTA-FEIRA</div>
				<div class='butao' id='5' onClick='buscahorario(id)' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>QUINTA-FEIRA</div>
				<div class='butao' id='6' onClick='buscahorario(id)' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>SEXTA-FEIRA</div>
				<div class='butao' id='7' onClick='buscahorario(id)' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>SÁBADO</div>
				<div class='butao' id='8' onClick='buscarprofmat(id)' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>PROFESSORES</div>
				<div class='butao' id='9' onClick='buscarprofmat(id)' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>MATÉRIAS</div>
			</div>";
	

	echo " 	<div class='divbaixomes'>
				<div class='divcabecalho'>
					<span style='color: black; font-size: 30px; font-weight: bold;'>BUSCA</span>";
					if (isset ( $_GET ['msg'] )) {
						echo "<div class='divmsg'><div class='escritomsg'>".$_GET ['msg']."</div></div>";
					}
	echo "		</div>

				<div style='margin-left: 24%; margin-top: 5px;'>";
					if ($dia == 10)
	echo "				<div style='margin-left: 4px;' class='messelecionado' id='10' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut=$selecionado>JANEIRO</div>";
					else
	echo "				<div style='margin-left: 4px;' class='mes' id='10' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>JANEIRO</div>";
					
					if ($dia == 11)	
	echo "				<div style='margin-left: 4px;' class='messelecionado' id='11' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut=$selecionado>FEVEREIRO</div>";
					else
	echo "				<div style='margin-left: 4px;' class='mes' id='11' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>FEVEREIRO</div>";
			
					if ($dia == 12)	
	echo "				<div style='margin-left: 4px;' class='messelecionado' id='12' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut=$selecionado>MARÇO</div>";
					else
	echo "				<div style='margin-left: 4px;' class='mes' id='12' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>MARÇO</div>";
						
					if ($dia == 13)	
	echo "				<div style='margin-left: 4px;' class='messelecionado' id='13' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut=$selecionado>ABRIL</div>";
					else
	echo "				<div style='margin-left: 4px;' class='mes' id='13' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>ABRIL</div>";
						
					if ($dia == 14)	
	echo "				<div style='margin-left: 4px;' class='messelecionado' id='14' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut=$selecionado>MAIO</div>";
					else
	echo "				<div style='margin-left: 4px;' class='mes' id='14' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>MAIO</div>";
						
					if ($dia == 15)	
	echo "				<div style='margin-left: 4px;' class='messelecionado' id='15' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut=$selecionado>JUNHO</div>";
					else
	echo "				<div style='margin-left: 4px;' class='mes' id='15' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>JUNHO</div>";
	echo "			<br />";
					if ($dia == 16)	
	echo "				<div style='margin-left: 4px; margin-top: 3px;'' class='messelecionado' id='16' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut=$selecionado>JULHO</div>";
					else
	echo "				<div style='margin-left: 4px; margin-top: 3px;'' class='mes' id='16' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>JULHO</div>";
						
					if ($dia == 17)	
	echo "				<div style='margin-left: 4px; margin-top: 3px;'' class='messelecionado' id='17' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut=$selecionado>AGOSTO</div>";
					else
	echo "				<div style='margin-left: 4px; margin-top: 3px;'' class='mes' id='17' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>AGOSTO</div>";
						
					if ($dia == 18)	
	echo "				<div style='margin-left: 4px; margin-top: 3px;'' class='messelecionado' id='18' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut=$selecionado>SETEMBRO</div>";
					else
	echo "				<div style='margin-left: 4px; margin-top: 3px;'' class='mes' id='18' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>SETEMBRO</div>";
						
					if ($dia == 19)	
	echo "				<div style='margin-left: 4px; margin-top: 3px;'' class='messelecionado' id='19' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut=$selecionado>OUTUBRO</div>";
					else
	echo "				<div style='margin-left: 4px; margin-top: 3px;'' class='mes' id='19' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>OUTUBRO</div>";
						
					if ($dia == 20)	
	echo "				<div style='margin-left: 4px; margin-top: 3px;'' class='messelecionado' id='20' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut=$selecionado>NOVEMBRO</div>";
					else
	echo "				<div style='margin-left: 4px; margin-top: 3px;'' class='mes' id='20' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>NOVEMBRO</div>";
						
					if ($dia == 21)	
	echo "				<div style='margin-left: 4px; margin-top: 3px;'' class='messelecionado' id='21' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut=$selecionado>DEZEMBRO</div>";
					else
	echo "				<div style='margin-left: 4px; margin-top: 3px;' class='mes' id='21' onClick='buscahorariomes(id)' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>DEZEMBRO</div>";
	echo "		</div>
				
				<div style='margin-top: 30px; margin-left: 275px;' >
					<div class='menu' onClick='location.href=\"../interface/docbusca.php?idhorario=0&dia=".$dia."&novo=1\"' onMouseOver='this.className=\"menuh\"' onMouseOut='this.className=\"menu\"' >Novo Horário</div>
					<div class='menu' onClick='location.href=\"../interface/buscaprof.php?idprofessor=0\"' onMouseOver='this.className=\"menuh\"' onMouseOut='this.className=\"menu\"' >Novo Professor</div>
					<div class='menu' onClick='location.href=\"../interface/buscamat.php?idmateria=0\"' onMouseOver='this.className=\"menuh\"' onMouseOut='this.className=\"menu\"' >Nova Matéria</div>				
				</div>";

	echo "	<table style=' width: 90%; margin-top: 15px;'>
				<tr align='center'>
					<td class='toptd'>
						<b>PROFESSOR</b>
					</td>
					<td class='toptd'>
						<b>MATERIA</b>
					</td>
					<td class='toptd'>
						<b>LABROTARÓRIO</b>
					</td>
					<td class='toptd'>
						<b>HORÁRIO</b>
					</td>
					<td class='toptd'>
						<b>DATA</b>
					</td>
				</tr>";
if (isset($horarios)){
	//print_r($horarios);
	//echo "<br>";
	$color = "#ababab";
	$i = 1;
	foreach ($horarios as $horario) {
		$mes = substr($horario->diames, 5, 2);  // Retorna MM de AAAA-MM-DD (diames do banco)
		//echo "1- mes = $mes ------ dia do object = $diam ------ diames: $horario->diames <br>";
		//print_r($horarios);
		if ($mes == $diam){
			
			$color = ($color == "#ccff99")?"#ffffff":"#ccff99";
			echo "	<tr bgcolor='$color' style='cursor:pointer;'
												 onmouseover='this.style.backgroundColor=\"#eeffcc\"'
												 onmouseout='this.style.backgroundColor=\"$color\"' align='center'
												 onClick=\"editames('".$horario->idhorario."', '".$dia."')\">
						<td class='buscatd'>
							$horario->prof
						</td>
						<td class='buscatd'>
							$horario->mat
						</td>
						<td class='buscatd'>
							Laboratório: $horario->lab
						</td>
						<td class='buscatd'>";
						if($horario->horario_inicial == 1800){
							$horainicial = '1º Horário';
						} else $horainicial = '2º Horário';
						
			echo "		$horainicial
						</td>
						<td class='buscatd'>
							$horario->diames
						</td>
					</tr>";
		}
	}
}
	echo"			</td>
				</tr>";
	echo "	</table>
			</div>";
			
?>
</center>
<?php
	
	if(isset($_GET['idhorario'])){
		
		$idhorario = $_GET['idhorario'];
		
		if($idhorario != 0){
			echo "	<div onClick=\"removefundomes('".$dia."')\" id='divabsolute' style='display:block;'></div>";
			echo "	<div id='caixaeex' style='display:block;'>";
		}else {
			echo "	<div onClick=\"removefundo('".$dia."')\" id='divabsolute' style='display:block;'></div>";
			echo "	<div id='caixaeex' style='display:block;'>";
		}
	
		require_once '../gerenciamento/horario.class.php';
		require_once '../gerenciamento/professor.class.php';
		require_once '../gerenciamento/materia.class.php';
							
		$professor = new professor("", "");
		try {
			$professores = $professor->buscar();
		} catch ( Exception $e ) {
			echo $e->getMessage ();
			$professores = "";
		}
		
		$materia = new materia("", "");
		try {
			$materias = $materia->buscar();
		} catch ( Exception $e ) {
			echo $e->getMessage ();
			$materias = "";
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
		
		$datadia = substr($horario->diames, -2);
		$mes = substr($horario->diames, 5, 2);
		$ano = substr($horario->diames, 0, 4);
		
		
		echo "	<center>";
		
		if ($idhorario == 0){
			echo "	<form name='formgeral' action='../gerenciamento/enviacadhorario.php?dia=$dia' method='post'>
					<div class='divgeralhorario'>";
		} else {
			echo "	<form name='formgeral' action='../gerenciamento/enviaeditahorario.php?idhorario=".$idhorario."&dia=".$dia."' method='post'>
					<div class='divgeralhorario'>
						<div class='divexcluir' onClick=\"confimadel('".$horario->idhorario."', '".$dia."')\"></div>Excluir";
		}

				//MOSTRA OS PROFESSORES DO SQL
		echo "	<div class='divprof'>
					<div class='profcadhora'>
						Selecione o Professor:
					</div>
					<div class='divprofessor'>
						<select id='cadprof' name='professor' onChange='rederecina()'>
							<option style='color: gray' class='option'>Professor</option>";
							foreach ($professores as $professor){
		echo "					<option id='".$professor->idprofessor."' value='".$professor->idprofessor."'>".$professor->prof."</option>";	
							}
				
		echo "			</select>
					</div>
				</div>";
				//FECHA DIV DO PROFESSOR 
					
				//MOSTRA AS MATERIAS DO SQL
		echo "	<div class='divmat'>
					<div class='matcadhora'>
						Selecione a Matéria:
					</div>
					<div class='divmateria'>
						<select name='materia' onChange='redireciona(this)'>
							<option style='color: gray' class='option'>Matéria</option>";
							foreach ($materias as $materia ){
		echo "					<option id='".$materia->idmateria."' value='".$materia->idmateria."'>".$materia->mat."</option>";	
							}
				
		echo "			</select>
					</div>	
				</div>";
				//FECHA DIV DA MATERIA
						
				//MOSTRA OS LABORATORIOS
		echo "	<div class='divlab'>
					<div class='labcadhora'>
						Laboratórios:
					</div>
					<div class='divlaboratoro'>
						<select name='laboratorio'>
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
					<select name='miSelect' id='miSelect' onChange='oculta()'>
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
		
				if ($idhorario != 0){
		echo "		<div class='divreset'>
						<input class='butreset' type='reset' value='Limpar' onClick='escrevetudo()' />
						<input class='butreset' type='submit' value='Editar' />
					</div>
					<script>lancadadosmes('".$horario->prof."', '".$horario->mat."', '".$horario->lab."', '".$horario->horario_inicial."', '".$datadia."', '".$mes."', '".$ano."') </script>";
				} else {
		echo "	 	<div class='divreset'>
						<input class='butreset' type='reset' value='Limpar' onClick='escrevetudo()' />
						<input class='butreset' type='submit' value='Cadastrar' />
					</div>";
			 }
		echo "	</form>
			</center>
		</div>";
	}
?>
</body>
</html>