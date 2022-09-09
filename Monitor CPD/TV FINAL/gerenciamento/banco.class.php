<?php

require_once 'horario.class.php';
require_once 'professor.class.php';
require_once 'materia.class.php';

class banco{
		
	/**
	 * Descrição: Conecta no Banco de Dados
	 * @param void
	 * @return array horario
	 * @throws Não Foi Possível Conectar ao Banco.
	 */
	public function conecta(){
		$con = @mysql_connect(":/Applications/MAMP/tmp/mysql/mysql.sock", "root", "root");
		//$con = @mysql_connect("localhost", "root", "NY9ccvAc5h3LtwUr");
		if($con){
			mysql_select_db("db_horario");
		} else {
			throw new Exception("Não Foi Possível Conectar ao Banco.");
		}
	}
	
	/**
	 * Descrição: Valida cadastro de horarios
	 * @param obj Horario
	 * @return void
	 * @throws Horário Ocupado!
	 */
	public function validacadastro(horario $horario){
		$sql = "select * from horario where (laboratorio = '$horario->lab' && horario_inicial = '$horario->horario_inicial' && diames = '$horario->diames' && diasemana = '$horario->diasemana') ";
		$rs=mysql_query($sql);
	
		//SE NÃO HOUVER NENHUM RETORNO, MANDA UM NEW EXCEPTION
		if (@mysql_num_rows($rs)){
			throw new Exception("Horário Ocupado!");
		}
	}
	
	/**
	 * Descrição: Valida cadastro de horarios
	 * @param obj Horario
	 * @return void
	 * @throws Horário Ocupado!
	 */
	public function cadastrarHorario(horario $horario){
		$query = "insert into horario
			(professor_idprofessor, materia_idmateria, laboratorio, horario_inicial, horario_final, diames, diasemana)
				values
			($horario->prof, $horario->mat, '$horario->lab', $horario->horario_inicial, $horario->horario_final, '$horario->diames', $horario->diasemana)";
		
		$result = mysql_query($query);
		
		//SE FOR FALSO, MANDA UM NEW EXCEPTION
		if(!$result){
			throw new Exception("Não Foi Possível Cadastrar o Horário!");
		}
	}
	
	/**
	 * Descrição: Busca Horario
	 * @param void
	 * @return array obj Horarios
	 * @throws Nenhum Horário Foi Encontrado!
	 */
	public function buscarHorario(){
		$query = "select * from horario";
		$result = mysql_query($query);
		
		//SE NÃO HOUVER NENHUM RETORNO, MANDA UM NEW EXCEPTION
		if(!@mysql_num_rows($result)){
			throw new Exception("Nenhum Horário Foi Encontrado!");
		}
		
		$horarios = "";
		$tup = mysql_fetch_assoc($result);
		while($tup){
			$tup = mysql_fetch_assoc($result);
			$professor = new professor($tup['professor_idprofessor'], "");
			try {
				$prof = $professor->buscarid();
			} catch (Exception $e){
				$prof = "";
			}
			
			$materia = new materia("", "");
			try {
				$mat = $materia->buscarId($tup['materia_idmateria']);
			} catch (Exception $e){
				$mat = "";
			}
			
			if($tup['laboratorio'] == 6){
				$laboratorio = "6A";
			} else if ($tup['laboratorio'] == 11){
					$laboratorio = "6B";
				} else $laboratorio = $tup['laboratorio'];
			
			$horainicial = $tup['horario_inicial'];
			$horafinal = $tup['horario_final'];
			
			if ($horainicial == "1800"){
				$horainicial = "1º Horário";
				$horafinal = "1º Horário";
			} else if($horainicial == '2040'){
				$horainicial = "2º Horário";
				$horafinal = "2º Horário";
			}
			
			$diasemana = $tup['diasemana'];
			if ($diasemana == 2) $diasemana = "Segunda-Feira";
			else if ($diasemana == 3) $diasemana = "Terca-Feira";
			else if ($diasemana == 4) $diasemana = "Quarta-Feira";
			else if ($diasemana == 5) $diasemana = "Quinta-Feira";
			else if ($diasemana == 6) $diasemana = "Sexta-Feira";
			else if ($diasemana == 0) $diasemana = "-";
			
			if($tup['diames'] == 0) $diames = "-"; else $diames = $tup['diames'];
			
			$horarios[]= new horario($tup['idhorario'], $prof->prof, $mat->mat, $laboratorio, $horainicial, "", $diames, $diasemana);
		}
		
		return $horarios;
	}
	
