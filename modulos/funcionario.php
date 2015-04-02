<?php
	require_once(dirname(dirname(__FILE__))."/funcoes.php");
	protegeArquivo(basename(__FILE__));
	loadJS('jquery_validate');
	loadJS('jquery_validate_msg_ptbr');
	
	switch ($tela): 
		case 'incluir':
			echo "<h2> Cadastro de Funcionários </h2>";
			if(isset($_POST['cadastrar'])):
				$func = new funcionario(array(
					'nome'=>$_POST['nome'],
					'rg' => str_replace('.', '', str_replace('-', '', $_POST['rg'])),
					'cpf' => str_replace('.', '', str_replace('-', '', $_POST['cpf'])),
					'data_nasc' => date("Y-m-d",$_POST['data_nasc']),
					'pai' => $_POST['nome_pai'],
					'mae' => $_POST['nome_mae'],
					'dependentes' => $_POST['dependentes'],
					'num_carteira' => $_POST['num_carteira'],
					'pis' => $_POST['pis'],
					'admissao' => date("Y-m-d",$_POST['admissao']),
					'demissao' => date("Y-m-d",$_POST['demissao']),
					'setor' => $_POST['setor'],
					'salario' => $_POST['salario']
					//str_replace('.', '', str_replace('-', '', $_POST['salario']))
				));
				if($func->existeRegistro('rg',$_POST['rg'])):
					printMSG(' Este RG já está cadastrado, cadastre outro!', 'erro') ;
					$duplicado = TRUE;
				endif;
				if($func->existeRegistro('cpf',$_POST['cpf'])):
					printMSG(' Este CPF já está cadastrado, cadastre outro!', 'erro') ;
					$duplicado = TRUE;
				endif;
				if($func->existeRegistro('num_carteira',$_POST['num_carteira'])):
					printMSG(' Este número da carteira de trabalho já está cadastrado, cadastre outro!', 'erro') ;
					$duplicado = TRUE;
				endif;
				if($func->existeRegistro('pis',$_POST['pis'])):
					printMSG(' Este número de P.I.S. já está cadastrado, cadastre outro!', 'erro') ;
					$duplicado = TRUE;
				endif;
				if($duplicado != TRUE):
					$func->inserir($func);
					if($func->linhasafetadas == 1):
						printMSG('Dados inceridos com sucesso! <a href="'.BASEURLFUNC.'?m=funcionario&t=listar"> Exibir Cadastro </a>') ;
						unset($_POST);
					endif;
				endif;				
			endif;
			include ('../Funcionarios/cadastrar.php');
		break;
		case 'listar':
			echo "<h2> Funcionários Cadastrados </h2>";
			loadCSS('data_tables', NULL, TRUE);
			loadJS('jquery_data_tables');
			include ('../Funcionarios/listar.php');
		break;
		case 'editar':
			echo '<h2> Edição de Funcionários </h2>';
			$sessao = new sessao();
			if(isAdmin() == TRUE || $sessao->getVar('iduser') == $_GET['id']):
				if(isset($_GET['id'])):
					//faz a edição do usuário
					$id = $_GET['id'];
					if(isset($_POST['editar'])):
						if(isAdmin() == TRUE):
							$func = new funcionario(array(
								'nome'=>$_POST['nome'],
								'rg' => str_replace('.', '', str_replace('-', '', $_POST['rg'])),
								'cpf' => str_replace('.', '', str_replace('-', '', $_POST['cpf'])),
								'data_nasc' => date("Y-m-d",strtotime(str_replace('/','-',$_POST['data_nasc']))),
								'pai' => $_POST['nome_pai'],
								'mae' => $_POST['nome_mae'],
								'dependentes' => $_POST['dependentes'],
								'num_carteira' => $_POST['num_carteira'],
								'pis' => $_POST['pis'],
								'admissao' => date("Y-m-d",strtotime(str_replace('/','-',$_POST['admissao']))),
								'demissao' => date("Y-m-d",strtotime(str_replace('/','-',$_POST['demissao']))),
								'setor' => $_POST['setor'],
								'salario' => $_POST['salario']
							));
						else:
							$func = new funcionario(array(
								'nome'=>$_POST['nome'],
								'rg' => str_replace('.', '', str_replace('-', '', $_POST['rg'])),
								'cpf' => str_replace('.', '', str_replace('-', '', $_POST['cpf'])),
								'data_nasc' => date("Y-m-d",strtotime(str_replace('/','-',$_POST['data_nasc']))),
								'pai' => $_POST['nome_pai'],
								'mae' => $_POST['nome_mae'],
								'dependentes' => $_POST['dependentes'],
								'num_carteira' => $_POST['num_carteira'],
								'pis' => $_POST['pis'],
								'admissao' => date("Y-m-d",strtotime(str_replace('/','-',$_POST['admissao']))),
								'demissao' => date("Y-m-d",strtotime(str_replace('/','-',$_POST['demissao']))),
								'setor' => $_POST['setor'],
								'salario' => $_POST['salario']
							));
						endif;
						$func->valorpk = $id;
						$func->extras_select = "WHERE id=$id";
						$func->selecionaTudo($func);
						$res = $func->retornaDados();
						if($res->rg != $_POST['rg']):
							if($func->existeRegistro('rg',$_POST['rg'])):
								printMSG(' Este RG já está cadastrado, cadastre outro!', 'erro') ;
								$duplicado = TRUE;
							endif;
						endif;
						if($res->cpf != $_POST['cpf']):
							if($func->existeRegistro('cpf',$_POST['cpf'])):
								printMSG(' Este CPF já está cadastrado, cadastre outro!', 'erro') ;
								$duplicado = TRUE;
							endif;
						endif;
						if($res->num_carteira != $_POST['num_carteira']):
							if($func->existeRegistro('num_carteira',$_POST['num_carteira'])):
								printMSG(' Este número da carteira de trabalho já está cadastrado, cadastre outro!', 'erro') ;
								$duplicado = TRUE;
							endif;
						endif;
						if($res->pis != $_POST['pis']):
							if($func->existeRegistro('pis',$_POST['pis'])):
								printMSG(' Este número de P.I.S. já está cadastrado, cadastre outro!', 'erro') ;
								$duplicado = TRUE;
							endif;
						endif;
						if($duplicado != TRUE):
							$func->atualizar($func);
							if($func->linhasafetadas == 1):
								printMSG('Dados alterados com sucesso! <a href="'.BASEURLFUNC.'?m=funcionario&t=listar"> Ver alteração </a>') ;
								unset($_POST);
							else:
								printMSG(' Nenhum dado foi alterado! <a href="'.BASEURLFUNC.'?m=funcionario&t=listar"> Ver usuários </a>', 'alerta') ;
							endif;
						endif;				
					endif;									
					$funcbd = new funcionario();
					$funcbd->extras_select = "WHERE id=$id";
					$funcbd->selecionaTudo($funcbd);
					$resbd = $funcbd->retornaDados();
				else:
					//avisa para seleciona user
					printMSG('Funcionário não definido, <a href="?m=funcionario&t=listar"> Escolha um funcionário para alterar!</a>','alerta');
				endif;
				include ('../Funcionarios/editar.php');
			else:
				printMSG('Você não tem permissão para acessar esta página! <a href="'.BASEURLFUNC.'?m=funcionario&t=listar"> Voltar </a>','erro');
			endif;
		break;
		case 'excluir':
			echo '<h2> Eclusão de usuários </h2>';
			$sessao = new sessao();
			if(isAdmin() == TRUE):
				if(isset($_GET['id'])):
					//faz a edição do usuário
					$id = $_GET['id'];
					if(isset($_POST['excluir'])):
						$func = new funcionario();
						$func->valorpk = $id;
						$func->extras_select = "WHERE id=$id";						
						$func->deletar($func);
						if($func->linhasafetadas == 1):
							printMSG('Dados excluídos com sucesso! <a href="'.BASEURLFUNC.'?m=funcionario&t=listar"> Ver alteração </a>') ;
							unset($_POST);
						else:
							printMSG(' Nenhum registro foi excluído! <a href="'.BASEURLFUNC.'?m=funcionario&t=listar"> Ver usuários </a>', 'alerta') ;
						endif;
								
					endif;				
					
					$funcbd = new funcionario();
					$funcbd->extras_select = "WHERE id=$id";
					$funcbd->selecionaTudo($funcbd);
					$resbd = $funcbd->retornaDados();
				else:
					//avisa para seleciona user
					printMSG('Funcionário não definido, <a href="?m=funcionario&t=listar"> Escolha um usuário para excluir!</a>','alerta');
				endif;
				include ('../Funcionarios/excluir.php');
			else:
				printMSG('Você não tem permissão para acessar esta página! <a href="'.BASEURLFUNC.'?m=funcionario&t=listar"> Voltar </a>','erro');
			endif;
		break;
		default:
			printMSG('A tela solicitada não existe!', 'alerta');
		break;
	endswitch;	
?>