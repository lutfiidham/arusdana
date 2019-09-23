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
                <h6>Grafik Arus Dana Anggaran</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 offset-10">
                        <label for="fl_tahun">Tahun:</label>
                        <input type="text" name="fl_tahun" id="fl_tahun" class="form-control tahun" data-target="#fl_tahun" value="<?= date('Y') ?>" >
                    </div>
                </div>
                <div class="row">
                    
                </div>
                <canvas id="chart_arus_dana" width="auto" height="auto"></canvas>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var mys;
    var chart_arus_dana;
    var ctx = {};
    var data_graf = {};
    $(document).ready(function() {
        mys = Object.create(myscript_js);
        mys.init('<?= base_url() ?>');

        ctx.chart_arus_dana = $('#chart_arus_dana');

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

    function load_grafik(){
        mys.blok();
        $.ajax({
            url: mys.base_url+'home/load_data_grafik',
            type: 'POST',
            data:{
                tahun : $('#fl_tahun').val()
            },
            dataType: 'JSON',
            success: function(data){
                destroy_chart();
                reset_data();
                if (data.length>0) {
                    let data_anggaran = {
                        label : 'Anggaran',
                        borderColor: 'rgb(17, 205, 239)',
                        borderWidth: 1,
                        backgroundColor: 'rgb(17, 205, 239)',
                        data: []
                    };
                    let data_pendapatan = {
                        label : 'Pendapatan',
                        borderColor: 'rgb(45,206,137)',
                        borderWidth: 1,
                        backgroundColor: 'rgb(45,206,137)',
                        data: []
                    };
                    let data_biaya = {
                        label : 'Biaya',
                        borderColor: 'rgb(245,54,92)',
                        borderWidth: 1,
                        backgroundColor: 'rgb(245,54,92)',
                        data: []
                    };

                    $.each(data, function(index, val) {
                        data_graf.chart_arus_dana.labels.push(val.nama_anggaran);
                        data_anggaran.data.push(val.anggaran);
                        data_pendapatan.data.push(val.pendapatan);
                        data_biaya.data.push(val.biaya);
                    });

                    data_graf.chart_arus_dana.datasets.push(data_anggaran);
                    data_graf.chart_arus_dana.datasets.push(data_pendapatan);
                    data_graf.chart_arus_dana.datasets.push(data_biaya);

                    chart_arus_dana = new Chart(ctx.chart_arus_dana, {
                        type: 'horizontalBar',
                        data: data_graf.chart_arus_dana,
                        options: {
                            legend:{
                                position : 'bottom',
                            },
                            elements: {
                                rectangle: {
                                    borderWidth: 2,
                                }
                            },
                            tooltips: {
                                mode: 'index',
                                intersect: false
                            },
                            responsive: true,
                            tooltips: {
                        },

                        }
                    });
                }
            },
            error:function(data){
                mys.notifikasi("Gagal Ambil Data.","error");
            }
        }).always(function(){
            mys.unblok();
        });
    }

    function destroy_chart() {
        if (chart_arus_dana) {
            chart_arus_dana.destroy();
        }

    }

    function reset_data() {
        data_graf.chart_arus_dana = {
            labels: [],
            datasets:[]
        };
    }
</script>
