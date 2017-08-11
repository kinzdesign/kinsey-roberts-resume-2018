google.charts.load('current', {'packages':['corechart','table']});
google.charts.setOnLoadCallback(drawChartHarldByYear);

function drawChartHarldByYear() {
  var data = google.visualization.arrayToDataTable([
    ['Fiscal Year', 'Packages', 'Work Orders', 'Ledger Entries', 'Access Badges', 'Keys'],
    ['FY08', 51005,  9868,  7570,    0,    0],
    ['FY09', 51349, 10120, 10178, 6265,    0],
    ['FY10', 52167, 13205, 10784, 7840, 4385],
    ['FY11', 63528, 13036, 12982, 8120, 4623],
    ['FY12', 69527, 15219, 16718, 7591, 4251],
    ['FY13', 84938, 15980, 17266, 8476, 4937]
  ]);
  var chart = new google.visualization.AreaChart(document.getElementById('chart_harldByYear'));
  chart.draw(data, {
    title: 'HARLD Data Object Counts per Fiscal Year',
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
  var table = new google.visualization.Table(document.getElementById('table_harldByYear'));
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