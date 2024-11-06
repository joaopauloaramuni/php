<html>
<head>
	<META HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=UTF-8'>
	<script type='text/javascript' src='../gerenciamento/global.js'></script>
	<link href='../gerenciamento/estilos.css' rel='stylesheet' type='text/css' />
	<title>Laboratórios CPD - Busca</title>
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
<?php

require_once '../gerenciamento/horario.class.php';
require_once '../gerenciamento/professor.class.php';
	
	/*SERVER PARA REDIRECIONAR PARA A PAGINA DE ORIGEM
	PARA CADASTRAR, EX: ESTA NA PG 2ª-FEIRA E QUERIA
	CADASTRAR UM PROFESSOR, DEPOIS DE CADASTRAR
	O PROFESSOR, ELE VOLTA PARA A PG 2ª-FEIRA*/
	if(isset($_GET['x'])){
		$x = $_GET['x'];
	} else {
		$x = 0;
	}
	
	if (isset($_GET['turno'])) $turno = $_GET['turno']; else $turno = 2;
	if (isset($_GET['dia'])) $dia = $_GET['dia']; else $dia = 2;
	
	//BUSCA todos OS PROFESSORES NO BANCO PARA JOGAR NA PAGINA
	$professor = new professor("", "");
	try {
		$professores = $professor->buscar();
	} catch (Exception $e){
		$professores = "";
	}

	$classname = "this.className=\"butao\"";
	
	//TABELA DOS DIAS DA SEMANA, HOJE E PROF E MAT
	echo"
			 <div class='divmenulateral'>
			  	<div class='butao' id='1' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>HOJE</div>
				<div class='butao' id='2' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>SEGUNDA-FEIRA</div>
				<div class='butao' id='3' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>TERÇA-FEIRA</div>
				<div class='butao' id='4' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>QUARTA-FEIRA</div>
				<div class='butao' id='5' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>QUINTA-FEIRA</div>
				<div class='butao' id='6' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>SEXTA-FEIRA</div>
				<div class='butao' id='7' onClick='buscahorario(id, ".$turno.")' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>SÁBADO</div>
				<div class='butaoselecionado' id='8' onClick='location.href=\"buscaprof.php?dia=".$dia."&turno=".$turno."\"' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butaoselecionado\"'>PROFESSORES</div>
				<div class='butao' id='9' onClick='location.href=\"buscamat.php?dia=".$dia."&turno=".$turno."\"' onMouseOver='this.className=\"butaoh\"' onMouseOut='this.className=\"butao\"'>MATÉRIAS</div>
			</div>";

	echo " 	<div class='divbaixomes'>
				<div class='divcabecalho'>					
					<div style='color: black; font-size: 38px; font-weight: bold;'>BUSCA</div>
					<span style='font-size: 23px;'>Professores</span>";
					if (isset ( $_GET ['msg'] )) {
						echo "<div class='divmsg'><div class='escritomsg'>".$_GET ['msg']."</div></div>";
					}
	echo "		</div>";

	echo "		<div style='margin-left: 24%; margin-top: 5px;'>
					<div style='margin-left: 4px;' class='mes' id='10' onClick='buscahorariomes(id) ' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>JANEIRO</div>
					<div style='margin-left: 4px;' class='mes' id='11' onClick='buscahorariomes(id) ' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>FEVEREIRO</div>
					<div style='margin-left: 4px;' class='mes' id='12' onClick='buscahorariomes(id) ' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>MARÇO</div>
					<div style='margin-left: 4px;' class='mes' id='13' onClick='buscahorariomes(id) ' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>ABRIL</div>
					<div style='margin-left: 4px;' class='mes' id='14' onClick='buscahorariomes(id) ' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>MAIO</div>
					<div style='margin-left: 4px;' class='mes' id='15' onClick='buscahorariomes(id) ' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>JUNHO</div>
					<br>
					<div style='margin-left: 4px; margin-top: 3px;' class='mes' id='16' onClick='buscahorariomes(id) ' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>JULHO</div>
					<div style='margin-left: 4px; margin-top: 3px;' class='mes' id='17' onClick='buscahorariomes(id) ' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>AGOSTO</div>
					<div style='margin-left: 4px; margin-top: 3px;' class='mes' id='18' onClick='buscahorariomes(id) ' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>SETEMBRO</div>
					<div style='margin-left: 4px; margin-top: 3px;' class='mes' id='19' onClick='buscahorariomes(id) ' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>OUTUBRO</div>
					<div style='margin-left: 4px; margin-top: 3px;' class='mes' id='20' onClick='buscahorariomes(id) ' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>NOVEMBRO</div>
					<div style='margin-left: 4px; margin-top: 3px;' class='mes' id='21' onClick='buscahorariomes(id) ' onMouseOver='this.className=\"mesh\"' onMouseOut='this.className=\"mes\"'>DEZEMBRO</div>			
				</div>
				
				<div style='margin-top: 30px; margin-left: 260px;'>
					<div class='menu' onClick='location.href=\"../interface/docbusca.php?idhorario=0&dia=2\"' onMouseOver='this.className=\"menuh\"' onMouseOut='this.className=\"menu\"' >Novo Horário</div>
					<div class='menu' onClick='location.href=\"../interface/buscaprof.php?idprofessor=0\"' onMouseOver='this.className=\"menuh\"' onMouseOut='this.className=\"menu\"' >Novo Professor</div>
					<div class='menu' onClick='location.href=\"../interface/buscamat.php?idmateria=0\"' onMouseOver='this.className=\"menuh\"' onMouseOut='this.className=\"menu\"' >Nova Matéria</div>				
				</div>";

	echo "	<table style='width: 50%; margin-top: 60px; position: relative; left: 10px;'>
				<tr align='center'>
					<td class='toptd'>
						<b>PROFESSOR</b>
					</td>
					<td class='tdopprof'>
						<b>OP</b>
					</td>
				</tr>";

