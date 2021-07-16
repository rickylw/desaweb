google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(chartPiePendapatanDesa);
google.charts.setOnLoadCallback(chartLinePendapatanDesa);


$(window).resize(function(){
    chartPiePendapatanDesa();
    chartLinePendapatanDesa();
});

function chartPiePendapatanDesa() {
    var data = google.visualization.arrayToDataTable([
        ['Pendapatan Desa', 'Rupiah'],
        ['Dana Desa',     90000000],
        ['Alokasi Dana Desa',      30000000],
        ['Bagi Hasil Pajak',  20000000]
      ]);

    var options = {
        height:500,
    chartArea: { 'width': '100%', 'height': '90%' },
    legend: {'position':'top','alignment':'center'},
    pieSliceText: 'value-and-percentage'
    };

    var chart = new google.visualization.PieChart(document.getElementById('chartPiePendapatanDesa'));

    chart.draw(data, options);
}

function chartLinePendapatanDesa() {
    var data = google.visualization.arrayToDataTable([
        ['Bulan', 'Dana Desa', 'Alokasi Dana Desa', 'Bagi Hasil Pajak'],
        ['Jan',  37.8, 80.8, 41.8],
        ['Feb',  30.9, 69.5, 32.4],
        ['Mar',  25.4,   57, 25.7],
        ['Apr',  11.7, 18.8, 10.5],
        ['Mei',  11.9, 17.6, 10.4],
        ['Jun',   8.8, 13.6,  7.7],
        ['Jul',   7.6, 12.3,  9.6],
        ['Aug',  12.3, 29.2, 10.6],
        ['Sep',  16.9, 42.9, 14.8],
        ['Okt', 12.8, 30.9, 11.6],
        ['Nov',  5.3,  7.9,  4.7],
        ['Des',  6.6,  8.4,  5.2]
      ]);

      var options = {
          height: 500,
        legend: { position: 'bottom' },
        chartArea: { 'width': '75%', 'height': '80%' },
        hAxis: {
            baseline: 0,
            gridlines: {
                count: 6
            },
        },          
        vAxis: {
                baseline: 0,
            },
        };

      var chart = new google.visualization.LineChart(document.getElementById('chartLinePendapatanDesa'));

        chart.draw(data, options);
}