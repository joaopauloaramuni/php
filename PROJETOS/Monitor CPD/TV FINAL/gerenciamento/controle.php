<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- ESSA PAGINA VERIFICA SE A TAG CONTROLE NO XML ESTA EM 1 OU 0
CASO ESTEJA EM 0 - NAO HOUVE ALTERACAO NO BANCO DE DADOS
CASO ESTEJA EM 1 - HOUVE ALGUM TIPO DE ALTERACAO NO BANCO DE DADOS,
POR ISSO ELE LE O BANCO NOVAMENTE E PEGA OS NOVOS DADOS -->
<html>
	<head>
	</head>
<body>
	<?php
	//INCLUI O ARQUIVO ONDE SE ENCONTRAM AS FUNCOES DO PHP
	include 'global.php';	
	
	//CRIA O OBJETO DO TIPO FRAMEWORK
	$framework = new framework();
	
	//CONECTA NO BANCO DE DADOS
	$framework->conecta();

	//LER ARQUIVO XML PARA COMPARAR A VARIAVEL CONTROLE
	$xml = simplexml_load_file("../gerenciamento/laboratorios.xml");
	foreach($xml->labs->controle as $controle){
	
		if($controle == 0){
			echo" <META HTTP-EQUIV='Refresh' CONTENT='1; URL=controle.php'>";
		}
				
		if($controle == 1){
			
			for ($i = 1; $i<=11; $i++){
				$array[$i][1] = "";	
				$array[$i][2] = "";	
			}
			
			//BUSCA INFORMACOES NO BANCO DOS HORARIOS FIXOS
			$rs=$framework->busca();
		
			//PREENCHE O ARRAY COM AS INFORMACOES RECUPERADAS DO BANCO DE DADOS NA POSICAO [$I][1] E [$I][2]
			while($tup=mysql_fetch_assoc($rs)){
				for ($i = 1; $i <= 11; $i++){
					if ($tup['laboratorio'] == $i){
						$array[$i][1]=$tup['professor'];
						$array[$i][2]=$tup['materia'];
					}
				}
			}
			
			/*for ($i = 1; $i <= 11; $i++){
				echo $array[$i][1]." - ";
				echo $array[$i][2]." - Lab: $i <br>";		
			}*/
			
			//BUSCA INFORMACOES NO BANCO DOS HORARIOS ISOLADOS
			$rsiso=$framework->buscaiso();
		
			//PREENCHE O ARRAY COM AS INFORMACOES RECUPERADAS DO BANCO DE DADOS NA POSICAO [$I][1] E [$I][2]
			while($tupiso=mysql_fetch_assoc($rsiso)){
				for ($i = 1; $i <= 11; $i++){
					if ($tupiso['laboratorio'] == $i){
						$array[$i][1]=$tupiso['professor'];
						$array[$i][2]=$tupiso['materia'];
					}
				}
			}
			
			/*echo "<br><br>Materia Isoladas<br><br>";
			
			for ($i = 1; $i <= 11; $i++){
				echo $array[$i][1]." - ";
				echo $array[$i][2]." - Lab: $i <br>";		
			}*/
			
			//PREENCHE OS LABORATORIOS VAZIOS NA POSICAO [$I][1] E [$I][2]
			for($i=1;$i<=11; $i++){
				if($array[$i][1] == "" && $array[$i][2] == ""){
					$array[$i][1]="&nbsp;";
					$array[$i][2]="FECHADO";
				}
			}
			
			// --------------- XML --------------------	
			//Le o documento XML e escreve no xml
			if(file_exists('laboratorios.xml')){
					$xml = simplexml_load_file('../gerenciamento/laboratorios.xml');
				
					//ALTERAR AS PROPIEDADES DO XML
					$xml->labs->flag = '1'; //ALTERA O FLAG PARA 1 PARA 'AVISAR' A PAGINA VERIFICA QUE O XML TEM NOVAS INFORMACOES

					$xml->labs->lab1->prof = $array[1][1];
					$xml->labs->lab1->mat = $array[1][2];
					
					$xml->labs->lab2->prof = $array[2][1];
					$xml->labs->lab2->mat = $array[2][2];
					
					$xml->labs->lab3->prof = $array[3][1];
					$xml->labs->lab3->mat = $array[3][2];
					
					$xml->labs->lab4->prof = $array[4][1];
					$xml->labs->lab4->mat = $array[4][2];
					
					$xml->labs->lab5->prof = $array[5][1];
					$xml->labs->lab5->mat = $array[5][2];
					
					$xml->labs->lab6a->prof = $array[6][1];
					$xml->labs->lab6a->mat = $array[6][2];
					
					$xml->labs->lab6b->prof = $array[11][1];
					$xml->labs->lab6b->mat = $array[11][2];
					
					$xml->labs->lab7->prof = $array[7][1];
					$xml->labs->lab7->mat = $array[7][2];
					
					$xml->labs->lab8->prof = $array[8][1];
					$xml->labs->lab8->mat = $array[8][2];
					
					$xml->labs->lab9->prof = $array[9][1];
					$xml->labs->lab9->mat = $array[9][2];
					
					$xml->labs->lab10->prof = $array[10][1];
					$xml->labs->lab10->mat = $array[10][2];

					$xml->labs->flag = "1";
					
					$xml->labs->controle = "0";
										
					//GRAVA NO ARQUIVO laboratorios.XML
					file_put_contents('../gerenciamento/laboratorios.xml', $xml->asXML());
				}
				echo" <META HTTP-EQUIV='Refresh' CONTENT='1; URL=controle.php'>";
			}
		}	

	?>
</body>
</html>