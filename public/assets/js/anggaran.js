google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(chartPiePendapatanDesa);
google.charts.setOnLoadCallback(chartLinePendapatanDesa);
google.charts.setOnLoadCallback(chartPieBelanjaDesa);
google.charts.setOnLoadCallback(chartLineBelanjaDesa);


$(window).resize(function(){
    chartPiePendapatanDesa();
    chartLinePendapatanDesa();
    chartPieBelanjaDesa();
    chartLineBelanjaDesa();
});

function chartPiePendapatanDesa() {
    var data = google.visualization.arrayToDataTable([
        ['Pendapatan Desa', 'Rupiah'],
        ['D',     90000000],
        ['A',      30000000],
        ['B',  20000000]
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
    var bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    var tahunAnggaran = document.getElementById("btnTahunAnggaran").innerText;
    var kategoriAnggaran = JSON.parse($('#kategoriAnggaran').val());
    var detailAnggaran = JSON.parse($('#detailAnggaran').val());
    var filteredDetailAnggaran = detailAnggaran.filter(detail => detail.tahun_anggaran == tahunAnggaran);
    
    var data = [];
    var kategori = ['Bulan'];

    kategoriAnggaran.forEach((element) => {
        kategori.push(element['nama']);
    });

    for(let i = 0; i < bulan.length; i++){
        var filterByMonth = filteredDetailAnggaran.filter(detail => detail.bulan == i+1);
        var tmp = [];
        tmp.push(bulan[i])
        for(let j = 0; j < kategoriAnggaran.length; j++){
            var anggaranByKategori = filterByMonth.filter(detail => detail.id_kategori_anggaran == kategoriAnggaran[j]['id']);
            if(anggaranByKategori.length > 0){
                tmp.push(parseInt(anggaranByKategori[0]['jumlah']));
            }
            else{
                tmp.push(0);
            }
        }
        data.push(tmp);
    }

    var dataChart = google.visualization.arrayToDataTable([
        kategori,
        data[0]
      ]);

    data.forEach((value, index) => {
    if (index < 1) return;
    dataChart.addRow(value);
    });

    var options = {
        height: 500,
    legend: { position: 'bottom' },
    chartArea: { 'width': '90%', 'height': '80%' },
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

    chart.draw(dataChart, options);
}

function chartPieBelanjaDesa() {
    var data = google.visualization.arrayToDataTable([
        ['Pendapatan Desa', 'Rupiah'],
        ['Pemberdayaan Masyarakat',     90000000],
        ['Pembinaan Kemasyarakatan',      30000000],
        ['Pelaksanaan Pembangunan Desa',  20000000],
        ['Penyelenggaraan Pemerintahan Desa',     90000000],
        ['Bidang Tidak Terduga',      30000000]
      ]);

    var options = {
        height:500,
    chartArea: { 'width': '100%', 'height': '70%' },
    legend: {'position':'top','alignment':'center', maxLines: 3}
    };

    var chart = new google.visualization.PieChart(document.getElementById('chartPieBelanjaDesa'));

    chart.draw(data, options);
}

function chartLineBelanjaDesa() {
    var data = google.visualization.arrayToDataTable([
        ['Bulan', 'Pemberdayaan Masyarakat', 'Pembinaan Kemasyarakatan', 'Pelaksanaan Pembangunan Desa', 'Penyelenggaraan Pemerintahan Desa', 'Bidang Tidak Terduga'],
        ['Jan',  37.8, 80.8, 41.8, 87.8, 22.8],
        ['Feb',  30.9, 69.5, 32.4, 50.8, 51.8],
        ['Mar',  25.4,   57, 25.7, 20.8, 57.8],
        ['Apr',  11.7, 18.8, 10.5, 75.8, 48.8],
        ['Mei',  11.9, 17.6, 10.4, 56.8, 25.8],
        ['Jun',   8.8, 13.6,  7.7, 21.8, 31.8],
        ['Jul',   7.6, 12.3,  9.6, 52.8, 63.8],
        ['Aug',  12.3, 29.2, 10.6, 36.8, 88.8],
        ['Sep',  16.9, 42.9, 14.8, 59.8, 57.8],
        ['Okt', 12.8, 30.9, 11.6, 47.8, 47.8],
        ['Nov',  5.3,  7.9,  4.7, 71.8, 52.8],
        ['Des',  6.6,  8.4,  5.2, 51.8, 20.8]
      ]);

      var options = {
          height: 500,
        legend: { position: 'bottom' },
        chartArea: { 'width': '90%', 'height': '80%' },
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

      var chart = new google.visualization.LineChart(document.getElementById('chartLineBelanjaDesa'));

        chart.draw(data, options);
}