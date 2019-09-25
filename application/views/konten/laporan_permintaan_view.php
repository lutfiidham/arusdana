<style>
table.dataTable tbody td.dt-center {
    text-align: center;
}
table.dataTable tbody td.dt-right {
    text-align: right;
}
.no-pointer {
    cursor: none;
}
</style>
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h5>Laporan Permintaan Anggaran</h5>
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
                    <li class="breadcrumb-item active" aria-current="page">Permintaan Anggaran</li>
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
                                <button type="button" title="Export to PDF" class="btn btn-danger btn-block" id="exportPDF">Export PDF</button>
                            </div>
                            <div class="col-lg-1" style="text-align:right; padding-top:7px">
                                Cari :
                            </div>
                            <div class="col-lg-9">
                                <input type="text" id="input_pencarian" class="form-control pull-right" placeholder="ketik disini untuk mencari ...">
                            </div>
                        </div>
                        <div style="padding: 1%">
                            <table id="tabel" class="table table-inverse table-hover" width="175%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No Anggaran</th>
                                        <th>Tanggal</th>
                                        <th>Unit Kerja</th>
                                        <th>Kategori</th>
                                        <th>Anggaran</th>
                                        <th>Kegiatan</th>
                                        <th>Tgl Butuh</th>
                                        <th>Catatan</th>
                                        <th>Realisasi</th>
                                        <th>Uraian</th>
                                        <th>Nominal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="font-weight: bold;text-align: right !important;" colspan="11">Total:</th>
                                        <th style="font-weight: bold;text-align: right !important;"></th>
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
                                        <th>No Anggaran</th>
                                        <th>Tanggal</th>
                                        <th>Kategori</th>
                                        <th>Anggaran</th>
                                        <th>Kegiatan</th>
                                        <th>Tgl Butuh</th>
                                        <th>Catatan</th>
                                        <th>Realisasi</th>
                                        <th>Uraian</th>
                                        <th style="text-align: right;">Nominal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="font-weight: bold;text-align: right !important;" colspan="10" >Total:</th>
                                        <th style="font-weight: bold;text-align: right !important;" id="totaltabel2"></th>
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
                                        <th>No Anggaran</th>
                                        <th>Tanggal</th>
                                        <th>Unit Kerja</th>
                                        <th>Anggaran</th>
                                        <th>Kegiatan</th>
                                        <th>Tgl Butuh</th>
                                        <th>Catatan</th>
                                        <th>Realisasi</th>
                                        <th>Uraian</th>
                                        <th style="text-align: right;">Nominal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="font-weight: bold;text-align: right !important;" colspan="10">Total:</th>
                                        <th style="font-weight: bold;text-align: right !important;" id="totaltabel3"></th>
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
    var tabel2 = $("#tabel2");

    $(document).ready(function() {
        mys = Object.create(myscript_js);
        mys.init('<?= base_url() ?>');
        // settings_tabel = {
        //     "scrollCollapse": true,
        //     "sDom": "t<'row'<'col-md-4'i><'col-md-8'p>>",
        //     "processing": true,
        //     "iDisplayLength": 10,
        //     "paging": false,
        //     "scrollX":true,
        //     "language": {
        //         "url": mys.base_url+"assets/plugins/datatables.net/lang/Indonesian.json"
        //     },
        //     "footerCallback": function(row, data, start, end, display){
        //         var api = this.api(), data;

        //         var intVal = function ( i ) {
        //             return typeof i === 'string' ?
        //                 i.replace(/[\$,]/g, '')*1 :
        //                 typeof i === 'number' ?
        //                     i : 0;
        //         };

        //         total = api
        //         .column( 10 )
        //         .data()
        //         .reduce( function (a, b) {
        //             return intVal(a) + intVal(b);
        //         }, 0 );


        //         $( api.column( 10 ).footer() ).html(mys.formatMoney(total,0,',','.'));
        //     }
        // };
        // tabel2.DataTable(settings_tabel);

        $('#tabel').dataTable({
            "scrollCollapse": true,
            "sDom": "t<'row'<'col-md-4'i><'col-md-8'p>>",
            "processing": true,
            "iDisplayLength": 10,
            "paging": false,
            "scrollX":true,
            "ajax":{
                url : mys.base_url+'permintaan_anggaran/get_data_laporan?tanggal='+$('#fl_tanggal').val(),
                type : 'GET',
            },
            "language": {
                "url": mys.base_url+"assets/plugins/datatables.net/lang/Indonesian.json"
            },
            "rowsGroup":[0,1,2,3,4,5,6,7,8,9],
            "columnDefs": [
            {"visible" : false, "targets" : []},
            {"className": "dt-right", "targets": [11]},
            {
                "render": function ( data, type, row ) {
                   if (type=='sort') {
                        return data;
                    } else{
                        return mys.toDate(data);
                    }
                },
                "targets": [2,7]
            },
            {
                "render": function ( data, type, row ) {
                   if (type=='sort') {
                        return data;
                    } else{
                        return mys.formatMoney(data,0,',','.');
                    }
                },
                "targets": [11]
            },
            ],
            "aoColumns": [
            {"sWidth": "2%"},
            {"sWidth": "15%"},
            {"sWidth": "10%"},
            {"sWidth": "15%"},
            {"sWidth": "15%"},
            {"sWidth": "15%"},
            {"sWidth": "15%"},
            {"sWidth": "15%"},
            {"sWidth": "15%"},
            {"sWidth": "15%"},
            {"sWidth": "15%"},
            {"sWidth": "15%"},
            {"sWidth": "15%"},
            ],
            "order" : [
            [0, "asc"],
            ],
            "fnDrawCallback" : function(oSettings){
                $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });
            },
            "footerCallback": function(row, data, start, end, display){
                var api = this.api(), data;

                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };

                total = api
                .column( 11 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


                $( api.column( 11 ).footer() ).html(mys.formatMoney(total,0,',','.'));
            }

        });

        load_tabel2();
        load_tabel3();



        $('#input_pencarian').on('keyup', function(event) {
            var tabel = $('#tabel');
            tabel.dataTable().fnFilter($(this).val());
        });

        $('#input_pencarian2').on('keyup', function(event) {
            tabel2.dataTable().fnFilter($(this).val());
        });

        $('#fl_tanggal').on('change', function(event) {
            mys.blok();
            $('#tabel').DataTable().ajax.url(mys.base_url + 'permintaan_anggaran/get_data_laporan?tanggal=' + $(this).val()).load();
            load_tabel2();
            load_tabel3();
            mys.unblok();
        });

        $('#exportPDF').on('click', function(event) {
            var tanggal = $('#fl_tanggal').val();
            var jendela = window.open( "", "Print", 'width=800,height=700,status=yes,toolbar=no,menubar=no, titlebar=yes,re sizable=yes,location=no,scrollbars=yes' );
            var form = "<input type='hidden' name='tanggal' value='"+tanggal+"'>";
            $(jendela.document.body).html('<form id="form_redirect" action="'+mys.base_url+'permintaan_anggaran/export_pdf" method="POST">'+form+'</form>');
            $(jendela.document).find('#form_redirect').submit();
        });

        
    });

    function load_tabel2() {
        mys.blok()
        $.ajax({
            url: mys.base_url+'permintaan_anggaran/laporan_group_by_unit_kerja',
            type: 'GET',
            dataType: 'JSON',
            data: {
                tanggal: $('#fl_tanggal').val()
            },
            success: function(data){
                // tabel2.DataTable().destroy();
                $('#tabel2 tbody').empty();
                $('#tabel2 tbody').html(data.tbody);
                $('#totaltabel2').text(data.totalfooter)
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
            url: mys.base_url+'permintaan_anggaran/laporan_group_by_kategori',
            type: 'GET',
            dataType: 'JSON',
            data: {
                tanggal: $('#fl_tanggal').val()
            },
            success: function(data){
                // tabel2.DataTable().destroy();
                $('#tabel3 tbody').empty();
                $('#tabel3 tbody').html(data.tbody);
                $('#totaltabel3').text(data.totalfooter)
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


</script>