<?php
	require_once("funcoes.php");
	protegeArquivo(basename(__FILE__));
	$sessao = new sessao();
	verificaLogin();	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pr_BR" lang="pr_BR">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<?php loadCSS('reset'); loadCSS('style'); loadCSS('bootstrap'); loadJS('jquery'); loadJS('geral'); loadJS('bootstrap'); loadJS('jquery_mask'); ?>

		<title> Painel Administrativo </title>
		
		<!--<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['corechart']}]}"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script> -->
	</head>

	<body class="painel">
		<div id="wrapper">
			<div id="header">				
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h1> Painel Administrativo </h1>
	                    <?php include('profile.php')?>
	                </div>
	                <!-- /.panel-heading -->
	                <div class="panel-body">
	                    <!-- Nav tabs -->
	                    <ul class="nav-tabs">
	                        <li>	<a href="#info" data-toggle="tab">                        	
	                        	<button class="botao" onclick="location.href='<?php echo BASEURLINFO ?>'">
				                    <div class="info">
				                        <img class="img" src="../images/icones/infor.ico" alt="Informações" />
				                        <h2 class="infor"> INFORMAÇÕES </h2>
				                    </div>
				                </button>
	                        </a> </li>
	                        <li> <a href="#cadastro" data-toggle="tab">                        	
	                        	<button class="botao" onclick="location.href='<?php echo BASEURLFUNC ?>'">
				                    <div class="info2">
				                        <img class="img" src="../images/icones/func.ico" alt="Informações" />
				                        <h2 class="infor"> FUNCIONÁRIOS </h2>
				                    </div>
				                </button>
	                        </a></li> 
	                       <!-- <li><a href="#exibir" data-toggle="tab">	                        	
	                        	<button class="botao" onclick="location.href='<?php echo BASEURLEXIB ?>'">
				                    <div class="info3">
				                        <img class="img" src="../images/icones/visualizar.ico" alt="Visualizar" />
				                        <h2 class="infor"> EXIBIR </h2>
				                    </div>
				                </button>
	                       </a></li> -->
	                        <li> <a href="#estoque" data-toggle="tab">                	
	                        	<button class="botao" onclick="location.href='<?php echo BASEURLEST ?>'">
				                    <div class="info4">
				                        <img class="img" src="../images/icones/estoque.png" alt="Estoque" />
				                        <h2 class="infor"> ESTOQUE </h2>
				                    </div>
				                </button>
	                        </a></li>
	                        <li> <a href="#frete" data-toggle="tab">                	
	                        	<button class="botao" onclick="location.href='<?php echo BASEURLFRETE ?>'">
				                    <div class="info5">
				                        <img class="img" src="../images/icones/frete.png" alt="Frete" />
				                        <h2 class="infor"> FRETE </h2>
				                    </div>
				                </button>
	                        </a></li>
	                    </ul>	                		