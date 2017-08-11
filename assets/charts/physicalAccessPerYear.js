google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChartKeysBadges);

function drawChartKeysBadges() {
  var data = google.visualization.arrayToDataTable([
    ['Fiscal Year', 'Key Card', 'PROX Badge', 'Physical Key'],
    ['FY09', 5155, 1110,    0],
    ['FY10', 6989,  851, 4385],
    ['FY11', 6936, 1184, 4623],
    ['FY12', 6766,  825, 4251],
    ['FY13', 7621,  855, 4937]
  ]);

  var chart = new google.visualization.AreaChart(document.getElementById('chart_physicalAccessPerYear'));
  chart.draw(data, {
    title: 'Cards, Badges, and Keys Issued per Fiscal Year',
    vAxis: {
      minValue: 0,
      format: 'short', 
      textPosition: 'in',
      viewWindowMode: 'maximized'
    },
    isStacked: true,
    chartArea: { 
      width: '100%',
      height: '75%' 
    },
    focusTarget: 'category',
    legend: { 
      position: 'top',
      maxLines: 3
    }
  });
}
