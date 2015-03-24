<?php 
	require_once("../funcoes.php");
	protegeArquivo(basename(__FILE__));
?>

<div>
	<form id="formcad" method="post" action="">
		<fieldset> Confira os dados do usuário para exclusão
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
					<label for="adm"> Ativo: </label>
					<input type="checkbox" name="ativo" disabled = "disabled" <?php if($resbd->ativo == 's') echo 'checked = "checked"'; ?> /> habilitar ou desabilitar usuário.
				</li>
				<li> 
					<label for="adm"> Administrador: </label>
					<input type="checkbox" name="adm" disabled = "disabled" <?php if($resbd->administrador == 's') echo 'checked = "checked"'; ?> /> dar controle total ao usuário.
				</li>
				<li class="center">
					<input type="button" onclick="location.href='?m=usuario&t=listar'" value="Cancelar" />
					<input type="submit" name="excluir" value="Confirmar Exclusão" /> 
				</li>
			</ul>
		</fieldset>
	</form> <!-- formcad -->
</div>	<!-- div formcad -->