if ($professores){
	$color = "#ababab";
	foreach ($professores as $professor) {
	echo "	<tr bgcolor='$color' style='cursor:pointer;'
										 onmouseover='this.style.backgroundColor=\"silver\"'
										 onmouseout='this.style.backgroundColor=\"$color\"' align='center'>
				<td class='buscatd'>
					$professor->prof
				</td>
				<td class='buscatd'>
					<div onClick=\"confimadelprof(".$professor->idprofessor.", '".$professor->prof."')\" class='divexcluir2'></div>
					<a href='../interface/buscaprof.php?idprofessor=$professor->idprofessor'><div class='diveditar'></div></a>
				</td>
			</tr>";
	}
}
	echo"			</td>
				</tr>";
	echo "	</table>
			</div>";

?>
</center>
<?php
	
	if(isset($_GET['idprofessor'])){
		
		$idprofessor = $_GET['idprofessor'];
	
		echo "	<div onClick='location.href=\"buscaprof.php\"' id='divabsolute' style='display:block;'>
				</div>";
		echo "	<div id='caixaeexprof' style='display:block;'>";		
	
		require_once '../gerenciamento/professor.class.php';
							
		if ($idprofessor != 0){
			$professor = new professor($idprofessor, "");
			try{
				$professores = $professor->buscarId($idprofessor);
			}catch(Exception $e){
				header("location:docbusca.php?msg=".$e->getMessage());
			}
		}
		
		$nome = new professor("", "");
		try {
			$nomes = $nome->buscar();
		} catch ( Exception $e ) {
			echo $e->getMessage ();
			$nomes = "";
		}
		
	echo "	<center>";
		
		if ($idprofessor == 0){
			echo "	<form name='formgeral' action='../gerenciamento/cadprof.php?x=".$x."' method='post'>";			
			
						//MOSTRA OS PROFESSORES DO SQL
			echo "		<div class='divprof'>
							<div class='profcadhora'>
								Nome do Professor:
							</div>
							<div class='divprofessor'>
								<input name='professor' id='prof' type='text' value='Professor' onClick='ocultaprof()' onBlur='escreveprof()' style='color:gray'>
							</div>
						</div>";
						//FECHA DIV DO PROFESSOR

			echo "		<div class='divreset'>
							<input class='butreset' type='reset' value='Limpar' onClick='escrevetudo()' />
							<input class='butreset' type='submit' value='Cadastrar' />
						</div>
					</form>";
		} else {
			echo "	<form name='formgeral' action='../gerenciamento/editaprof.php?idhorario=".$idprofessor."&x=".$x."' method='post'>";
		
			
						//MOSTRA OS PROFESSORES DO SQL
			echo "		<div class='divprof'>
							<div class='profcadhora'>
								Nome do Professor:
							</div>
							<div style='margin-top: 10px;'>
								<input name='professor' id='prof' type='text' value='".$professores->prof."' onClick='ocultaprof(".$professores->prof.")' onBlur='escreveprof(".$professores->prof.")' style='color:gray'>
							</div>
						</div>";
						//FECHA DIV DO PROFESSOR
			
					if ($idprofessor != 0){
			echo "		<div class='divreset' style='top: 15px !important;'>
							<input class='butreset' type='reset' value='Limpar' onClick='escrevetudo()' />
							<input class='butreset' type='submit' value='Editar' />
						</div>";
					} else {
			echo "	 	<div class='divreset' style='top: 15px !important;'>
							<input class='butreset' type='reset' value='Limpar' onClick='escrevetudo()' />
							<input class='butreset' type='submit' value='Cadastrar' />
						</div>";
				 }
			echo "	</form>
				</center>
			</div>";
		}
	}
?>
</body>
</html>