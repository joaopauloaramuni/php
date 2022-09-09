<?php
	if(file_exists('laboratorios.xml')){
		$xml = simplexml_load_file('../gerenciamento/laboratorios.xml');
	
		//ALTERAR AS PROPIEDADES DO XML
		$xml->labs->controle = '1'; //ALTERA O CONTROLE PARA 1 CASO O BANCO DE DADOS FOI ALTERADO
		
		//GRAVA NO ARQUIVO laboratorios.XML
		file_put_contents('../gerenciamento/laboratorios.xml', $xml->asXML());		
	}
?>