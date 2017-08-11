google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChartWorkOrdersByYear);

function drawChartWorkOrdersByYear() {
  var data = google.visualization.arrayToDataTable([
    ['Fiscal Year', 'Work Orders'],
    ['FY08',  9862],
    ['FY09',  9846],
    ['FY10', 13258],
    ['FY11', 12625],
    ['FY12', 14801],
    ['FY13', 16371]
  ]);
  var options = {
    title: 'Maintenance Work Orders per Fiscal Year',
    vAxis: {
      minValue: 0,
      format: 'short', 
      textPosition: 'in',
      viewWindowMode: 'maximized'
    },
    chartArea: { 
      width: '100%', 
      height: '75%' 
    },
    focusTarget: 'category',
    legend: { 
      position: 'none' 
    }
  };
  var chart = new google.visualization.AreaChart(document.getElementById('chart_workOrdersByYear'));
  chart.draw(data, options);
}
