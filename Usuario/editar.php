<?php 
	require_once("funcoes.php");
	protegeArquivo(basename(__FILE__));
?>

<div>
	<form id="formcad" method="post" action="">
		<fieldset> Informe os dados para alteração
			<ul>
				<li> 
					<label for="nome"> Nome: </label>
					<input type="text" size="50" name="nome" autofocus="autofocus" value="<?php if($resbd) echo $resbd->nome; ?>" /> 
				</li>
				<li> 
					<label for="email"> Email: </label>
					<input type="email" size="50" name="email" value="<?php if($resbd) echo $resbd->email; ?>" /> 
				</li>
				<li> 
					<label for="login"> Login: </label>
					<input type="text" size="35" disabled = "disabled" name="login" value="<?php if($resbd) echo $resbd->login; ?>" /> 
				</li>
				<li> 
					<label for="adm"> Ativo: </label>
					<input type="checkbox" name="ativo" <?php if(!isAdmin()) echo 'disabled = "disabled"'; if($resbd->ativo == 's') echo 'checked = "checked"'; ?> /> habilitar ou desabilitar usuário.
				</li>
				<li> 
					<label for="adm"> Administrador: </label>
					<input type="checkbox" name="adm" <?php if(!isAdmin()) echo 'disabled = "disabled"'; if($resbd->administrador == 's') echo 'checked = "checked"'; ?> /> dar controle total ao usuário.
				</li>
				<li class="center">
					<input type="button" onclick="location.href='?m=usuario&t=listar'" value="Cancelar" />
					<input type="submit" name="editar" value="Salvar Alterações" /> 
				</li>
			</ul>
		</fieldset>
	</form> <!-- formcad -->
</div>	<!-- div formcad -->