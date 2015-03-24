$(document).ready(function(){
	google.load('visualization', '1', {packages: ['corechart']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Madeiras', 'Estoque', { role: 'style' }],
        ['Aparelhada', 817500, '#663300'],
        ['Bruta', 817500, '#663300'],
        ['Seca', 3792000, '#663300'],
        ['Seca Aparelhada', 2695000, '#663300'],
        ['Tratada Aparelhada', 2099000, '#663300'],
        ['Tratada Bruta', 1526000, '#663300'],
        ['Verde Aparelhada', 1526000, '#663300']
      ]);

      var options = {
        title: 'Madeiras em Estoque',
        width: 1000,
        height: 500,
        hAxis: {
          title: 'QTD em M³',
          minValue: 0
        },
        vAxis: {
          title: 'Madeiras'
        }
      };

      var chart = new google.visualization.BarChart(
        document.getElementById('ex0'));

      chart.draw(data, options);
    }					
});