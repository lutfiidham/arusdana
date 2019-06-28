<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h5>Data Admin</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Admin Master</li>
                    <li class="breadcrumb-item active" aria-current="page">Data Admin</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card" id="tabel_card">
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
                    <table id="tabel" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Level</th>
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
    <div class="col-md-12">
        <div class="card" id="form_card" style="display: none">
            <div class="card-header"><h3>Form</h3></div>
            <div class="card-body">
                <form class="forms-sample" id="form" method="POST" action="javascript:;">
                    <input type="hidden" name="id_admin" id="id_admin">
                    <div class="form-group">
                        <label for="nama_admin">Nama Admin</label>
                        <input type="text" class="form-control" name="nama_admin" id="nama_admin" required>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="level_admin">Level Admin</label>
                        <select name="level_admin" id="level_admin" class="form-control cmb_select2" required="required">
                            <option ></option>
                            <option value="ADR">Administrator</option>
                            <option value="ADM">Admin</option>
                            <option value="MNG">Manager</option>
                        </select>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="password_admin">Password</label>
                        <input type="password" class="form-control" name="password_admin" id="password_admin" required>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group" id="check_ubah_password" style="display: none">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="ubah_password" id="ubah_password">
                            <span class="custom-control-label">&nbsp;Ubah Password</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="status_admin">Status Admin</label>
                        <select name="status_admin" id="status_admin" class="form-control cmb_select2" required="required">
                            <option ></option>
                            <option value="A">Aktif</option>
                            <option value="T">Tidak Aktif</option>
                        </select>
                        <span class="help-block"></span>
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

    $(document).ready(function() {
        mys = Object.create(myscript_js);
        mys.init('<?= base_url() ?>');

        $('#tabel').dataTable({
            "scrollCollapse": true,
            "sDom": "t<'row'<'col-md-4'i><'col-md-8'p>>",
            "processing": true,
            "scrollX":true,
            "iDisplayLength": 10,
            "ajax":{
                url : mys.base_url+'admin/get_data',
                type : 'GET',
            },
            "language": {
                "url": mys.base_url+"assets/plugins/datatables.net/lang/Indonesian.json"
            },
            "columnDefs": [
            {"visible" : false, "targets" : []},
            {
                "render": function ( data, type, row ) {
                    if (data=='ADR') {
                        return '<span class="badge badge-pill badge-info">Administrator</span>';
                    } else if(data=='ADM'){
                        return '<span class="badge badge-pill badge-info">Admin</span>';
                    } else if (data=='MNG'){
                        return '<span class="badge badge-pill badge-info">Manager</span>';
                    } else{
                        return '<span class="badge badge-pill badge-info">Level Tidak Ditemukan</span>';
                    }


                },
                "targets": [3]
            },
            {
                "render": function ( data, type, row ) {
                    return data == 'A'? '<span class="badge badge-pill badge-success">Aktif</span>' : '<span class="badge badge-pill badge-danger">Tidak Aktif</span>'
                },
                "targets": [4]
            },
            {
                "render": function ( data, type, row ) {
                    return '<?= $ha['view']? '<button type="button" title="Ubah Data" data-toggle="tooltip" class="btn btn-primary ubah"><span class="fa fa-edit"></span></button> ' : '' ?><?= $ha['delete']? '<button type="button" title="Hapus Data" data-toggle="tooltip" class="btn btn-danger hapus"><span class="fa fa-trash"></span></button>' : '' ?>';
                },
                "targets": [5]
            },
            // {"className": "dt-center", "targets": [0,3]}
            ],
            "aoColumns": [
            {"sWidth": "2%" },
            {"sWidth": "15%"},
            {"sWidth": "38%"},
            {"sWidth": "15%"},
            {"sWidth": "15%"},
            {"sWidth": "15%", "bSortable" : false}
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
            }
        });
        
        $("#form").submit(function(event) {
            if (form_validator.form()) {
                simpan();
            }
        });

        $('#tabel tbody').on( 'click', '.ubah', function () {
            var row = $(this);
            var table = $('#tabel').DataTable();
            var data = table.row( row.parents('tr') ).data();
            ubah_data(data[5]);
        });

        $('#tabel tbody').on( 'click', '.hapus', function () {
            var row = $(this);
            var table = $('#tabel').DataTable();
            var data = table.row( row.parents('tr') ).data();
            mys.swconfirm("Hapus","Apakah anda yakin ingin menghapus data ini?",hapus,data[5]);
        });

        $('#input_pencarian').on('keyup', function(event) {
            var tabel = $('#tabel');
            tabel.dataTable().fnFilter($(this).val());
        });

        $('#btnAdd').on('click', function(event) {
           buka_form();
        });

        $('#btnBack').on('click', function(event) {
            tutup_form();
        });

        $('#ubah_password').click(function(event) {
            $('#password_admin').val('');
            $('#password_admin').parents('div').find('.help-block').next().empty();
            $('#password_admin').parents('div').removeClass('is-invalid text-red');
            $('#password_admin').parents('div').find('label').removeClass('is-invalid text-red');
            $('#password_admin').removeClass('is-invalid text-red');
            if ($(this).is(':checked')) {
                $('#password_admin').attr('disabled', false);
            } else{
                $('#password_admin').attr('disabled', true);
            }
        });
    });

    function buka_form() {
        reset_form();
        $('#tabel_card').hide();
        $('#form_card').show();
    }

    function ubah_data(id){
        mys.blok()
        $.ajax({
            url: mys.base_url+'admin/get_data_by_id',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function(data){
                buka_form();
                <?= !$ha['update'] ? '$("#btnSimpan").prop("disabled",true);' : '' ?>
                <?= !$ha['update'] ? '$("#form").find("select,input,textarea").prop("disabled",true);' : '' ?>
                $('#check_ubah_password').show();
                $('#password_admin').attr('disabled', true);
                $('#id_admin').val(data.id_admin);
                $('#username').val(data.username).attr('readonly', true);
                $('#nama_admin').val(data.nama_admin);
                $('#level_admin').val(data.level_admin).trigger('change');
                $('#status_admin').val(data.status_admin).trigger('change');
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
        mys.blok()
        $.ajax({
            url: mys.base_url+'admin/save',
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

    function hapus(id){
        mys.blok()
        $.ajax({
            url: mys.base_url+'admin/delete',
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
        $('#tabel_card').show();
    }

    function reset_form() {
        form_validator.resetForm();
        $('#form')[0].reset();
        $('#form').find('input[type="hidden"]').val('');
        $('#check_ubah_password').hide();
        $('#form').find('label,select,input,textarea').removeClass('is-invalid text-red');  
        $('#form').find('label,select,input,textarea').removeAttr('disabled');
        $('#form').find('label,select,input,textarea').removeAttr('readonly');
        $('#form').find('.cmb_select2').val('').trigger('change');
        <?= !$ha['update'] ? '$("#btnSimpan").prop("disabled",false);' : '' ?>
        <?= !$ha['update'] ? '$("#form").find("select,input,textarea").prop("disabled",false);' : '' ?>
    }

    function reload() {
        var t = $('#tabel').DataTable();
        t.ajax.reload();
    }


</script>  