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
    var totalLakiLaki = parseInt($('#totalLakiLaki').val());
    var totalPerempuan = parseInt($('#totalPerempuan').val());
    var data = google.visualization.arrayToDataTable([
        ['Gender', 'Persentase', { role: 'style' }],
        ['Perempuan', totalPerempuan, '#f54e42'],        
        ['Laki-Laki', totalLakiLaki, '#405cf7'],   
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
                       
  var chart = new google.visualization.BarChart(document.getElementById('chartBerdasarkanGender'));
  chart.draw(data, options);
}

function chartBerdasarkanUmur() {
    var kependudukan = JSON.parse($('#kependudukan').val());
    var data = google.visualization.arrayToDataTable([
        ['Umur', 'Laki-Laki', 'Perempuan'],
        ['0-15', kependudukan['laki_15'], kependudukan['perempuan_15']],
        ['15-25', kependudukan['laki_25'], kependudukan['perempuan_25']],
        ['25-35', kependudukan['laki_35'], kependudukan['perempuan_35']],
        ['35-45', kependudukan['laki_45'], kependudukan['perempuan_45']],
        ['45-55', kependudukan['laki_55'], kependudukan['perempuan_55']],
        ['55-65', kependudukan['laki_65'], kependudukan['perempuan_65']],
        ['>65', kependudukan['laki_atas'], kependudukan['perempuan_atas']]
      ]);

    var chart = new google.charts.Bar(document.getElementById('chartBerdasarkanUmur'));

    chart.draw(data);
}

function chartBerdasarkanPendidikan() {
    var pendidikan = JSON.parse($('#pendidikan').val());
    var data = google.visualization.arrayToDataTable([
        ['Pendidikan', 'Laki-Laki', 'Perempuan'],
        ['Belum Sekolah', pendidikan['laki_belum_sekolah'], pendidikan['perempuan_belum_sekolah']],
        ['SD', pendidikan['laki_tamat_sd'], pendidikan['perempuan_tamat_sd']],
        ['SMP', pendidikan['laki_tamat_smp'], pendidikan['perempuan_tamat_smp']],
        ['SMA', pendidikan['laki_tamat_sma'], pendidikan['perempuan_tamat_sma']],
        ['Perguruan Tinggi', pendidikan['laki_tamat_pt'], pendidikan['perempuan_tamat_pt']],
        ['Tidak Diketahui', pendidikan['laki_tidak_diketahui'], pendidikan['perempuan_tidak_diketahui']]
      ]);

    var chart = new google.charts.Bar(document.getElementById('chartBerdasarkanPendidikan'));

    chart.draw(data);
}