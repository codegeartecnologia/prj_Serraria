<?php
	require_once(dirname(dirname(__FILE__))."/funcoes.php");
	protegeArquivo(basename(__FILE__));
	loadJS('jquery_validate');
	loadJS('jquery_validate_msg_ptbr');
	
	switch ($tela): 
		case 'motorista_incluir':
			echo "<h2> Cadastro de Motorista </h2>";
			if(isset($_POST['cadastrar'])):
				$user = new usuario(array(
					'nome'=>$_POST['nome'],
					'rg'=>$_POST['rg'],
					'cpf'=>$_POST['cpf'],
					'idade'=>$_POST['idade'],
					'cnh'=>$_POST['cnh'],
				));
				if($user->existeRegistro('rg',$_POST['rg'])):
					printMSG(' Este RG já está cadastrado, cadastre outro!', 'erro') ;
					$duplicado = TRUE;
				endif;
				if($user->existeRegistro('cpf',$_POST['cpf'])):
					printMSG(' Este CPF já está cadastrado, cadastre outro!', 'erro') ;
					$duplicado = TRUE;
				endif;
				if($duplicado != TRUE):
					$user->inserir($user);
					if($user->linhasafetadas == 1):
						printMSG('Dados inceridos com sucesso! <a href="'.ADMURL.'?m=frete&t=listar"> Exibir Cadastro </a>') ;
						unset($_POST);
					endif;
				endif;				
			endif;
			include ('../Frete/cad_motorista.php');
		break;
		case 'caminhao_incluir':
			echo "<h2> Cadastro de Caminhões </h2>";
			if(isset($_POST['cadastrar'])):
				$user = new usuario(array(
					'placa'=>$_POST['placa'],
					'cor'=>$_POST['cor'],
					'chassi'=>$_POST['chassi'],
				));
				if($user->existeRegistro('chassi',$_POST['chassi'])):
					printMSG(' Este N° Chassi já está cadastrado, cadastre outro!', 'erro') ;
					$duplicado = TRUE;
				endif;
				if($user->existeRegistro('placa',$_POST['placa'])):
					printMSG(' Este Placa já está cadastrado, cadastre outro!', 'erro') ;
					$duplicado = TRUE;
				endif;
				if($duplicado != TRUE):
					$user->inserir($user);
					if($user->linhasafetadas == 1):
						printMSG('Dados inceridos com sucesso! <a href="'.ADMURL.'?m=frete&t=listar"> Exibir Cadastro </a>') ;
						unset($_POST);
					endif;
				endif;				
			endif;
			include ('../Frete/cad_caminhao.php');
		break;
		case 'listar':
			echo "<h2> Usuários Cadastrados </h2>";
			loadCSS('data_tables', NULL, TRUE);
			loadJS('jquery_data_tables');
			include ('../Usuario/listar.php');
		break;
		case 'editar':
			echo '<h2> Edição de usuários </h2>';
			$sessao = new sessao();
			if(isAdmin() == TRUE || $sessao->getVar('iduser') == $_GET['id']):
				if(isset($_GET['id'])):
					//faz a edição do usuário
					$id = $_GET['id'];
					if(isset($_POST['editar'])):
						if(isAdmin() == TRUE):
							$user = new usuario(array(
								'nome'=>$_POST['nome'],
								'email'=>$_POST['email'],
								'ativo'=>($_POST['ativo']=='on') ? 's' : 'n',
								'administrador'=>($_POST['adm']=='on') ? 's' : 'n',
							));
						else:
							$user = new usuario(array(
								'nome'=>$_POST['nome'],
								'email'=>$_POST['email'],
							));
						endif;
						$user->valorpk = $id;
						$user->extras_select = "WHERE id=$id";
						$user->selecionaTudo($user);
						$res = $user->retornaDados();
						if($res->email != $_POST['email']):
							if($user->existeRegistro('email',$_POST['email'])):
								printMSG(' Este email já está cadastrado, escolha outro endereço!', 'erro') ;
								$duplicado = TRUE;
							endif;
						endif;
						if($duplicado != TRUE):
							$user->atualizar($user);
							if($user->linhasafetadas == 1):
								printMSG('Dados alterados com sucesso! <a href="'.ADMURL.'?m=frete&t=listar"> Ver alteração </a>') ;
								unset($_POST);
							else:
								printMSG(' Nenhum dado foi alterado! <a href="'.ADMURL.'?m=frete&t=listar"> Ver usuários </a>', 'alerta') ;
							endif;
						endif;				
					endif;									
					$userbd = new usuario();
					$userbd->extras_select = "WHERE id=$id";
					$userbd->selecionaTudo($userbd);
					$resbd = $userbd->retornaDados();
				else:
					//avisa para seleciona user
					printMSG('Usuário não definido, <a href="?m=frete&t=listar"> Escolha um usuário para alterar!</a>','alerta');
				endif;
				include ('../Usuario/editar.php');
			else:
				printMSG('Você não tem permissão para acessar esta página! <a href="'.ADMURL.'?m=frete&t=listar"> Voltar </a>','erro');
			endif;
		break;
		case 'senha':
			echo '<h2> Alteração de senha </h2>';
			$sessao = new sessao();
			if(isAdmin() == TRUE || $sessao->getVar('iduser') == $_GET['id']):
				if(isset($_GET['id'])):
					//faz a edição do usuário
					$id = $_GET['id'];
					if(isset($_POST['mudasenha'])):
						$user = new usuario(array(
							'senha'=>codificaSenha($_POST['senha']),
						));
						$user->valorpk = $id;
						$user->atualizar($user);
						if($user->linhasafetadas == 1):
							printMSG('Senha alterada com sucesso! <a href="'.ADMURL.'?m=frete&t=listar"> Ver alteração </a>') ;
							unset($_POST);
						else:
							printMSG(' Nenhum dado foi alterado! <a href="'.ADMURL.'?m=frete&t=listar"> Ver usuários </a>', 'alerta') ;
						endif;									
					endif;									
					$userbd = new usuario();
					$userbd->extras_select = "WHERE id=$id";
					$userbd->selecionaTudo($userbd);
					$resbd = $userbd->retornaDados();
				else:
					//avisa para seleciona user
					printMSG('Usuário não definido, <a href="?m=frete&t=listar"> Escolha um usuário para alterar!</a>','alerta');
				endif;
				include ('../Usuario/mudarsenha.php');
			else:
				//Sem permissão para alterar
				printMSG('Você não tem permissão para acessar esta página! <a href="'.ADMURL.'?m=frete&t=listar"> Voltar </a>','erro');
			endif;
		break;
		case '':
		break;
		case 'excluir':
			echo '<h2> Eclusão de usuários </h2>';
			$sessao = new sessao();
			if(isAdmin() == TRUE):
				if(isset($_GET['id'])):
					//faz a edição do usuário
					$id = $_GET['id'];
					if(isset($_POST['excluir'])):
						$user = new usuario();
						$user->valorpk = $id;
						$user->extras_select = "WHERE id=$id";						
						$user->deletar($user);
						if($user->linhasafetadas == 1):
							printMSG('Dados excluídos com sucesso! <a href="'.ADMURL.'?m=frete&t=listar"> Ver alteração </a>') ;
							unset($_POST);
						else:
							printMSG(' Nenhum registro foi excluído! <a href="'.ADMURL.'?m=frete&t=listar"> Ver usuários </a>', 'alerta') ;
						endif;
								
					endif;				
					
					$userbd = new usuario();
					$userbd->extras_select = "WHERE id=$id";
					$userbd->selecionaTudo($userbd);
					$resbd = $userbd->retornaDados();
				else:
					//avisa para seleciona user
					printMSG('Usuário não definido, <a href="?m=frete&t=listar"> Escolha um usuário para excluir!</a>','alerta');
				endif;
				include ('../Usuario/excluir.php');
			else:
				printMSG('Você não tem permissão para acessar esta página! <a href="'.ADMURL.'?m=frete&t=listar"> Voltar </a>','erro');
			endif;
		break;
		default:
			printMSG('A tela solicitada não existe!', 'alerta');
		break;
	endswitch;	
?>