<?php

require_once '../gerenciamento/horario.class.php';
		
	$horario = new horario ( "", "", "", "", "", "", "", "");
	try {
		$horarios = $horario->buscadoc('2');
	} catch ( Exception $e ) {
		echo $e->getMessage ();
		$horarios = "";
	}
	
	if ($horarios){
		foreach ($horarios as $horario) {
			echo"$horario->prof - $horario->horario_inicial - $horario->lab<br>";
			
			// --------------- XML --------------------	
			//Lê o documento XML e escreve no xml
			if(file_exists('docbusca.xml')){
				$xml = simplexml_load_file('docbusca.xml');//abre o arquivo xml
				
				//Caso seja no primeiro horario entrara aqui
				if ($horario->horario_inicial == 1800) {
					if($horario->lab == '1'){
						$xml->labs->segunda->lab1->prof1 = $horario->prof;
						$xml->labs->segunda->lab1->mat1 = $horario->mat;
					}
					
					if($horario->lab == '2'){
						$xml->labs->segunda->lab2->prof1 = $horario->prof;
						$xml->labs->segunda->lab2->mat1 = $horario->mat;
					}
					
					if($horario->lab == '3'){
						$xml->labs->segunda->lab3->prof1 = $horario->prof;
						$xml->labs->segunda->lab3->mat1 = $horario->mat;
					}
					
					if($horario->lab == '4'){
						$xml->labs->segunda->lab4->prof1 = $horario->prof;
						$xml->labs->segunda->lab4->mat1 = $horario->mat;
					}
					
					if($horario->lab == '5'){
						$xml->labs->segunda->lab5->prof1 = $horario->prof;
						$xml->labs->segunda->lab5->mat1 = $horario->mat;
					}
					
					if($horario->lab == '6'){
						$xml->labs->segunda->lab6a->prof1 = $horario->prof;
						$xml->labs->segunda->lab6a->mat1 = $horario->mat;
					}
					
					if($horario->lab == '11'){
						$xml->labs->segunda->lab6b->prof1 = $horario->prof;
						$xml->labs->segunda->lab6b->mat1 = $horario->mat;
					}
					
					if($horario->lab == '7'){
						$xml->labs->segunda->lab7->prof1 = $horario->prof;
						$xml->labs->segunda->lab7->mat1 = $horario->mat;
					}
					
					if($horario->lab == '8'){
						$xml->labs->segunda->lab8->prof1 = $horario->prof;
						$xml->labs->segunda->lab8->mat1 = $horario->mat;
					}
					
					if($horario->lab == '9'){
						$xml->labs->segunda->lab9->prof1 = $horario->prof;
						$xml->labs->segunda->lab9->mat1 = $horario->mat;
					}
					
					if($horario->lab == '10'){
						$xml->labs->segunda->lab10->prof1 = $horario->prof;
						$xml->labs->segunda->lab10->mat1 = $horario->mat;
					}
				}
				if ($horario->horario_inicial == 2040) {
					if($horario->lab == '1'){
						$xml->labs->segunda->lab1->prof2 = $horario->prof;
						$xml->labs->segunda->lab1->mat2 = $horario->mat;
					}
					
					if($horario->lab == '2'){
						$xml->labs->segunda->lab2->prof2 = $horario->prof;
						$xml->labs->segunda->lab2->mat2 = $horario->mat;
					}
					
					if($horario->lab == '3'){
						$xml->labs->segunda->lab3->prof2 = $horario->prof;
						$xml->labs->segunda->lab3->mat2 = $horario->mat;
					}
					
					if($horario->lab == '4'){
						$xml->labs->segunda->lab4->prof2 = $horario->prof;
						$xml->labs->segunda->lab4->mat2 = $horario->mat;
					}
					
					if($horario->lab == '5'){
						$xml->labs->segunda->lab5->prof2 = $horario->prof;
						$xml->labs->segunda->lab5->mat2 = $horario->mat;
					}
					
					if($horario->lab == '6'){
						$xml->labs->segunda->lab6a->prof2 = $horario->prof;
						$xml->labs->segunda->lab6a->mat2 = $horario->mat;
					}
					
					if($horario->lab == '11'){
						$xml->labs->segunda->lab6b->prof2 = $horario->prof;
						$xml->labs->segunda->lab6b->mat2 = $horario->mat;
					}
					
					if($horario->lab == '7'){
						$xml->labs->segunda->lab7->prof2 = $horario->prof;
						$xml->labs->segunda->lab7->mat2 = $horario->mat;
					}
					
					if($horario->lab == '8'){
						$xml->labs->segunda->lab8->prof2 = $horario->prof;
						$xml->labs->segunda->lab8->mat2 = $horario->mat;
					}
					
					if($horario->lab == '9'){
						$xml->labs->segunda->lab9->prof2 = $horario->prof;
						$xml->labs->segunda->lab9->mat2 = $horario->mat;
					}
					
					if($horario->lab == '10'){
						$xml->labs->segunda->lab10->prof2 = $horario->prof;
						$xml->labs->segunda->lab10->mat2 = $horario->mat;
					}
				}
				//GRAVA NO ARQUIVO laboratorios.XML
				file_put_contents('../gerenciamento/docbusca.xml', $xml->asXML());
			}
		}
	} else echo "nao existe";
?>