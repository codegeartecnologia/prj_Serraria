<?php
	require_once("../funcoes.php");
	verificaLogin();	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<?php loadCSS('reset'); loadCSS('style'); loadJS('jquery'); loadJS('geral'); loadJS('jquery_mask');?>

		<title> Dependentes</title>
		<meta name="description" content="" />
		<meta name="author" content="Djalma" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
	</head>

	<body>
			<div id="content">
				<div>
					<form id="formcad" method="post" action="">
						<fieldset> Informe os dados do dependentes para cadastro
							<ul>
								<li> 
									<label for="nome"> Nome: </label>
									<input type="text" size="40" name="nome" autofocus="autofocus" value="<?php echo $_POST['nome'] ?>" /> 
								</li>
								<li> 
									<label for="rg"> RG: </label>
									<input type="text" size="10" id="rg" name="rd" value="<?php echo $_POST['rg'] ?>" /> 
								</li>
								<li> 
									<label for="cpf"> CPF: </label>
									<input type="text" size="10" id="cpf" name="cpf" value="<?php echo $_POST['cpf'] ?>" /> 
								</li>
								<li> 
									<label for="data_nasc"> Nascimeto: </label>
									<input type="text" size="8" id="data_nasc" name="data_nasc" value="<?php echo $_POST['data_nasc'] ?>" /> 
								</li>
								<li class="center">
									<input type="submit" name="cadastrar" value="Salvar Dados" /> 
								</li>
							</ul>
						</fieldset>
					</form> <!-- formcad -->
				</div>	<!-- div formcad -->
			</div> <!-- div content -->
	</body>
</html>

<?php
	if(isset($_POST['cadastrar'])):
		$user = new dependente(array(
			'nome'=>$_POST['nome'],
			"rg" => $_POST['rg'],
			"cpf" => $_POST['cpf'],
			"data_nasc" => $_POST['data_nasc'],
		));
		if($user->existeRegistro('rg',$_POST['rg'])):
			printMSG(' Este RG já está cadastrado, cadastre outro!', 'erro') ;
			$duplicado = TRUE;
		endif;
		if($user->existeRegistro('cpf',$_POST['cpf'])):
			printMSG(' Este CPF já está cadastrado, cadastre outro!', 'erro') ;
			$duplicado = TRUE;
		endif;
		if($user->existeRegistro('num_carteira',$_POST['num_carteira'])):
			printMSG(' Este número da carteira de trabalho já está cadastrado, cadastre outro!', 'erro') ;
			$duplicado = TRUE;
		endif;
		if($user->existeRegistro('pis',$_POST['pis'])):
			printMSG(' Este número de P.I.S. já está cadastrado, cadastre outro!', 'erro') ;
			$duplicado = TRUE;
		endif;
		if($duplicado != TRUE):
			$user->inserir($user);
			if($user->linhasafetadas == 1):
				printMSG('Dados inceridos com sucesso! <a href="'.ADMURL.'?m=funcionario&t=listar"> Exibir Cadastro </a>') ;
				unset($_POST);
			endif;
		endif;
	endif;
?>