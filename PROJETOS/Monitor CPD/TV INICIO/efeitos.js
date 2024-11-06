function changeColor(id){
	document.getElementById(id).style.backgroundColor = "#A7311A";
	document.getElementById(id).style.background = "-moz-linear-gradient(top, #A7311A, #999) repeat-X";
	if (document.getElementById(id + "area").value.length <= 11) {
		document.getElementById(id + "area").focus();
	}
}

function limpar(id){
		document.getElementById(id + "area").value = "";
		document.getElementById(id).style.backgroundColor = "#1b9a2a";
		document.getElementById(id).style.background = "-moz-linear-gradient(top, #1b9a2a, #999) repeat-X";
}

function verifica(valor, id){
	if(valor.length <= 11){
		document.getElementById(id).style.backgroundColor = "#A7311A";
		document.getElementById(id + "area").value = "PROF:\nDISC:";
	}
}

function preenche(valor, id){
	if(valor.length <= 11){
		document.getElementById(id).style.backgroundColor = "#A7311A";
		document.getElementById(id).style.background = "-moz-linear-gradient(top, #A7311A, #999) repeat-X";
		document.getElementById(id + "area").value = "PROF:\nDISC:";
	}
}

function retiraFoco(valor,id) {
	if(valor.length <= 11){
		document.getElementById(id + "area").value = "";
		document.getElementById(id).style.backgroundColor = "#1b9a2a";
		document.getElementById(id).style.background = "-moz-linear-gradient(top, #1b9a2a, #999) repeat-X";
	}
}

function iniciar(){	
	document.getElementById("objeto1area").value = "";
	document.getElementById("objeto2area").value = "";
	document.getElementById("objeto3area").value = "";
	document.getElementById("objeto4area").value = "";
	document.getElementById("objeto5area").value = "";
	document.getElementById("objeto6area").value = "";
	document.getElementById("objeto7area").value = "";
	document.getElementById("objeto8area").value = "";
	document.getElementById("objeto9area").value = "";
	document.getElementById("objeto10area").value = "";
}

function mouse(id, flag){
		if (flag == 1 && document.getElementById(id + "area").value.length == 0){
			document.getElementById(id).style.border = "4px #F0F0F0 solid";
			document.getElementById(id).style.fontSize = "100px";
		}else{
			document.getElementById(id).style.border = "4px #FFF solid";
			document.getElementById(id).style.fontSize = "90px";
		}

}
