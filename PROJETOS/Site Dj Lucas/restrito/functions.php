<?php

function validaAcesso() {
	$valida = $_SESSION['valida'];
	if($valida == 10)
		return true;
	else
		return false;
}

?>