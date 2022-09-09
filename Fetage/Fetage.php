<?php

class JoaoPauloController extends AppController{
	public $name = "JoaoPaulo";
	
	public $helpers = array('Html', 'Form', 'Javascript');
	public $users = null;
	
	public funtion index(){
		$this->set("teste", "teste de exibiчуo");
	}
}

?>