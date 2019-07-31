<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h5>Setting Tanda Tangan</h5>
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
                    <li class="breadcrumb-item active" aria-current="page">Setting Tanda Tangan</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card" id="card_permintaan">
            <div class="card-header"><h3>Form Permintaan Anggaran</h3></div>
            <div class="card-body">
                <form class="forms-sample" id="form_permintaan">
                    <div class="form-group alert alert-primary">
                        <label for="kode_bagian">Dibuat Oleh</label>
                        <input type="text" class="form-control" name="permintaan-dibuat" id="permintaan-dibuat" required="">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group alert alert-primary">
                        <label for="kode_bagian">Jabatan Yang Membuat</label>
                        <input type="text" class="form-control" name="permintaan-jabatan_pembuat" id="permintaan-jabatan_pembuat" required="">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group alert alert-info">
                        <label for="nama_bagian">Diperiksa Oleh</label>
                        <input type="text" class="form-control" name="permintaan-diperiksa" id="permintaan-diperiksa" required>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group alert alert-info">
                        <label for="nama_bagian">Jabatan Pemeriksa</label>
                        <input type="text" class="form-control" name="permintaan-jabatan_pemeriksa" id="permintaan-jabatan_pemeriksa" required>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group alert alert-warning">
                        <label for="kode_bagian">Diketahui Oleh</label>
                        <input type="text" class="form-control" name="permintaan-diketahui" id="permintaan-diketahui" required="">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group alert alert-warning">
                        <label for="kode_bagian">Jabatan yang Mengetahui</label>
                        <input type="text" class="form-control" name="permintaan-jabatan_yg_mengetahui" id="permintaan-jabatan_yg_mengetahui" required="">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group alert alert-danger">
                        <label for="nama_bagian">Disetujui Oleh</label>
                        <input type="text" class="form-control" name="permintaan-disetujui" id="permintaan-disetujui" required>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group alert alert-danger">
                        <label for="nama_bagian">Jabatan yang Menyetujui</label>
                        <input type="text" class="form-control" name="permintaan-jabatan_penyetuju" id="permintaan-jabatan_penyetuju" required>
                        <span class="help-block"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" id="card_permintaan">
            <div class="card-header"><h3>Form Arus Dana</h3></div>
            <div class="card-body">
                <form class="forms-sample" id="form_realisasi">
                    <div class="form-group alert alert-primary">
                        <label for="kode_bagian">Dibuat Oleh</label>
                        <input type="text" class="form-control" name="realisasi-dibuat" id="realisasi-dibuat" required="">
                        <span class="help-block"></span>
                    </div>

                    
                    <div class="form-group alert alert-primary">
                        <label for="kode_bagian">Jabatan Yang Membuat</label>
                        <input type="text" class="form-control" name="realisasi-jabatan_pembuat" id="realisasi-jabatan_pembuat" required="">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group alert alert-info">
                        <label for="nama_bagian">Diperiksa Oleh</label>
                        <input type="text" class="form-control" name="realisasi-diperiksa" id="realisasi-diperiksa" required>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group alert alert-info">
                        <label for="nama_bagian">Jabatan Pemeriksa</label>
                        <input type="text" class="form-control" name="realisasi-jabatan_pemeriksa" id="realisasi-jabatan_pemeriksa" required>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group alert alert-warning">
                        <label for="kode_bagian">Diketahui Oleh</label>
                        <input type="text" class="form-control" name="realisasi-diketahui" id="realisasi-diketahui" required="">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group alert alert-warning">
                        <label for="kode_bagian">Jabatan yang Mengetahui</label>
                        <input type="text" class="form-control" name="realisasi-jabatan_yg_mengetahui" id="realisasi-jabatan_yg_mengetahui" required="">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group alert alert-danger">
                        <label for="nama_bagian">Disetujui Oleh</label>
                        <input type="text" class="form-control" name="realisasi-disetujui" id="realisasi-disetujui" required>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group alert alert-danger">
                        <label for="nama_bagian">Jabatan yang Menyetujui</label>
                        <input type="text" class="form-control" name="realisasi-jabatan_penyetuju" id="realisasi-jabatan_penyetuju" required>
                        <span class="help-block"></span>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" id="card_permintaan">
            <div class="card-header"><h3>Reimburse BBM</h3></div>
            <div class="card-body">
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
                                    <div class="col-lg-4">
                                    <?php if ($ha['insert']): ?>
                                        <button id="btnAdd" class="btn btn-primary btn-block">(+) Tambah</button>
                                    <?php endif ?>
                                    </div>
                                    
                                </div>
                                <div style="padding: 1%">
                                    <table id="tabel" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Dibuat Oleh</th>
                                                <th>Jabatan</th>
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
                            <div class="card-header"><h6>Tambah Pembuat Reimburse</h6></div>
                            <div class="card-body">
                                <form class="forms-sample" id="form" method="POST" action="javascript:;">
                                    <input type="hidden" name="id_pj" id="id_pj">
                                    
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" required>
                                        <span class="help-block"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan" id="jabatan" required>
                                        <span class="help-block"></span>
                                    </div>

                                    <button id="btnSimpan" type="submit" class="btn btn-primary mr-2">Simpan</button>
                                    <button class="btn btn-danger" type="button" id="btnBack">Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <form class="forms-sample" id="form_reimburse">
                    <!-- <div class="form-group alert alert-primary">
                        <label for="kode_bagian">Dibuat Oleh</label>
                        <input type="text" class="form-control" name="reimburse-dibuat" id="reimburse-dibuat" required="">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group alert alert-primary">
                        <label for="nama_bagian">Jabatan Yang Membuat</label>
                        <input type="text" class="form-control" name="reimburse-jabatan_pembuat" id="reimburse-jabatan_pembuat" required>
                        <span class="help-block"></span>
                    </div> -->

                    <div class="form-group alert alert-danger">
                        <label for="nama_bagian">Disetujui Oleh</label>
                        <input type="text" class="form-control" name="reimburse-disetujui" id="reimburse-disetujui" required>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group alert alert-danger">
                        <label for="nama_bagian">Jabatan Yang Menyetujui</label>
                        <input type="text" class="form-control" name="reimburse-jabatan_penyetuju" id="reimburse-jabatan_penyetuju" required>
                        <span class="help-block"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card" id="card_permintaan">
            <div class="card-body">
                <button class="btn btn-primary" id="btn-simpan">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var mys;
    var form_permintaan_validator;
    var form_realisasi_validator;
    var form_reimburse_validator;

    $(document).ready(function() {
        mys = Object.create(myscript_js);
        mys.init('<?= base_url() ?>');

        form_permintaan_validator = $('#form_permintaan').validate({
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
                simpan();
            }
        });

        form_realisasi_validator = $('#form_realisasi').validate({
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
                simpan();
            }
        });

        form_reimburse_validator = $('#form_reimburse').validate({
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
                simpan();
            }
        });
        
        $("#form").submit(function(event) {
            if (form_permintaan_validator.form()) {
                simpan();
            }
        });

        $('#btn-simpan').click(function(event) {
            simpan();
        });

        loadData();


        
