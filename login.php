<?php 
	require_once("funcoes.php");
	protegeArquivo(basename(__FILE__));
?>

<div id="loginform">
		<form class="loginform" method="post" action="">
			<fieldset>
				<legend> Acesso Restritro, indentifique-se! </legend>
				<ul>
					<li>
						<label for="usuario"> Usuário: </label>
						<input type="text" size="35" name="usuario" autofocus="autofocus" value="<?php echo $_POST['usuario']; ?>"/>
					</li>
					<li>
						<label for="senha"> Senha: </label>
						<input type="password" size="35" name="senha" value="<?php echo $_POST['senha']; ?>"/>
					</li>
					<li class="center"> <input type="submit" name="logar" value="Login" /> </li>
				</ul>
				<?php
					$erro = isset($_GET['erro']);
					switch($erro):
						case 1:
							printMSG('SUCESSO! Você fez logoff do sistema!','sucesso');
						break;
						case 2:
							printMSG(' ATENÇÃO! Dados incorretos ou dados inativos!', 'alerta');
						break;
						case 3:
							printMSG('ERRO! Faça login antes de acessar a página solicitada!','erro');
						break;
					endswitch;
				?> 
			</fieldset>
		</form>
	</div>