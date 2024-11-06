// DISABILITA OS CAMPOS DIA, MES E ANO
function oculta(){
	var indice = formgeral.miSelect.selectedIndex;
	if (indice == 0){
		document.getElementById('dia').disabled = '';
		document.getElementById('mes').disabled = '';
		document.getElementById('ano').disabled = '';
	} else {
		document.getElementById('dia').disabled = 'true';
		document.getElementById('mes').disabled = 'true';
		document.getElementById('ano').disabled = 'true';
	}
}

/* No campo dia, quando tiver com 2 textos, ele dá o foco para o campo
 * mes e quando o mesmo tbm estiver com 2 textos, joga o foco para o ano,
 * e qnd o ano esta com 4 textos, joga o foca para o botão CADASTRA ou EDITAR*/
function EnterTab(id){
	
	//alert('teste ');
	if (formgeral.dia.value.length == 2 && id==1){
		formgeral.mes.value = '';
		formgeral.mes.style.color = 'black';
		formgeral.mes.focus();
	}
	
	if (formgeral.mes.value.length == 2 && id==2){
		formgeral.ano.value = '';
		formgeral.ano.style.color = 'black';
		formgeral.ano.focus();
	}
	
	if (formgeral.ano.value.length == 4 && id==3){
		formgeral.cadastrar.focus();
	}
}

//seleciona nos formularios os dados vindo do DB para poder ser editado
function edita(idprof, idmat, lab, turno, hi, dm, ds){

	if (hi == 740) document.getElementById('hora1').checked = true;
	else if (hi == 920) document.getElementById('hora2').checked = true;
	else if (hi == 1800) document.getElementById('hora3').checked = true;
	else if (hi == 2040) document.getElementById('hora4').checked = true;
	
	document.formgeral.professor.value = idprof, selected = true;
	document.formgeral.materia.value = idmat, selected = true;
	document.formgeral.laboratorio.value = lab, selected = true;
	document.formgeral.miSelect.value = ds, selected = true;
		
	document.getElementById('dia').disabled = true;
	document.getElementById('mes').disabled = true;
	document.getElementById('ano').disabled = true;
}

function lancadadosmes(idprof, idmat, lab, hi, dia, mes, ano){


	document.getElementById('dia').style.color = 'black';
	document.getElementById('mes').style.color = 'black';
	document.getElementById('ano').style.color = 'black';
	
	document.getElementById('dia').value = dia;
	document.getElementById('mes').value = mes;
	document.getElementById('ano').value = ano;
	document.formgeral.miSelect.disabled = true;
	document.formgeral.professor.value = idprof, selected = true;
	document.formgeral.materia.value = idmat, selected = true;
	document.formgeral.laboratorio.value = lab, selected = true;
	
	if (hi == 740) document.getElementById('hora1').checked = true;
	else if (hi == 920) document.getElementById('hora2').checked = true;
	else if (hi == 1800) document.getElementById('hora3').checked = true;
	else if (hi == 2040) document.getElementById('hora4').checked = true;
	
}

function sleep(milliseconds) {
	var start = new Date().getTime();
	for (var i = 0; i < 1e7; i++) {
		if ((new Date().getTime() - start) > milliseconds){
		break;
		}
	}
}

function UR_Start(){
	UR_Nu = new Date;
	compara = showFilled(UR_Nu.getHours())+""+showFilled(UR_Nu.getMinutes())+""+showFilled(UR_Nu.getSeconds());
	UR_Indhold = showFilled(UR_Nu.getHours()) + ":" + showFilled(UR_Nu.getMinutes()) + ":" + showFilled(UR_Nu.getSeconds());
	document.getElementById("ur").innerHTML = UR_Indhold;
	document.getElementById("ur").style.fontSize = "40px";
	document.getElementById("ur").style.marginLeft = "110px";
	document.getElementById("ur").style.marginTop = "30px";
	document.getElementById("ur").style.color = "#15425C";
	document.getElementById("ur").style.testAlign = "center";
	document.getElementById("ur").style.fontFamily = "Verdana, Arial, sans-serif";

	if (compara == 180000) location.href="../gerenciamento/atualiza.php";
	if (compara == 204000) location.href="../gerenciamento/atualiza.php";
	
	if(compara > 180000 && compara < 203959){
		document.getElementById("horario").innerHTML = "1º Horário";
		
	}else{
		if(compara > 204000 && compara < 223500){
			document.getElementById("horario").innerHTML = "2º Horário";
		}else{
				document.getElementById("horario").innerHTML = "&nbsp;";
			}
	}
	setTimeout("UR_Start()",1000);
}

