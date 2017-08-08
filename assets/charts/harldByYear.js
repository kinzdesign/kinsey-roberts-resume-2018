google.charts.load('current', {'packages':['corechart','table']});
google.charts.setOnLoadCallback(drawChartHarldByYear);

function drawChartHarldByYear() {
  var data = google.visualization.arrayToDataTable([
    ['Year', 'Packages', 'Work Orders', 'Ledger Entries', 'Access Badges', 'Keys'],
    ['2008', 51005,  9868,  7570,    0,    0],
    ['2009', 51349, 10120, 10178, 6265,    0],
    ['2010', 52167, 13205, 10784, 7840, 4385],
    ['2011', 63528, 13036, 12982, 8120, 4623],
    ['2012', 69527, 15219, 16718, 7591, 4251],
    ['2013', 84938, 15980, 17266, 8476, 4937]
  ]);

  var chart = new google.visualization.AreaChart(document.getElementById('chart_harld_by_year'));
  chart.draw(data, {
    title: 'HARLD Data Objects per Year',
    vAxis: {minValue: 0, position: 'after', format: 'short', textPosition: 'in' },
    isStacked: true,
    chartArea: { width: '90%', height: '75%' },
    focusTarget: 'category',
    legend: { position: 'top', maxLines: 3 }
  });

  var table = new google.visualization.Table(document.getElementById('table_harld_by_year'));
  table.draw(transposeDateDataTable(data), {
    width: '100%', 
    height: '100%'
  });
}

function transposeDateDataTable(dt) {
    var ndt = new google.visualization.DataTable;
    ndt.addColumn ('string',dt.getColumnLabel(0));
    for (var x=1; x<dt.getNumberOfColumns(); x++)
        ndt.addRow ([dt.getColumnLabel(x)]);
    for (var x=0; x<dt.getNumberOfRows(); x++) {
        ndt.addColumn ('number', dt.getValue(x,0));
        for (var y=1; y<dt.getNumberOfColumns(); y++)
            ndt.setValue (y-1, x+1, dt.getValue (x,y));
    }
    return ndt;
}