//Untuk pemegang jabatan

        $('#tabel').dataTable({
            "scrollCollapse": true,
            "bPaginate": false,
            "sDom": "t<'row'<'col-md-4'i><'col-md-8'p>>",
            "processing": true,
            "iDisplayLength": 10,
            "scrollX":true,
            "bInfo" : false,
            "ajax":{
                url : mys.base_url+'tandatangan/get_data',
                type : 'GET',
            },
            "language": {
                "url": mys.base_url+"assets/plugins/datatables.net/lang/Indonesian.json"
            },
            "columnDefs": [
            {"visible" : false, "targets" : []},
            {
                "render": function ( data, type, row ) {
                    return data;
                },
                "targets": [2]
            },
            {
                "render": function ( data, type, row ) {
                   return '<?= $ha['view']? '<button type="button" title="Ubah Data" data-toggle="tooltip" class="btn btn-primary ubah"><span class="fa fa-edit"></span></button> ' : '' ?><?= $ha['delete']? '<button type="button" title="Hapus Data" data-toggle="tooltip" class="btn btn-danger hapus"><span class="fa fa-trash"></span></button>' : '' ?>';
                },
                "targets": [3]
            },
            // {"className": "dt-center", "targets": [0,3]}
            ],
            "aoColumns": [
            {"sWidth": "2%" },
            {"sWidth": "40%"},
            {"sWidth": "18%"},
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
            console.log(data);
            ubah_data(data[3]);
        });

        $('#tabel tbody').on( 'click', '.hapus', function () {
            var row = $(this);
            var table = $('#tabel').DataTable();
            var data = table.row( row.parents('tr') ).data();
            mys.swconfirm("Hapus","Apakah anda yakin ingin menghapus data ini?",hapus,data[4]);
        });

        $('#input_pencarian').on('keyup', function(event) {
            var tabel = $('#tabel');
            tabel.dataTable().fnFilter($(this).val());
        });

        $('#btnAdd').on('click', function(event) {
            buka_form();
            $('#kode_unit_kerja').prop('readonly', false);
        });

        $('#btnBack').on('click', function(event) {
            tutup_form();
        });
    });

    function buka_form() {
        reset_form();
        $('#tabel_card').hide();
        $('#form_card').show();
        topFunction();
    }

    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }

    function ubah_data(id){
        mys.blok()
        $.ajax({
            url: mys.base_url+'tandatangan/get_data_by_id',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function(data){
                buka_form();
                <?= !$ha['update'] ? '$("#btnSimpan").prop("disabled",true);' : '' ?>
                <?= !$ha['update'] ? '$("#form").find("select,input,textarea").prop("disabled",true);' : '' ?>
                $('#id_pj').val(data.id_pj);
                $('#nama').val(data.nama);
                $('#jabatan').val(data.jabatan);
                // $('#kode_unit_kerja').prop('readonly', true);
            },
            error:function(data){
                mys.notifikasi("Gagal Mengambil data dari server","error");
            }
        })
        .always(function() {
            mys.unblok();
        });
    }

    function simpan_pj(){
        mys.blok()
        $.ajax({
            url: mys.base_url+'tandatangan/save_pj',
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
            url: mys.base_url+'unit_kerja/delete',
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

    function loadData() {
        $.ajax({
            url: mys.base_url + 'tandatangan',
            dataType: 'json',
            success: function (json) {
                if (json.data) {
                    for (var tipe in json.data) {
                        for (var key in json.data[tipe]) {
                            $('#' + tipe + '-' + key).val(json.data[tipe][key]);
                        }
                    }
                }
            }
        });
    }

    function simpan(){
        mys.blok()
        $.ajax({
            url: mys.base_url+'tandatangan/save',
            type: 'POST',
            dataType: 'JSON',
            data: $('form').serialize(),
            success: function(data){
                if (data.status) {
                    mys.notifikasi("Data Berhasil Disimpan","success");
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
        });
    }

</script>  