	/**
	 * Descrição: Deletar Horario
	 * @param idhorario
	 * @return void
	 * @throws Não Foi Possível Excluir a Materia!
	 */
	public function deletarHorario($idhorario){
		$query = "delete from horario where idhorario = $idhorario";
		$result = mysql_query($query);
		
		if(!$result){
			throw new Exception("Não Foi Possível Excluir a Materia!");
		}
	}
	
	/**
	 * Descrição: Edita Horarios
	 * @param obj Horario
	 * @return void
	 * @throws Não Foi Possível Editar o Horário!
	 */
	public function editarHorario(horario $horario){
		$query = "update horario set
		professor_idprofessor = $horario->prof,
		materia_idmateria = $horario->mat,
		laboratorio = $horario->lab,
		horario_inicial = $horario->horario_inicial,
		horario_final = $horario->horario_final,
		diasemana = $horario->diasemana,
		diames = '$horario->diames'
		where idhorario = $horario->idhorario";
		$result = mysql_query($query);
		
		if(!$result){
			throw new Exception("Não Foi Possível Editar o Horário!");
		}
	}
	
	/**
	 * Descrição: Busca horario via ID
	 * @param id
	 * @return obj Horarios
	 * @throws Nenhum Horário Foi Cadastrado!
	 */
	public function buscarHorarioId($id){
		$query = "select * from horario where idhorario = $id";
		$result = mysql_query($query);
				
		if(!@mysql_num_rows($result)){
			throw new Exception("Nenhum Horário Foi Cadastrado!");
		}
		
		$horarios = "";
		
		$tup = mysql_fetch_assoc($result);
	
		$horarios = new horario($tup['idhorario'], $tup['professor_idprofessor'], $tup['materia_idmateria'], $tup['laboratorio'], $tup['horario_inicial'], $tup['horario_final'], $tup['diames'], $tup['diasemana']);
		
		return $horarios;
	}

	/**
	 * Descrição: Busca horarios pelo dia da semana
	 * @param dia da semana
	 * @return array obj Horario
	 * @throws Nenhum Horário Foi Encontrado!
	 */
	public function buscadoc($diasemana){
		$sql = "select * from horario where diasemana = '$diasemana'";
		$rs=mysql_query($sql);	
		
		//VERIFICA SE EXISTE ALUMA LINHA NO BANCO DE DADO, CASO NAO EXISTA, RETORNA A MENSAGEM
		if(!@mysql_num_rows($rs)){
			throw new Exception("Nenhum Horário Foi Encontrado!");
		}
					
		while($tup = mysql_fetch_assoc($rs)){
			$professor = new professor($tup['professor_idprofessor'], "");
			try {
				$prof = $professor->buscarid();
			} catch (Exception $e){
				$prof = new professor("", "");
			}
			
			$materia = new materia($tup['materia_idmateria'], "");
			try {
				$mat = $materia->buscarId();
			} catch (Exception $e){
				$mat = new materia("", "");
			}
			
			$horarios[] = new horario($tup['idhorario'], $prof->prof, $mat->mat, $tup['laboratorio'], $tup['horario_inicial'], $tup['horario_final'], $tup['diames'], $tup['diasemana']);
		}
		//retorna o array com os dados achado
		return $horarios;
	}
	
	
	/**
	 * Descrição: Busca os horarios via o mês
	 * @param void
	 * @return array obj horarios
	 * @throws Nenhum Horário Foi Encontrado!
	 */
	public function buscames(){
		$sql = "SELECT * FROM horario WHERE diasemana = 0 ORDER by diames";
		$rs=mysql_query($sql);	
		
		//VERIFICA SE EXISTE ALUMA LINHA NO BANCO DE DADO, CASO NAO EXISTA, RETORNA A MENSAGEM
		if(!@mysql_num_rows($rs)){
			throw new Exception("Nenhum Horário Foi Encontrado!");
		}
		
		while($tup = mysql_fetch_assoc($rs)){
			$professor = new professor($tup['professor_idprofessor'], "");
			try {
				$prof = $professor->buscarid();
			} catch (Exception $e){
				$prof = new professor("", "");
			}
			
			$materia = new materia($tup['materia_idmateria'], "");
			try {
				$mat = $materia->buscarId();
			} catch (Exception $e){
				$mat = new materia("", "");
			}
						
			$horarios[] = new horario($tup['idhorario'], $prof->prof, $mat->mat, $tup['laboratorio'], $tup['horario_inicial'], $tup['horario_final'], $tup['diames'], $tup['diasemana']);
			
		}
		
		//retorna o array com os dados achados
		return $horarios;
	}
		
	
	//-------------------------------------------FUNCOES PARA O PROFESSOR.CLASS.PHP
	