function showFilled(Value){
	return (Value > 9) ? "" + Value : "0" + Value;
}

function selecionatudo(){
	var i;
	if (document.getElementById('box1').checked == true){
		for (i=30; i <= 50; i=i+2){
			document.getElementById(i).checked = true;
		}
	} else {
		for (i=30; i <= 50; i=i+2){
			document.getElementById(i).checked = false;
		}
		alert('teste');
	}

	if (document.getElementById('box2').checked == true){
		for (i=31; i <= 51; i=i+2){
			document.getElementById(i).checked = true;
		}
		alert('teste');
	} else {
		for (i=31; i <= 51; i=i+2){
			document.getElementById(i).checked = false;
		}
		alert('teste');
	}
}

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
		formgeral.miSelect.disabled = 'true';
	}
}

function ocultames(){
	if(document.getElementById('mes').value == 'Mes'){
		document.getElementById('mes').value='';
		document.getElementById('mes').style.color = 'black';
		formgeral.miSelect.disabled = 'true';
	}
}

function ocultaano(){
	if(document.getElementById('ano').value == '2011'){
		document.getElementById('ano').value='';
		document.getElementById('ano').style.color = 'black';
		formgeral.miSelect.disabled = 'true';
	}
}

function escrevedia(){
	if(document.getElementById('dia').value.length == 0){
		document.getElementById('dia').value='Dia';
		document.getElementById('dia').style.color = 'gray';
	}
	
	if (document.getElementById('dia').value == 'Dia' && document.getElementById('mes').value == 'Mes' && document.getElementById('ano').value == '2011'){
		formgeral.miSelect.disabled =  '';
	} else formgeral.miSelect.disabled = 'true';
}

function escrevemes(){
	if(document.getElementById('mes').value.length == 0){
		document.getElementById('mes').value='Mes';
		document.getElementById('mes').style.color = 'gray';
	}
	
	if (document.getElementById('dia').value == 'Dia' && document.getElementById('mes').value == 'Mes' && document.getElementById('ano').value == '2011'){
		formgeral.miSelect.disabled =  '';
	} else formgeral.miSelect.disabled = 'true';
}

function escreveano(){
	if(document.getElementById('ano').value.length == 0){
		document.getElementById('ano').value='2011';
		document.getElementById('ano').style.color = 'gray';
	}
	
	if (document.getElementById('dia').value == 'Dia' && document.getElementById('mes').value == 'Mes' && document.getElementById('ano').value == '2011'){
		formgeral.miSelect.disabled = '';
	} else formgeral.miSelect.disabled = 'true';
}

function escreveprof(){
	if(document.getElementById('prof').value.length == 0){
		document.getElementById('prof').value='Professor';
		document.getElementById('prof').style.color = 'gray';
	}
}

function escreveprofedita(prof){
	if(document.getElementById('prof').value.length == 0){
		document.getElementById('prof').value = prof;
		document.getElementById('prof').style.color = 'gray';
	}
}

function ocultaprof(){
	if(document.getElementById('prof').value == 'Professor'){
		document.getElementById('prof').value='';
		document.getElementById('prof').style.color = 'black';
	}
}

function ocultaprofedita(prof){
	if(document.getElementById('prof').value == prof){
		document.getElementById('prof').value = '';
		document.getElementById('prof').style.color = 'black';
	}
}

