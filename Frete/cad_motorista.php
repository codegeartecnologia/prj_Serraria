<?php 
	require_once("../funcoes.php");
	protegeArquivo(basename(__FILE__));
?>

<div>
	<form id="formcad" method="post" action="">
		<fieldset> Informe os dados do Motorista para cadastro
			<ul>
				<li> 
					<label for="nome"> Nome: </label>
					<input type="text" size="50" name="nome" autofocus="autofocus" value="<?php echo $_POST['nome'] ?>" /> 
				</li>
				<li> 
					<label for="rg"> RG: </label>
					<input type="text" size="50" name="email" value="<?php echo $_POST['rg'] ?>" /> 
				</li>
				<li> 
					<label for="cpf"> CPF: </label>
					<input type="text" size="50" name="email" value="<?php echo $_POST['cpf'] ?>" /> 
				</li>
				<li> 
					<label for="idade"> Idade: </label>
					<input type="text" size="50" name="email" value="<?php echo $_POST['idade'] ?>" /> 
				</li>
				<li> 
					<label for="login"> CNH: </label>
					<input type="text" size="35" name="login" value="<?php echo $_POST['login'] ?>" /> 
				</li>
				<li class="center">
					<input type="button" onclick="location.href='?m=usuario&t=listar'" value="Cancelar" />
					<input type="submit" name="cadastrar" value="Salvar Dados" /> 
				</li>
			</ul>
		</fieldset>
	</form> <!-- formcad -->
</div>	<!-- div formcad -->