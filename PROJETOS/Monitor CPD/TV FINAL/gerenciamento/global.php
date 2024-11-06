<?php
	class framework{

		function conecta(){
			if(!mysql_connect("localhost", "root", "NY9ccvAc5h3LtwUr")){
				echo"ERRO AO ACESSAR O BANCO DE DADOS";
			}else{
				mysql_select_db('db_horario');
			}
		}

		function busca(){
			$SQL = "
			SELECT p.nome as professor, m.nome as materia, h.laboratorio as laboratorio, h.horario_inicial as horario
			FROM horario h 
			JOIN professor p ON(h.professor_idprofessor=p.idprofessor)
			JOIN materia m ON(h.materia_idmateria=m.idmateria)
			WHERE (h.diasemana = ".(date('w')+1).") AND (".date('Hi')." BETWEEN h.horario_inicial AND h.horario_final)
			ORDER BY h.laboratorio
			";
			/*$SQL = "
				SELECT p.nome as professor, m.nome as materia, h.laboratorio as laboratorio, h.horario_inicial as horario
				from horário h
				JOIN professor p ON(h.professor_idprofessor=p.idprofessor)
				JOIN materia m ON(h.materia_idmateria=m.idmateria)
				WHERE ((h.diasemana = ".(date('w')+1)." OR h.diames = '".date('Y-m-d')."') AND (".date('Hi')." BETWEEN h.horario_inicial AND h.horario_final))
				and h.diasemana is not in(select ho.diames from horario ho where ho.diames = '".date('Y-m-d')."')
				
			";
			
			echo $SQL;*/
			return mysql_query($SQL);
		}
		
		function buscaiso(){
			$SQL = "
			SELECT p.nome as professor, m.nome as materia, h.laboratorio as laboratorio, h.horario_inicial as horario
			FROM horario h 
			JOIN professor p ON(h.professor_idprofessor=p.idprofessor)
			JOIN materia m ON(h.materia_idmateria=m.idmateria)
			WHERE (h.diames = '".date('Y-m-d')."') AND (".date('Hi')." BETWEEN h.horario_inicial AND h.horario_final)
			ORDER BY h.laboratorio
			";
			/*$SQL = "
				SELECT p.nome as professor, m.nome as materia, h.laboratorio as laboratorio, h.horario_inicial as horario
				from horário h
				JOIN professor p ON(h.professor_idprofessor=p.idprofessor)
				JOIN materia m ON(h.materia_idmateria=m.idmateria)
				WHERE ((h.diasemana = ".(date('w')+1)." OR h.diames = '".date('Y-m-d')."') AND (".date('Hi')." BETWEEN h.horario_inicial AND h.horario_final))
				and h.diasemana is not in(select ho.diames from horario ho where ho.diames = '".date('Y-m-d')."')
				
			";
			
			echo $SQL;*/
			return mysql_query($SQL);
		}
	}
?>