<?php 
	include('../header.php');
	if($_GET['m']) $modulo = 'funcionario';
	if($_GET['t']) $tela = 'incluir';
?>
	<div id="content">
		<div class="tab-pane fade in active" id="info">
	    	<div id="wrap-content">
	    		<div id="content">
					<?php
						if ($modulo && $tela):
							echo 'teste';
							loadModulo($modulo, $tela);
						else:
							echo '<p> Escolha uma opção do menu ao lado! </p>'; ?> 
						<!--	<div id="donutchart" style="width: 700px; height: 400px;"></div> --><?php
						endif;
					?>
				</div><!-- content -->
			</div> <!--wrap-content -->                   
	    </div>
	</div><!-- content -->
	<div id="sidebar">
		<h2> Madeiras </h2>
		<ul id="accordion">
			<li><a class="item" href="#"> Aproveitamento  </a></li>
			<li><a class="item" href="#"> Bruta </a></li>
			<li><a class="item" href="#"> Seca </a>
			<!--	<ul>
					<li><a href="?m=curriculo&t=incluir"> Cadastrar </a></li>
					<li><a href="?m=curriculo&t=listar"> Exibir </a></li>
			</ul> -->
			</li>
			<li><a class="item" href="#"> Seca e Aparelhada  </a></li>
			<li><a class="item" href="#"> Tratada Aparelhada  </a></li>
			<li><a class="item" href="#"> Tratada Bruta  </a></li>		
			<li><a class="item" href="#"> Verde e Aparelhada  </a></li>	
		</ul><!-- accordion -->
	</div><!-- sidebar -->
  </body>
</html>
<?php //include('../footer.php'); ?>