	/**
	 * Descrição: Cadastrar Professor
	 * @param obj Professor
	 * @return void
	 * @throws Não Foi Possível Cadastrar o Professor!
	 */
	public function cadastrarProfessor(professor $professor){
		$query = "insert into professor (nome) values ('$professor->prof')";
		$result = mysql_query($query);
		
		if(!$result){
			throw new Exception("Não Foi Possível Cadastrar o Professor!");
		}
	}
	
	
	/**
	 * Descrição: Buscar Professor
	 * @param void
	 * @return array obj professores
	 * @throws Nenhuma Professor Foi Cadastrado!
	 */
	public function buscarProfessor(){
		$sql = 'select * from professor order by nome';
		$rs=mysql_query($sql);
		
		//VERIFICA SE EXISTE ALUMA LINHA NO BANCO DE DADO, CASO NAO EXISTA, RETORNA A MENSAGEM
		if(!@mysql_num_rows($rs)){
			throw new Exception("Nenhuma Professor Foi Cadastrado!");
		}
		
		$professores = "";
		
			while($tup = mysql_fetch_assoc($rs)){
				$professores[] = new professor($tup['idprofessor'], $tup['nome']);
			}
		
		return $professores;
	}
	
	/**
	 * Descrição: Edita Professor
	 * @param obj Horario
	 * @return void
	 * @throws Horário Ocupado!
	 */
	public function editarProfessor(professor $professor){
		$query = "update professor set nome = '$professor->prof' where idprofessor = $professor->idprofessor";
		$result = mysql_query($query);
		
		if(!$result){
			throw new Exception("Não Foi Possível Editar o Professor!");
		}
	}
	
	/**
	 * Descrição: Deletar Professor
	 * @param idprofessor
	 * @return void
	 * @throws Não Foi Possível Excluir o Professor!
	 */
	public function deletarProfessor($idprofessor){
		$query = "delete from professor where idprofessor = $idprofessor";
		$result = mysql_query($query);
		
		if(!$result){
			throw new Exception("Não Foi Possível Excluir o Professor");
		}
	}
	
	/**
	 * Descrição: Buscar Professor via id
	 * @param id
	 * @return obj professor
	 * @throws Nenhum Professor Foi Encontrado!
	 */
	public function buscarProfessorId($id){
		$query = "select * from professor where idprofessor = $id";
		$result = mysql_query($query);
		
		
		if(!@mysql_num_rows($result)){
			throw new Exception("Nenhum Professor Foi Encontrado!");
		}
		
		$professores = "";
		
		$tup = mysql_fetch_assoc($result);
	
		$professores = new professor($tup['idprofessor'], $tup['nome']);

		return $professores;
	}
	
	
	//-------------------------------------------FUNCOES PARA MATERIA.CLASS
		
