// Pre Carregar Imagens
var url = "http://127.0.0.1/";
imagem1 = new Image();
imagem1.src = url+"img/yt0.png";
imagem2 = new Image();
imagem2.src = url+"img/yt1.png";
imagem3 = new Image();
imagem3.src = url+"img/tw0.png";
imagem4 = new Image();
imagem4.src = url+"img/tw1.png";
imagem5 = new Image();
imagem5.src = url+"img/fb0.png";
imagem6 = new Image();
imagem6.src = url+"img/fb1.png";
imagem7 = new Image();
imagem7.src = url+"img/ok0.png";
imagem8 = new Image();
imagem8.src = url+"img/ok1.png";
imagem9 = new Image();
imagem9.src = url+"img/lk0.png";
imagem10 = new Image();
imagem10.src = url+"img/lk1.png";
imagem11 = new Image();
imagem11.src = url+"img/bs1.png";
imagem12 = new Image();
imagem12.src = url+"img/bs0.png";
imagem13 = new Image();
imagem13.src = url+"img/banner.png";
imagem14 = new Image();
imagem14.src = url+"img/banner2.png";
imagem15 = new Image();
imagem15.src = url+"img/banner3.png";

// Funcao para onMouseOver
function mouse_dentro(flag) {
if (flag == 0)
document.img0.src = url+"img/lk1.png";
else if (flag == 1)
document.img1.src = url+"img/yt1.png";
else if(flag == 2)
document.img2.src = url+"img/tw1.png";
else if (flag == 3)
document.img3.src = url+"img/fb1.png";
else if (flag == 4)
document.img4.src = url+"img/ok1.png";
else if (flag == 5)
document.img5.src = url+"img/bs1.png";
}

// Funcao para onMouseOut
function mouse_fora(flag){
if (flag == 0)
document.img0.src = url+"img/lk0.png";
else if (flag == 1)
document.img1.src = url+"img/yt0.png";
else if (flag == 2)
document.img2.src = url+"img/tw0.png";
else if (flag == 3)
document.img3.src = url+"img/fb0.png";
else if (flag == 4)
document.img4.src = url+"img/ok0.png";
else if (flag == 5)
document.img5.src = url+"img/bs0.png";
}

//Funcao para Banner Automatico
function banner_change(flag){
	if (flag == 1){
	document.banner.src="img/banner.png";
	setTimeout("banner_change(2)", 3000);
	}
	else if (flag == 2){
	document.banner.src="img/banner2.png";
	setTimeout("banner_change(3)", 3000);
	}
	else if (flag == 3){
	document.banner.src="img/banner3.png";
	setTimeout("banner_change(1)", 3000);
	}
}

/**
 * Função que muda o nome da classe
 * @param id
 * @param nome
 */
function changeClassName(id, nome){
	document.getElementById(id).className = nome;
}


/**
 * Função que limpa o input quando o conteúdo do mesmo é igual ao da variável recebida
 * @param id
 * @param valor
 */
function limpaValue(id, valor){
	if(document.getElementById(id).value == valor) {
		document.getElementById(id).value = "";
		document.getElementById(id).style.color = "black";
	}
}

/**
 * Função que volta o texto do input
 * @param id
 * @param valor
 */
function voltaValue(id, valor){
	if(document.getElementById(id).value == "") {
		document.getElementById(id).value = valor;
		document.getElementById(id).style.color = "gray";
	}
}