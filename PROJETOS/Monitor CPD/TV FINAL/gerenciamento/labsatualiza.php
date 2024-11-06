<?php
include 'horario.class.php';

	$lab1 = $_GET['lab1'];
	$lab2 = $_GET['lab2'];
	$lab3 = $_GET['lab3'];
	$lab4 = $_GET['lab4'];
	$lab5 = $_GET['lab5'];
	$lab6 = $_GET['lab6'];
	$lab7 = $_GET['lab7'];
	$lab8 = $_GET['lab8'];
	$lab9 = $_GET['lab9'];
	$lab10 = $_GET['lab10'];
	$lab11 = $_GET['lab11'];

	echo"lab 1 - $lab1<br>";
	echo"lab 2 - $lab2<br>";
	echo"lab 3 - $lab3<br>";
	echo"lab 4 - $lab4<br>";
	echo"lab 5 - $lab5<br>";
	echo"lab 6 - $lab6<br>";
	echo"lab 7 - $lab7<br>";
	echo"lab 8 - $lab8<br>";
	echo"lab 9 - $lab9<br>";
	echo"lab 10 - $lab10<br>";
	echo"lab 11 - $lab11<br>";
	
	//LER ARQUIVO XML PARA COMPARAR A VARIAVEL CONTROLE
	$xml = simplexml_load_file("../gerenciamento/laboratorios.xml");
	foreach($xml->labs->controle as $controle){
		if(file_exists('laboratorios.xml')){
			
			$xml = simplexml_load_file('../gerenciamento/laboratorios.xml');
			
			$diames = date('Y-m-d');
			$diasemana = (date('w')+1);
						
			if ($lab1 == 1){
				try {
					$horarios = new horario("", "", "", '1', "1800", "", $diames, $diasemana);
					$horario = $horarios->labsatualiza();
					$xml->labs->lab1->prof = $horario->prof;
					$xml->labs->lab1->mat = $horario->mat;
					print_r($horario);
				} catch (Exception $e) {
					echo "falha";
				}
			} else if ($lab1 == 0){
				$xml->labs->lab1->prof = "&nbsp;";
				$xml->labs->lab1->mat = "FECHADO";
			}
			
			if ($lab2 == 1){
				try {
					$horario = new horario("", "", "", '2', "1800", "", $diames, $diasemana);
					$horario = $horario->labsatualiza();
				} catch (Exception $e) {
				}
				$xml->labs->lab2->prof = $horario->prof;
				$xml->labs->lab2->mat = $horario->mat;
			} else if ($lab2 == 0){
				$xml->labs->lab2->prof = "&nbsp;";
				$xml->labs->lab2->mat = "FECHADO";
			}
			
			if ($lab3 == 1){
				try {
					$horario = new horario("", "", "", '3', "1800", "", $diames, $diasemana);
					$horario = $horario->labsatualiza();
				} catch (Exception $e) {
				}
					print_r($horario);
				$xml->labs->lab3->prof = $horario->prof;
				$xml->labs->lab3->mat = $horario->mat;
			} else if ($lab3 == 0){
				$xml->labs->lab3->prof = "&nbsp;";
				$xml->labs->lab3->mat = "FECHADO";
			}
			
			if ($lab4 == 1){
				try {
					$horario = new horario("", "", "", '4', "1800", "", $diames, $diasemana);
					$horario = $horario->labsatualiza();
				} catch (Exception $e) {
				}
				$xml->labs->lab4->prof = $horario->prof;
				$xml->labs->lab4->mat = $horario->mat;
			} else if ($lab3 == 0){
				$xml->labs->lab4->prof = "&nbsp;";
				$xml->labs->lab4->mat = "FECHADO";
			}
			
			if ($lab5 == 1){
				try {
					$horario = new horario("", "", "", '5', "1800", "", $diames, $diasemana);
					$horario = $horario->labsatualiza();
				} catch (Exception $e) {
				}
				$xml->labs->lab5->prof = $horario->prof;
				$xml->labs->lab5->mat = $horario->mat;
			} else if ($lab3 == 0){
				$xml->labs->lab5->prof = "&nbsp;";
				$xml->labs->lab5->mat = "FECHADO";
			}
			
			if ($lab11 == 1){
				try {
					$horario = new horario("", "", "", '11', "1800", "", $diames, $diasemana);
					$horario = $horario->labsatualiza();
				} catch (Exception $e) {
				}
				$xml->labs->lab6b->prof = $horario->prof;
				$xml->labs->lab6b->mat = $horario->mat;
			} else if ($lab3 == 0){
				$xml->labs->lab6b->prof = "&nbsp;";
				$xml->labs->lab6b->mat = "FECHADO";
			}
			
			if ($lab6 == 1){
				try {
					$horario = new horario("", "", "", '6', "1800", "", $diames, $diasemana);
					$horario = $horario->labsatualiza();
				} catch (Exception $e) {
				}
				$xml->labs->lab6a->prof = $horario->prof;
				$xml->labs->lab6a->mat = $horario->mat;
			} else if ($lab3 == 0){
				$xml->labs->lab6a->prof = "&nbsp;";
				$xml->labs->lab6a->mat = "FECHADO";
			}
			
			if ($lab7 == 1){
				try {
					$horario = new horario("", "", "", '7', "1800", "", $diames, $diasemana);
					$horario = $horario->labsatualiza();
				} catch (Exception $e) {
				}
				$xml->labs->lab7->prof = $horario->prof;
				$xml->labs->lab7->mat = $horario->mat;
			} else if ($lab3 == 0){
				$xml->labs->lab7->prof = "&nbsp;";
				$xml->labs->lab7->mat = "FECHADO";
			}

			if ($lab8 == 1){
				try {
					$horario = new horario("", "", "", '8', "1800", "", $diames, $diasemana);
					$horario = $horario->labsatualiza();
				} catch (Exception $e) {
				}
				$xml->labs->lab8->prof = $horario->prof;
				$xml->labs->lab8->mat = $horario->mat;
			} else if ($lab3 == 0){
				$xml->labs->lab8->prof = "&nbsp;";
				$xml->labs->lab8->mat = "FECHADO";
			}
			
			if ($lab9 == 1){
				try {
					$horario = new horario("", "", "", '9', "1800", "", $diames, $diasemana);
					$horario = $horario->labsatualiza();
				} catch (Exception $e) {
				}
				$xml->labs->lab9->prof = $horario->prof;
				$xml->labs->lab9->mat = $horario->mat;
			} else if ($lab3 == 0){
				$xml->labs->lab9->prof = "&nbsp;";
				$xml->labs->lab9->mat = "FECHADO";
			}
			
			if ($lab10 == 1){
				try {
					$horario = new horario("", "", "", '10', "1800", "", $diames, $diasemana);
					$horario = $horario->labsatualiza();
				} catch (Exception $e) {
				}
				$xml->labs->lab10->prof = $horario->prof;
				$xml->labs->lab10->mat = $horario->mat;
			} else if ($lab3 == 0){
				$xml->labs->lab10->prof = "&nbsp;";
				$xml->labs->lab10->mat = "FECHADO";
			}
			echo"<br>";
			//print_r($horario);
			
			$xml->labs->flag = '1'; //ALTERA O CONTROLE PARA 1 CASO O BANCO DE DADOS FOI ALTERADO
			
			//GRAVA NO ARQUIVO laboratorios.XML
			file_put_contents('../gerenciamento/laboratorios.xml', $xml->asXML());
		}
		//header("location:../interface/hoje.php");
	}
	
?>