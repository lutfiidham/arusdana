<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h5>Laporan Arus Dana</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Laporan</li>
                    <li class="breadcrumb-item active" aria-current="page">Laporan Arus Dana</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card" id="tabel_card">
            <div class="card-header d-block">
                <h6 style="font-weight: bold;">Filter Berdasarkan:</h6>
                <div class="row">
                    <div class="col-md-3">
                        <label for="fl_tanggal">Tanggal</label>
                        <input type="text" class="form-control tgl_range" name="fl_tanggal" value="" id="fl_tanggal">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active show" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Semua</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Berdasar Unit Kerja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Berdasar Kategori</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active show" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                    <div class="card-body">
                        <div class="row clearfix">
                            <div class="col-lg-2">
                                <button type="button" title="Export to PDF" class="btn btn-danger btn-block" id="exportPDF1">Export PDF</button>
                            </div>
<!--                             <div class="col-lg-1" style="text-align:right; padding-top:7px">
                                Cari :
                            </div>
                            <div class="col-lg-9">
                                <input type="text" id="input_pencarian2" class="form-control pull-right" placeholder="ketik disini untuk mencari ...">
                            </div> -->
                        </div>
                        <div style="padding: 1%">
                            <table id="tabel1" class="table table-inverse table-hover" width="175%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Unit Kerja</th>
                                        <th>No Arus Dana</th>
                                        <th>Tanggal</th>
                                        <th>No Anggaran</th>
                                        <th>Kategori</th>
                                        <th>Anggaran</th>
                                        <th>Kegiatan</th>
                                        <th>Periode Pelaksanaan</th>
                                        <th>Catatan</th>
                                        <th>BBM</th>
                                        <th>Uraian</th>
                                        <th style="text-align: right;">Penerimaan</th>
                                        <th style="text-align: right;">Pengeluaran</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="font-weight: bold;text-align: right !important;" colspan="11"></th>
                                        <th style="font-weight: bold;text-align: left !important;">Total Keseluruhan:</th>
                                        <th style="font-weight: bold;text-align: right !important;" id="total_penerimaan1"></th>
                                        <th style="font-weight: bold;text-align: right !important;" id="total_pengeluaran1"></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th style="font-weight: bold;text-align: right !important;" colspan="11"></th>
                                        <th style="font-weight: bold;text-align: left !important;">Hasil (Pemasukan - Pengeluaran):</th>
                                        <th style="font-weight: bold;text-align: right !important;" id="totaltabel1"></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card-body">
                        <div class="row clearfix">
                            <div class="col-lg-2">
                                <button type="button" title="Export to PDF" class="btn btn-danger btn-block" id="exportPDF2">Export PDF</button>
                            </div>
<!--                             <div class="col-lg-1" style="text-align:right; padding-top:7px">
                                Cari :
                            </div>
                            <div class="col-lg-9">
                                <input type="text" id="input_pencarian2" class="form-control pull-right" placeholder="ketik disini untuk mencari ...">
                            </div> -->
                        </div>
                        <div style="padding: 1%">
                            <table id="tabel2" class="table table-inverse table-hover" width="175%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <!-- <th>Unit Kerja</th> -->
                                        <th>No Arus Dana</th>
                                        <th>Tanggal</th>
                                        <th>No Anggaran</th>
                                        <th>Kategori</th>
                                        <th>Anggaran</th>
                                        <th>Kegiatan</th>
                                        <th>Periode Pelaksanaan</th>
                                        <th>Catatan</th>
                                        <th>BBM</th>
                                        <th>Uraian</th>
                                        <th style="text-align: right;">Penerimaan</th>
                                        <th style="text-align: right;">Pengeluaran</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="font-weight: bold;text-align: right !important;" colspan="10"></th>
                                        <th style="font-weight: bold;text-align: left !important;">Total Keseluruhan:</th>
                                        <th style="font-weight: bold;text-align: right !important;" id="total_penerimaan2"></th>
                                        <th style="font-weight: bold;text-align: right !important;" id="total_pengeluaran2"></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th style="font-weight: bold;text-align: right !important;" colspan="10"></th>
                                        <th style="font-weight: bold;text-align: left !important;">Hasil (Pemasukan - Pengeluaran):</th>
                                        <th style="font-weight: bold;text-align: right !important;" id="totaltabel2"></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                    <div class="card-body">
                        <div class="row clearfix">
                            <div class="col-lg-2">
                                <button type="button" title="Export to PDF" class="btn btn-danger btn-block" id="exportPDF3">Export PDF</button>
                            </div>
