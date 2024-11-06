<?php

require_once 'banco.class.php';

class professor{

	//ATRIBUTOS DA CLASSE
	public $idprofessor;
	public $prof;
	
	public function __construct($idprofessor, $prof){
		$this->idprofessor = $idprofessor;
		$this->prof = $prof;
	}
	
	public function cadastrar(){
		$banco = new banco("localhost", "root", "123456", "db_horario");
		try{
			$banco->conecta();
			$banco->cadastrarProfessor($this);
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	
	public function buscar(){
		$banco = new banco("localhost", "root", "123456", "db_horario");
		try{
			$banco->conecta();
			$professores = $banco->buscarProfessor();
			return $professores;
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	
	public function buscarId(){
		$banco = new banco("localhost", "root", "123456", "db_horario");
		try{
			$banco->conecta();
			$professores = $banco->buscarProfessorId($this->idprofessor);
			return $professores;
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	
	public function deletar(){
		$banco = new banco("localhost", "root", "123456", "db_horario");
		try{
			$banco->conecta();
			$banco->deletarProfessor($this->idprofessor);
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	
	public function editar(){
		$banco = new banco("localhost", "root", "123456", "db_horario");
		try{
			$banco->conecta();
			$banco->editarProfessor($this);
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}

}

?>