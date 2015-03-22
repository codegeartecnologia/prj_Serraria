<?php
	require_once("../funcoes.php");
	protegeArquivo(basename(__FILE__));
?>

<div id="sidebar">
	<ul id="accordion">
		<li><a href="?m=usuario&t=listar"> Usuários </a></li>
		<li><a class="item" href="#"> Estoque </a>
		<!--	<ul>
				<li><a href="?m=curriculo&t=incluir"> Cadastrar </a></li>
				<li><a href="?m=curriculo&t=listar"> Exibir </a></li>
		</ul> -->
		</li>
	</ul><!-- accordion -->
</div><!-- sidebar -->