<!--                             <div class="col-lg-1" style="text-align:right; padding-top:7px">
                                Cari :
                            </div>
                            <div class="col-lg-9">
                                <input type="text" id="input_pencarian2" class="form-control pull-right" placeholder="ketik disini untuk mencari ...">
                            </div> -->
                        </div>
                        <div style="padding: 1%">
                            <table id="tabel3" class="table table-inverse table-hover" width="175%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <!-- <th>Unit Kerja</th> -->
                                        <th>No Arus Dana</th>
                                        <th>Tanggal</th>
                                        <th>No Anggaran</th>
                                        <th>Unit Kerja</th>
                                        <th>Anggaran</th>
                                        <th>Kegiatan</th>
                                        <th>Periode Pelaksanaan</th>
                                        <th>Catatan</th>
                                        <th>BBM</th>
                                        <th>Uraian</th>
                                        <th style="text-align: right;">Penerimaan</th>
                                        <th style="text-align: right;">Pengeluaran</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="font-weight: bold;text-align: right !important;" colspan="10"></th>
                                        <th style="font-weight: bold;text-align: left !important;">Total Keseluruhan:</th>
                                        <th style="font-weight: bold;text-align: right !important;" id="total_penerimaan3"></th>
                                        <th style="font-weight: bold;text-align: right !important;" id="total_pengeluaran3"></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th style="font-weight: bold;text-align: right !important;" colspan="10"></th>
                                        <th style="font-weight: bold;text-align: left !important;">Hasil (Pemasukan - Pengeluaran):</th>
                                        <th style="font-weight: bold;text-align: right !important;" id="totaltabel3"></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var mys;
    var form_validator;
    var settings_tabel;
    var tabel1 = $("#tabel1");
    var tabel2 = $("#tabel2");
    var tabel3 = $("#tabel3");


    $(document).ready(function() {
        mys = Object.create(myscript_js);
        mys.init('<?= base_url() ?>');

        load_tabel1();
        load_tabel2();
        load_tabel3();

        $('#input_pencarian').on('keyup', function(event) {
            var tabel = $('#tabel');
            tabel.dataTable().fnFilter($(this).val());
        });

        $('#fl_tanggal').on('change', function(event) {
            mys.blok();
            // $('#tabel').DataTable().ajax.url(mys.base_url + 'arusdana/get_data_laporan?tanggal=' + $(this).val()).load();
            load_tabel1();
            load_tabel2();
            load_tabel3();
            mys.unblok();
        });

        $('#exportPDF1').on('click', function(event) {
            var tanggal = $('#fl_tanggal').val();
            var jendela = window.open( "", "Print", 'width=800,height=700,status=yes,toolbar=no,menubar=no, titlebar=yes,re sizable=yes,location=no,scrollbars=yes' );
            var form = "<input type='hidden' name='tanggal' value='"+tanggal+"'>";
            $(jendela.document.body).html('<form id="form_redirect" action="'+mys.base_url+'arusdana/export_pdf" method="POST">'+form+'</form>');
            $(jendela.document).find('#form_redirect').submit();
        });

        $('#exportPDF2').on('click', function(event) {
            var tanggal = $('#fl_tanggal').val();
            var jendela = window.open( "", "Print", 'width=800,height=700,status=yes,toolbar=no,menubar=no, titlebar=yes,re sizable=yes,location=no,scrollbars=yes' );
            var form = "<input type='hidden' name='tanggal' value='"+tanggal+"'>";
            $(jendela.document.body).html('<form id="form_redirect" action="'+mys.base_url+'arusdana/export_pdf_by_unit_kerja" method="POST">'+form+'</form>');
            $(jendela.document).find('#form_redirect').submit();
        });

        $('#exportPDF3').on('click', function(event) {
            var tanggal = $('#fl_tanggal').val();
            var jendela = window.open( "", "Print", 'width=800,height=700,status=yes,toolbar=no,menubar=no, titlebar=yes,re sizable=yes,location=no,scrollbars=yes' );
            var form = "<input type='hidden' name='tanggal' value='"+tanggal+"'>";
            $(jendela.document.body).html('<form id="form_redirect" action="'+mys.base_url+'arusdana/export_pdf3" method="POST">'+form+'</form>');
            $(jendela.document).find('#form_redirect').submit();
        });
    });

    function load_tabel1() {
        mys.blok()
        $.ajax({
            url: mys.base_url+'arusdana/laporan',
            type: 'GET',
            dataType: 'JSON',
            data: {
                tanggal: $('#fl_tanggal').val()
            },
            success: function(data){
                // tabel1.DataTable().destroy();
                $('#tabel1 tbody').empty();
                $('#tabel1 tbody').html(data.tbody);
                $('#totaltabel1').text(data.grandtotal)
                $('#total_penerimaan1').text(data.total_penerimaan)
                $('#total_pengeluaran1').text(data.total_pengeluaran)
                // tabel2.dataTable(settings_tabel);
            },
            error:function(data){
                mys.notifikasi("Gagal Mengambil data dari server","error");
            }
        })
        .always(function() {
            mys.unblok();
        });
    }

    function load_tabel2() {
        mys.blok()
        $.ajax({
            url: mys.base_url+'arusdana/laporan_group_by_unit_kerja',
            type: 'GET',
            dataType: 'JSON',
            data: {
                tanggal: $('#fl_tanggal').val()
            },
            success: function(data){
                // tabel2.DataTable().destroy();
                $('#tabel2 tbody').empty();
                $('#tabel2 tbody').html(data.tbody);
                $('#totaltabel2').text(data.grandtotal)
                $('#total_penerimaan2').text(data.total_penerimaan)
                $('#total_pengeluaran2').text(data.total_pengeluaran)
                // tabel2.dataTable(settings_tabel);
            },
            error:function(data){
                mys.notifikasi("Gagal Mengambil data dari server","error");
            }
        })
        .always(function() {
            mys.unblok();
        });
    }

    function load_tabel3() {
        mys.blok()
        $.ajax({
            url: mys.base_url+'arusdana/laporan_group_by_kategori',
            type: 'GET',
            dataType: 'JSON',
            data: {
                tanggal: $('#fl_tanggal').val()
            },
            success: function(data){
                // tabel2.DataTable().destroy();
                $('#tabel3 tbody').empty();
                $('#tabel3 tbody').html(data.tbody);
                $('#totaltabel3').text(data.grandtotal)
                $('#total_penerimaan3').text(data.total_penerimaan)
                $('#total_pengeluaran3').text(data.total_pengeluaran)
                // tabel2.dataTable(settings_tabel);
            },
            error:function(data){
                mys.notifikasi("Gagal Mengambil data dari server","error");
            }
        })
        .always(function() {
            mys.unblok();
        });
    }

    // function load_tabel1() {
    //     mys.blok()
    //     $.ajax({
    //         url: mys.base_url+'arusdana/laporan_group_by_unit_kerja',
    //         type: 'GET',
    //         dataType: 'JSON',
    //         data: {
    //             tanggal: $('#fl_tanggal').val()
    //         },
    //         success: function(data){
    //             // tabel2.DataTable().destroy();
    //             $('#tabel1 tbody').empty();
    //             $('#tabel1 tbody').html(data.tbody);
    //             $('#totaltabel1').text(data.grandtotal)
    //             $('#total_penerimaan').text(data.total_penerimaan)
    //             $('#total_pengeluaran').text(data.total_pengeluaran)
    //             // tabel2.dataTable(settings_tabel);
    //         },
    //         error:function(data){
    //             mys.notifikasi("Gagal Mengambil data dari server","error");
    //         }
    //     })
    //     .always(function() {
    //         mys.unblok();
    //     });
    // }


</script>