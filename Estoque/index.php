<?php 
	include('../header.php');
	if($_GET['m']) $modulo = 'funcionario';
	if($_GET['t']) $tela = 'incluir';
?>
	<div id="content">
		<?php
			if ($modulo && $tela):
				echo 'teste';
				loadModulo($modulo, $tela);
			else:
				echo '<div id="ex0"></div>';
			endif;
		?>
	</div><!-- content -->
	<div id="sidebar">
		<ul id="accordion">
			<li><a class="item" href="#"> Cadastrar  </a></li>
		</ul><!-- accordion -->
	</div><!-- sidebar -->
  </body>
</html>
<?php //include('../footer.php'); ?>