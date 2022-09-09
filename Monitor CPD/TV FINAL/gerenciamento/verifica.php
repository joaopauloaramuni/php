<!-- ESSA PAGINA VERIFICA O XML PARA SABER O VALOR DO FLAG, ONDE FLAG = 1(XML TEVE ALGUMA ALTERACAO),
FLAG = 0(XML AINDA NAO SOFREU ALTERACAO). CASO FLAG = 1, ELE ATUALIZA A PAGINA VIEW, PARA MANDAR
OS NOVOS VALORE DO XML -->

<html>
<head>
	<script>
		function atualizar(){
			window.parent.location.href = window.parent.location.href;
		}
	</script>
</head>
	<?php
	$xml = simplexml_load_file("../gerenciamento/laboratorios.xml");
	foreach($xml->labs->flag as $flag){
		
		//FLAG = 0 - SIGNIFICA QUE AINDA NAO HOUVE ALTERACOES NO XML
		if ($flag == 0){
			echo" <body>";
			echo" <META HTTP-EQUIV='Refresh' CONTENT='1; URL=verifica.php'>";
			
		}
		
		//FLAG = 1 - SIGNIFICA QUE HOUVE ALGUM TIPO DE ALTERACAO NO XML
		if ($flag == 1){
			echo" <META HTTP-EQUIV='Refresh' CONTENT='1; URL=verifica.php'>";
			
			echo"<body onLoad='atualizar()'>";
			
			if (file_exists('laboratorios.xml')) {
				$xml = simplexml_load_file('../gerenciamento/laboratorios.xml');
			} else {
				exit('Failed to open laboratorios.xml.');
			}

			//ALTERAR AS PROPIEDADES DO XML
			$xml->labs->flag = '0';

			//GRAVA NO ARQUIVO laboratorios.XML
			file_put_contents('../gerenciamento/laboratorios.xml', $xml->asXML());
			
			echo" <META HTTP-EQUIV='Refresh' CONTENT='1; URL=verifica.php'>";
		}
	};
	?>
</body>
</html>