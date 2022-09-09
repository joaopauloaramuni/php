<?php

require_once 'banco.class.php';

class horario{

	//ATRIBUTOS DA CLASSE
	public $idhorario;
	public $prof;
	public $mat;
	public $lab;
	public $horario_inicial;
	public $horario_final;
	public $diames;
	public $diasemana;
	
	public function __construct($idhorario, $prof, $mat, $lab, $horario_inicial, $horario_final, $diames, $diasemana){
		$this->idhorario = $idhorario;
		$this->prof = $prof;
		$this->mat = $mat;
		$this->lab = $lab;
		$this->horario_inicial = $horario_inicial;
		$this->horario_final = $horario_final;
		$this->diames = $diames;
		$this->diasemana = $diasemana;	
	}
	
	public function cadastrar(){
		$banco = new banco();
		try{
			$banco->conecta();
			//$banco->validacadastro($this);
			$banco->cadastrarHorario($this);
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	
	public function buscar(){
		$banco = new banco("/Applications/MAMP/tmp/mysql/mysql.sock", "root", "root", "db_horario");
		try{
			$banco->conecta();
			$horarios = $banco->buscarHorario();
			return $horarios;
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	
	public function buscarId($id){
		$banco = new banco("/Applications/MAMP/tmp/mysql/mysql.sock", "root", "root", "db_horario");
		try{
			$banco->conecta();
			$horarios = $banco->buscarHorarioId($id);
			
			$this->idhorario = $horarios->idhorario;
			$this->prof = $horarios->prof;
			$this->mat = $horarios->mat;
			$this->lab = $horarios->lab;
			$this->horario_inicial = $horarios->horario_inicial;
			$this->horario_final = $horarios->horario_final;
			$this->diames = $horarios->diames;
			$this->diasemana = $horarios->diasemana;
			
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	
	public function deletar(){
		$banco = new banco("/Applications/MAMP/tmp/mysql/mysql.sock", "root", "root", "db_horario");
		try{
			$banco->conecta();
			$banco->deletarHorario($this->idhorario);
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	
	public function editar(){
		$banco = new banco("/Applications/MAMP/tmp/mysql/mysql.sock", "root", "root", "db_horario");
		try{
			$banco->conecta();
			$banco->editarHorario($this);
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	
	public function buscadoc($diasemana, $turno){
		$banco = new banco("/Applications/MAMP/tmp/mysql/mysql.sock", "root", "root", "db_horario");
		try{
			$banco->conecta();
			$horarios = $banco->buscadoc($diasemana);
			return $horarios;
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	public function buscames(){
		$banco = new banco("/Applications/MAMP/tmp/mysql/mysql.sock", "root", "root", "db_horario");
		try{
			$banco->conecta();
			$horarios = $banco->buscames();
			return $horarios;
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	
	public function buscahoje($turno){
		$banco = new banco("/Applications/MAMP/tmp/mysql/mysql.sock", "root", "root", "db_horario");
		try{
			$banco->conecta();
			$horarios = $banco->buscahoje($turno);
			return $horarios;
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	
	public function buscaHojeIso($turno){
		$banco = new banco("/Applications/MAMP/tmp/mysql/mysql.sock", "root", "root", "db_horario");
		try{
			$banco->conecta();
			$horarios = $banco->buscaHojeIso($turno);
			return $horarios;
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	
	/**
	 * Descrição: BUSCA INFORMAÇÃO DO BANCO A PARTIR DO LABORATORIO
	 * @param new horario
	 * @return horario horario
	 */
	public function labsatualiza(){
		$banco = new banco("/Applications/MAMP/tmp/mysql/mysql.sock", "root", "root", "db_horario");
		try{
			$banco->conecta();
			$horarios = $banco->labsatualiza($this);
			
			print_r($horarios);
			return $horarios;
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}
}

?>