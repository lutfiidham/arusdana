<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>"><i class="ik ik-home"></i></a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-12 col-lg-6">
        <div class="widget">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h5 id="hari_tanggal">Sedang memuat informasi tanggal...</h5>
                        <h2 id="jam">Sedang memuat informasi jam...</h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-clock"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
        <div class="widget">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h5>Selamat Datang,</h5>
                        <h2><?= $this->session->userdata('nama'); ?></h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-user"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card" id="grafik_card">
            <div class="card-header">
                <h6 class="col-md-10">Grafik Arus Dana Anggaran</h6>
                <div class="col-md-2">
                    <label for="fl_tahun">Tahun:</label>
                    <input type="text" name="fl_tahun" id="fl_tahun" class="form-control tahun" data-target="#fl_tahun" value="<?= date('Y') ?>" >
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="widget" >
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>Total Anggaran</h6>
                                        <h2 id="total_anggaran">3</h2>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-dollar-sign text-info"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="widget" >
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>Total Pendapatan</h6>
                                        <h2 id="total_pendapatan">3</h2>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-wallet text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="widget" >
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>Total Biaya</h6>
                                        <h2 id="total_biaya">3</h2>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-file-invoice-dollar text-danger"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="bar_chart" class="chart-shadow" style="height:2000px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var mys;
    var chart;
    $(document).ready(function() {
        mys = Object.create(myscript_js);
        mys.init('<?= base_url() ?>');
        am4core.useTheme(am4themes_animated);

        // ctx.chart_arus_dana = $('#chart_arus_dana');
        load_grafik();

        $('#hari_tanggal').text(moment().format('dddd, DD MMMM YYYY'));
        $('#jam').text(moment().format('HH:mm:ss'));

        setInterval(function(){
            $('#jam').text(moment().format('HH:mm:ss'));
        }, 1000);

        $('#fl_tahun').on('change.datetimepicker', function(event) {
            load_grafik();
        });




    });

    function load_grafik() {
        mys.blok()
        $.ajax({
            url: mys.base_url+'home/load_data_grafik',
            type: 'POST',
            dataType: 'JSON',
            data: {
                tahun: $('#fl_tahun').val()
            },
            success: function(data){
                chart = am4core.create("bar_chart", am4charts.XYChart);
                // Add data
                chart.data = [];
                let total = {};
                    total.anggaran = 0;
                    total.pendapatan = 0;
                    total.biaya = 0;
                $.each(data, function(index, val) {
                    let obj = {};
                        obj["nama"] = val.nama_anggaran;
                        obj["anggaran"] = val.anggaran;
                        obj["pendapatan"] = val.pendapatan;
                        obj["biaya"] = val.biaya;
                    total.anggaran      += parseInt(val.anggaran);
                    total.pendapatan    += parseInt(val.pendapatan);
                    total.biaya         += parseInt(val.biaya);
                    chart.data.push(obj);
                });

                // Create axes
                var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
                categoryAxis.dataFields.category = "nama";
                categoryAxis.numberFormatter.numberFormat = "#,###";
                categoryAxis.renderer.inversed = true;
                categoryAxis.renderer.grid.template.location = 0;
                categoryAxis.renderer.cellStartLocation = 0.1;
                categoryAxis.renderer.cellEndLocation = 0.9;

                var  valueAxis = chart.xAxes.push(new am4charts.ValueAxis()); 
                valueAxis.renderer.opposite = true;
                chart.cursor = new am4charts.XYCursor();

                // Create series
                createSeries("anggaran", "Anggaran","#11cdef");
                createSeries("pendapatan", "Pendapatan","#2dce89");
                createSeries("biaya", "Biaya","#f5365c");

                $('#total_anggaran').text(mys.formatMoney(total.anggaran, 0, ',', '.'));
                $('#total_pendapatan').text(mys.formatMoney(total.pendapatan, 0, ',', '.'));
                $('#total_biaya').text(mys.formatMoney(total.biaya, 0, ',', '.'));
            },
            error:function(data){
                mys.notifikasi("Gagal Mengambil data dari server","error");
            }
        })
        .always(function() {
            mys.unblok();
        });
    }

    function createSeries(field, name, color="") {
      var series = chart.series.push(new am4charts.ColumnSeries());
      series.dataFields.valueX = field;
      series.dataFields.categoryY = "nama";
      series.name = name;
      series.columns.template.tooltipText = "{name}: [bold]{valueX}[/]";
      series.columns.template.height = am4core.percent(100);
      series.sequencedInterpolation = true;
      series.fill = am4core.color(color);
      series.stroke = am4core.color(color);

      var valueLabel = series.bullets.push(new am4charts.LabelBullet());
      // valueLabel.label.text = "{valueX}";
      valueLabel.label.horizontalCenter = "left";
      valueLabel.label.dx = 10;
      valueLabel.label.hideOversized = false;
      valueLabel.label.truncate = false;

      var categoryLabel = series.bullets.push(new am4charts.LabelBullet());
      // categoryLabel.label.text = "{name}";
      categoryLabel.label.horizontalCenter = "right";
      categoryLabel.label.dx = -10;
      categoryLabel.label.fill = am4core.color("#fff");
      categoryLabel.label.hideOversized = false;
      categoryLabel.label.truncate = false;
    }

    function sum_array(total, num) {
        return parseInt(total) + parseInt(num);
    }

</script>

