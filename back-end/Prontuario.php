<?php 


class Prontuario extends Model{

	
	public function __construct(){
		parent::__construct("consultas");
	}

	public function bootstrap($id_prontuario, $data, $procedimento){
			$this->id_prontuario = $id_prontuario;
			$this->data_consulta = $data;
			$this->procedimento = implode(',', $procedimento);
	}

	public function cadastrarConsulta(){
			$result = $this->create();
			return $result;
	}

	public function listarProntuario($id){
		$id = filter_var($id, FILTER_SANITIZE_STRIPPED);
		self::$table = "consultas AS c JOIN pacientes AS p";
		return $this->select("c.id_prontuario = p.prontuario AND p.prontuario = :id", ":id={$id}", "c.data_consulta, c.procedimento, p.prontuario, p.nome, p.data_nascimento")->fetch(true);
		
	}

	//excluir todo o prontuario
	public function excluirProntuario($id){
		$id = filter_var($id, FILTER_SANITIZE_STRIPPED);
		$result = $this->delete("id_prontuario = :id", ":id={$id}");
		return $result;
	}


}