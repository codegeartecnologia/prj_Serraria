<?php 
	include('../header.php');
	if(isset($_GET['m'])) $modulo = $_GET['m'];
	if(isset($_GET['t'])) $tela = $_GET['t'];
?>
<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
	google.setOnLoadCallback(drawChart);
	google.load('visualization', '1', {packages: ['corechart', 'bar']});
	google.setOnLoadCallback(drawBasic);
	function drawChart() {
	    var data = google.visualization.arrayToDataTable([
	      ['Salários', 'Valor por mês'],
	      ['0 à 1.000,00',     11],
	      ['1.001,00 à 2.000,00',      2],
	      ['2.001,00 à 3.000,00',  2],
	      ['3.001,00 à 4.000,00', 2],
	      ['5.001,00 à 6.000,00',    7]
	    ]);
	
	    var options = {
	      title: 'Salário por mês',
	      width: 600,
	      height: 350,
	      colors: ['#003399', '#663300','#006600','#990000','#FFCC33'],
	      pieHole: 0.4
	    };
	
	    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
	    chart.draw(data, options);
	}
	    
    function drawBasic() {

       var data = google.visualization.arrayToDataTable([
         ['Setores', 'Quantidade',{ role: 'annotation' }],
         ['ADM', 			5, 1.5+'%'],
         ['FINANCEIRO', 	15, 5+'%'],
         ['SERRARIA', 		270, 70+'%'],
         ['LIMPEZA', 		10, 3+'%'],
      ]);

      var options = {
        title: 'Quantidade de funcionarios por Setor',
        width: 600,
	    height: 350,
	    colors: ['#336699'],
        hAxis: {
          title: 'Setores',
        },
        vAxis: {
          title: 'Valores em UND'
        },
        is3D: true	      
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
    }
</script>
<div id="content">
	<?php
		if ($modulo && $tela):
			loadModulo($modulo, $tela);
		else:
			//echo '<img src="http://chart.apis.google.com/chart?chs=400x100&cht=p&chd=t:45,25,10,20&chl=Valencia|Madrid|Barcelona|Lugo" width="400" height="100">';
			echo '<div id="donutchart" style="width: 550px; height: 300px;"></div>';
			echo '<div id="chart_div" style="width: 550px; height: 300px;"></div>';
		endif;
	?>
</div><!-- content -->

<?php include('../Funcionarios/sidebar_cad.php'); ?>
<?php //include('../footer.php'); ?>