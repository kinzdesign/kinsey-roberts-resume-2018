google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChartKeysBadges);

function drawChartKeysBadges() {
  var data = google.visualization.arrayToDataTable([
    ['Fiscal Year', 'Key Card', 'PROX Badge', 'Physical Key'],
    ['2009', 5155, 1110,    0],
    ['2010', 6989,  851, 4385],
    ['2011', 6936, 1184, 4623],
    ['2012', 6766,  825, 4251],
    ['2013', 7621,  855, 4937]
  ]);

  var chart = new google.visualization.AreaChart(document.getElementById('chart_workOrdersByYear'));
  chart.draw(data, {
    title: 'Cards, Badges, and Keys Issued per Fiscal Year',
    vAxis: {minValue: 0, position: 'after', format: 'short', textPosition: 'in' },
    isStacked: true,
    chartArea: { width: '90%', height: '75%' },
    focusTarget: 'category',
    legend: { position: 'top', maxLines: 3 }
  });
}
