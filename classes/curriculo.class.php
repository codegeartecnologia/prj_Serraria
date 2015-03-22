<?php
	require_once(dirname(__FILE__)."/autoload.php");
	protegeArquivo(basename(__FILE__));

	class curriculo extends base{
		
		public function __construct($campos = array()) {
				parent::__construct();
				$this->tabela = "curriculo";
				if(sizeof($campos) <= 0):
					$this->campos_valores = array(
						"nome" => NULL,
						"tamanho" => NULL,
						"destino" => NULL,
						"novo_nome" => NULL,
					);
				else:
					$this->campos_valores = $campos;
				endif;
				$this->campopk = "id";
		}// contruct	 
	}
?>