google.charts.load('current', {'packages':['corechart','table']});
google.charts.setOnLoadCallback(drawChartsecurityByYear);

function drawChartsecurityByYear() {
  var data = google.visualization.arrayToDataTable([
    ['Fiscal Year', 'Key Cards', 'Access Badges', 'Physical Keys'],
    ['FY08',    0,    0,    0],
    ['FY09', 5155, 1110,    0],
    ['FY10', 6989,  851, 4385],
    ['FY11', 6936, 1184, 4623],
    ['FY12', 6766,  825, 4251],
    ['FY13', 7621,  855, 4937]
  ]);
  var chart = new google.visualization.AreaChart(document.getElementById('chart_securityByYear'));
  chart.draw(data, {
    title: 'HARLD Physical Security Objects per Fiscal Year',
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
    colors: ['#1565c0', '#c62828', '#ef6c00'],
    legend: { 
      position: 'top', 
      maxLines: 3 
    }
  });
}
