<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h5>Data Sales</h5>
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
                    <li class="breadcrumb-item" aria-current="page">Sales</li>
                    <li class="breadcrumb-item active" aria-current="page">Data Sales</li>
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
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>No Telp.</th>
                                <th>Email</th>
                                <th>Jabatan</th>
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
        <div class="card" id="form_card" style="display: none">
            <div class="card-header"><h3>Form</h3></div>
            <div class="card-body">
                <form class="forms-sample" id="form" method="POST" action="javascript:;">
                    <input type="hidden" name="id_sales" id="id_sales">
                    <div class="form-group">
                        <label for="id_jabatan">Jabatan</label>
                        <select name="id_jabatan" id="id_jabatan" class="form-control cmb_select2" required="required">
                        </select>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="nik_sales">Nomor Induk Karyawan</label>
                        <input type="text" class="form-control" name="nik_sales" id="nik_sales" required>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group">
                        <label for="nama_sales">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_sales" id="nama_sales" required>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <label for="telp_sales">Nomor Telepon</label>
                        <input type="text" class="form-control" name="telp_sales" id="telp_sales" required>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <label for="email_sales">Email</label>
                        <input type="text" class="form-control" name="email_sales" id="email_sales" required>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <label for="status_sales">Status sales</label>
                        <select name="status_sales" id="status_sales" class="form-control cmb_select2" required="required">
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

        load_jabatan();
        $('#tabel').dataTable({
            "scrollCollapse": true,
            "sDom": "t<'row'<'col-md-4'i><'col-md-8'p>>",
            "processing": true,
            "iDisplayLength": 10,
            "scrollX":true,
            "ajax":{
                url : mys.base_url+'sales/get_data',
                type : 'GET',
            },
            "language": {
                "url": mys.base_url+"assets/plugins/datatables.net/lang/Indonesian.json"
            },
            "columnDefs": [
            {"visible" : false, "targets" : []},
            {
                "render": function ( data, type, row ) {
                    return data == 'A'? '<span class="badge badge-pill badge-success">Aktif</span>' : '<span class="badge badge-pill badge-danger">Tidak Aktif</span>';
                },
                "targets": [6]
            },
            {
                "render": function ( data, type, row ) {
                   return '<?= $ha['view']? '<button type="button" title="Ubah Data" data-toggle="tooltip" class="btn btn-primary ubah"><span class="fa fa-edit"></span></button> ' : '' ?><?= $ha['delete']? '<button type="button" title="Hapus Data" data-toggle="tooltip" class="btn btn-danger hapus"><span class="fa fa-trash"></span></button>' : '' ?>';
                },
                "targets": [7]
            },
            // {"className": "dt-center", "targets": [0,3]}
            ],
            "aoColumns": [
            {"sWidth": "2%" },
            {"sWidth": "10%"},
            {"sWidth": "20%"},
            {"sWidth": "13%"},
            {"sWidth": "15%"},
            {"sWidth": "15%"},
            {"sWidth": "8%"},
            {"sWidth": "18%", "bSortable" : false}
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
                telp_sales: {
                    required: true,
                    digits: true
                },
                email_sales: {
                    required: true,
                    email: true
                }, 
                nik_sales: {
                    required: true,
                    digits: true
                },
            },
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
            ubah_data(data[7]);
        });

        $('#tabel tbody').on( 'click', '.hapus', function () {
            var row = $(this);
            var table = $('#tabel').DataTable();
            var data = table.row( row.parents('tr') ).data();
            mys.swconfirm("Hapus","Apakah anda yakin ingin menghapus data ini?",hapus,data[7]);
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
    });

    function buka_form() {
        reset_form();
        $('#tabel_card').hide();
        $('#form_card').show();
    }

    function ubah_data(id){
        mys.blok()
        $.ajax({
            url: mys.base_url+'sales/get_data_by_id',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function(data){
                buka_form();
                <?= !$ha['update'] ? '$("#btnSimpan").prop("disabled",true);' : '' ?>
                <?= !$ha['update'] ? '$("#form").find("select,input,textarea").prop("disabled",true);' : '' ?>
                $('#id_sales').val(data.id_sales);
                $('#id_jabatan').val(data.id_jabatan).trigger('change');
                $('#nik_sales').val(data.nik_sales);
                $('#nama_sales').val(data.nama_sales);
                $('#telp_sales').val(data.telp_sales);
                $('#email_sales').val(data.email_sales);
                $('#status_sales').val(data.status_sales).trigger('change');
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
            url: mys.base_url+'sales/save',
            type: 'POST',
            dataType: 'JSON',
            data: $('#form').serialize(),
            success: function(data){
                if (data.status) {
                    mys.notifikasi("Data Berhasil Disimpan","success");
                    tutup_form();
                } else{
                    if (data.pesan != '') {
                        mys.notifikasi(data.pesan,"error");
                    } else{
                        mys.notifikasi("Data Gagal Disimpan, Coba Beberapa Saat Lagi.","error");
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
            url: mys.base_url+'sales/delete',
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
        $('#form').find('label,select,input,textarea').removeClass('is-invalid text-red');
        $('#form').find('.cmb_select2').val('').trigger('change');
        <?= !$ha['update'] ? '$("#btnSimpan").prop("disabled",false);' : '' ?>
        <?= !$ha['update'] ? '$("#form").find("select,input,textarea").prop("disabled",false);' : '' ?>
    }

    function reload() {
        var t = $('#tabel').DataTable();
        t.ajax.reload();
    }

    function load_jabatan(){
        $.ajax({
            url: mys.base_url+'sales/get_jabatan',
            type: 'POST',
            dataType: 'JSON',
            data: null,
            success: function(data){
                $('#id_jabatan').empty();
                $('#id_jabatan').append('<option></option>');
                $.each(data, function(index, val) {
                    $('#id_jabatan').append('<option value="'+val.id+'">'+ val.name+'</option>');
                });
            },
            error:function(data){
                mys.notifikasi("Gagal Ambil Data.","error");
            }
        })
    }


</script>  