<?php require_once("funcoes.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		
		<?php 
			loadCSS('reset'); loadCSS('style'); loadCSS('menu'); loadCSS('conteudotopo'); loadCSS('conteudo'); loadCSS('rodape');
			loadJS('jquery'); loadJS('geral'); ?>
		<title> Painel Administrativo </title>
	</head>
	<body>
		<?php 
			//loadModulo('curriculo','curriculos');
			loadModulo('usuario','login');
		 ?>
		 		
	</body>
</html>
