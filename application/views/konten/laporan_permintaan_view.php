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
            <div class="card-body">
                <div class="row clearfix">
                    <div class="col-lg-1" style="text-align:right; padding-top:7px">
                        Cari :
                    </div>
                    <div class="col-lg-11">
                        <input type="text" id="input_pencarian" class="form-control pull-right" placeholder="ketik disini untuk mencari ...">
                    </div>
                </div>
                <div style="padding: 1%">
                    <table id="tabel" class="table table-inverse table-hover" width="175%">
                        <thead>
                            <tr>
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
                                <th style="font-weight: bold;text-align: center;" colspan="10">Total:</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-6">
                        <span style="font-weight: bold">Export Data: </span>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" title="Export to PDF" class="btn btn-danger" id="exportPDF">PDF</button>
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

    $(document).ready(function() {
        mys = Object.create(myscript_js);
        mys.init('<?= base_url() ?>');

        $('#tabel').dataTable({
            "scrollCollapse": true,
            "sDom": "t<'row'<'col-md-4'i><'col-md-8'p>>",
            "processing": true,
            "iDisplayLength": 10,
            "scrollX":true,
            "ajax":{
                url : mys.base_url+'permintaan_anggaran/get_data_laporan',
                type : 'GET',
            },
            "language": {
                "url": mys.base_url+"assets/plugins/datatables.net/lang/Indonesian.json"
            },
            "rowsGroup":[0,1,2,3,4,5,6,7,8],
            "columnDefs": [
            {"visible" : false, "targets" : []},
            {
                "render": function ( data, type, row ) {
                   if (type=='sort') {
                        return data;
                    } else{
                        return mys.formatMoney(data,0,',','.');
                    }
                },
                "targets": [10]
            },
            ],
            "aoColumns": [
            {"sWidth": "15%", "bSortable" : false},
            {"sWidth": "10%", "bSortable" : false},
            {"sWidth": "15%", "bSortable" : false},
            {"sWidth": "15%", "bSortable" : false},
            {"sWidth": "15%", "bSortable" : false},
            {"sWidth": "15%", "bSortable" : false},
            {"sWidth": "15%", "bSortable" : false},
            {"sWidth": "15%", "bSortable" : false},
            {"sWidth": "15%", "bSortable" : false},
            {"sWidth": "15%", "bSortable" : false},
            {"sWidth": "15%", "bSortable" : false},
            {"sWidth": "15%", "bSortable" : false},
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
                .column( 10 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );


                $( api.column( 10 ).footer() ).html(mys.formatMoney(total,0,',','.'));
            }
        });
    });


</script>