<?php
	$titulo = "Login";
	include '../header.php';

?>
		<!-- CORPO DO SITE -->
		<div class="corpo">
			<span class="titPages">ADM</span>
			<!-- FIM MENU LATERAL -->
			<div style="padding-top: 10px;">
				<form action="login.php" method="post" style="color: white;" id="login_form">
					<div style="margin: 0px auto; width: 310px; text-align: center; margin-top: 50px;">
						<div style="border-left: 3px dotted #161616; border-right: 3px dotted #161616;">
							<?php if (isset($_GET['error'])) { ?>
								<div class="div_msg_erro" id='msgbox'>
									<?php echo $_GET['error']; ?>
								</div>
							<?php } ?>
							<div style="margin-left: 9px; padding: 20px; font: 12px Comic Sans MS; color: #161616;">
								Acesso Restrito
							</div>
							<div style="margin-top: 10px;">
								<label style="font: 12px Calibri; color: #161616;">Usuário: </label>
								<input id="usuariologin" type="text" value="Usuário" name="usuariologin" tabindex="1"
										onblur="voltaValue(this.id, 'Usuário')" onfocus="limpaValue(this.id, 'Usuário')"
										class="login_caixas" />
							</div>
							<div style="margin-top: 10px;">
								<label style="margin-left: 9px; font: 12px Calibri; color: #161616;">Senha: </label>
								<input id="passlogin" type="password" value="******" name="senhalogin" tabindex="2"
										onblur="voltaValue(this.id, '******')" onfocus="limpaValue(this.id, '******')"
										class="login_caixas" />
							</div>
							<div style="margin-right: 30px; text-align: right; font-size: 12px; margin-top: 8px; padding-bottom: 2px; color: #161616;">
								<a style="font: 12px Comic Sans MS; color: #161616" href="<?php echo BASE_URL ?>gerenciador/recupersenha.php">Esqueci a senha</a>
							</div>
							<br>
							<input class="buttons" style="width:90px;  border-radius: 7px; padding: 4px;" type="submit" value="Acessar" />
						</div>
					</div>
				</form>
			</div>
		</div>
<?php
	include '../footer.php';
	if(isset($_GET['msg']))
		echo "<script>alert('".$_GET['msg']."')</script>";
?>