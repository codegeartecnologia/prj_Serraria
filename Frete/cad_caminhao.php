<?php 
	require_once("../funcoes.php");
	protegeArquivo(basename(__FILE__));
?>

<div>
	<form id="formcad" method="post" action="">
		<fieldset> Informe os dados para cadastro
			<ul>
				<li> 
					<label for="nome"> Placa: </label>
					<input type="text" size="50" name="nome" autofocus="autofocus" value="<?php echo $_POST['placa'] ?>" /> 
				</li>
				<li> 
					<label for="email"> Cor: </label>
					<input type="email" size="50" name="email" value="<?php echo $_POST['cor'] ?>" /> 
				</li>
				<li> 
					<label for="login"> N° Chassi: </label>
					<input type="text" size="35" name="login" value="<?php echo $_POST['chassi'] ?>" /> 
				</li>
				<li class="center">
					<input type="button" onclick="location.href='?m=usuario&t=listar'" value="Cancelar" />
					<input type="submit" name="cadastrar" value="Salvar Dados" /> 
				</li>
			</ul>
		</fieldset>
	</form> <!-- formcad -->
</div>	<!-- div formcad -->