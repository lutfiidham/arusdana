<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h5>Data Vendor</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Data Master</li>
                    <li class="breadcrumb-item" aria-current="page">Vendor</li>
                    <li class="breadcrumb-item active" aria-current="page">Data Vendor</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card" id="tabel_card">
            <div class="card-body">
                <div class="row clearfix">
                    <div class="col-lg-2">
                    <?php if ($ha['insert']): ?>
                        <button id="btnAdd" class="btn btn-primary btn-block">(+) Data</button>
                    <?php endif ?>
                    </div>
                    <div class="col-lg-1" style="text-align:right; padding-top:7px">
                        Cari :
                    </div>
                    <div class="col-lg-9">
                        <input type="text" id="input_pencarian" class="form-control pull-right" placeholder="ketik disini untuk mencari ...">
                    </div>
                </div>
                <div style="padding: 1%">
                    <table id="tabel" class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Vendor</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Lampiran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-6">
                        <span style="font-weight: bold">Export Data: </span>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" data-toggle="tooltip" title="Export to PDF" class="btn btn-danger" id="exportPDF">PDF</button>
                            <button type="button" data-toggle="tooltip" title="Export to Excel" class="btn btn-success" id="exportExcel">Excel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" id="lampiran_card" style="display: none;">
            <div class="card-header d-block">
                <h3>Daftar Lampiran vendor </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <form class="forms-sample" id="form_lampiran" method="POST" action="javascript:;">
                            <input type="hidden" name="id_vendor_lampiran" id="id_vendor_lampiran" value="">
                            <div class="form-group">
                                <label for="jenis_lampiran">Jenis Lampiran</label>
                                <select name="jenis_lampiran" id="jenis_lampiran" class="form-control cmb_select2" required="required">
                                </select>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="file_lampiran">File Lampiran</label>
                                <input type="file" id="file_lampiran" name="file_lampiran" class="file-upload-default" required>
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="File Lampiran">
                                    <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Pilih File</button>
                                    </span>
                                </div>
                                <span class="help-block"></span>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2" id="btnSimpanLampiran">Simpan</button>
                            <button class="btn btn-danger" type="button" id="btnBackLampiran">Batal / Kembali</button>
                        </form>
                    </div>
                    <div class="col-md-6 offset-1">
                        <div class="row clearfix">
                            <div class="col-lg-2" style="text-align:right;padding-top:7px">
                                Cari :
                            </div>
                            <div class="col-lg-10">
                                <input type="text" id="input_pencarian-lampiran" class="form-control pull-right" placeholder="ketik disini untuk mencari ...">
                            </div>
                        </div>
                        <div style="padding: 4%">
                            <table id="tabel_lampiran" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Lampiran</th>
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
                <div class="col-md-11">
                    <h3>Form</h3>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-default" data-toggle="tooltip" title="Cetak Data vendor" onclick="mys.swalert('Info','Coming Soon !')"><span class="fa fa-print"></span></button>
                </div>
            </div>
            <div class="card-body">
                <form class="forms-sample" id="form" method="POST" action="javascript:;">
                    <input type="hidden" name="id_vendor" id="id_vendor">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_tipe_vendor">Nama vendor</label>
                            <input type="text" class="form-control" name="nama_vendor" id="nama_vendor" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="npwp_vendor">NPWP</label>
                            <input type="text" class="form-control" name="npwp_vendor" id="npwp_vendor" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="alamat_vendor">Alamat</label>
                            <textarea name="alamat_vendor" id="alamat_vendor" class="form-control" rows="5" required="required"></textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <select name="provinsi" id="provinsi" class="form-control cmb_select2" required="required">
                            </select>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="kota">Kabupaten</label>
                            <select name="kota" id="kota" class="form-control cmb_select2" required="required">
                            </select>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="kode_pos_vendor">Kode Pos</label>
                            <input type="text" class="form-control" name="kode_pos_vendor" id="kode_pos_vendor" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="telp_vendor">No Telepon</label>
                            <input type="text" class="form-control" name="telp_vendor" id="telp_vendor" required>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email_vendor">Email</label>
                            <input type="email" class="form-control" name="email_vendor" id="email_vendor" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="website_vendor">Alamat Website</label>
                            <input type="text" class="form-control" name="website_vendor" id="website_vendor" required placeholder="Contoh: http://alamatwebsite.com">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="bidang_usaha_vendor">Bidang Usaha</label>
                            <input type="text" class="form-control" name="bidang_usaha_vendor" id="bidang_usaha_vendor" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="pic_vendor">PIC vendor</label>
                            <input type="text" class="form-control" name="pic_vendor" id="pic_vendor" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="telp_pic_vendor">No. Telepon PIC</label>
                            <input type="text" class="form-control" name="telp_pic_vendor" id="telp_pic_vendor" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="status_vendor">Status vendor</label>
                            <select name="status_vendor" id="status_vendor" class="form-control cmb_select2" required="required">
                                <option ></option>
                                <option value="A">Aktif</option>
                                <option value="T">Tidak Aktif</option>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>
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
    var form_validator_lampiran;
    var selected_kota=null;

    $(document).ready(function() {
        mys = Object.create(myscript_js);
        mys.init('<?= base_url() ?>');

        load_jenis_lampiran();
        load_provinsi();

        $('#tabel').dataTable({
            "scrollCollapse": true,
            "sDom": "t<'row'<'col-md-4'i><'col-md-8'p>>",
            "processing": true,
            "iDisplayLength": 10,
            "scrollX":true,   
            "ajax":{
                url : mys.base_url+'vendor/get_data',
                type : 'GET',
            },
            "language": {
                "url": mys.base_url+"assets/plugins/datatables.net/lang/Indonesian.json"
            },
            "columnDefs": [
            {"visible" : false, "targets" : []},
            {
                "render": function ( data, type, row ) {
                    return data == 'A'? '<span class="badge badge-pill badge-success">Aktif</span>' : '<span class="badge badge-pill badge-danger">Tidak Aktif</span>'
                },
                "targets": [3]
            },
            {
                "render": function ( data, type, row ) {
                    return '<button type="button" class="btn btn-primary lampiran" data-toggle="tooltip" title="Upload Lampiran">\
                                            <span class="badge badge-light">'+data+'</span>\
                                            &nbsp;Lampiran\
                                        </button>'
                },
                "targets": [4]
            },
            {
                "render": function ( data, type, row ) {
                    return '<?= $ha['view']? '<button type="button" title="Ubah Data" data-toggle="tooltip" class="btn btn-primary ubah"><span class="fa fa-edit"></span></button> ' : '' ?><?= $ha['delete']? '<button type="button" title="Hapus Data" data-toggle="tooltip" class="btn btn-danger hapus"><span class="fa fa-trash"></span></button>' : '' ?>'
                },
                "targets": [5]
            },
            // {"className": "dt-center", "targets": [0,3]}
            ],
            "aoColumns": [
            {"sWidth": "2%" },
            {"sWidth": "20%"},
            {"sWidth": "32%"},
            {"sWidth": "10%"},
            {"sWidth": "15%", "bSortable" : false},
            {"sWidth": "15%", "bSortable" : false}
            ],
            "order" : [
            [0, "asc"],
            ],
            "fnDrawCallback" : function(oSettings){
                $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });
            },
            "dom" : "frtip",
            "buttons": [
                {
                    title: 'Data vendor',
                    extend: 'pdfHtml5',
                    name: 'exportPDF',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3 ]
                    }
                },
                {
                    title: 'Data vendor',
                    extend: 'excelHtml5',
                    name: 'exportExcel',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3 ]
                    }
                },
            ]
        });

        $('#exportPDF').click(function(event) {
            var table = $('#tabel').DataTable();
            table.button('exportPDF:name').trigger('click');
        });

        $('#exportExcel').click(function(event) {
            var table = $('#tabel').DataTable();
            table.button('exportExcel:name').trigger('click');
        });


        $('#tabel_lampiran').dataTable({
            "scrollCollapse": true,
            "sDom": "t<'row'i p>",
            "processing": true,
            "scrollX":true,
            "iDisplayLength": 5,
            "ajax":{
                url : mys.base_url+'vendor/get_data_lampiran/',
                type : 'GET',
            },
            "language": {
                "url": mys.base_url+"assets/plugins/datatables.net/lang/Indonesian.json"
            },
            "columnDefs": [
            {"visible" : false, "targets" : []},
            {
                "render": function ( data, type, row ) {
                    return '<a class="btn btn-link btn-rounded" href="'+mys.base_url+'vendor/download_lampiran?file='+data+'&vendor='+row[2]+'" title=""><span class="fa fa-download"></span>&nbsp;&nbsp;'+data+'</a>';
                },
                "targets": [1]
            },
            {
                "render": function ( data, type, row ) {
                    return '<?= $ha['delete']? '<button type="button" title="Hapus Data" data-toggle="tooltip" class="btn btn-danger hapus"><span class="fa fa-trash"></span></button>' : ''?>'
                },
                "targets": [2]
            },
            // {"className": "dt-center", "targets": [0,3]}
            ],
            "aoColumns": [
            {"sWidth": "2%" },
            {"sWidth": "48%"},
            {"sWidth": "10%", "bSortable" : false}
            ],
            "order" : [
            [0, "asc"],
            ],
            "fnDrawCallback" : function(oSettings){
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
                error.insertAfter(element.parent("div").find(".help-block"));
            },
            submitHandler: function(form) {
                form.submit();
            },
            rules: {
                npwp_vendor: {
                    required: true,
                    digits: true
                },
                kode_pos_vendor: {
                    required: true,
                    digits: true
                }, 
                telp_vendor: {
                    required: true,
                    digits: true
                },  
                telp_pic_vendor: {
                    required: true,
                    digits: true
                },   
                website_vendor: {
                    required: true,
                    url: true
                }, 
            },
        });

        form_validator_lampiran = $('#form_lampiran').validate({
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
                error.insertAfter(element.parent("div").find(".help-block"));
            },
            submitHandler: function(form) {
                form.submit();
            },
        });
        
        $("#form").submit(function(event) {
            if (form_validator.form()) {
                simpan();
            }
        });

        $("#form_lampiran").submit(function(event) {
            if (form_validator_lampiran.form()) {
                simpan_lampiran();
            }
        });

        $('#provinsi').on('change', function(event) {
            load_kota($(this).val(),selected_kota)
        }); 

        $('#tabel tbody').on( 'click', '.ubah', function () {
            var row = $(this);
            var table = $('#tabel').DataTable();
            var data = table.row( row.parents('tr') ).data();
            ubah_data(data[5]);
        });

        $('#tabel tbody').on( 'click', '.lampiran', function () {
            var row = $(this);
            var table = $('#tabel').DataTable();
            var data = table.row( row.parents('tr') ).data();
            kelola_lampiran(data[5]);
        });

        $('#tabel tbody').on( 'click', '.hapus', function () {
            var row = $(this);
            var table = $('#tabel').DataTable();
            var data = table.row( row.parents('tr') ).data();
            mys.swconfirm("Hapus","Apakah anda yakin ingin menghapus data ini?",hapus,data[5]);
        });

        $('#tabel_lampiran tbody').on( 'click', '.hapus', function () {
            var row = $(this);
            var table = $('#tabel_lampiran').DataTable();
            var data = table.row( row.parents('tr') ).data();

            var data_send = {};
            data_send.id_vendor = data[2];
            data_send.id_jenis_lampiran = data[3];
            data_send.nama_lampiran = data[1];
            mys.swconfirm("Hapus","Apakah anda yakin ingin menghapus data ini?",hapus_lampiran,data_send);
        });

        $('#input_pencarian').on('keyup', function(event) {
            var tabel = $('#tabel');
            tabel.dataTable().fnFilter($(this).val());
        });

        $('#input_pencarian-lampiran').on('keyup', function(event) {
            var tabel = $('#tabel_lampiran');
            tabel.dataTable().fnFilter($(this).val());
        });

        $('#btnAdd').on('click', function(event) {
           buka_form();
        });

        $('#btnBack').on('click', function(event) {
            tutup_form();
        });

        $('#btnBackLampiran').on('click', function(event) {
            tutup_form_lampiran();
        });

        $('#fl_tipe_vendor').change(function(event) {
            var tipe_vendor = $('#fl_tipe_vendor').val();
            $('#tabel').DataTable().ajax.url(mys.base_url + 'vendor/get_data?tipe_vendor=' + tipe_vendor).load();
            
        });
    });

    function buka_form() {
        reset_form();
        $('#tabel_card').hide();
        $('#form_card').show();
    }

    function buka_form_lampiran(id_vendor) {
        reset_form_lampiran();
        $('#tabel_card').hide();
        $('#lampiran_card').show();
        var tahun = $('#tahun_periode').val();
        <?= !$ha['update'] ? '$("#btnSimpanLampiran").prop("disabled",true);' : '' ?>
        <?= !$ha['update'] ? '$("#form_lampiran").find("select,input,textarea").prop("disabled",true);' : '' ?>
        $('#tabel_lampiran').DataTable().ajax.url(mys.base_url + 'vendor/get_data_lampiran?vendor=' + id_vendor).load();
    }

    function ubah_data(id){
        mys.blok()
        $.ajax({
            url: mys.base_url+'vendor/get_data_by_id',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function(data){
                buka_form();
                <?= !$ha['update'] ? '$("#btnSimpan").prop("disabled",true);' : '' ?>
                <?= !$ha['update'] ? '$("#form").find("select,input,textarea").prop("disabled",true);' : '' ?>
                selected_kota = data.city_id;
                $('#id_vendor').val(data.id_vendor);
                $('#nama_vendor').val(data.nama_vendor);
                $('#npwp_vendor').val(data.npwp_vendor);
                $('#alamat_vendor').val(data.alamat_vendor);
                $('#kode_pos_vendor').val(data.kode_pos_vendor);
                $('#telp_vendor').val(data.telp_vendor);
                $('#email_vendor').val(data.email_vendor);
                $('#website_vendor').val(data.website_vendor);
                $('#bidang_usaha_vendor').val(data.bidang_usaha_vendor);
                $('#pic_vendor').val(data.pic_vendor);
                $('#telp_pic_vendor').val(data.telp_pic_vendor);
                $('#status_vendor').val(data.status_vendor).trigger('change');
                $('#provinsi').val(data.province_id).trigger('change');
            },
            error:function(data){
                mys.notifikasi("Gagal Mengambil data dari server","error");
            }
        })
        .always(function() {
            mys.unblok();
        });
    }

    function kelola_lampiran(id) {
        mys.blok()
        buka_form_lampiran(id);
        $('#id_vendor_lampiran').val(id);
        mys.unblok();   
    }

    function simpan(){
        mys.blok()
        $.ajax({
            url: mys.base_url+'vendor/save',
            type: 'POST',
            dataType: 'JSON',
            data: $('#form').serialize(),
            success: function(data){
                if (data.status) {
                    mys.notifikasi("Data Berhasil Disimpan","success");
                    tutup_form();
                } else{
                    mys.notifikasi("Data Gagal Disimpan, Coba Beberapa Saat Lagi.","error");
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

    function simpan_lampiran(){
        mys.blok()
        var formData = new FormData($('#form_lampiran')[0]);
        $.ajax({
            url: mys.base_url+'vendor/save_lampiran',
            type: 'POST',
            dataType: 'JSON',
            contentType: false,
            processData: false,
            data: formData,
            success: function(data){
                if (data.status) {
                    mys.notifikasi("Data Berhasil Disimpan","success");
                    reset_form_lampiran();
                } else{
                    mys.notifikasi((data.pesan)? data.pesan : "Data Gagal Disimpan, Coba Beberapa Saat Lagi.","error");
                }
            },
            error:function(data){
                mys.notifikasi("Data Gagal Disimpan, Coba Beberapa Saat Lagi.","error");

            }
        })
        .always(function() {
            reload_lampiran();
            reload();
            mys.unblok();
        });
    }

    function hapus(id){
        mys.blok()
        $.ajax({
            url: mys.base_url+'vendor/delete',
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

    function hapus_lampiran(data) {
        mys.blok()
        $.ajax({
            url: mys.base_url+'vendor/delete_lampiran',
            type: 'POST',
            dataType: 'JSON',
            data: data,
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
            reload_lampiran();
            reload();
            mys.unblok();
        });

    }

    function tutup_form() {
        $('#form_card').hide();
        $('#tabel_card').show();
    }

    function tutup_form_lampiran() {
        $('#lampiran_card').hide();
        $('#tabel_card').show();
        reload();
    }

    function reset_form() {
        form_validator.resetForm();
        selected_kota = null;
        $('#form')[0].reset();
        $('#form').find('input[type="hidden"]').val('');
        $('#form').find('label,select,input,textarea').removeClass('is-invalid text-red');
        $('#form').find('.cmb_select2').val(null).trigger('change');
        <?= !$ha['update'] ? '$("#btnSimpan").prop("disabled",false);' : '' ?>
        <?= !$ha['update'] ? '$("#form").find("select,input,textarea").prop("disabled",false);' : '' ?>
    }

    function reset_form_lampiran() {
        form_validator_lampiran.resetForm();
        $('#form_lampiran')[0].reset();
        // $('#form_lampiran').find('input[type="hidden"]').val('');
        $('#form_lampiran').find('label,select,input,textarea').removeClass('is-invalid text-red');
        $('#form_lampiran').find('.cmb_select2').val(null).trigger('change');
        <?= !$ha['update'] ? '$("#btnSimpanLampiran").prop("disabled",false);' : '' ?>
        <?= !$ha['update'] ? '$("#form_lampiran").find("select,input,textarea").prop("disabled",false);' : '' ?>
    }

    function reload() {
        var t = $('#tabel').DataTable();
        t.ajax.reload();
    }

    function reload_lampiran() {
        var t = $('#tabel_lampiran').DataTable();
        t.ajax.reload();
    }

    function load_jenis_lampiran(){
        $.ajax({
            url: mys.base_url+'vendor/get_jenis_lampiran',
            type: 'POST',
            dataType: 'JSON',
            data: null,
            success: function(data){
                $('#jenis_lampiran').empty();
                $('#jenis_lampiran').append('<option></option>');
                $.each(data, function(index, val) {
                    $('#jenis_lampiran').append('<option value="'+val.id+'">'+ val.name+'</option>');
                });
            },
            error:function(data){
                mys.notifikasi("Gagal Ambil Data.","error");
            }
        })
    }

    function load_provinsi(value=null){
        $.ajax({
            url: mys.base_url+'vendor/get_province',
            type: 'POST',
            dataType: 'JSON',
            data: null,
            success: function(data){
                $('#provinsi').empty();
                $('#provinsi').append('<option></option>');
                $.each(data, function(index, val) {
                    $('#provinsi').append('<option value="'+val.id+'">'+ val.name+'</option>');
                });
            },
            error:function(data){
                mys.notifikasi("Gagal Ambil Data.","error");
            }
        })
    }

    function load_kota(province_id,value=null){
        $.ajax({
            url: mys.base_url+'vendor/get_city',
            type: 'POST',
            dataType: 'JSON',
            data: {
                province_id : province_id,
            },
            success: function(data){
                $('#kota').empty();
                $('#kota').append('<option></option>');
                $.each(data, function(index, val) {
                    var selected = val.id ==  value? 'selected' : '';
                    $('#kota').append('<option value="'+val.id+'" '+selected+'>'+ val.name+'</option>');
                });
                $('#kota').val(value).trigger('change');
            },
            error:function(data){
                mys.notifikasi("Gagal Ambil Data.","error");
            }
        })
    }


</script>  