<?php 
	include('../header.php');
	if(isset($_GET['m'])) $modulo = $_GET['m'];
	if(isset($_GET['t'])) $tela = $_GET['t'];
?>

<div id="content">
	<?php
		if (isset($modulo) && isset($tela)):
			loadModulo($modulo, $tela);
		else:
			echo '<p> Escolha uma opção do menu ao lado! </p>';
		endif;
	?>
</div><!-- content -->
<?php include('../Frete/sidebar_frete.php'); ?>
<?php //include('../footer.php'); ?>