	/**
	 * Descrição: Cadastrar Materia
	 * @param obj Materia
	 * @return void
	 * @throws Não Foi Possível Cadastrar a Materia!
	 */
	public function cadastrarMateria(materia $materia){
		$query = "insert into materia (nome) values ('$materia->mat')";
		$result = mysql_query($query);
		
		if(!$result){
			throw new Exception("Não Foi Possível Cadastrar a Materia!");
		}
	}
	
	/**
	 * Descrição: Editar Materia
	 * @param obj Materia
	 * @return void
	 * @throws Não Foi Possível Editar a Materia
	 */
	public function editarMateria(materia $materia){
		$query = "UPDATE materia SET nome = '$materia->mat' WHERE idmateria = $materia->idmateria";
		$result = mysql_query($query);
		
		if(!$result){
			throw new Exception("Não Foi Possível Editar a Materia!");
		}
	}
	
	/**
	 * Descrição: Deleta a Materia do Banco de Dados
	 * @param idmateria
	 * @return void
	 * @throws Não Foi Possível Excluir a Materia!
	 */
	public function deletarMateria($idmateria){
		$query = "delete from materia where idmateria = $idmateria";
		$result = mysql_query($query);
		
		if(!$result){
			throw new Exception("Não Foi Possível Excluir a Materia!");
		}
	}	
	
	/**
	 * Descrição: Busca TODAS as Materias do Banco de Dados
	 * @param void
	 * @return array materia
	 * @throws Nenhuma Matéria Foi Cadastrada!
	 */
	public function buscarMateria(){
		$sql = 'select * from materia order by nome';
		$rs=mysql_query($sql);
		
		//VERIFICA SE EXISTE ALUMA LINHA NO BANCO DE DADO, CASO NAO EXISTA, RETORNA A MENSAGEM
		if(!@mysql_num_rows($rs)){
			throw new Exception("Nenhuma Matéria Foi Cadastrada!");
		}
		
		//inicializa a variavel como vazia
		$materias = "";
		
		while($tup = mysql_fetch_assoc($rs)){
			$materias[] = new materia($tup['idmateria'], $tup['nome']);
		}
		return $materias;
	}
	
	/**
	 * Descrição: Busca a materia pelo id
	 * @param id
	 * @return materia
	 * @throws Nenhuma Matéria Foi Encontrada!
	 */
	public function buscarMateriaId($id){
		$query = "select * from materia where idmateria = $id";
		$result = mysql_query($query);
				
		if(!@mysql_num_rows($result)){
			throw new Exception("Nenhuma Matéria Foi Encontrado!");
		}
		
		$materias = "";
		
		$tup = mysql_fetch_assoc($result);
	
		$materias = new materia($tup['idmateria'], $tup['nome']);
		
		return $materias;
		
		
	}
	
	/**
	 * Descrição: Busca do Banco de Dados os horarios de HOJE
	 * @param void
	 * @return array horario
	 */
	function buscahoje($turno){
		if ($turno == 1){
			$SQL = "
			SELECT h.idhorario, p.nome as professor, m.nome as materia, h.laboratorio as laboratorio, h.horario_inicial as horario
			FROM horario h 
			JOIN professor p ON(h.professor_idprofessor=p.idprofessor)
			JOIN materia m ON(h.materia_idmateria=m.idmateria)
			WHERE (h.diasemana = ".(date('w')+1).") AND (".date('Hi')." AND (h.horario_inicial = 740 OR h.horario_inicial = 940))
			ORDER BY h.laboratorio
			";
		} else {
			$SQL = "
			SELECT h.idhorario, p.nome as professor, m.nome as materia, h.laboratorio as laboratorio, h.horario_inicial as horario
			FROM horario h 
			JOIN professor p ON(h.professor_idprofessor=p.idprofessor)
			JOIN materia m ON(h.materia_idmateria=m.idmateria)
			WHERE (h.diasemana = ".(date('w')+1).") AND (".date('Hi')." AND (h.horario_inicial = 1800 OR h.horario_inicial = 2040))
			ORDER BY h.laboratorio
			";
		}
		
		$horario = "";
		$rs = mysql_query($SQL);
		
		//SE NÃO HOUVER NENHUM RETORNO, MANDA UM NEW EXCEPTION
		if(!$rs){
			throw new Exception("Nenhum Horário Foi Encontrado!");
		}
		
		//PREENCHE O ARRAY COM AS INFORMACOES RECUPERADAS DO BANCO DE DADOS NA POSICAO [$I][1] E [$I][2]
		while($tup=mysql_fetch_assoc($rs)){
			$horario[] = new horario($tup['idhorario'], $tup['professor'], $tup['materia'], $tup['laboratorio'], $tup['horario'], "", "", "");
		}
		return $horario;
	}
	
