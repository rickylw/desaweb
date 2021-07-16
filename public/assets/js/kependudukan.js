google.charts.load('current', {'packages':['corechart', 'bar']});
google.charts.setOnLoadCallback(chartBerdasarkanGender);
google.charts.setOnLoadCallback(chartBerdasarkanUmur);
google.charts.setOnLoadCallback(chartBerdasarkanPendidikan);


$(window).resize(function(){
    chartBerdasarkanGender();
    chartBerdasarkanUmur();
    chartBerdasarkanPendidikan();
});
// Draw the chart and set the chart values
function chartBerdasarkanGender() {
    var data = google.visualization.arrayToDataTable([
        ['Gender', 'Persentase', { role: 'style' }],
        ['Perempuan', 60, '#f54e42'],            // RGB value
        ['Laki-Laki', 40, '#405cf7'],            // English color name
     ]);
    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                    { calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation" },
                    2]);
    var options = {
        hAxis: {
            minValue: 0,
            maxValue: 100
        },
        bar: {groupWidth: "70%"},
        legend: { position: "none" },
    };
                       

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.BarChart(document.getElementById('chartBerdasarkanGender'));
  chart.draw(data, options);
}

function chartBerdasarkanUmur() {
    var data = google.visualization.arrayToDataTable([
        ['Umur', 'Laki-Laki', 'Perempuan'],
        ['0-15', 1000, 400],
        ['15-25', 1170, 460],
        ['25-35', 660, 1120],
        ['35-45', 1030, 540],
        ['45-55', 1030, 540],
        ['55-65', 1030, 540],
        ['>65', 1030, 540]
      ]);

    var chart = new google.charts.Bar(document.getElementById('chartBerdasarkanUmur'));

    chart.draw(data);
}

function chartBerdasarkanPendidikan() {
    var data = google.visualization.arrayToDataTable([
        ['Pendidikan', 'Laki-Laki', 'Perempuan'],
        ['Belum Sekolah', 1000, 400],
        ['SD', 1170, 460],
        ['SMP', 660, 1120],
        ['SMA', 1030, 540],
        ['Perguruan Tinggi', 1030, 540],
        ['Tidak Diketahui', 1030, 540]
      ]);

    var chart = new google.charts.Bar(document.getElementById('chartBerdasarkanPendidikan'));

    chart.draw(data);
}