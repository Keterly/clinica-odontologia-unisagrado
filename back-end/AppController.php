<?php
require 'Login.php';
require 'Model.php';
require 'Prontuario.php';
require 'Paciente.php';
require 'FichaPaciente.php';

	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if($acao == 'listar'){
	$paciente = new Paciente();
	$result = $paciente->listarPacientes();
}

if($acao == 'login'){
	$login = new Login();
	$login->login($_POST['email'], md5($_POST['password']));
}

if($acao == 'logout'){
	$login = new Login();
	$login->logout();
}

/* CORRIGIDO CADASTRO USER */
if($acao == 'cadastro-user'){
	$paciente = new Paciente();
	$p = $paciente->listarPaciente($_GET['prontuario']);
}

if($acao == 'ficha-user'){
	$paciente = new FichaPaciente();
	$prontuario = $_GET['prontuario'];

	$p = $paciente->listarFicha($prontuario);
	if($p == null){
		header('location: home.php');
	}

}

if($acao == 'prontuario'){
	$prontuario = new Prontuario();
	$id = $_GET['prontuario'];

	$result = $prontuario->listarProntuario($id);
	if($result == null){
		header('location: home.php');
	}
}

/* CORRIGIDO EXCLUIR */
if($acao == 'excluir'){
	session_start();

	$paciente = new Paciente();
	$prontuario = $_GET['prontuario'];
	$result = $paciente->excluirPaciente($prontuario);
	if($result){
		$_SESSION['msg-excluir'] = true;
		header('location: ../home.php');
	}
	else{
		$_SESSION['msg-excluir'] = false;
		header('location: ../atualizar-cadastro.php?prontuario='.$prontuario);
	}

}

if($acao == 'excluir-ficha'){
	session_start();

	$paciente = new FichaPaciente();
	$id = $_GET['id'];
	$result = $paciente->excluirFichaPaciente($id);
	if($result){
		$_SESSION['msg-excluir'] = true;
		header('location: ../home.php');
	}
	else{
		$_SESSION['msg-excluir'] = false;
		header('location: ../atualizar-ficha.php?id='.$id);
	}

}
if($acao == 'excluir-prontuario'){
	session_start();

	$paciente = new Prontuario();
	$id = $_GET['prontuario'];
	$result = $paciente->excluirProntuario($id);
	if($result){
		$_SESSION['msg-excluir'] = true;
		header('location: ../home.php');
	}
	else{
		$_SESSION['msg-excluir'] = false;
		header('location: ../prontuario.php?prontuario='.$id);
	}

}

if($acao == 'pesquisar'){
	$search = $_POST['paciente'];
	//filter_input(INPUT_POST,'paciente', FILTER_SANITIZE_STRIPPED);
	if(isset($_POST['paciente'])){
		$paciente = new Paciente();
		$result = $paciente->pesquisarPaciente($search);
	}
}

/* CORRIGIDO ATUALIZAR */
if($acao == 'atualizar'){
	session_start();

	$paciente = new Paciente();
	$paciente->bootstrap($_POST['name'],$_POST['data'], $_POST['sexo'], $_POST['cor'], $_POST['cpf'],$_POST['rg'],$_POST['peso'],$_POST['altura'],$_POST['escolaridade'],$_POST['profissao'],$_POST['naturalidade'],$_POST['estadoCivil'],$_POST['estado'],$_POST['nacionalidade'], $_POST['filiacaoPai'],$_POST['nacionalidadePai'],$_POST['filiacaoMae'], $_POST['nacionalidadeMae'], $_POST['telefone'],$_POST['celular'],$_POST['endereco'],$_POST['cep'],$_POST['bairro'],$_POST['cidade'],$_POST['complemento'], $_POST['data_cadastro']);

	 $prontuario = $_GET['prontuario'];
	 $result = $paciente->atualizarPaciente($prontuario);
	 if($result == true ){
	 	$_SESSION['msg-atualizar'] = true;	 
	 	header('location: ../atualizar-cadastro.php?prontuario='.$prontuario);
	 }
	 else{
	 	$_SESSION['msg-atualizar'] = false;
	 	header('location: ../atualizar-cadastro.php?prontuario='.$prontuario);
	 }


}


