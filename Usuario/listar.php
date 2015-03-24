<?php 
	require_once("funcoes.php");
	protegeArquivo(basename(__FILE__));
?>

<table cellspacing="0" cellpadding="0" border="0" class="display" id="listausers">
	<thead>
		<tr>
			<th> Nome </th><th> Email </th><th> Login </th><th> Ativo/Adm </th><th> Cadastro </th><th> Ações </th>
		</tr>
		<tbody>
			<?php
				$user = new usuario();
				$user->selecionaTudo($user);
				while($res = $user->retornaDados()):
					echo '<tr>';
						//printf('<td class="center"> %s </td>', $res->id);
						printf('<td> %s </td>', $res->nome);
						printf('<td> %s </td>', $res->email);
						printf('<td> %s </td>', $res->login);
						printf('<td class="center"> %s / %s </td>', strtoupper($res->ativo), strtoupper($res->administrador));
						printf('<td class="center"> %s </td>', date("d/m/y", strtotime($res->datacad)));
						printf('<td id="acoes" class="center"> 
									<a href="?m=usuario&t=incluir" title="Novo Cadastro"> 	<img src="images/icones/add.ico" alt="Novo Cadastro"/> </a>
									<a href="?m=usuario&t=editar&id=%s" title="Editar"> 	<img src="images/icones/edit.ico" alt="Editar"/> 		</a>
									<a href="?m=usuario&t=senha&id=%s" title="Mudar Senha"> <img src="images/icones/pwd.ico" alt="Mudar Senha"/> 	</a>
									<a href="?m=usuario&t=excluir&id=%s" title="Excluir"> 	<img src="images/icones/del.ico" alt="Excluir"/> 		</a>
								</td>', $res->id, $res->id, $res->id);
						
					echo '</tr>';
				endwhile;
			?>
		</tbody>
	</thead>
</table>