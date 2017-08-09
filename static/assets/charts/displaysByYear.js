google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChartDisplaysByYear);

function drawChartDisplaysByYear() {
  var data = google.visualization.arrayToDataTable([
    ['Year', 'Residence Halls', 'Public Areas', 'Offices', 'TV Channels'],
    [new Date(2005, 7),  8, 0, 0, 0],
    [new Date(2006, 7),  8, 4, 0, 0],
    [new Date(2007, 7), 11, 4, 0, 0],
    [new Date(2008, 7), 26, 6, 0, 0],
    [new Date(2009, 7), 26, 6, 0, 0],
    [new Date(2010, 7), 26, 8, 2, 0],
    [new Date(2011, 7), 26, 7, 3, 0],
    [new Date(2012, 7), 26, 7, 3, 0],
    [new Date(2013, 7), 26, 7, 3, 2]
  ]);

  var options = {
    title: 'Number of Displays Running MagicScreen Software',
    vAxis: {minValue: 0, position: 'after', format: 'short', textPosition: 'in' },
    isStacked: true,
    chartArea: { width: '90%', height: '75%' },
    focusTarget: 'category',
    legend: { position: 'top', maxLines: 3 }
  };
  var formatter = new google.visualization.DateFormat({ 
      pattern: "MMM yyyy"
  }); 
  formatter.format(data, 0);
  var chart = new google.visualization.AreaChart(document.getElementById('chart_displaysByYear'));
  chart.draw(data, options);
}
