<?php 
	require_once("funcoes.php");
	protegeArquivo(basename(__FILE__));
?>

<div class="curriculoform">
	<form action="" method="post" enctype="multipart/form-data">
		<fieldset> Insira seu curriculo
			<ul>
				<li> 
					<label for="nome"> Objetivo: </label>
					<input type="text" size="50" name="objetivo" autofocus="autofocus" value="" /> 
				</li>
				<li> 
					<label for="nome"> Curriculo: </label>
					<input name="files" type="file"><br><br>
				</li>
				<li>
					<input type="button" onclick="location.href='?m=curriculo&t=listar'" value="Cancelar" />
					<input type="submit" name="curriculo" value="Enviar Arquivos" /> 
				</li>
			</ul>
		</fieldset>
	</form>
</div>