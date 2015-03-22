<?php 
	require_once("funcoes.php");
	protegeArquivo(basename(__FILE__));
?>

<div>
	<form id="formcad" method="post" action="">
		<fieldset> Confira os dados do currículo para exclusão
			<ul>
				<ul>
				<li> 
					<label for="nome"> Objetivo: </label>
					<input type="text" size="50" disabled = "disabled" name="objetivo" value="<?php if($resbd) echo $resbd->objetivo; ?>" />  
				</li>
				<li> 
					<label for="nome"> Curriculo: </label>
					<input type="text" size="50" disabled = "disabled" name="objetivo" value="<?php if($resbd) echo $resbd->nome_arquivo; ?>" />
				</li>
				<li class="center">
					<input type="button" onclick="location.href='?m=curriculo&t=listar'" value="Cancelar" />
					<input type="submit" name="excluir" value="Confirmar Exclusão" /> 
				</li>
			</ul>
		</fieldset>
	</form> <!-- formcad -->
</div>	<!-- div formcad -->