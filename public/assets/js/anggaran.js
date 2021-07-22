google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(chartPiePendapatanDesa);
google.charts.setOnLoadCallback(chartLinePendapatanDesa);
google.charts.setOnLoadCallback(chartPieBelanjaDesa);
google.charts.setOnLoadCallback(chartLineBelanjaDesa);

$(function(){
    $('#dropdown-tahun-anggaran li a').on("click", function(){
        $('#btnTahunAnggaran').html($(this).html());
        chartPiePendapatanDesa();
        chartLinePendapatanDesa();
        chartPieBelanjaDesa();
        chartLineBelanjaDesa();
        changeAPBD();
    });
})


$(window).resize(function(){
    chartPiePendapatanDesa();
    chartLinePendapatanDesa();
    chartPieBelanjaDesa();
    chartLineBelanjaDesa();
});

function chartPiePendapatanDesa() {
    var tahunAnggaran = document.getElementById("btnTahunAnggaran").innerText;
    var kategoriAnggaran = JSON.parse($('#kategoriAnggaran').val());
    var detailAnggaran = JSON.parse($('#detailAnggaran').val());
    var filteredDetailAnggaran = detailAnggaran.filter(detail => detail.tahun_anggaran == tahunAnggaran);

    var data = [];

    kategoriAnggaran.forEach((element) => {
        var filteredByKategori = filteredDetailAnggaran.filter(detail => detail.id_kategori_anggaran == element['id']);
        var tmpSum = 0;
        filteredByKategori.forEach((element) => {
            tmpSum += parseFloat(element['jumlah']);
        });
        data.push([element['nama'], tmpSum]);
    });

    var dataChart = google.visualization.arrayToDataTable([
        ['Pendapatan Desa', 'Rupiah'],
        data[0]
    ]);

    data.forEach((value, index) => {
    if (index < 1) return;
    dataChart.addRow(value);
    });

    var options = {
        height:500,
    chartArea: { 'width': '100%', 'height': '90%' },
    legend: {'position':'top','alignment':'center'},
    pieSliceText: 'value-and-percentage'
    };

    var chart = new google.visualization.PieChart(document.getElementById('chartPiePendapatanDesa'));

    chart.draw(dataChart, options);
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
    var tahunAnggaran = document.getElementById("btnTahunAnggaran").innerText;
    var kategoriBelanjaDesa = JSON.parse($('#kategoriBelanjaDesa').val());
    var detailBelanjaDesa = JSON.parse($('#detailBelanjaDesa').val());
    var filteredDetailBelanjaDesa = detailBelanjaDesa.filter(detail => detail.tahun_anggaran == tahunAnggaran);

    var data = [];

    kategoriBelanjaDesa.forEach((element) => {
        var filteredByKategori = filteredDetailBelanjaDesa.filter(detail => detail.id_kategori_belanja_desa == element['id']);
        var tmpSum = 0;
        filteredByKategori.forEach((element) => {
            tmpSum += parseFloat(element['jumlah']);
        });
        data.push([element['nama'], tmpSum]);
    });

    var dataChart = google.visualization.arrayToDataTable([
        ['Belanja Desa Desa', 'Rupiah'],
        data[0]
    ]);

    data.forEach((value, index) => {
    if (index < 1) return;
    dataChart.addRow(value);
    });

    var options = {
        height:500,
    chartArea: { 'width': '100%', 'height': '70%' },
    legend: {'position':'top','alignment':'center', maxLines: 3}
    };

    var chart = new google.visualization.PieChart(document.getElementById('chartPieBelanjaDesa'));

    chart.draw(dataChart, options);
}

function chartLineBelanjaDesa() {
    var bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    var tahunAnggaran = document.getElementById("btnTahunAnggaran").innerText;
    var kategoriBelanjaDesa = JSON.parse($('#kategoriBelanjaDesa').val());
    var detailBelanjaDesa = JSON.parse($('#detailBelanjaDesa').val());
    var filteredDetailBelanjaDesa = detailBelanjaDesa.filter(detail => detail.tahun_anggaran == tahunAnggaran);
    
    var data = [];
    var kategori = ['Bulan'];

    kategoriBelanjaDesa.forEach((element) => {
        kategori.push(element['nama']);
    });

    for(let i = 0; i < bulan.length; i++){
        var filterByMonth = filteredDetailBelanjaDesa.filter(detail => detail.bulan == i+1);
        var tmp = [];
        tmp.push(bulan[i])
        for(let j = 0; j < kategoriBelanjaDesa.length; j++){
            var belanjaByKategori = filterByMonth.filter(detail => detail.id_kategori_belanja_desa == kategoriBelanjaDesa[j]['id']);
            if(belanjaByKategori.length > 0){
                tmp.push(parseInt(belanjaByKategori[0]['jumlah']));
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

      var chart = new google.visualization.LineChart(document.getElementById('chartLineBelanjaDesa'));

        chart.draw(dataChart, options);
}

function changeAPBD(){
    var tahunAnggaran = document.getElementById("btnTahunAnggaran").innerText;
    var anggaran = JSON.parse($('#anggaran').val());

    var filteredAnggaran = anggaran.filter(anggaran => anggaran.tahun_anggaran == tahunAnggaran);

    $('#anggaranPendapatan').html(
        "Rp" + number_format(filteredAnggaran[0]["anggaran_pendapatan"])
    );
    $('#realisasiPendapatan').html(
        "Rp" + number_format(filteredAnggaran[0]["realisasi_pendapatan"])
    );
    $('#realisasiBelanja').html(
        "Rp" + number_format(filteredAnggaran[0]["realisasi_belanja"])
    );

    console.log(filteredAnggaran[0])
}

function number_format (number, decimals, decPoint, thousandsSep) { 
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
    var n = !isFinite(+number) ? 0 : +number
    var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
    var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
    var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
    var s = ''

    var toFixedFix = function (n, prec) {
    var k = Math.pow(10, prec)
    return '' + (Math.round(n * k) / k)
        .toFixed(prec)
    }

    // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
    if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
    }
    if ((s[1] || '').length < prec) {
    s[1] = s[1] || ''
    s[1] += new Array(prec - s[1].length + 1).join('0')
    }

    return s.join(dec)
}