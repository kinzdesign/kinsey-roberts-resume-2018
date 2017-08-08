google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChartPackagesByMonth);

function drawChartPackagesByMonth() {
  var data = google.visualization.arrayToDataTable([
    ['Month', 'Packages'],
    [new Date(2007,  7),   817],
    [new Date(2007,  8),  4764],
    [new Date(2007,  9),  7572],
    [new Date(2007, 10),  5219],
    [new Date(2007, 11),  4061],
    [new Date(2007, 12),  3149],
    [new Date(2008,  1),  7920],
    [new Date(2008,  2),  6349],
    [new Date(2008,  3),  4517],
    [new Date(2008,  4),  4552],
    [new Date(2008,  5),  1321],
    [new Date(2008,  6),   764],
    [new Date(2008,  7),   692],
    [new Date(2008,  8),  5211],
    [new Date(2008,  9),  7710],
    [new Date(2008, 10),  5764],
    [new Date(2008, 11),  3889],
    [new Date(2008, 12),  2908],
    [new Date(2009,  1),  8869],
    [new Date(2009,  2),  6156],
    [new Date(2009,  3),  3744],
    [new Date(2009,  4),  4581],
    [new Date(2009,  5),  1039],
    [new Date(2009,  6),   786],
    [new Date(2009,  7),   721],
    [new Date(2009,  8),  5781],
    [new Date(2009,  9),  7693],
    [new Date(2009, 10),  5499],
    [new Date(2009, 11),  3610],
    [new Date(2009, 12),  2987],
    [new Date(2010,  1),  8706],
    [new Date(2010,  2),  5772],
    [new Date(2010,  3),  4543],
    [new Date(2010,  4),  4594],
    [new Date(2010,  5),  1261],
    [new Date(2010,  6),  1000],
    [new Date(2010,  7),  1032],
    [new Date(2010,  8),  8122],
    [new Date(2010,  9),  8358],
    [new Date(2010, 10),  6245],
    [new Date(2010, 11),  4790],
    [new Date(2010, 12),  3479],
    [new Date(2011,  1), 10658],
    [new Date(2011,  2),  6880],
    [new Date(2011,  3),  5491],
    [new Date(2011,  4),  5560],
    [new Date(2011,  5),  1528],
    [new Date(2011,  6),  1385],
    [new Date(2011,  7),   906],
    [new Date(2011,  8),  5285],
    [new Date(2011,  9), 10505],
    [new Date(2011, 10),  7452],
    [new Date(2011, 11),  6359],
    [new Date(2011, 12),  5187],
    [new Date(2012,  1),  9169],
    [new Date(2012,  2),  7938],
    [new Date(2012,  3),  6314],
    [new Date(2012,  4),  6152],
    [new Date(2012,  5),  2877],
    [new Date(2012,  6),  1383],
    [new Date(2012,  7),  1128],
    [new Date(2012,  8),  8897],
    [new Date(2012,  9), 12054],
    [new Date(2012, 10),  9335],
    [new Date(2012, 11),  7637],
    [new Date(2012, 12),  5259],
    [new Date(2013,  1), 12458],
    [new Date(2013,  2),  9347],
    [new Date(2013,  3),  6920],
    [new Date(2013,  4),  7029],
    [new Date(2013,  5),  3059],
    [new Date(2013,  6),  1815]
  ]);

  var options = {
    title: 'Mailroom Packages Logged per Month',
    vAxis: {minValue: 0, position: 'after', format: 'short', textPosition: 'in' },
    focusTarget: 'category',
    legend: { position: 'none' },
    chartArea: { width: '100%', height: '80%' }
  };
  var formatter = new google.visualization.DateFormat({ 
      pattern: "MMM yyyy"
  }); 
  formatter.format(data, 0);
  var chart = new google.visualization.AreaChart(document.getElementById('chart_packages_by_month'));
  chart.draw(data, options);
}
