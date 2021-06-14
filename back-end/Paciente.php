<?php


class Paciente extends Model{

	
	public function __construct(){
		parent::__construct("pacientes");
	}

	public function bootstrap($nome, $data_nascimento, $sexo, $cor, $cpf, $rg, $peso, $altura, $escolaridade, $profissao, $naturalidade, $estado_civil, $estado, $nacionalidade,  $filiacao_pai, $nacionalidade_pai, $filiacao_mae, $nacionalidade_mae, $telefone, $celular, $endereco, $cep, $bairro, $cidade, $complemento = NULL, $data_cadastro){
		$this->nome = $nome;
		$this->data_nascimento = $data_nascimento;
		$this->sexo = $sexo;
		$this->cor = $cor;
		$this->cpf = $cpf;
		$this->rg = $rg;
		$this->peso = $peso;
		$this->altura = $altura;
		$this->escolaridade = $escolaridade;
		$this->profissao = $profissao;
		$this->naturalidade = $naturalidade;
		$this->estado_civil = $estado_civil;
		$this->estado = $estado;
		$this->nacionalidade = $nacionalidade;
		$this->filiacao_pai = $filiacao_pai;
		$this->nacionalidade_pai = $nacionalidade_pai;
		$this->filiacao_mae = $filiacao_mae;
		$this->nacionalidade_mae = $nacionalidade_mae;
		$this->telefone = $telefone;
		$this->celular = $celular;
		$this->endereco = $endereco;
		$this->cep = $cep;
		$this->bairro = $bairro;
		$this->cidade = $cidade;
		$this->complemento = $complemento;
		$this->data_cadastro = $data_cadastro;
	}

	public function cadastrarPaciente(){
		$result = $this->create();
		return $result;
	}

	public function listarPacientes(){
		return $this->select(null, null, "prontuario, nome")->fetch(true);
	}

	public function listarPaciente($prontuario){
		$prontuario = filter_var($prontuario, FILTER_SANITIZE_STRIPPED);
		return $this->select("prontuario = :prontuario", "prontuario={$prontuario}", "*")->fetch();
	}
	public function pesquisarPaciente($nome){
		$nome = filter_var($nome, FILTER_SANITIZE_STRIPPED);
		return $this->select("nome LIKE :nome ", "nome=$nome%", "nome, prontuario")->fetch(true);
	}

	public function verificar($prontuario){
		$prontuario = filter_var($prontuario, FILTER_SANITIZE_STRIPPED);

		return $this->select("cpf = :r AND prontuario != :prontuario", "r={$this->cpf}&prontuario={$prontuario}")->fetch();
	}
	public function atualizarPaciente($prontuario){
		$prontuario = filter_var($prontuario, FILTER_SANITIZE_STRIPPED);
		return $this->update("prontuario = :prontuario", ":prontuario={$prontuario}");	
	}
	public function excluirPaciente($prontuario){
		$prontuario = filter_var($prontuario, FILTER_SANITIZE_STRIPPED);
		$result = $this->delete("prontuario = :prontuario", ":prontuario={$prontuario}");
		return $result;
	}
}