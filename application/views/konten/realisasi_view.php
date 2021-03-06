<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h5>Realisasi</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Proses</li>
                    <li class="breadcrumb-item active" aria-current="page">Laporan Arus Dana/Realisasi</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active show" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Belum Realisasi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Sudah Realisasi</a>
        </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade active show" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
            <div class="card-body">
                <div class="row clearfix">
                    <div class="col-lg-2">
                        <?php if ($ha['insert']): ?>
                            <button id="btnAdd" class="btn btn-primary btn-block">(+) Data</button>
                        <?php endif ?>
                    </div>
                            <!-- <div class="col-lg-1" style="text-align:right;padding-top:7px">
                                Cari :
                            </div>
                            <div class="col-lg-9">
                                <input type="text" id="input_pencarian" class="form-control pull-right" placeholder="ketik disini untuk mencari ...">
                            </div> -->
                        </div>
                        
                        <div style="padding: 1%">
                            <table id="tabel" class="table table-inverse table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Permintaan</th>
                                        <th>Unit Kerja</th>
                                        <th>Kategori</th>
                                        <th>No Anggaran</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card-body">
                        <div class="row clearfix">
                            <div class="col-lg-2">
                                <label for="id_unit_kerja_fil">Tanggal</label>
                                <input type="text" class="form-control tgl_range" name="fl_tanggal" value="" id="fl_tanggal">
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <div class="form-group">
                                    <label for="id_unit_kerja_fil">Unit Kerja</label>
                                    <select name="id_unit_kerja_fil" id="id_unit_kerja_fil" class="form-control cmb_select2">
                                        <option ></option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row clearfix">
                            <div class="col-lg-1" style="text-align:right;padding-top:7px">
                                Cari :
                            </div>
                            <div class="col-lg-8">
                                <input type="text" id="input_pencarian2" class="form-control pull-right" placeholder="ketik disini untuk mencari ...">
                            </div>
                        </div>

                        <div style="padding: 1%">
                            <table id="tabel_rekap" class="table table-inverse table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Permintaan</th>
                                        <th>Unit Kerja</th>
                                        <th>Kategori</th>
                                        <th>No Anggaran</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" id="form_card" style="display: none">
            <div class="card-header">
                <h3 class="col-6 float-left">Form</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" id="form" method="POST" action="javascript:;">
                    <input type="hidden" name="id_permintaan" id="id_permintaan">
                    <input type="hidden" name="id_arus_dana" id="id_arus_dana">
                    <input type="hidden" name="no_anggaran" id="no_anggaran">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="id_unit_kerja">Unit Kerja</label>
                                <select name="id_unit_kerja" id="id_unit_kerja" class="form-control cmb_select2">
                                    <option ></option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="text" class="form-control tgl" data-target="#tanggal" name="tanggal" id="tanggal" required>
                                <span class="help-block"></span>
                            </div>
                            
                            <button class="btn btn-danger" id="reset_pilihan">Reset Pilihan</button>

                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="id_kategori">Kategori</label>
                                <select name="id_kategori" id="id_kategori" class="form-control cmb_select2">
                                    <option ></option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="periode_pelaksanaan">Periode Pelaksanaan</label>
                                <input type="text" class="form-control bulantahun" data-target="#periode_pelaksanaan" name="periode_pelaksanaan" id="periode_pelaksanaan" required>
                            </div>
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="id_anggaran">Anggaran</label>
                                <select name="id_anggaran" id="id_anggaran" class="form-control cmb_select2">
                                    <option ></option>
                                </select>
                                <span class="help-block"></span>
                            </div>
