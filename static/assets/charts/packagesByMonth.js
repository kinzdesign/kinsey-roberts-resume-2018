google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChartPackagesByMonth);

function drawChartPackagesByMonth() {
  var data = google.visualization.arrayToDataTable([
    ['Month', 'Packages'],
    [new Date(2007,  5),   793],
    [new Date(2007,  6),   817],
    [new Date(2007,  7),  4764],
    [new Date(2007,  8),  7572],
    [new Date(2007,  9),  5219],
    [new Date(2007, 10),  4061],
    [new Date(2007, 11),  3149],
    [new Date(2008,  0),  7920],
    [new Date(2008,  1),  6349],
    [new Date(2008,  2),  4517],
    [new Date(2008,  3),  4552],
    [new Date(2008,  4),  1321],
    [new Date(2008,  5),   764],
    [new Date(2008,  6),   692],
    [new Date(2008,  7),  5211],
    [new Date(2008,  8),  7710],
    [new Date(2008,  9),  5764],
    [new Date(2008, 10),  3889],
    [new Date(2008, 11),  2908],
    [new Date(2009,  0),  8869],
    [new Date(2009,  1),  6156],
    [new Date(2009,  2),  3744],
    [new Date(2009,  3),  4581],
    [new Date(2009,  4),  1039],
    [new Date(2009,  5),   786],
    [new Date(2009,  6),   721],
    [new Date(2009,  7),  5781],
    [new Date(2009,  8),  7693],
    [new Date(2009,  9),  5499],
    [new Date(2009, 10),  3610],
    [new Date(2009, 11),  2987],
    [new Date(2010,  0),  8706],
    [new Date(2010,  1),  5772],
    [new Date(2010,  2),  4543],
    [new Date(2010,  3),  4594],
    [new Date(2010,  4),  1261],
    [new Date(2010,  5),  1000],
    [new Date(2010,  6),  1032],
    [new Date(2010,  7),  8122],
    [new Date(2010,  8),  8358],
    [new Date(2010,  9),  6245],
    [new Date(2010, 10),  4790],
    [new Date(2010, 11),  3479],
    [new Date(2011,  0), 10658],
    [new Date(2011,  1),  6880],
    [new Date(2011,  2),  5491],
    [new Date(2011,  3),  5560],
    [new Date(2011,  4),  1528],
    [new Date(2011,  5),  1385],
    [new Date(2011,  6),   906],
    [new Date(2011,  7),  5285],
    [new Date(2011,  8), 10505],
    [new Date(2011,  9),  7452],
    [new Date(2011, 10),  6359],
    [new Date(2011, 11),  5187],
    [new Date(2012,  0),  9169],
    [new Date(2012,  1),  7938],
    [new Date(2012,  2),  6314],
    [new Date(2012,  3),  6152],
    [new Date(2012,  4),  2877],
    [new Date(2012,  5),  1383],
    [new Date(2012,  6),  1128],
    [new Date(2012,  7),  8897],
    [new Date(2012,  8), 12054],
    [new Date(2012,  9),  9335],
    [new Date(2012, 10),  7637],
    [new Date(2012, 11),  5259],
    [new Date(2013,  0), 12458],
    [new Date(2013,  1),  9347],
    [new Date(2013,  2),  6920],
    [new Date(2013,  3),  7029],
    [new Date(2013,  4),  3059],
    [new Date(2013,  5),  1815]
  ]);
  var options = {
    title: 'Mailroom Packages Logged per Month',
    vAxis: {
      minValue: 0,
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
  var formatter = new google.visualization.DateFormat({ 
    pattern: "MMM yyyy"
  }); 
  formatter.format(data, 0);
  var chart = new google.visualization.AreaChart(document.getElementById('chart_packagesByMonth'));
  chart.draw(data, options);
}