function escrevemat(){
	if(document.getElementById('mat').value.length == 0){
		document.getElementById('mat').value='Matéria';
		document.getElementById('mat').style.color = 'gray';
	}
}

function escrevematedita(mat){
	if(document.getElementById('mat').value.length == 0){
		document.getElementById('mat').value = mat;
		document.getElementById('mat').style.color = 'gray';
	}
}

function ocultamat(){
	if(document.getElementById('mat').value == 'Matéria'){
		document.getElementById('mat').value='';
		document.getElementById('mat').style.color = 'black';
	}
}

function ocultamatedita(mat){
	if(document.getElementById('mat').value == mat){
		document.getElementById('mat').value = '';
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

function buscahorario(id, turno){
	if (id == 1){
		location.href="hoje.php";
	} else{
		if (turno == 1 || turno == 2)location.href="docbusca.php?dia="+id+'&turno='+turno;
		else location.href="docbusca.php?dia="+id;
	}
}

function buscahorariomes(id, turno){
	location.href="buscames.php?mes="+id;
}

//EFEITO DO MOUSE AO PASSAR POR CIMA
function mouseover(id1, id2, id3){
	document.getElementById(id1).className = 'tdbuscah';
	document.getElementById(id2).className = 'tdbuscah';
	document.getElementById(id3).className = 'tdlabh';
}

//EFEITO DO MOUSE SAIR
function mouseout(id1, id2, id3, id){
	document.getElementById(id1).className = 'tdbusca';
	document.getElementById(id2).className = 'tdbusca';
	document.getElementById(id3).className = 'tdlab';
	livre(id, id1, id2);
}

//EFEITO DO MOUSE SAIR PARA LIVRE
function mouseoutlivre(id1, id2, id3, id){
	document.getElementById(id1).className = 'livre';
	document.getElementById(id2).className = 'livre';
	document.getElementById(id3).className = 'tdlab';
	livre(id, id1, id2);
}

function verificacheck(id){
	if(document.getElementById(id).checked == true){
		return true;
	} else return false;
}

//REDIRECIONA PARA EDITAR HORARIO SEMANA
function cliquebusca(id, dia, lab, hora, turno){

	if (dia == 1){
		location.href='hoje.php?dia='+dia+'&idhorario='+id+'&lab='+lab+'&hora='+hora;
	}
	if (dia == 7 && hora == 1800 && turno == 1){
		location.href='docbusca.php?dia='+dia+'&idhorario='+id+'&lab='+lab+'&hora=740&turno=1';
	} else if (dia == 7 && hora == 2040 && turno == 1){
			location.href='docbusca.php?dia='+dia+'&idhorario='+id+'&lab='+lab+'&hora=940&turno=1';
		}else if (dia == 7 && hora == 1800 && turno == 2){
				location.href='docbusca.php?dia='+dia+'&idhorario='+id+'&lab='+lab+'&hora=1800&turno=2';
			} else if (dia == 7 && hora == 2040 && turno == 2){
					location.href='docbusca.php?dia='+dia+'&idhorario='+id+'&lab='+lab+'&hora=2040&turno=2';
				} else if(dia != 1){
						location.href='docbusca.php?dia='+dia+'&idhorario='+id+'&lab='+lab+'&hora='+hora+'&turno='+turno;
					}
}

//REDIRECIONA PARA EDITAR HORARIO MES
function editames(id, dia){
	location.href='buscames.php?mes=' + dia + '&idhorario=' + id;
}

//CONFIRMACOES DE APAGAR
function confimadelprof(id, name){
	if (confirm('Deseja apagar o seguinte professor, ' + name + '?')){
		location.href='../gerenciamento/delprof.php?idprof='+id;
	}
}

//CONFIRMACOES DE APAGAR
function confimadelmat(id, name){
	if (confirm('Deseja apagar a seguinte materia, ' + name + '?')){
		location.href='../gerenciamento/delmateria.php?idmat='+id;
	}
}

//REMOVE O FUNDO PRETO TRANSPARENTE
function removefundo(dia, turno){
	if (dia == 1) location.href='hoje.php';
		else location.href='docbusca.php?dia='+dia+'&turno='+turno;	
}

//REMOVE O FUNDO PRETO TRANSPARENTE
function removefundomes(dia, turno){
	location.href='buscames.php?mes='+dia+'&turno='+turno;	
}

//CONFIRMACOES DE APAGAR
function confimadel(id, dia, turno){
	if (confirm('Deseja apagar?')){
		location.href='../gerenciamento/delhorario.php?idhorario='+id+'&dia='+dia+'&turno='+turno;
	}
}

//CONFIRMACOES DE APAGAR
function confimadelmes(id, dia){
	if (confirm('Deseja apagar?')){
		location.href='../gerenciamento/delhorario.php?idhorario='+id+'&dia='+dia;
	}
}

//REDIRECIONA PARA A PAGINA DE BUSCA A PARTIR DO ID RECEBIDO
function buscarprofmat(id){
	if (id == 8){
		location.href='buscaprof.php';
	} else {
		location.href='buscamat.php';
	}
}

//VERIFICA QUAIS LABORATÓRIOS ESTÃO SELECIONADOS NA PÁGINA HOJE.PHP PARA ATUALIZAR DO BANCO
function atualizalabs(id){
	var lab1 = 0, lab2 = 0, lab3 = 0, lab4 = 0, lab5 = 0, lab6 = 0, lab7 = 0, lab8 = 0, lab9 = 0, lab10 = 0, lab11 = 0;
	
	if (id == 1){
		if (document.getElementById('30').checked == true) lab1 = 1; else lab1 = 0;
		if (document.getElementById('32').checked == true) lab2 = 1; else lab2 = 0;
		if (document.getElementById('34').checked == true) lab3 = 1; else lab3 = 0;
		if (document.getElementById('36').checked == true) lab4 = 1; else lab4 = 0;
		if (document.getElementById('38').checked == true) lab5 = 1; else lab5 = 0;
		if (document.getElementById('40').checked == true) lab6 = 1; else lab6 = 0;
		if (document.getElementById('42').checked == true) lab11 = 1; else lab11 = 0;
		if (document.getElementById('44').checked == true) lab7 = 1; else lab7 = 0;
		if (document.getElementById('46').checked == true) lab8 = 1; else lab8 = 0;
		if (document.getElementById('48').checked == true) lab9 = 1; else lab9 = 0;
		if (document.getElementById('50').checked == true) lab10 = 1; else lab10 = 0;
	} else if (id == 2) {
		if (document.getElementById('31').checked == true) lab1 = 1; else lab1 = 0;
		if (document.getElementById('33').checked == true) lab2 = 1; else lab2 = 0;
		if (document.getElementById('35').checked == true) lab3 = 1; else lab3 = 0;
		if (document.getElementById('37').checked == true) lab4 = 1; else lab4 = 0;
		if (document.getElementById('39').checked == true) lab5 = 1; else lab5 = 0;
		if (document.getElementById('41').checked == true) lab6 = 1; else lab6 = 0;
		if (document.getElementById('43').checked == true) lab11 = 1; else lab11 = 0;
		if (document.getElementById('45').checked == true) lab7 = 1; else lab7 = 0;
		if (document.getElementById('47').checked == true) lab8 = 1; else lab8 = 0;
		if (document.getElementById('49').checked == true) lab9 = 1; else lab9 = 0;
		if (document.getElementById('51').checked == true) lab10 = 1; else lab10 = 0;
	}
	
	location.href='../gerenciamento/labsatualiza.php?lab1='+lab1+'&lab2='+lab2+'&lab3='+lab3+'&lab4='+lab4+'&lab5='+lab5+'&lab6='+lab6+'&lab7='+lab7+'&lab8='+lab8+'&lab9='+lab9+'&lab10='+lab10+'&lab11='+lab11+'&lab1b='+lab1+'&lab2b='+lab2+'&lab3b='+lab3+'&lab4b='+lab4+'&lab5b='+lab5+'&lab6b='+lab6+'&lab7b='+lab7+'&lab8b='+lab8+'&lab9b='+lab9+'&lab10b='+lab10+'&lab11b='+lab11+'';
}

//VERIFICA QUAIS LABORATÓRIOS ESTÃO SELECIONADOS NA PÁGINA HOJE.PHP PARA DEIXA-LOS LIVRES
function livrelabs(id){
	var lab1 = 0, lab2 = 0, lab3 = 0, lab4 = 0, lab5 = 0, lab6 = 0, lab7 = 0, lab8 = 0, lab9 = 0, lab10 = 0, lab11 = 0;
	
	if (id == 1){
		if (document.getElementById('30').checked == true) lab1 = 1; else lab1 = 0;
		if (document.getElementById('32').checked == true) lab2 = 1; else lab2 = 0;
		if (document.getElementById('34').checked == true) lab3 = 1; else lab3 = 0;
		if (document.getElementById('36').checked == true) lab4 = 1; else lab4 = 0;
		if (document.getElementById('38').checked == true) lab5 = 1; else lab5 = 0;
		if (document.getElementById('40').checked == true) lab6 = 1; else lab6 = 0;
		if (document.getElementById('42').checked == true) lab11 = 1; else lab11 = 0;
		if (document.getElementById('44').checked == true) lab7 = 1; else lab7 = 0;
		if (document.getElementById('46').checked == true) lab8 = 1; else lab8 = 0;
		if (document.getElementById('48').checked == true) lab9 = 1; else lab9 = 0;
		if (document.getElementById('50').checked == true) lab10 = 1; else lab10 = 0;
	} else if (id == 2) {
		if (document.getElementById('31').checked == true) lab1 = 1; else lab1b = 0;
		if (document.getElementById('33').checked == true) lab2 = 1; else lab2b = 0;
		if (document.getElementById('35').checked == true) lab3 = 1; else lab3b = 0;
		if (document.getElementById('37').checked == true) lab4 = 1; else lab4b = 0;
		if (document.getElementById('39').checked == true) lab5 = 1; else lab5b = 0;
		if (document.getElementById('41').checked == true) lab6 = 1; else lab6b = 0;
		if (document.getElementById('43').checked == true) lab11 = 1; else lab11b = 0;
		if (document.getElementById('45').checked == true) lab7 = 1; else lab7b = 0;
		if (document.getElementById('47').checked == true) lab8 = 1; else lab8b = 0;
		if (document.getElementById('49').checked == true) lab9 = 1; else lab9b = 0;
		if (document.getElementById('51').checked == true) lab10 = 1; else lab10b = 0;
	}
		
	location.href='../gerenciamento/labslivres.php?lab1='+lab1+'&lab2='+lab2+'&lab3='+lab3+'&lab4='+lab4+'&lab5='+lab5+'&lab6='+lab6+'&lab7='+lab7+'&lab8='+lab8+'&lab9='+lab9+'&lab10='+lab10+'&lab11='+lab11;
}

//VERIFICA QUAIS LABORATÓRIOS ESTÃO SELECIONADOS NA PÁGINA HOJE.PHP PARA DEIXA-LOS FECHADOS
function fechadolabs(id){
	var lab1 = 0, lab2 = 0, lab3 = 0, lab4 = 0, lab5 = 0, lab6 = 0, lab7 = 0, lab8 = 0, lab9 = 0, lab10 = 0, lab11 = 0;
	

	if (id == 1){
		if (document.getElementById('30').checked == true) lab1 = 2; else lab1 = 0;
		if (document.getElementById('32').checked == true) lab2 = 2; else lab2 = 0;
		if (document.getElementById('34').checked == true) lab3 = 2; else lab3 = 0;
		if (document.getElementById('36').checked == true) lab4 = 2; else lab4 = 0;
		if (document.getElementById('38').checked == true) lab5 = 2; else lab5 = 0;
		if (document.getElementById('40').checked == true) lab6 = 2; else lab6 = 0;
		if (document.getElementById('42').checked == true) lab11 = 2; else lab11 = 0;
		if (document.getElementById('44').checked == true) lab7 = 2; else lab7 = 0;
		if (document.getElementById('46').checked == true) lab8 = 2; else lab8 = 0;
		if (document.getElementById('48').checked == true) lab9 = 2; else lab9 = 0;
		if (document.getElementById('50').checked == true) lab10 = 2; else lab10 = 0;
	} else if (id == 2) {
		if (document.getElementById('31').checked == true) lab1 = 2; else lab1 = 0;
		if (document.getElementById('33').checked == true) lab2 = 2; else lab2 = 0;
		if (document.getElementById('35').checked == true) lab3 = 2; else lab3 = 0;
		if (document.getElementById('37').checked == true) lab4 = 2; else lab4 = 0;
		if (document.getElementById('39').checked == true) lab5 = 2; else lab5 = 0;
		if (document.getElementById('41').checked == true) lab6 = 2; else lab6 = 0;
		if (document.getElementById('43').checked == true) lab11 = 2; else lab11 = 0;
		if (document.getElementById('45').checked == true) lab7 = 2; else lab7 = 0;
		if (document.getElementById('47').checked == true) lab8 = 2; else lab8 = 0;
		if (document.getElementById('49').checked == true) lab9 = 2; else lab9 = 0;
		if (document.getElementById('51').checked == true) lab10 = 2; else lab10 = 0;
	}
		
	location.href='../gerenciamento/labslivres.php?lab1='+lab1+'&lab2='+lab2+'&lab3='+lab3+'&lab4='+lab4+'&lab5='+lab5+'&lab6='+lab6+'&lab7='+lab7+'&lab8='+lab8+'&lab9='+lab9+'&lab10='+lab10+'&lab11='+lab11;
}

function deixalivre(){
	document.formgeral.materia.value = 47, selected = true;
	document.getElementById('cadprof').value = 13, selected = true;
}

function deixafechado(){
	document.formgeral.materia.value = 53, selected = true;
	document.getElementById('cadprof').value = 13, selected = true;
}

//JOGA OS DADOS NO FORMULARIO APARTIR DO LOCAL QUE O USER CLICAR NA TABELA (FUNCIONA SOMENTE QUANDO O CAMPO ESTIVER LIVRE)
function jogadados(lab, hora, dia, turno, novo){
	if (hora == 1800 && turno == 1) document.getElementById('hora1').checked = true;
	if (hora == 2040 && turno == 1) document.getElementById('hora2').checked = true;
	if (hora == 1800 && turno == 2) document.getElementById('hora3').checked = true;
	if (hora == 2040 && turno == 2) document.getElementById('hora4').checked = true;
	if (novo == 0){
		formgeral.miSelect.value = dia;
		formgeral.laboratorio.value = lab;
		formgeral.dia.disabled = true; 
		formgeral.mes.disabled = true;
		formgeral.ano.disabled = true;
	}
}

function display (id){
	if (id == 1){
		
	} else {
		alert('teste');
		document.getElementById('displayfechado').style.display = none;
	}
}

function avanca(id){
	if (id == 1) {
		if (formgeral.professor.value != 0) formgeral.materia.focus(); else formgeral.professor.focus();
		if (formgeral.materia.value != 0) formgeral.laboratorio.focus();
		if (formgeral.laboratorio.value != 0) formgeral.hora.hora1.focus();
	} else {
		if (formgeral.professor.value != 0) formgeral.materia.focus(); else formgeral.professor.focus();
		if (formgeral.materia.value != 0) formgeral.laboratorio.focus();
	}
}














