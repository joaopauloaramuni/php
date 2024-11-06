<?php

require_once 'banco.class.php';

class materia{

	//ATRIBUTOS DA CLASSE
	public $idmateria;
	public $mat;
	
	public function __construct($idmateria, $mat){
		$this->idmateria = $idmateria;
		$this->mat = $mat;
	}
	
	public function cadastrar(){
		$banco = new banco("localhost", "root", "123456", "db_horario");
		try{
			$banco->conecta();
			$banco->cadastrarMateria($this);
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	
	public function buscar(){
		$banco = new banco("localhost", "root", "123456", "db_horario");
		try{
			$banco->conecta();
			$materias = $banco->buscarMateria();
			return $materias;
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	
	public function buscarId(){
		$banco = new banco("localhost", "root", "123456", "db_horario");
		try{
			$banco->conecta();
			$materias = $banco->buscarmateriaId($this->idmateria);
			return $materias;
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
		
	}
	
	public function deletar(){
		$banco = new banco("localhost", "root", "123456", "db_horario");
		try{
			$banco->conecta();
			$banco->deletarMateria($this->idmateria);
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	
	public function editar(){
		$banco = new banco("localhost", "root", "123456", "db_horario");
		try{
			$banco->conecta();
			$banco->editarMateria($this);
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
}

?>