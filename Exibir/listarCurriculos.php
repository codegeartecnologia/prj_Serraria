<?php 
	require_once("funcoes.php");
	protegeArquivo(basename(__FILE__));
?>

<table cellspacing="0" cellpadding="0" border="0" class="display" id="listausers">
	<thead>
		<tr>
			<th> Objetivo </th><th> Arquivo </th><th> Cadastro </th><th> Ações </th>
		</tr>
		<tbody>
			<?php
				$curriculo = new curriculo();
				$curriculo->selecionaTudo($curriculo);
				while($res = $curriculo->retornaDados()):
					echo '<tr>';
						//printf('<td class="center"> %s </td>', $res->id);
						printf('<td> %s </td>', $res->objetivo);
						printf('<td> %s </td>', $res->nome_arquivo);
						printf('<td class="center"> %s </td>', date("d/m/y", strtotime($res->datacad)));
						printf('<td id="acoes" class="center"> 
									<a href="?m=curriculo&t=visualizar&nome=%s" title="Visualiar Arquivo">  <img src="images/icones/pdf.ico" alt="Visualizar Arquivo"/> 	</a>
									<a href="?m=curriculo&t=abrirPasta&id=%s" title="Abrir Pasta">  		<img src="images/icones/pasta.ico" alt="AbrirP asta"/> 			</a>
									<a href="?m=curriculo&t=excluir&id=%s" title="Excluir">					<img src="images/icones/del.ico" alt="Excluir"/>	 			</a>
								</td>', $res->novo_nome, $res->id, $res->id);
						
					echo '</tr>';
				endwhile;
			?>
		</tbody>
	</thead>
</table>