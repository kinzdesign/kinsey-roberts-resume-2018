google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChartKeysBadges);

function drawChartKeysBadges() {
  var data = google.visualization.arrayToDataTable([
    ['Year', 'Key Card', 'PROX Badge', 'Physical Key'],
    ['2008-09', 5155, 1110,    0],
    ['2009-10', 6989,  851, 4385],
    ['2010-11', 6936, 1184, 4623],
    ['2011-12', 6766,  825, 4251],
    ['2012-13', 7621,  855, 4937]
  ]);

  var chart = new google.visualization.AreaChart(document.getElementById('chart_keys_badges'));
  chart.draw(data, {
    title: 'Cards, Badges, and Keys Issued per Year',
    vAxis: {minValue: 0, position: 'after', format: 'short', textPosition: 'in' },
    isStacked: true,
    chartArea: { width: '90%', height: '75%' },
    focusTarget: 'category',
    legend: { position: 'top', maxLines: 3 }
  });
}
