<?php
	require_once(dirname(__FILE__)."/autoload.php");
	protegeArquivo(basename(__FILE__));

	class funcionario extends base{
		
		public function __construct($campos = array()) {
				parent::__construct();
				$this->tabela = "funcionario";
				if(sizeof($campos) <= 0):
					$this->campos_valores = array(
						"nome" => NULL,
						"rg" => NULL,
						"cpf" => NULL,
						"data_nasc" => NULL,
						"pai" => NULL,
						"mae" => NULL,
						"dependentes" => NULL,
						"cpf" => NULL,
						"num_carteira" => NULL,
						"pis" => NULL,
						"admissao" => NULL,
						"demissao" => NULL,
						"setor" => NULL,
						"salario" => NULL
					);
				else:
					$this->campos_valores = $campos;
				endif;
				$this->campopk = "id";
		}// contruct	 
		public function existeRegistro($campo=NULL, $valor=NULL){
			if($campo != NULL && $valor != NULL):
				is_numeric($valor) ? $valor = $valor : $valor = "'".$valor."'";
				$this->extras_select = "WHERE $campo=$valor";
				$this->selecionaTudo($this);
				if($this->linhasafetadas > 0):
					return TRUE;
				else:
					return FALSE;
				endif;
			else:
				//$this->trataerro(__FILE__, __FUNCTION__, 'faltam parâmetros para executar a função', TRUE);
			endif;
		}
	}
?>