<?php 
	require_once("funcoes.php");
	protegeArquivo(basename(__FILE__));
?>

<div>
	<form id="formcad" method="post" action="">
		<fieldset> Informe os dados para alteração da senha
			<ul>
				<li> 
					<label for="nome"> Nome: </label>
					<input type="text" size="50" disabled = "disabled" name="nome" value="<?php if($resbd) echo $resbd->nome; ?>" /> 
				</li>
				<li> 
					<label for="email"> Email: </label>
					<input type="email" size="50" disabled = "disabled" name="email" value="<?php if($resbd) echo $resbd->email; ?>" /> 
				</li>
				<li> 
					<label for="login"> Login: </label>
					<input type="text" size="35" disabled = "disabled" name="login" value="<?php if($resbd) echo $resbd->login; ?>" /> 
				</li>
				<li> 
					<label for="senha"> Senha: </label>
					<input type="password" size="25" name="senha" autofocus="autofocus" id="senha" value="<?php echo $_POST['senha'] ?>" /> 
				</li>
				<li> 
					<label for="senhaconf"> Repita a senha: </label>
					<input type="password" size="25" name="senhaconf" value="<?php echo $_POST['senhaconf'] ?>" /> 
				</li>
				<li class="center">
					<input type="button" onclick="location.href='?m=usuario&t=listar'" value="Cancelar" />
					<input type="submit" name="mudasenha" value="Salvar Alterações" /> 
				</li>
			</ul>
		</fieldset>
	</form> <!-- formcad -->
</div>	<!-- div formcad -->