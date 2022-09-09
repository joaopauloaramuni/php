<?php
	include_once '../header.php';
?>

<div class="corpo">
    <span class="titPages">Contato</span>
	<form action="enviarcontato.php" method="post" class="form_contato">
		<div class="externo">
			<label for="nome" style="font: 12px Courie; color: #161616;">Nome :</label>
			<input onblur="voltaValue(this.id, 'Nome')" onfocus="limpaValue(this.id, 'Nome')" class="labelsContext" type="text" value="Nome" id="nome" style="margin-left: 30px;">
			<br>
			<div style="margin-top: 5px;">
			<label for="assunto" style="font: 12px Courie; color: #161616;">Assunto :</label>
			<input onblur="voltaValue(this.id, 'Assunto')" onfocus="limpaValue(this.id, 'Assunto')" class="labelsContext" type="text" value="Assunto" id="assunto" style="margin-left: 20px;">
			</div>
			<div style="margin-top: 5px;">
			<label for="email" style="font: 12px Courie; color: #161616;">Email :</label>
			<input onblur="voltaValue(this.id, 'Email')" onfocus="limpaValue(this.id, 'Email')" class="labelsContext" type="text" value="Email" id="email" style="margin-left: 30px;">
			</div>
			<div style="width: 78px; float: left; margin-top: 20px;">
				<label for="mensagem" style="font: 12px Courie; color: #161616;">Mensagem : </label>
			</div>
			<textarea rows="4" cols="35" id="mensagem" class="labelsContext" style="margin-left: 2px; margin-top: 5px;"></textarea>
			<br>
			<br>
			<div style="width: 90%; text-align: center;">
				<input type="submit" value="Enviar" class="buttons" style="width:90px" />
				<input type="reset" value="Limpar" class="buttons" style="width:90px" />
			</div>
		</div>
	</form>
</div>

<?php 
	include_once '../footer.php';
?>