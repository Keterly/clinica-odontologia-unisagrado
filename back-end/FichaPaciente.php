<?php 


class FichaPaciente extends Model{

	
	public function __construct(){
		parent::__construct("fichas_pacientes");
	}

	public function bootstrap($id_prontuario, $nome, $queixa_principal, $historia_doenca, $hemorragia, $alergia, $reumatismo, $disturbio_cardio, $gastrite, $diabetes, $desmaio, $tratamento_medico, $medicamento, $doente_operado, $manias_vicios, $depressao_ansiedade, $tuberculose, $sifilis, $hepatite, $sida_aids, $sarampo, $caxumba, $varicela, $outros, $outros_txt = NULL, $fumante, $fumante_freq = null, $historia_gestacao, $parto, $problema_parto, $amamentacao, $idade_amamentacao, $anestesia, $doenca_grave, $crianca_vacinada, $dois_anos, $lar_escola, $estado_animico, $sono, $conduta_psico, $alimentacao, $sociabilidade, $patologia_conduta, $observacoes, $labios, $mucosa_jugal, $lingua, $soalho_boca, $palato_duro,$garganta,$palato_mole, $mucosa_alveolar, $gengivas, $glandulas, $linfonodos, $atm, $musculos, $oclusao, $alteracoes, $pressao_max, $pressao_min, $diagnostico_presuntivo, $exames, $diagnostico_definitivo, $tratamento, $plano_tratamento, $urgencia, $medicacao, $medicacao_txt = NULL, $data_ficha){
			$this->id_prontuario = $id_prontuario;
			$this->nome = $nome;
			$this->queixa_principal = $queixa_principal;
			$this->historia_doenca = $historia_doenca;
			$this->hemorragia = $hemorragia;
			$this->alergia = $alergia;
			$this->reumatismo = $reumatismo;
			$this->disturbio_cardio = $disturbio_cardio;
			$this->gastrite = $gastrite;
			$this->diabetes = $diabetes;
			$this->desmaio = $desmaio;
			$this->tratamento_medico = $tratamento_medico;
			$this->medicamento = $medicamento;
			$this->doente_operado = $doente_operado;
			$this->manias_vicios = $manias_vicios;
			$this->depressao_ansiedade = $depressao_ansiedade;
			$this->tuberculose = $tuberculose;
			$this->sifilis = $sifilis;
			$this->hepatite = $hepatite;
			$this->sida_aids = $sida_aids;
			$this->sarampo = $sarampo;
			$this->caxumba = $caxumba;
			$this->varicela = $varicela;
			$this->outros = $outros;
			$this->outros_txt = $outros_txt;
			$this->fumante = $fumante;
			$this->fumante_freq = $fumante_freq;
			$this->historia_gestacao = $historia_gestacao;
			$this->parto = $parto;
			$this->problema_parto = $problema_parto;
			$this->amamentacao = $amamentacao;
			$this->idade_amamentacao = $idade_amamentacao;
			$this->anestesia = $anestesia;
			$this->doenca_grave = $doenca_grave;
			$this->crianca_vacinada = $crianca_vacinada;
			$this->dois_anos = implode(',', $dois_anos);
			$this->lar_escola = $lar_escola;
			$this->estado_animico = implode(',', $estado_animico);
			$this->sono = implode(',',$sono);
			$this->conduta_psico = implode(',', $conduta_psico);
			$this->alimentacao = $alimentacao;
			$this->sociabilidade = $sociabilidade;		
			$this->patologia_conduta = implode(',', $patologia_conduta);
			$this->observacoes = $observacoes;			
			$this->labios = $labios;
			$this->mucosa_jugal = $mucosa_jugal;
			$this->lingua = $lingua;
			$this->soalho_boca = $soalho_boca;
			$this->palato_duro = $palato_duro;
			$this->garganta = $garganta;
			$this->palato_mole = $palato_mole;
			$this->mucosa_alveolar = $mucosa_alveolar;
			$this->gengivas = $gengivas;
			$this->glandulas = $glandulas;
			$this->linfonodos = $linfonodos;
			$this->atm = $atm;
			$this->musculos = $musculos;
			$this->oclusao = $oclusao;
			$this->alteracoes = $alteracoes;
			$this->pressao_max = $pressao_max;
			$this->pressao_min = $pressao_min;
			$this->diagnostico_presuntivo = $diagnostico_presuntivo;
			$this->exames = $exames;
			$this->diagnostico_definitivo = $diagnostico_definitivo;
			$this->tratamento = $tratamento;
			$this->plano_tratamento = $plano_tratamento;
			if($urgencia){
				$urgencia = 1;
			}
			else{
				$urgencia = 0;
			}
			$this->urgencia = $urgencia;
			$this->medicacao = $medicacao;
			$this->medicacao_txt = $medicacao_txt;
			$this->data_ficha = $data_ficha;
	}

	public function cadastrarFicha(){
			$result = $this->create();
			return $result;
		
	}

	public function listarFicha($prontuario){
		$prontuario = filter_var($prontuario, FILTER_SANITIZE_STRIPPED);
		return $this->select("id_prontuario = :prontuario", "prontuario={$prontuario}", "*")->fetch();
	}

	public function atualizarFichaPaciente($id){
		$id = filter_var($id, FILTER_SANITIZE_STRIPPED);	
		return $this->update("id_ficha = :id", ":id={$id}");	
	}
	public function excluirFichaPaciente($id){
		$id = filter_var($id, FILTER_SANITIZE_STRIPPED);
		$result = $this->delete("id_ficha = :id", ":id={$id}");
		return $result;
	}
}