<!--                             <div class="form-group">
                                <label for="catatan">Catatan</label>
                                <textarea class="form-control tgl" name="catatan" id="catatan" required></textarea>
                                <span class="help-block"></span>
                            </div> -->
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <h6 class="font-weight-bold">No. Anggaran :</h6>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <input type="hidden" name="no_anggaran" id="no_anggaran">
                            <h6 class="font-weight-bold" id="no_anggaran_view">-</h6>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="checkbox-fade fade-in-primary">
                                <label>
                                    <input type="checkbox" id="reimburse" name="reimburse" value="">
                                    <span class="cr">
                                        <i class="cr-icon ik ik-check txt-primary"></i>
                                    </span>
                                    <h7 class="font-weight-bold">REIMBURSE</h7>
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group" id="div_pembuat" style="display: none">
                                <label for="pembuat">Pembuat</label>
                                <select name="pembuat" id="pembuat" class="form-control cmb_select2">
                                    <option ></option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h6 class="font-weight-bold">Detail Permintaan</h6>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2">
                            <button type="button" id="btn_add_det_anggaran" class="btn btn-primary btn-block">(+) Detail</button>
                        </div>
                        <div class="col-lg-1" style="text-align:right;padding-top:7px">
                            Cari :
                        </div>
                        <div class="col-lg-9">
                            <input type="text" id="input_pencarian_detail" class="form-control pull-right" placeholder="ketik disini untuk mencari ...">
                        </div>
                    </div>
                    <div style="padding: 1%">
                        <table id="tabel_detail_permintaan" class="table table-inverse table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th data-width="2%">No.</th>
                                    <th data-width="30%">Uraian</th>
                                    <th data-width="10%">Penerimaan</th>
                                    <th data-width="10%">Pengeluaran</th>
                                    <th data-width="10%">Keterangan</th>
                                    <!-- <th data-width="10%">Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <h6 class="font-weight-bold" >Catatan</h6>
                            <textarea class="form-control" name="catatan_realisasi" id="catatan_realisasi" cols="30" rows="6"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <h6 class="font-weight-bold" style="text-align: right;">Total Penerimaan :</h6>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                            <h6 class="font-weight-bold" id="total_penerimaan">Rp 0</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <h6 class="font-weight-bold" style="text-align: right;">Total Pengeluaran :</h6>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                            <h6 class="font-weight-bold" id="total_pengeluaran">Rp 0</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <h6 class="font-weight-bold" style="text-align: right;">Grand Total Retur :</h6>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                            <h6 class="font-weight-bold" id="total_retur">Rp 0</h6>
                        </div>
                    </div>
                    <hr>
                    <button id="btnSimpan" type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <button class="btn btn-danger" type="button" id="btnBack">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var mys;
    var form_validator;
    var form_validator_detil;
    var tabel_detail_permintaan;
    var tabel;
    var tabel_rekap;
    var save_method;
    var data_detil_permintaan = [];
    var mustGenerateNumberFuckingCunts = true;

    $(document).ready(function() {
        mys = Object.create(myscript_js);
        mys.init('<?= base_url() ?>');

        load_unit_kerja();
        load_anggaran();
        load_kategori();
        load_pj();

        $('#fl_tanggal').data('daterangepicker').setStartDate(moment().subtract(30, "days").format('DD-MM-YYYY'));
        $('#fl_tanggal').data('daterangepicker').setEndDate(moment().format('DD-MM-YYYY'));
        $('#fl_tanggal').trigger('change');

        tabel = $('#tabel').DataTable({
            scrollCollapse: true,
            sDom: "t<'row'<'col-md-4'i><'col-md-8'p>>",
            processing: true,
            iDisplayLength: 10,
            paging:true,
            scrollX:true,
            bInfo : false,
            language: {
                url: mys.base_url+"assets/plugins/datatables.net/lang/Indonesian.json"
            },
            ajax: mys.base_url + "arusdana",
            columnDefs: [
            {visible : false, targets : []},
                {
                    render: function ( data, type, row ) {
                        if (type == 'sort') {
                            return data;
                        }
                        return moment(data).format('DD MMM YYYY');
                    },
                    targets: [5]
                },
                {
                    render: function ( data, type, row ) {
                        // var status = data == 'W' ? "" : "";
                        // var status = data == 'W' ? "" : "";
                        // return '<span class="badge badge-pill badge-success">'+status+'</span>';

                        if (data == 'W') {
                            return '<span class="badge badge-pill badge-success">Sudah direalisasi</span>';
                        }else if (data == 'D') {
                            return '<span class="badge badge-pill badge-danger">Belum direalisasi</span>';
                        };
                    },
                    targets: [6]
                },
                {
                    "render": function ( data, type, row ) {
                       return '<button type="button" title="Realisasi" data-toggle="tooltip" class="btn btn-primary ubah"><span class="fa fa-edit"></span></button>\
                       <button type="button" title="Cetak" data-toggle="tooltip" class="btn btn-success cetak"><span class="fa fa-print"></span></button>\
                       ';
                    },
                    "targets": [-1],
                    "sWidth": "17%"
                },
            ],
            order : [
            ],
            fnRowCallback : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html((iDisplayIndex +1)+'.');
                return nRow;
            },
            fnDrawCallback : function(oSettings){
                $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });
            },
            footerCallback: function(row, data, start, end, display){
            }
        });

        tabel_rekap = $('#tabel_rekap').DataTable({
            scrollCollapse: true,
            sDom: "t<'row'<'col-md-4'i><'col-md-8'p>>",
            processing: true,
            iDisplayLength: 10,
            paging:true,
            scrollX:true,
            language: {
                url: mys.base_url+"assets/plugins/datatables.net/lang/Indonesian.json"
            },
            ajax: mys.base_url + "arusdana/getRekap",
            columnDefs: [
            {visible : false, targets : []},
                {
                    render: function ( data, type, row ) {
                        if (type == 'sort') {
                            return data;
                        }
                        return moment(data).format('DD MMM YYYY');
                    },
                    targets: [5]
                },
                {
                    render: function ( data, type, row ) {
                        // var status = data == 'W' ? "" : "";
                        // var status = data == 'W' ? "" : "";
                        // return '<span class="badge badge-pill badge-success">'+status+'</span>';

                        if (data == 'W') {
                            return '<span class="badge badge-pill badge-success">Sudah direalisasi</span>';
                        }else if (data == 'D') {
                            return '<span class="badge badge-pill badge-danger">Belum direalisasi</span>';
                        };
                    },
                    targets: [6]
                },
                {
                    "render": function ( data, type, row ) {
                       return '<button type="button" title="Realisasi" data-toggle="tooltip" class="btn btn-primary ubah"><span class="fa fa-edit"></span></button>\
                       <button type="button" title="Cetak" data-toggle="tooltip" class="btn btn-success cetak"><span class="fa fa-print"></span></button>\
                       <button type="button" title="Hapus" data-toggle="tooltip" class="btn btn-danger hapus"><span class="fa fa-trash"></span></button>';
                    },
                    "targets": [-1],
                    "sWidth": "17%"
                },
            ],
            order : [
            ],
            fnRowCallback : function(nRow, aData, iDisplayIndex){
                // $("td:first", nRow).html((iDisplayIndex +1)+'.');
                // return nRow;
            },
            fnDrawCallback : function(oSettings){
                $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });
            },
            footerCallback: function(row, data, start, end, display){
            }
        });


        tabel_detail_permintaan= $('#tabel_detail_permintaan').DataTable({
            scrollCollapse: true,
            sDom: "t<'row'<'col-md-4'i><'col-md-8'p>>",
            processing: true,
            iDisplayLength: 10,
            paging:false,
            scrollX:true,
            language: {
                url: mys.base_url+"assets/plugins/datatables.net/lang/Indonesian.json"
            },
            columnDefs: [
            {visible : false, targets : []},
                {
                    render: function ( data, type, row ) {
                        return '<input type="text" value="'+(data? data : 0)+'" class="form-control uraian" required>';
                    },
                    targets: [1]
                },
                {
                    render: function ( data, type, row ) {
                        return '<input type="text" align="right" value="'+(data? data : 0)+'" class="form-control penerimaan autonumeric" style="text-align: right;" required>';
                    },
                    targets: [2]
                },
                {
                    render: function ( data, type, row ) {
                        return '<input type="text" value="'+(data? data : 0)+'" class="form-control pengeluaran autonumeric" style="text-align: right;" required>';
                    },
                    targets: [3]
                },
                {
                    render: function ( data, type, row ) {
                        return '<input type="text" value="'+(data? data : '')+'" class="form-control keterangan">';
                    },
                    targets: [4]
                },
                // {
                //     render: function ( data, type, row ) {
                //         return '<button type="button" class="btn btn-default">button</button>';
                //     },
                //     targets: [5]
                // },
            ],
            data: data_detil_permintaan,
            columns : [
                { data : null},
                { data : "uraian"},
                { data : "penerimaan"},
                { data : "pengeluaran"},
                { data : "keterangan"},
            ],

            order : [
            [1, "asc"],
            ],
            fnRowCallback : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html((iDisplayIndex +1)+'.');
                return nRow;
            },
            fnDrawCallback : function(oSettings){
                $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });
                mys.autonumber();
            },
            footerCallback: function(row, data, start, end, display){
            }
        });

        


        // form_validator = $('#form').validate({
        //     highlight: function(element, errorClass, validClass) {
        //         $(element).addClass(errorClass).removeClass(validClass);
        //         $(element.form).find("label[for=" + element.id + "]").addClass(errorClass);
        //     },
        //     unhighlight: function(element, errorClass, validClass) {
        //         $(element).removeClass(errorClass).addClass(validClass);
        //         $(element.form).find("label[for=" + element.id + "]").removeClass(errorClass);
        //     },
        //     errorClass: "is-invalid text-red",
        //     errorElement: "em",
        //     errorPlacement: function(error, element) {
        //         error.appendTo(element.parent("div").find(".help-block"));
        //     },
        //     submitHandler: function(form) {
        //         form.submit();
        //     },
        // });

        form_validator_detil = $('#form_det_permintaan').validate({
            highlight: function(element, errorClass, validClass) {
                $(element).addClass(errorClass).removeClass(validClass);
                $(element.form).find("label[for=" + element.id + "]").addClass(errorClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass(errorClass).addClass(validClass);
                $(element.form).find("label[for=" + element.id + "]").removeClass(errorClass);
            },
            errorClass: "is-invalid text-red",
            errorElement: "em",
            errorPlacement: function(error, element) {
                error.appendTo(element.parent("div").find(".help-block"));
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        $('#fl_tanggal, #id_unit_kerja_fil').on('change', function(event) {
            mys.blok();

            var tgl = $('#fl_tanggal').val().split(' s.d. ');
            var id_unit_kerja = $('#id_unit_kerja_fil').val();
            var sDate = mys.toDate(tgl[0]);
            var eDate = mys.toDate(tgl[1]);
            $('#tabel_rekap').DataTable().ajax.url(mys.base_url + 'arusdana/getRekap?start=' +sDate+'&end='+eDate+'&id_unit_kerja='+id_unit_kerja).load();
            mys.unblok();
        });

        
        $("#form").submit(function(event) {
            if (data_detil_permintaan.length == 0) {
                mys.swalert('Simpan','Detil Permintaan Masih Kosong!','error');                    
                return false;
            } 
            simpan();
            // if (form_validator.form()) {
            // }
        });

        $('#id_unit_kerja,#id_kategori').on('change', function(event) {
            generate_no();
        });

        $('#tanggal').on('change.datetimepicker', generate_no);

        

        $("#form_det_permintaan").submit(function(event) {
            if (form_validator_detil.form()) {
                tambah_detil();
            }
        });

        $('#btn_add_det_anggaran').on('click', function(event) {
            reset_form_det_permintaan();
            $('#jenis_masukan').val('new');
            $('#modal_detil').modal('toggle');
            $('#penerimaan').val(0);
            $('#pengeluaran').val(0);
            $('#alert_det_permintaan').empty();
        });

        $('#btnCari').on('click', function(event) {
            event.preventDefault();
            mys.blok();
            $.ajax({
                url: mys.base_url+'arusdana/cek_no',
                type: 'POST',
                dataType: 'JSON',
                data: {no: $('#cari_realisasi').val()},
            })
            .done(function(data) {
                mys.unblok();
                if (data.id == null) {
                    mys.swalert('Data Tidak Ditemukan', '', 'danger');
                }else{
                    save_method= 'update';
                    ubah_data(data.id,data.jenis);
                };
            })
            .always(function() {
                mys.unblok();
            });
            
        });

        $('#reimburse').on('click', function(event) {
            if ($('#reimburse').is(':checked')) {
                $('#div_pembuat').show('fast');
            }else{
                $('#div_pembuat').hide('fast');
            };

            /* Act on the event */
        });

        $('#btn_insert_det_permintaan').on('click', function(event) {
            $('#form_det_permintaan').submit();
            calculateAmount();
        });

        $('#tabel tbody').on( 'click', '.ubah', function () {
            var row = $(this);
            save_method= 'update';
            var table = $('#tabel').DataTable();
            var data = table.row( row.parents('tr') ).data();
            ubah_data(data[7],data[8]);
        });

        $('#tabel_rekap tbody').on( 'click', '.ubah', function () {
            var row = $(this);
            save_method= 'update';
            var table = $('#tabel_rekap').DataTable();
            var data = table.row( row.parents('tr') ).data();
            ubah_data(data[7],data[8]);
        });

        $('#tabel_detail_permintaan tbody').on('keyup', '.autonumeric', function(event) {
            calculateAmount();
        });

        $('#tabel tbody').on( 'click', '.hapus', function () {
            var row = $(this);
            var table = $('#tabel').DataTable();
            var data = table.row( row.parents('tr') ).data();
            mys.swconfirm("Hapus","Apakah anda yakin ingin menghapus data ini?",hapus,data[7]);
        });

        $('#tabel_rekap tbody').on( 'click', '.hapus', function () {
            var row = $(this);
            var table = $('#tabel_rekap').DataTable();
            var data = table.row( row.parents('tr') ).data();
            mys.swconfirm("Hapus","Apakah anda yakin ingin menghapus data ini?",hapus,data[7]);
        });

        $('#tabel_detail_permintaan tbody').on( 'click', '.ubah_detail', function () {
            var row = $(this);
            var table = $('#tabel_detail_permintaan').DataTable();
            var data = table.row( row.parents('tr') ).data();
            var index = data_detil_permintaan.findIndex(x => x.id_detail_permintaan == data.id_detail_permintaan);
            if (index != -1) {
                ubah_detail(index);
            } else{
                mys.notifikasi('Data Tidak Ditemukan','error');
            }
        });

        $('#tabel_detail_permintaan tbody').on( 'click', '.hapus_detail', function () {
            var row = $(this);
            var table = $('#tabel_detail_permintaan').DataTable();
            var data = table.row( row.parents('tr') ).data();
            mys.swconfirm("Hapus","Apakah anda yakin ingin menghapus data ini?",function(){
                var index = data_detil_permintaan.findIndex(x => x.id_detail_permintaan == data.id_detail_permintaan);
                if (index != -1) {
                    data_detil_permintaan.splice(index, 1);
                    reload_tabel_detail_permintaan();
                } else{
                    mys.notifikasi('Data Tidak Ditemukan','error');
                }
            });
        });

        $("#reset_pilihan").on('click', function(event) {
            event.preventDefault();
            $("#id_unit_kerja").select2("val", " ");
            $("#id_kategori").select2("val", " ");
            $("#id_anggaran").select2("val", " ");
        });

        $('#tabel_rekap tbody').on( 'click', '.cetak', function () {
            var row = $(this);
            var table = $('#tabel_rekap').DataTable();
            var data = table.row( row.parents('tr') ).data();

            if(data[8] =='arus_dana'){
                cetak(data[7]);
                return false;
            }
            // mys.swconfirm("Hapus","Apakah anda yakin ingin menghapus data ini?",hapus,data[8]);
            var id_permintaan = data[7];
             $.ajax({
                url: mys.base_url+'arusdana/get_id_arusdana',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id: id_permintaan
                },
                success: function(data){
                    // console.log(data['id_arus_dana']);
                    if (data) {
                        cetak(data['id_arus_dana']);
                    }else{
                        mys.notifikasi("Laporan tidak bisa dicetak karena belum direalisasi","error");
                    };
                },
                error:function(data){
                    mys.notifikasi("Gagal Mengambil data dari server","error");
                }
        });
            
        });

        $('#input_pencarian').on('keyup', function(event) {
            var tabel = $('#tabel');
            tabel.dataTable().fnFilter($(this).val());
        });

        $('#input_pencarian2').on('keyup', function(event) {
            var tabel_rekap = $('#tabel_rekap');
            tabel_rekap.dataTable().fnFilter($(this).val());
        });
        
        $('#input_pencarian_detail').on('keyup', function(event) {
            tabel_detail_permintaan.search( $(this).val() ).draw();
        });

        $('#btnAdd').on('click', function(event) {
            buka_form();
            calculateAmount();
        });

        $('#btnBack').on('click', function(event) {
            tutup_form();
        });


        // $('#id_unit_kerja,#id_kategori').on('change', function(event) {
        //     generate_no();            
        // });

        // $('#tanggal').on('change.datetimepicker', generate_no);
     
    });

    function cetak(id_arus_dana) {
        var jendela = window.open( "", "Print", 'width=800,height=700,status=yes,toolbar=no,menubar=no, titlebar=yes,re sizable=yes,location=no,scrollbars=yes' );
            var form = "<input type='hidden' name='id_arus_dana' value='"+id_arus_dana+"'>";
            $(jendela.document.body).html('<form id="form_redirect" action="'+mys.base_url+'arusdana/cetak_laporan" method="POST">'+form+'</form>');
            $(jendela.document).find('#form_redirect').submit();
    }

    function calculateAmount() {
        var table = $('#tabel_detail_permintaan tbody tr');

        var total_penerimaan = 0;
        var total_pengeluaran = 0;

        table.each(function(index, el) {
            var tr_penerimaan = $(el).find('input.penerimaan').val() ? parseInt($(el).find('input.penerimaan').val().replace(/\D/g, '')) : 0;
            var tr_pengeluaran = $(el).find('input.pengeluaran').val() ? parseInt($(el).find('input.pengeluaran').val().replace(/\D/g, '')) : 0;

            total_penerimaan += tr_penerimaan;
            total_pengeluaran += tr_pengeluaran;
        });

        $('#total_penerimaan').text('Rp ' + mys.formatMoney(total_penerimaan, 0, ',', '.'));
        $('#total_pengeluaran').text('Rp ' + mys.formatMoney(total_pengeluaran, 0, ',', '.'));
        $('#total_retur').text('Rp ' + mys.money_minus_kurung(total_penerimaan - total_pengeluaran));
    }

    function buka_form() {
        reset_form();
        $('#tabel_card').hide();
        $('#form_tender_card').hide();
        $('#form_tender_vendor_card').hide();
        $('#form_card').show();
        $('#tanggal').val(moment().format('DD-MM-YYYY'));
        $('#periode_pelaksanaan').val(moment().format('MMMM-YYYY'));
        // $('#status_permintaan_anggaran').val('P').trigger('change');
        // $('#id_kategori').val($('#id_kategori option:eq(1)').val()).trigger('change');
        $('#reimburse').prop('checked', false);
        reload_tabel_detail_permintaan();
        $('#tabel_detail_permintaan').DataTable().columns.adjust().draw();
        // generate_no();
        
        // Mbuh opo iki njir, kok iso men-solved kan masalah
        $('#tanggal').trigger('change');
    }


    function ubah_data(id,jenis){
        // console.log(id+jenis);
        mustGenerateNumberFuckingCunts = false;
        mys.blok()
        $.ajax({
            url: mys.base_url+'arusdana/get_data_by_id',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: id,
                jenis: jenis
            },
            success: function(data){
                buka_form();
                var core = data.data;
                    console.log(data);
                    $('#id_permintaan').val(core.id_permintaan);
                    $('#id_arus_dana').val(core.id_arus_dana);
                    $('#id_unit_kerja').val(core.id_unit_kerja).trigger('change');
                    $('#id_kategori').val(core.id_kategori).trigger('change');
                    $('#id_anggaran').val(core.id_anggaran).trigger('change');
                    $('#tanggal').val(moment(core.tanggal).format('DD-MM-YYYY'));
                    $('#periode_pelaksanaan').val(moment(core.periode_pelaksanaan).format('MMMM-YYYY'));
                    $('#catatan').val(core.catatan);
                    $('#catatan_realisasi').val(core.catatan);
                    if (core.bbm == '1') {
                        $('#reimburse').prop('checked', true);
                        $('#pembuat').val(core.id_pj).trigger('change');
                        $('#div_pembuat').show();
                    }else{
                        $('#reimburse').prop('checked', false);
                    }

                    if ($('#id_arus_dana').val() != '') {
                        console.log(core.no_arus_dana);
                        $('#no_anggaran').val(core.no_arus_dana);
                        $('#no_anggaran_view').text(core.no_arus_dana);
                    }else{
                        $('#no_anggaran').val(core.no_anggaran);
                        $('#no_anggaran_view').html(core.no_anggaran);
                    };

                var detail_permintaan = data.detil;
                    data_detil_permintaan = detail_permintaan;
                reload_tabel_detail_permintaan();
                calculateAmount();
            },
            error:function(data){
                mys.notifikasi("Gagal Mengambil data dari server","error");
            }
        })
        .always(function() {
            mys.unblok();
        });
    }


    function simpan(){
        var realisasi = {};
            realisasi["id_permintaan"] = $('#id_permintaan').val()? $('#id_permintaan').val() : null;
            realisasi["no_arus_dana"] = $('#no_anggaran').val();
            realisasi["id_arus_dana"] = $('#id_arus_dana').val();
            realisasi["tanggal"] = mys.toDate($('#tanggal').val());
            realisasi["id_unit_kerja"] = $('#id_unit_kerja').val();
            realisasi["id_kategori"] = $('#id_kategori').val();
            realisasi["id_anggaran"] = $('#id_anggaran').val();
            realisasi["periode_pelaksanaan"] = moment($('#periode_pelaksanaan').val(), 'MMMM-YYYY').format('YYYY-MM-DD');
            realisasi["catatan"] = $('#catatan_realisasi').val();
            realisasi["total"] = parseInt($('#total_retur').text().replace(/[^0-9\-]/g, ''));
            if ($('#total_retur').text().indexOf('(') > -1){
                realisasi["total"] = -Math.abs(realisasi["total"]);
            }

            if ($('#reimburse').is(':checked')) {
                realisasi["bbm"] = 1;
                realisasi["id_pj"] = $('#pembuat').val();
            }else{
                realisasi["bbm"] = 0;
            };

        var table = $('#tabel_detail_permintaan tbody tr');
        var detail = [];
        table.each(function(index, el) {
            var items = {};
            items['uraian'] = $(el).find('input.uraian').val();
            items['penerimaan'] = $(el).find('input.penerimaan').val() ? parseInt($(el).find('input.penerimaan').val().replace(/\D/g, '')) : 0;
            items['pengeluaran'] = $(el).find('input.pengeluaran').val() ? parseInt($(el).find('input.pengeluaran').val().replace(/\D/g, '')) : 0;
            items['keterangan'] = $(el).find('input.keterangan').val();

            detail.push(items);
        });

        mys.blok()
        $.ajax({
            url: mys.base_url+'arusdana/save',
            type: 'POST',
            dataType: 'JSON',
            data: {
                realisasi: JSON.stringify(realisasi),
                detail: JSON.stringify(detail)
            },
            success: function(data){
                if (data.status) {
                    mys.notifikasi("Data Berhasil Disimpan","success");
                    data_detil_permintaan = [];
                    cetak(data.id_arus_dana);
                    // setTimeout(function() {
                    //     window.location.reload();
                    // }, 3000);

                    tutup_form();
                } else{
                    mys.notifikasi("Terdapat Kesalahan dalam menyimpan data.","error");
                }
            },
            error:function(data){
                mys.notifikasi("Data Gagal Disimpan, Coba Beberapa Saat Lagi.","error");

            }
        })
        .always(function() {
            mys.unblok();
            reload();
            // setTimeout(function() {
            //     window.location.reload();
            // }, 3000);
        });
    }

    function hapus(id){
        mys.blok()
        $.ajax({
            url: mys.base_url+'arusdana/delete',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function(data){
                if (data.status) {
                    mys.notifikasi("Data Berhasil Dihapus","success");
                } else{
                    mys.notifikasi("Data Gagal Dihapus, Coba Beberapa Saat Lagi.","error");
                }
            },
            error:function(data){
                mys.notifikasi("Data Gagal Dihapus, Coba Beberapa Saat Lagi.","error");
            }
        })
        .always(function() {
            mys.unblok();
            reload();
            reload_rekap();
        });
    }

    function tutup_form() {
        $('#form_card').hide();
        $('#form_tender_card').hide();
        $('#form_tender_vendor_card').hide();
        $('#tabel_card').show();
        var t = $('#tabel').DataTable();
        t.columns.adjust().draw();
        mustGenerateNumberFuckingCunts = true;
    }

    function reset_form() {
        data_detil_permintaan = [];
        // form_validator.resetForm();
        $('#form')[0].reset();
        $('#form').find('input[type="hidden"]').val('');
        $('#form').find('label,select,input,textarea').removeClass('is-invalid text-red');
        $('#form').find('.cmb_select2').val('').trigger('change');
        $('#kode_permintaan_anggaran').parents('.form-group').hide();
        <?= !$ha['update'] ? '$("#btnSimpan").prop("disabled",false);' : '' ?>
        <?= !$ha['update'] ? '$("#form").find("select,input,textarea").prop("disabled",false);' : '' ?>
    }

    function reset_form_det_permintaan(){
        form_validator_detil.resetForm();
        $('#form_det_permintaan')[0].reset();
        $('#form_det_permintaan').find('input[type="hidden"]').val('');
        $('#form_det_permintaan').find('label,select,input,textarea').removeClass('is-invalid text-red');
        $('#form_det_permintaan').find('.cmb_select2').val('').trigger('change');
        $('#btn_insert_det_permintaan').html('(+) Tambahkan');
    }


    function reload() {
        var t = $('#tabel').DataTable();
        t.ajax.reload();
    }

    function reload_rekap() {
        var t = $('#tabel_rekap').DataTable();
        t.ajax.reload();
    }

    function load_unit_kerja(){
        $.ajax({
            url: mys.base_url+'permintaan_anggaran/get_unit_kerja',
            type: 'POST',
            dataType: 'JSON',
            data: null,
            success: function(data){
                $('#id_unit_kerja').empty();
                $('#id_unit_kerja').append('<option></option>');

                $('#id_unit_kerja_fil').empty();
                $('#id_unit_kerja_fil').append('<option value="semua">Semua</option>');
                $.each(data, function(index, val) {
                    $('#id_unit_kerja').append('<option value="'+val.id+'">'+ val.name+'</option>');
                    $('#id_unit_kerja_fil').append('<option value="'+val.id+'">'+ val.name+'</option>');
                });
            },
            error:function(data){
                mys.notifikasi("Gagal Ambil Data.","error");
            }
        })
    }

    function load_pj(){
        $.ajax({
            url: mys.base_url+'tandatangan/get_pemegang_jabatan',
            type: 'POST',
            dataType: 'JSON',
            data: null,
            success: function(data){
                $('#pembuat').empty();
                $('#pembuat').append('<option></option>');
                $.each(data, function(index, val) {
                    $('#pembuat').append('<option value="'+val.id+'">'+ val.name+'</option>');
                });
            },
            error:function(data){
                mys.notifikasi("Gagal Ambil Data.","error");
            }
        })
    }

    function generate_no () {
            var data_send = {};
                data_send.tanggal = mys.toDate($('#tanggal').val());
                data_send.id_unit_kerja = $('#id_unit_kerja').val();
                data_send.id_kategori = $('#id_kategori').val();
            var id_permintaan = $('#id_permintaan').val();

            if (!data_send.tanggal) {
               $('#no_anggaran').val(null);
               $('#no_anggaran_view').html('-');
                return false;
            }

            if (!mustGenerateNumberFuckingCunts) {
                return false;
            };

            mys.blok()
                $.ajax({
                    url: mys.base_url+'permintaan_anggaran/get_no_anggaran',
                    type: 'POST',
                    dataType: 'JSON',
                    data: data_send,
                    success: function(data){
                       $('#no_anggaran').val(data.no_anggaran);
                       $('#no_anggaran_view').html(data.no_anggaran);

                    },
                    error:function(data){
                        mys.notifikasi("Gagal Mengambil data dari server","error");
                    }
                })
                .always(function() {
                    mys.unblok();
                });
        }

    function load_kategori(){
        $.ajax({
            url: mys.base_url+'permintaan_anggaran/get_kategori',
            type: 'POST',
            dataType: 'JSON',
            data: null,
            success: function(data){
                $('#id_kategori').empty();
                $('#id_kategori').append('<option></option>');
                $.each(data, function(index, val) {
                    $('#id_kategori').append('<option value="'+val.id+'">'+ val.name+'</option>');
                });
            },
            error:function(data){
                mys.notifikasi("Gagal Ambil Data.","error");
            }
        })
    }

    function load_anggaran(){
        $.ajax({
            url: mys.base_url+'permintaan_anggaran/get_anggaran',
            type: 'POST',
            dataType: 'JSON',
            data: null,
            success: function(data){
                $('#id_anggaran').empty();
                $('#id_anggaran').append('<option></option>');
                $.each(data, function(index, val) {
                    $('#id_anggaran').append('<option value="'+val.id+'">'+ val.name+'</option>');
                });
            },
            error:function(data){
                mys.notifikasi("Gagal Ambil Data.","error");
            }
        })
    }

    function tambah_detil() {
        //validasi
        var jenis_masukan = $('#jenis_masukan').val();
        var id_detail_permintaan = $('#id_detail_permintaan').val();
        var uraian = $('#uraian').val();
        var penerimaan = mys.reverse_format_ribuan($('#penerimaan').val());
        var pengeluaran = mys.reverse_format_ribuan($('#pengeluaran').val());
        var keterangan = $('#keterangan').val();

        if (jenis_masukan == 'new') {
            //insert
            var d = {
                "id_detail_permintaan" : "new"+(data_detil_permintaan.length+1),
                "uraian" : uraian,
                "penerimaan" : penerimaan,
                "pengeluaran" : pengeluaran,
                "keterangan" : keterangan,
            }
            data_detil_permintaan.push(d);

        } else{
            //update
            var index = data_detil_permintaan.findIndex(x => x.id_detail_permintaan == id_detail_permintaan);

            var d_lama = data_detil_permintaan[index];

            var d_baru = {
                "id_detail_permintaan" : d_lama.id_detail_permintaan,
                "uraian" : uraian,
                "penerimaan" : penerimaan,
                "pengeluaran" : pengeluaran,
                "keterangan" : keterangan,
            }

            data_detil_permintaan[index] = d_baru;
        }

        reload_tabel_detail_permintaan();
        $('#modal_detil').modal('toggle');
        
    }

    function ubah_detail(index) {
        reset_form_det_permintaan();
        var data = data_detil_permintaan[index];
        $('#btn_insert_det_permintaan').html('Simpan Perubahan')
        $('#id_detail_permintaan').val(data.id_detail_permintaan);
        $('#uraian').val(data.uraian);
        $('#penerimaan').val(data.penerimaan);
        $('#pengeluaran').val(data.pengeluaran);
        $('#keterangan').val(data.keterangan);
        $('#modal_detil').modal('show');
    }

    function reload_tabel_detail_permintaan() {
        console.log(data_detil_permintaan);
        tabel_detail_permintaan.clear();
        tabel_detail_permintaan.rows.add(data_detil_permintaan);
        tabel_detail_permintaan.draw();
    }


        // function generate_no () {
        //     var data_send = {};
        //         data_send.tanggal = mys.toDate($('#tanggal').val());
        //         data_send.id_unit_kerja = $('#id_unit_kerja').val();
        //         data_send.id_kategori = $('#id_kategori').val();
        //     var id_permintaan = $('#id_permintaan').val();


        //     if (!data_send.tanggal || !data_send.id_kategori) {
        //        $('#no_anggaran').val(null);
        //        $('#no_anggaran_view').html('-');
        //         return false;
        //     }

        //     mys.blok()
        //         $.ajax({
        //             url: mys.base_url+'permintaan_anggaran/get_no_anggaran',
        //             type: 'POST',
        //             dataType: 'JSON',
        //             data: data_send,
        //             success: function(data){
        //                $('#no_anggaran').val(data.no_anggaran);
        //                $('#no_anggaran_view').html(data.no_anggaran);
        //             },
        //             error:function(data){
        //                 mys.notifikasi("Gagal Mengambil data dari server","error");
        //             }
        //         })
        //         .always(function() {
        //             mys.unblok();
        //         });
        // }


</script>

<div class="modal fade" id="modal_detil" role="dialog" aria-labelledby="modal_detilLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_detilLabel">Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form_det_permintaan" action="javascript:;" method="POST">
                    <input type="hidden" name="jenis_masukan" id="jenis_masukan">
                    <input type="hidden" name="id_detail_permintaan" id="id_detail_permintaan">
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="uraian">Uraian</label>
                                <input type="text" class="form-control" name="uraian" id="uraian" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="penerimaan">Penerimaan</label>
                                <input type="text" style="text-align:right;" class="form-control autonumeric" name="penerimaan" id="penerimaan" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="pengeluaran">Pengeluaran</label>
                                <input type="text" style="text-align:right;" class="form-control autonumeric" name="pengeluaran" id="pengeluaran" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" id="keterangan">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div id="alert_det_permintaan"></div>
                </form>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-primary" id="btn_insert_det_permintaan">(+) Tambahkan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>