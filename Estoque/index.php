<?php 
	include('../header.php');
	if($_GET['m']) $modulo = 'funcionario';
	if($_GET['t']) $tela = 'incluir';
?>
<script type="text/javascript">
	google.load('visualization', '1', {packages: ['corechart']});
	google.setOnLoadCallback(drawChart);
	
	function drawChart() {
	
	  var data = google.visualization.arrayToDataTable([
	    ['Madeiras', 'Madeiras em Estoque'],
	    ['Aparelhada', 200],
	    ['Bruta', 300],
	    ['Seca', 400],
	    ['Seca Aparelhada', 500],
	    ['Tratada Aparelhada', 600],
	    ['Tratada Bruta', 700],
	    ['Verde Aparelhada', 800]
	  ]);
	
	  var options = {
	    title: 'Madeiras em Estoque',
	    width: 1000,
	    height: 450,
	    colors: ['#663300'],
	    hAxis: {
	      title: 'Quantidade em M³',
	      minValue: 0
	    },
	    vAxis: {
	      title: 'Madeiras',
	    },
	    isStacked: true
	  };
	
	  var chart = new google.visualization.BarChart(
	    document.getElementById('ex0'));
	
	  chart.draw(data, options);
	}
	</script>
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
<?php //include('../footer.php'); ?>