<?php 
	include('../header.php');
	if(isset($_GET['m'])) $modulo = $_GET['m']; echo '<p>'.$modulo.'</p>';
	if(isset($_GET['t'])) $tela = $_GET['t']; echo '<p>'.$tela.'</p>'
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

<?php include('../Funcionarios/sidebar_cad.php'); ?>
<?php //include('../footer.php'); ?>