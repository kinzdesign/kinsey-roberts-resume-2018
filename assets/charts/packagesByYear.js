google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChartPackagesByYear);

function drawChartPackagesByYear() {
  var data = google.visualization.arrayToDataTable([
    ['Fiscal Year', 'Packages'],
    ['FY08', 51005],
    ['FY09', 51349],
    ['FY10', 52167],
    ['FY11', 63528],
    ['FY12', 69527],
    ['FY13', 84938]
  ]);

  var options = {
    title: 'Mailroom Packages Logged per Fiscal Year',
    vAxis: {
      format: 'short', 
      textPosition: 'in',
      viewWindowMode: 'maximized'
    },
    focusTarget: 'category',
    legend: { 
      position: 'none' 
    },
    colors: ['#1565c0'],
    chartArea: { 
      width: '100%', 
      height: '80%' 
    }
  };
  var chart = new google.visualization.AreaChart(document.getElementById('chart_packagesByYear'));
  chart.draw(data, options);
}