	/**
	 * Descrição: Busca do Banco de Dados os horarios de HOJE
	 * @param void
	 * @return array horario
	 */
	function buscaHojeIso($turno){
		if ($turno == 1){
			$SQL = "
			SELECT h.idhorario, p.nome as professor, m.nome as materia, h.laboratorio as laboratorio, h.horario_inicial as horario
			FROM horario h 
			JOIN professor p ON(h.professor_idprofessor=p.idprofessor)
			JOIN materia m ON(h.materia_idmateria=m.idmateria)
			WHERE (h.diames = '".date('Y-m-d')."') AND (h.horario_inicial = 720 OR h.horario_inicial = 1120))
			ORDER BY h.laboratorio
			";
		} else {
			$SQL = "
			SELECT h.idhorario, p.nome as professor, m.nome as materia, h.laboratorio as laboratorio, h.horario_inicial as horario
			FROM horario h 
			JOIN professor p ON(h.professor_idprofessor=p.idprofessor)
			JOIN materia m ON(h.materia_idmateria=m.idmateria)
			WHERE (h.diames = '".date('Y-m-d')."') AND (".date('Hi')." AND (h.horario_inicial = 1800 OR h.horario_inicial = 2040))
			ORDER BY h.laboratorio
			";
		}
		
		$rs = mysql_query($SQL);
		$horario = "";
		
		//SE NÃO HOUVER NENHUM RETORNO, MANDA UM NEW EXCEPTION
		if(!$rs){
			throw new Exception("Nenhum Horário Foi Encontrado!");
		}
		
		//PREENCHE O ARRAY COM AS INFORMACOES RECUPERADAS DO BANCO DE DADOS NA POSICAO [$I][1] E [$I][2]
		while($tup=mysql_fetch_assoc($rs)){
			$horario[] = new horario($tup['idhorario'], $tup['professor'], $tup['materia'], $tup['laboratorio'], $tup['horario'], "", "", "");
		}
		return $horario;
	}
	
	/**
	 * 
	 * Descrição: Busca do banco a partir do laboratorio e horario_inicial e diames e diasemana
	 * @param $horario
	 * @return $horario
	 */
	function labsatualiza($horario){
		$sql = "SELECT * FROM horario WHERE laboratorio = '$horario->lab' && horario_inicial = '$horario->horario_inicial' && diasemana = '$horario->diasemana' ";
		$rs=mysql_query($sql);
	
		//SE NÃO HOUVER NENHUM RETORNO, MANDA UM NEW EXCEPTION
		if (!@mysql_num_rows($rs)){
			throw new Exception("Não Dados no Banco!");
		}
		
		$prof = "";
		$mat = new materia("", "");
		
		//PREENCHE O ARRAY COM AS INFORMACOES RECUPERADAS DO BANCO DE DADOS NA POSICAO [$I][1] E [$I][2]
		while($tup=mysql_fetch_assoc($rs)){
			$professor = new professor($tup['professor_idprofessor'], "");
			try {
				$prof = $professor->buscarId();
			} catch (Exception $e){
				$prof = new professor("", "");
			}
						
			$materia = new materia($tup['materia_idmateria'], "");
			try {
				$mat = $materia->buscarId();
			} catch (Exception $e){
				$mat = new materia("", "");
			}
			print_r($horario);
			$horario = new horario($tup['idhorario'], $prof->prof, $mat->mat, $tup['laboratorio'], $tup['horario_inicial'], $tup['horario_final'], $tup['diames'], $tup['diasemana']);
		
		}
		
		//print_r($horario);
		
		return $horario;
	}
}
?>