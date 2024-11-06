//MUDA O FUNDO PARA VERDE QUANDO O LABORATORIO ESTIVER LIVRE
function mudafundo(i){
	document.getElementById(i).style.background ="url('../imagens/fundolivre.png')";
}

function limpar(id1, id2){
	document.getElementById(id1).style.display = "none";
	document.getElementById(id2).style.display = "block";
	document.getElementById(id1).style.visibility = "hidden";
	document.getElementById(id2).style.visibility = "visible";
}

function ocultadia(){
	if(document.getElementById('dia').value == 'Dia'){
		document.getElementById('dia').value='';
		document.getElementById('dia').style.color = 'black';
		document.getElementById('miSelect').disabled = 'true';
	}
}

function ocultames(){
	if(document.getElementById('mes').value == 'Mes'){
		document.getElementById('mes').value='';
		document.getElementById('mes').style.color = 'black';
		document.getElementById('miSelect').disabled = 'true';
	}
}

function ocultaano(){
	if(document.getElementById('ano').value == '2011'){
		document.getElementById('ano').value='';
		document.getElementById('ano').style.color = 'black';
		document.getElementById('miSelect').disabled = 'true';
	}
}

function escrevedia(){
	if(document.getElementById('dia').value.length == 0){
		document.getElementById('dia').value='Dia';
		document.getElementById('dia').style.color = 'gray';
	}
	
	if (document.getElementById('dia').value == 'Dia' && document.getElementById('mes').value == 'Mes' && document.getElementById('ano').value == '2011'){
		document.getElementById('miSelect').disabled = '';
	} else	document.getElementById('miSelect').disabled = 'true';
}

function escrevemes(){
	if(document.getElementById('mes').value.length == 0){
		document.getElementById('mes').value='Mes';
		document.getElementById('mes').style.color = 'gray';
	}
	
	if (document.getElementById('dia').value == 'Dia' && document.getElementById('mes').value == 'Mes' && document.getElementById('ano').value == '2011'){
		document.getElementById('miSelect').disabled = '';
	} else	document.getElementById('miSelect').disabled = 'true';
}

function escreveano(){
	if(document.getElementById('ano').value.length == 0){
		document.getElementById('ano').value='2011';
		document.getElementById('ano').style.color = 'gray';
	}
	
	if (document.getElementById('dia').value == 'Dia' && document.getElementById('mes').value == 'Mes' && document.getElementById('ano').value == '2011'){
		document.getElementById('miSelect').disabled = '';
	} else	document.getElementById('miSelect').disabled = 'true';
}

function escreveprof(){
	if(document.getElementById('prof').value.length == 0){
		document.getElementById('prof').value='Professor';
		document.getElementById('prof').style.color = 'gray';
	}
}

function ocultaprof(){
	if(document.getElementById('prof').value == 'Professor'){
		document.getElementById('prof').value='';
		document.getElementById('prof').style.color = 'black';
	}
}

function escrevemat(){
	if(document.getElementById('mat').value.length == 0){
		document.getElementById('mat').value='Matéria';
		document.getElementById('mat').style.color = 'gray';
	}
}

function ocultamat(){
	if(document.getElementById('mat').value == 'Matéria'){
		document.getElementById('mat').value='';
		document.getElementById('mat').style.color = 'black';
	}
}

/* DO BOTAO LIMPA DO CAD HORARIO, PARA PODER ARRUMAR O DIS, MES, ANO E DIA SEMANA */
function escrevetudo(){
	document.getElementById('dia').value='Dia';
	document.getElementById('dia').style.color = 'gray';
	document.getElementById('mes').value='Mes';
	document.getElementById('mes').style.color = 'gray';
	document.getElementById('ano').value='2011';
	document.getElementById('ano').style.color = 'gray';
	document.getElementById('miSelect').disabled = '';
}

function buscahorario(id){
	if (id == 1){
		location.href="hoje.php";
	} else location.href="docbusca.php?dia="+id;
}

function buscahorariomes(id){
	location.href="buscames.php?mes="+id;
}

//EFEITO DO MOUSE AO PASSAR POR CIMA
function mouseover(id1, id2, id3){
	document.getElementById(id1).className = 'tdbuscah';
	document.getElementById(id2).className = 'tdbuscah';
	document.getElementById(id3).className = 'tdlabh';
}

//EFEITO DO MOUSE SAIR
function mouseout(id1, id2, id3){
	document.getElementById(id1).className = 'tdbusca';
	document.getElementById(id2).className = 'tdbusca';
	document.getElementById(id3).className = 'tdlab';
}

//EFEITO DO MOUSE SAIR PARA OS LABORATORIOS LIVRES, POIS O BCGRD É DIFERENTE
function mouseoutlivre(id1, id2, id3){
	document.getElementById(id1).className = 'tdbuscah';
	document.getElementById(id2).className = 'tdbuscah';
	document.getElementById(id3).className = 'tdlab';
}
