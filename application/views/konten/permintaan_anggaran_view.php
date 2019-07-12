<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h5>Permintaan Anggaran</h5>
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
                    <li class="breadcrumb-item active" aria-current="page">Permintaan Anggaran</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card" id="tabel_card" style="display: block;">
<!--             <div class="card-header d-block">
                <h3>Filter Berdasarkan:</h3>

                <div class="row clearfix">

                </div>
            </div> -->
            <div class="card-body">
                <div class="row clearfix">
                    <div class="col-lg-2">
                    <?php if ($ha['insert']): ?>
                        <button id="btnAdd" class="btn btn-primary btn-block">(+) Data</button>
                    <?php endif ?>
                    </div>
                    <div class="col-lg-1" style="text-align:right;padding-top:7px">
                        Cari :
                    </div>
                    <div class="col-lg-9">
                        <input type="text" id="input_pencarian" class="form-control pull-right" placeholder="ketik disini untuk mencari ...">
                    </div>
                </div>
                <div style="padding: 1%">
                    <table id="tabel" class="table table-inverse table-hover" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Unit Kerja</th>
                                <th>Kategori</th>
                                <th>Anggaran</th>
                                <th>No Anggaran</th>
                                <th>Tanggal</th>
                                <th>Tanggal Kebutuhan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group" style="display: none">
                                <label for="kode_project">Kode Project</label>
                                <input type="text" class="form-control" name="kode_project" id="kode_project" readonly>
                                <span class="help-block"></span>
                            </div>

                            <div class="form-group">
                                <label for="id_unit_kerja">Unit Kerja</label>
                                <select name="id_unit_kerja" id="id_unit_kerja" class="form-control cmb_select2" required="required">
                                    <option ></option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="text" class="form-control tgl" data-target="#tanggal" name="tanggal" id="tanggal" required>
                                <span class="help-block"></span>
                            </div>
                            
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="id_kategori">Kategori</label>
                                <select name="id_kategori" id="id_kategori" class="form-control cmb_select2" required="required">
                                    <option ></option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_kebutuhan">Tanggal Kebutuhan</label>
                                <input type="text" class="form-control tgl" data-target="#tanggal_kebutuhan" name="tanggal_kebutuhan" id="tanggal_kebutuhan" required>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="id_anggaran">Anggaran</label>
                                <select name="id_anggaran" id="id_anggaran" class="form-control cmb_select2" required="required">
                                    <option ></option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="catatan">Catatan</label>
                                <textarea class="form-control tgl" name="catatan" id="catatan" required></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <h6 class="font-weight-bold">No. Anggaran :</h6>
                        </div>
                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                            <input type="hidden" name="no_anggaran" id="no_anggaran">
                            <h6 class="font-weight-bold" id="no_anggaran_view">-</h6>
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
                                    <th data-width="16%">Uraian</th>
                                    <th data-width="15%">Keterangan</th>
                                    <th data-width="8%">Nominal Anggaran</th>
                                    <th data-width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" style="text-align:right;">Total:</th>
                                    <th>0</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
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
    var data_detil_permintaan = [];

    $(document).ready(function() {
        mys = Object.create(myscript_js);
        mys.init('<?= base_url() ?>');

        load_unit_kerja();
        load_anggaran();
        load_kategori();


        // $('#tabel').DataTable({
        //     "scrollCollapse": true,
        //     "sDom": "t<'row'<'col-md-4'i><'col-md-8'p>>",
        //     "processing": true,
        //     "iDisplayLength": 10,
        //     "scrollX":true,
        //     "ajax":{
        //         url : mys.base_url+'project/get_data',
        //         type : 'GET',
        //     },
        //     "language": {
        //         "url": mys.base_url+"assets/plugins/datatables.net/lang/Indonesian.json"
        //     },
        //     "columnDefs": [
        //     {"visible" : false, "targets" : []},
        //     {
        //         render: function ( data, type, row ) {
        //             if (type == 'sort') {
        //                 return data;
        //             }
        //             return moment(data).format('DD MMM YYYY');
        //         },
        //         targets: [4,5]
        //     },
        //     {
        //         render: function ( data, type, row ) {
        //             return data == 'P' ? '<span class="badge badge-pill badge-secondary">Waiting</span>' : data == 'W' ? '<span class="badge badge-pill badge-success">WIN</span>' : '<span class="badge badge-pill badge-danger">Lose</span>';
        //         },
        //         targets: [6]
        //     },
        //     {
        //         render: function ( data, type, row ) {
        //             return '<button type="button" class="btn btn-primary tender_vendor" data-toggle="tooltip" title="Kelola Tender Vendor">\
        //                                     <span class="badge badge-light">'+data+'</span>\
        //                                     &nbsp;Tender Vendor\
        //                                 </button>'

        //         },
        //         targets: [7]
        //     },
        //     {
        //         "render": function ( data, type, row ) {
        //            return '';
        //         },
        //         "targets": [8]
        //     },
        //     // {"className": "dt-center", "targets": [0,3]}
        //     ],
        //     "columns": [
        //     {"width": "5%" },
        //     {"width": "10%"},
        //     {"width": "15%"},
        //     {"width": "15%"},
        //     {"width": "10%"},
        //     {"width": "10%"},
        //     {"width": "10%"},
        //     {"width": "10%", "orderable": false},
        //     {"width": "15%", "orderable": false}
        //     ],
        //     "order" : [
        //     [0, "asc"],
        //     ],
        //     "fnDrawCallback" : function(oSettings){
        //         $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });
        //     },
        // });

        tabel_detail_permintaan= $('#tabel_detail_permintaan').DataTable({
            scrollCollapse: true,
            sDom: "t<'row'<'col-md-4'i><'col-md-8'p>>",
            processing: true,
            iDisplayLength: 10,
            scrollX:true,
            language: {
                url: mys.base_url+"assets/plugins/datatables.net/lang/Indonesian.json"
            },
            columnDefs: [
            {visible : false, targets : []},
            {
                render: function ( data, type, row ) {
                    if (type=='sort') {
                        return data;
                    } else{
                        return mys.formatMoney(data,0,',','.');
                    }
                },
                targets: [3]
            },
            {
                render: function ( data, type, row ) {
                    var ubah  = '';
                    var hapus = '';
                        ubah= '<button type="button" title="Ubah Data" data-toggle="tooltip" class="btn btn-primary ubah_detail"><span class="fa fa-edit"></span></button>&nbsp;';
                        hapus = '<button type="button" title="Hapus Data" data-toggle="tooltip" class="btn btn-danger hapus_detail"><span class="fa fa-trash"></span></button>';
                    return ubah+hapus;
                },
                targets: [4]
            },
            ],
            data: data_detil_permintaan,
            columns : [
                { data : null},
                { data : "uraian"},
                { data : "keterangan"},
                { data : "nominal"},
                { data : "id_detail_permintaan", "orderable": false},
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
            },
        });


        form_validator = $('#form').validate({
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
            },
            rules: {
                no_hp_pic_project: {
                    required: true,
                    digits: true
                },
            }
        });

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

        
        $("#form").submit(function(event) {
            if (form_validator.form()) {
                if (data_detil_permintaan.length == 0) {
                    mys.swconfirm('Simpan','Data Vendor Masih Kosong. Apakah anda ingin melanjutkan simpan data project?',simpan);                    
                } else{
                    simpan();
                }
            }
        });

        $("#form_det_permintaan").submit(function(event) {
            if (form_validator_detil.form()) {
                tambah_detil();
            }
        });

        $('#btn_add_det_anggaran').on('click', function(event) {
            reset_form_det_permintaan();
            $('#jenis_masukan').val('new');
            $('#modal_detil').modal('toggle');
            $('#alert_det_permintaan').empty();
        });

        $('#btn_insert_det_permintaan').on('click', function(event) {
            $('#form_det_permintaan').submit();
        });

        $('#tabel tbody').on( 'click', '.ubah', function () {
            var row = $(this);
            var table = $('#tabel').DataTable();
            var data = table.row( row.parents('tr') ).data();
            ubah_data(data[8]);
        });

        $('#tabel tbody').on( 'click', '.hapus', function () {
            var row = $(this);
            var table = $('#tabel').DataTable();
            var data = table.row( row.parents('tr') ).data();
            mys.swconfirm("Hapus","Apakah anda yakin ingin menghapus data ini?",hapus,data[8]);
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

        $('#input_pencarian').on('keyup', function(event) {
            var tabel = $('#tabel');
            tabel.dataTable().fnFilter($(this).val());
        });
        
        $('#input_pencarian_detail').on('keyup', function(event) {
            tabel_detail_permintaan.search( $(this).val() ).draw();
        });

        $('#btnAdd').on('click', function(event) {
            buka_form();
        });

        $('#btnBack').on('click', function(event) {
            tutup_form();
        });
     
    });


    function buka_form() {
        reset_form();
        $('#tabel_card').hide();
        $('#form_tender_card').hide();
        $('#form_tender_vendor_card').hide();
        $('#form_card').show();
        $('#tanggal').val(moment().format('DD-MM-YYYY'));
        // $('#status_project').val('P').trigger('change');
        reload_tabel_detail_permintaan();
        $('#tabel_detail_permintaan').DataTable().columns.adjust().draw();
    }


    function ubah_data(id){
        mys.blok()
        $.ajax({
            url: mys.base_url+'project/get_data_by_id',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function(data){
                buka_form();
                <?= !$ha['update'] ? '$("#btnSimpan").prop("disabled",true);' : '' ?>
                <?= !$ha['update'] ? '$("#form").find("select,input,textarea").prop("disabled",true);' : '' ?>
                var detail_permintaan = data.detail_permintaan;
                    data_detil_permintaan = detail_permintaan;
                reload_tabel_detail_permintaan();
            },
            error:function(data){
                mys.notifikasi("Gagal Mengambil data dari server","error");
            }
        })
        .always(function() {
            mys.unblok();
        });
    }

    function kelola_tender(id){
        mys.blok()
        $.ajax({
            url: mys.base_url+'project/get_data_tender',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function(data){
                buka_form_tender();
                $('#id_project_tender').val(data.id_permintaan);
                $('#kode_project_tender').val(data.kode_project);
                $('#kode_project_tender').parents('.form-group').show();
                $('#nama_project_tender').val(data.nama_project);
                $('#nama_customer_tender').val(data.nama_customer);
                $('#nilai_project_tender').val(data.nilai_project);
                $('#tipe_pembelian_tender').val(data.tipe_pembelian == 'B'? 'Barang' : data.tipe_pembelian == 'J'? 'Jasa' : 'Barang & Jasa');
                $('#status_project_tender').val(data.status_project).trigger('change');
                if (data.no_fs_barang) {
                    $('#fs_barang_tender').show();
                    $('#spk_fs_barang_tender').val(data.spk_fs_barang);
                    $('#tgl_fs_barang_tender').val(data.tgl_fs_barang != null? mys.toDate(data.tgl_fs_barang) : null);

                }
                if (data.no_fs_jasa) {
                    $('#fs_jasa_tender').show();
                    $('#spk_fs_jasa_tender').val(data.spk_fs_jasa);
                    $('#tgl_fs_jasa_tender').val(data.tgl_fs_jasa != null? mys.toDate(data.tgl_fs_jasa) : null);
                }

                if (data.path_foto_customer){
                    $('#foto_preview_tender').prop('src', mys.base_url+'assets/upload/customer/foto/'+id_customer+'/'+data.path_foto_customer);
                } else{
                    $('#foto_preview_tender').prop('src', mys.base_url+'assets/img/avatar.png');
                }

            },
            error:function(data){
                mys.notifikasi("Gagal Mengambil data dari server","error");
            }
        })
        .always(function() {
            mys.unblok();
        });
    }

    function kelola_tender_vendor(id){
        mys.blok()
        $.ajax({
            url: mys.base_url+'project/get_data_tender_vendor',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function(data){
                buka_form_tender_vendor();
                var project = data.project;
                $('#id_project_tv').val(project.id_permintaan);
                $('#kode_project_tv').val(project.kode_project);
                $('#kode_project_tv').parents('.form-group').show();
                $('#nama_project_tv').val(project.nama_project);
                $('#nama_customer_tv').val(project.nama_customer);
                $('#tgl_fs_approved_tv').val(project.tgl_fs_approved);
                $('#tgl_project_final_tv').val(project.tgl_project_final);
                $('#nilai_project_tv').val(mys.formatMoney(project.nilai_project,0,',','.'));
                $('#tipe_pembelian_tv').val(project.tipe_pembelian == 'B'? 'Barang' : project.tipe_pembelian == 'J'? 'Jasa' : 'Barang & Jasa');
                $('#status_project_tv').val(project.status_project == 'P' ? 'Waiting' : project.status_project == 'W' ? 'Win' : 'Lose');

                data_detil_permintaan = data.vendor;
                reload_tabel_list_vendor();

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
        var data_post = new FormData();

        mys.blok()
        $.ajax({
            url: mys.base_url+'project/save',
            type: 'POST',
            dataType: 'JSON',
            data: data_post,
            contentType: false,
            processData: false,
            success: function(data){
                if (data.status && data.error.length == 0) {
                    mys.notifikasi("Data Berhasil Disimpan","success");
                    data_detil_permintaan = [];
                    tutup_form();
                } else{
                    mys.notifikasi("Terdapat Kesalahan dalam menyimpan data.","error");
                    if (data.error.length > 0) {
                        $('#alert_project_form').empty();

                        var html_error = '<ol>';
                        $.each(data.error, function(index, val) {
                            html_error +=  '<li>'+val+'</li>';
                        });
                        html_error += '<ol>';

                        $('#alert_project_form').html('<div class="alert alert-warning" role="alert">\
                            <strong>Error!</strong> <p>'+html_error+'</p>\
                        </div>');

                        $('#alert_project_form').fadeIn('slow');
                        setTimeout(function(){
                            $('#alert_project_form').fadeOut('slow');
                            $('#alert_project_form').empty();
                        }, 5000)
                    }
                }
            },
            error:function(data){
                mys.notifikasi("Data Gagal Disimpan, Coba Beberapa Saat Lagi.","error");

            }
        })
        .always(function() {
            mys.unblok();
            reload();
        });
    }

    function hapus(id){
        mys.blok()
        $.ajax({
            url: mys.base_url+'project/delete',
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
        });
    }

    function tutup_form() {
        $('#form_card').hide();
        $('#form_tender_card').hide();
        $('#form_tender_vendor_card').hide();
        $('#tabel_card').show();
        var t = $('#tabel').DataTable();
        t.columns.adjust().draw();
    }

    function reset_form() {
        data_detil_permintaan = [];
        form_validator.resetForm();
        $('#form')[0].reset();
        $('#form').find('input[type="hidden"]').val('');
        $('#form').find('label,select,input,textarea').removeClass('is-invalid text-red');
        $('#form').find('.cmb_select2').val('').trigger('change');
        $('#kode_project').parents('.form-group').hide();
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

    function load_unit_kerja(){
        $.ajax({
            url: mys.base_url+'permintaan_anggaran/get_unit_kerja',
            type: 'POST',
            dataType: 'JSON',
            data: null,
            success: function(data){
                $('#id_unit_kerja').empty();
                $('#id_unit_kerja').append('<option></option>');
                $.each(data, function(index, val) {
                    $('#id_unit_kerja').append('<option value="'+val.id+'">'+ val.name+'</option>');
                });
            },
            error:function(data){
                mys.notifikasi("Gagal Ambil Data.","error");
            }
        })
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
        var nominal = mys.reverse_format_ribuan($('#nominal').val());
        var keterangan = $('#keterangan').val();

        if (jenis_masukan == 'new') {
            //insert
            var d = {
                "id_detail_permintaan" : "new"+(data_detil_permintaan.length+1),
                "uraian" : uraian,
                "nominal" : nominal,
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
                "nominal" : nominal,
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
        $('#nominal').val(data.nominal);
        $('#keterangan').val(data.keterangan);
        $('#modal_detil').modal('show');
    }

    function reload_tabel_detail_permintaan() {
        tabel_detail_permintaan.clear();
        tabel_detail_permintaan.rows.add(data_detil_permintaan);
        tabel_detail_permintaan.draw();
    }


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
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="uraian">Uraian</label>
                                <input type="text" class="form-control" name="uraian" id="uraian" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input type="text" class="form-control autonumeric" name="nominal" id="nominal" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" id="keterangan" required>
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