if($acao == 'atualizar-ficha'){
	session_start();

	$paciente = new FichaPaciente();

	$paciente->bootstrap($_POST['register'],$_POST['name'],$_POST['queixa'],$_POST['doenca-atual'],$_POST['hemorragia'],$_POST['alergia'],$_POST['reumatismo'],$_POST['disturbio'],$_POST['gastrite'],$_POST['diabetes'],$_POST['desmaio'],$_POST['tratamento_medico'],$_POST['tomando_medicamento'], $_POST['doente_5anos'],$_POST['habitos'],$_POST['ansiedade_depressao'],$_POST['tuberculose'],$_POST['sifilis'],$_POST['hepatite'],$_POST['sida_aids'],$_POST['sarampo'],$_POST['caxumba'],$_POST['varicela'],$_POST['outras'],$_POST['outras_text'],$_POST['fumante'],$_POST['fumante_freq'], $_POST['historia_gestacao'],$_POST['parto'],$_POST['problema_parto'],$_POST['amamentacao'],$_POST['idade_amamentacao'], $_POST['anestesia_local'],$_POST['doenca_grave'],$_POST['vacinada'],$_POST['dois_primeiros_anos'],$_POST['aprendizado'], $_POST['estado_animico'],$_POST['sono'],$_POST['conduta_psicomotora'],$_POST['alimentacao'],$_POST['sociabilidade'], $_POST['patologia_conduta'],$_POST['observacoes'],$_POST['labios'],$_POST['mucosa_jugal'],$_POST['lingua'], $_POST['soalho'],$_POST['palato_duro'],$_POST['garganta'],$_POST['palato_mole'],$_POST['mucosa_alveolar'], $_POST['gengivas'],$_POST['glandulas'],$_POST['linfonodos'],$_POST['atm'],$_POST['mastigadores'], $_POST['oclusao'],$_POST['alteracoes_encontradas'],$_POST['pressao_max'],$_POST['pressao_min'],$_POST['diagnostico_presuntivo'], $_POST['exames_complementares'],$_POST['diagnostico_definitivo'],$_POST['tratamento'], $_POST['plano_tratamento'], $_POST['urgencia'], $_POST['precisa_medicacao'], $_POST['medicacao_txt'], $_POST['data_ficha']);

	 $id = $_GET['id'];
	 $result = $paciente->atualizarFichaPaciente($id);
	$prontuario = $_POST['register'];

	 if($result == true ){
		 $_SESSION['msg-atualizar'] = true;	 
	 	header('location: ../atualizar-ficha.php?prontuario='.$prontuario);
	 }
	 else{
	 	$_SESSION['msg-atualizar'] = false;
	 	header('location: ../atualizar-ficha.php?prontuario='.$prontuario);
	 }


}
/* CORRIGIDO CADASTRAR */
if($acao == 'cadastrar'){
	session_start();

	$paciente = new Paciente();
	$paciente->bootstrap($_POST['name'],$_POST['data'], $_POST['sexo'], $_POST['cor'], $_POST['cpf'],$_POST['rg'],$_POST['peso'],$_POST['altura'],$_POST['escolaridade'],$_POST['profissao'],$_POST['naturalidade'],$_POST['estadoCivil'],$_POST['estado'],$_POST['nacionalidade'], $_POST['filiacaoPai'],$_POST['nacionalidadePai'],$_POST['filiacaoMae'], $_POST['nacionalidadeMae'], $_POST['telefone'],$_POST['celular'],$_POST['endereco'],$_POST['cep'],$_POST['bairro'],$_POST['cidade'],$_POST['complemento'], $_POST['data_cadastro']);

	$result = $paciente->cadastrarPaciente();
	if($result){
		$_SESSION['msg-cadastro'] = true;
		header('location: ../home.php');
	}
	else{
		$_SESSION['msg-cadastro'] = false;
		header('location: ../cadastro.php');
	}
}

if($acao == 'cadastrar-consulta'){
	session_start();

	$prontuario = new Prontuario();
	$prontuario->bootstrap($_POST['prontuario'],$_POST['data'],$_POST['procedimento']);

	$result = $prontuario->cadastrarConsulta();

	if($result){
		$_SESSION['msg-cadastro'] = true;
		header('location: ../home.php');
	}
	else{
		$_SESSION['msg-cadastro'] = false;
		header('location: ../consulta.php');
	}
}


if($acao == 'cadastrar-ficha'){
	session_start();

	$paciente = new FichaPaciente();

	$paciente->bootstrap($_POST['register'],$_POST['name'],$_POST['queixa'],$_POST['doenca-atual'],$_POST['hemorragia'],$_POST['alergia'],$_POST['reumatismo'],$_POST['disturbio'],$_POST['gastrite'],$_POST['diabetes'],$_POST['desmaio'],$_POST['tratamento_medico'],$_POST['tomando_medicamento'], $_POST['doente_5anos'],$_POST['habitos'],$_POST['ansiedade_depressao'],$_POST['tuberculose'],$_POST['sifilis'],$_POST['hepatite'],$_POST['sida_aids'],$_POST['sarampo'],$_POST['caxumba'],$_POST['varicela'],$_POST['outras'],$_POST['outras_text'],$_POST['fumante'],$_POST['fumante_freq'], $_POST['historia_gestacao'],$_POST['parto'],$_POST['problema_parto'],$_POST['amamentacao'],$_POST['idade_amamentacao'], $_POST['anestesia_local'],$_POST['doenca_grave'],$_POST['vacinada'],$_POST['dois_primeiros_anos'],$_POST['aprendizado'], $_POST['estado_animico'],$_POST['sono'],$_POST['conduta_psicomotora'],$_POST['alimentacao'],$_POST['sociabilidade'], $_POST['patologia_conduta'],$_POST['observacoes'],$_POST['labios'],$_POST['mucosa_jugal'],$_POST['lingua'], $_POST['soalho'],$_POST['palato_duro'],$_POST['garganta'],$_POST['palato_mole'],$_POST['mucosa_alveolar'], $_POST['gengivas'],$_POST['glandulas'],$_POST['linfonodos'],$_POST['atm'],$_POST['mastigadores'], $_POST['oclusao'],$_POST['alteracoes_encontradas'],$_POST['pressao_max'],$_POST['pressao_min'],$_POST['diagnostico_presuntivo'], $_POST['exames_complementares'],$_POST['diagnostico_definitivo'],$_POST['tratamento'], $_POST['plano_tratamento'], $_POST['urgencia'], $_POST['precisa_medicacao'], $_POST['medicacao_txt'], $_POST['data_ficha']);

	$result = $paciente->cadastrarFicha();

	if($result){
		$_SESSION['msg-cadastro'] = true;
		header('location: ../home.php');
	}
	else{
		$_SESSION['msg-cadastro'] = false;
		header('location: ../ficha.php');
	}

}


