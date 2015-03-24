<?php 
	require_once("../funcoes.php");
	protegeArquivo(basename(__FILE__));
?>

<div>
	<form id="formcad" method="post" action="">
		<fieldset> Informe os dados para cadastro
			<ul>
				<li> 
					<label for="nome"> Nome: </label>
					<input type="text" size="50" name="nome" autofocus="autofocus" value="<?php echo $_POST['nome'] ?>" /> 
				</li>
				<li> 
					<label for="email"> Email: </label>
					<input type="email" size="50" name="email" value="<?php echo $_POST['email'] ?>" /> 
				</li>
				<li> 
					<label for="login"> Login: </label>
					<input type="text" size="35" name="login" value="<?php echo $_POST['login'] ?>" /> 
				</li>
				<li> 
					<label for="senha"> Senha: </label>
					<input type="password" size="25" name="senha" id="senha" value="<?php echo $_POST['senha'] ?>" /> 
				</li>
				<li> 
					<label for="senhaconf"> Repita a senha: </label>
					<input type="password" size="25" name="senhaconf" value="<?php echo $_POST['senhaconf'] ?>" /> 
				</li>
				<li> 
					<label for="adm"> Administrador: </label>
					<input type="checkbox" name="adm" <?php if(!isAdmin()) echo 'disabled = "disabled"'; if(isset($_POST['adm'])) echo 'checked = "checked"'; ?> /> dar controle total ao usuário.
				</li>
				<li class="center">
					<input type="button" onclick="location.href='?m=usuario&t=listar'" value="Cancelar" />
					<input type="submit" name="cadastrar" value="Salvar Dados" /> 
				</li>
			</ul>
		</fieldset>
	</form> <!-- formcad -->
</div>	<!-- div formcad -->