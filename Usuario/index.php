<?php 
	include('../header.php');
	if(isset($_GET['m'])) $modulo = $_GET['m'];
	if(isset($_GET['t'])) $tela = $_GET['t'];
?>

<div id="content">
	<?php
		if ($modulo && $tela):
			loadModulo($modulo, $tela);
		else:
			echo '<p> Escolha uma opção do menu ao lado! </p>';
		endif;
	?>
</div><!-- content -->
<div id="sidebar">
	<ul id="accordion">
		<li><a href="?m=usuario&t=incluir"> Cadastrar </a></li>
		<li><a href="?m=usuario&t=listar"> Exibir </a></li>
		<?php
			$sessao = new sessao();
			$meuid = $sessao->getVar('iduser');
		?>
		<li><a href="?m=usuario&t=senha&id=<?php echo $meuid; ?>"> Mudar senha </a></li>
	</ul><!-- accordion -->
</div><!-- sidebar -->
<?php //include('../footer.php'); ?>