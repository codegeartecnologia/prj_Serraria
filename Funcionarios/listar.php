<?php 
	require_once("../funcoes.php");
	protegeArquivo(basename(__FILE__));
?>

<table cellspacing="0" cellpadding="0" border="0" class="display" id="listausers" width="130%">
	<thead>
		<tr>
			<th> ID </th><th> Nome Completo </th><th> RG </th><th> CPF </th><th> Nascimento </th><th> N° Carteira </th>
			<th> PIS </th><th> Admissão / Demissão </th><th> Setor </th><th> Salário </th><th> Ações </th>
		</tr>
	</thead>
	<tbody>
		<?php
			$func = new funcionario();
			$func->selecionaTudo($func);
			while($res = $func->retornaDados()):
				echo '<tr>';
					printf('<td class="center"> %s </td>', $res->id);
					printf('<td> %s </td>', $res->nome);
					printf('<td id="rg" > %s </td>', $res->rg);
					printf('<td id="cpf" > %s </td>', $res->cpf);
					printf('<td> %s </td>', date("d/m/y", strtotime($res->data_nasc)));
					printf('<td class="center"> %s </td>', $res->num_carteira);					
					printf('<td class="center"> %s </td>', $res->pis);
					if($res->demissao != NULL): 
						$data = $res->demissao;
					else:
						$data = '';
					endif;
					printf('<td class="center"> %s - %s </td>', date("d/m/y", strtotime($res->admissao)), date("d/m/y", strtotime($res->data)));
					printf('<td> %s </td>', $res->setor);
					printf('<td> %s </td>', $res->salario);
					printf('<td id="acoes" class="center"> 
								<a href="?m=funcionario&t=incluir" title="Novo Cadastro"> 	<img src="../images/icones/add.ico" alt="Novo Cadastro"/> </a>
								<a href="?m=funcionario&t=editar&id=%s" title="Editar"> 	<img src="../images/icones/edit.ico" alt="Editar"/> 		</a>
								<a href="?m=funcionario&t=senha&id=%s" title="Mudar Senha"> <img src="../images/icones/pwd.ico" alt="Mudar Senha"/> 	</a>
								<a href="?m=funcionario&t=excluir&id=%s" title="Excluir"> 	<img src="../images/icones/del.ico" alt="Excluir"/> 		</a>
							</td>', $res->id, $res->id, $res->id);
					
				echo '</tr>';
			endwhile;
		?>
	</tbody>
</table>