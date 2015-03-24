<?php
	require_once("../funcoes.php");
	protegeArquivo(basename(__FILE__));
?>

<div id="sidebar">
	<ul id="accordion">
		<li><a class="item" href="#"> Motorista </a>
			<ul>
				<li><a href="?m=frete&t=motorista_incluir"> Cadastrar </a></li>
				<li><a href="?m=frete&t=motorista_listar"> Exibir </a></li>
			</ul>
		</li>
		<li><a class="item" href="#"> Caminhão </a>
			<ul>
				<li><a href="?m=frete&t=caminhao_incluir"> Cadastrar </a></li>
				<li><a href="?m=frete&t=caminhao_listar"> Exibir </a></li>
			</ul>
		</li>
	</ul><!-- accordion -->
</div><!-- sidebar -->