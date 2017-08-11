google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChartDisplaysByYear);

function drawChartDisplaysByYear() {
  var data = google.visualization.arrayToDataTable([
    ['Year', 'Residence Halls', 'Public Areas', 'Offices', 'TV Channels'],
    [new Date(2005, 8),  0, 0, 0, 0],
    [new Date(2006, 8),  8, 4, 0, 0],
    [new Date(2007, 8), 11, 4, 0, 0],
    [new Date(2008, 8), 26, 6, 0, 0],
    [new Date(2009, 8), 26, 6, 0, 0],
    [new Date(2010, 8), 26, 8, 2, 0],
    [new Date(2011, 8), 26, 7, 3, 0],
    [new Date(2012, 8), 26, 7, 3, 0],
    [new Date(2013, 8), 26, 7, 3, 2]
  ]);
  var options = {
    title: 'Number of Displays Running MagicScreen Software Each September',
    vAxis: {
      minValue: 0,
      textPosition: 'in',
      viewWindowMode: 'maximized'
    },
    isStacked: true,
    chartArea: { 
      width: '90%', 
      height: '75%' 
    },
    focusTarget: 'category',
    legend: { 
      position: 'top', 
      maxLines: 3 
    }
  };
  var formatter = new google.visualization.DateFormat({ 
    pattern: "MMM yyyy"
  }); 
  formatter.format(data, 0);
  var chart = new google.visualization.AreaChart(document.getElementById('chart_displaysByYear'));
  chart.draw(data, options);
}
