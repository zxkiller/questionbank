google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);

function drawChart(id) {
    var data = google.visualization.arrayToDataTable([
        ['Year', 'Maths', 'Physics'],
        ['12/2012',  65.9,      65.6],
        ['1/2013',  65.2,      65.3],
        ['4/2013',  70.1,      80.2],
        ['7/2013',  73.9,      90.8],
        ['11/2013',  75.8,      95.1],
        ['1/2014',  80.0,      100.0]
    ]);

    var options = {
        title: 'Overal performances',
        vAxis:{
            format: '#,##%'
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart'));
    chart.draw(data, options);
}