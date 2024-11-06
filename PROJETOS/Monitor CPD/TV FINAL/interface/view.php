<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<?php
header('Content-type: text/html; charset=UTF-8');
echo "
<html>
<head>
	<META HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=UTF-8'>
	<title>Carregando....</title>
	<link href='../gerenciamento/estilos.css' rel='stylesheet' type='text/css' />
	<script type='text/javascript' src='../gerenciamento/global.js'></script>
		
	<iframe class='frame' src='../gerenciamento/verifica.php' style='visibility:hidden'>
	</iframe>
	
	<iframe class='frame' src='../gerenciamento/controle.php' style='visibility:hidden'>
	</iframe>
	
</head>
<body onload='UR_Start();' class='bodyview'>

";
	//LÊ INFORMAÇÕES DO XML
	$xml = simplexml_load_file("../gerenciamento/laboratorios.xml");
	foreach($xml->labs as $labs){

	echo"	<div class='divlaboratorios'>
				<div class='divcabecalhoview'> 
					<a href='index.php'><div class='fumeclogo'></div></a>
					<div class='nomelab'>LABORAT&Oacute;RIOS</div>
					<div id='ur'></div>
					<div class='divhorario'>
						<div style='margin-left: 120px;' id='horario' ></div>
					</div>
					<div class='divtitulocpd'>CPD FACE-FUMEC</div>
				</div>	
				<div class='divlabs' id='fundo1'>
					<div align='center' class='numero'>I</div>
					<div class='professor' align='center'>".$labs->lab1->prof."</div>
					<div class='materia' align='center'>".$labs->lab1->mat."</div>
				</div>
				
				<div class='divlabs' id='fundo2'>
					<div align='center' class='numero'>II</div>
					<div class='professor' align='center'>".$labs->lab2->prof."</div>
					<div class='materia' align='center'>".$labs->lab2->mat."</div>
				</div>
				
				<div class='divlabs' id='fundo3'>
					<div align='center' class='numero'>III</div>
					<div class='professor' align='center'>".$labs->lab3->prof."</div>
					<div class='materia' align='center'>".$labs->lab3->mat."</div>
				</div>
				
				<div class='divlabs' id='fundo4'>
					<div align='center' class='numero'>IV</div>
					<div class='professor' align='center'>".$labs->lab4->prof."</div>
					<div class='materia' align='center'>".$labs->lab4->mat."</div>
				</div>
				
				<div class='divlabs' id='fundo5'>
					<div align='center' class='numero'>V</div>
					<div class='professor' align='center'>".$labs->lab5->prof."</div>
					<div class='materia' align='center'>".$labs->lab5->mat."</div>
				</div>
				<div class='divlab06'>
					<div class='divlab06a' id='fundo6a'>
						<div class='numero6' align='left'>VI</div><div class='letra' align='center'>A</div>
						<div class='professor6' align='right'>".$labs->lab6a->prof."</div>
					<div class='materia6' align='right'>".$labs->lab6a->mat."</div>
					</div>
					
					<div class='divlab06b' id='fundo6b'>
						<div class='numero6' align='left'>VI</div><div class='letra' align='center'>B</div>
						<div class='professor6' align='right'>".$labs->lab6b->prof."</div>
						<div class='materia6' align='right'>".$labs->lab6b->mat."</div>
					</div>
				</div>
				
				<div class='divlabs' id='fundo7'>
					<div align='center' class='numero'>VII</div>
					<div class='professor' align='center'>".$labs->lab7->prof."</div>
					<div class='materia' align='center'>".$labs->lab7->mat."</div>
				</div>
				
				<div class='divlabs' id='fundo8'>
					<div align='center' class='numero'>VIII</div>
					<div class='professor' align='center'>".$labs->lab8->prof."</div>
					<div class='materia' align='center'>".$labs->lab8->mat."</div>
				</div>
				
				<div class='divlabs' id='fundo9'>
					<div align='center' class='numero'>IX</div>
					<div class='professor' align='center'>".$labs->lab9->prof."</div>
					<div class='materia' align='center'>".$labs->lab9->mat."</div>
				</div>
				
				<div class='divlabs' id='fundo10'>
					<div align='center' class='numero'>X</div>
					<div class='professor' align='center'>".$labs->lab10->prof."</div>
					<div class='materia' align='center'>".$labs->lab10->mat."</div>
				</div>
			</div>";
	}
	
	

	if ($labs->lab1->mat == "LIVRE"){
	echo"
		<script>
			mudafundo('fundo1');
		</script>";
	}
	if ($labs->lab2->mat == "LIVRE"){
	echo"
		<script>
			mudafundo('fundo2');
		</script>";
	}
	if ($labs->lab3->mat == "LIVRE"){
	echo"
		<script>
			mudafundo('fundo3');
		</script>";
	}
	if ($labs->lab4->mat == "LIVRE"){
	echo"
		<script>
			mudafundo('fundo4');
		</script>";
	}
	if ($labs->lab5->mat == "LIVRE"){
	echo"
		<script>
			mudafundo('fundo5');
		</script>";
	}
	if ($labs->lab6a->mat == "LIVRE"){
	echo"
		<script>
			mudafundo('fundo6a');
		</script>";
	}
	if ($labs->lab6b->mat == "LIVRE"){
	echo"
		<script>
			mudafundo('fundo6b');
		</script>";
	}
	if ($labs->lab7->mat == "LIVRE"){
	echo"
		<script>
			mudafundo('fundo7');
		</script>";
	}
	if ($labs->lab8->mat == "LIVRE"){
	echo"
		<script>
			mudafundo('fundo8');
		</script>";
	}
	if ($labs->lab9->mat == "LIVRE"){
	echo"
		<script>
			mudafundo('fundo9');
		</script>";
	}
	if ($labs->lab10->mat == "LIVRE"){
	echo"
		<script>
			mudafundo('fundo10');
		</script>";
	}
	
	?>
</body>
</html>