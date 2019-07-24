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
                <form class="forms-sample" id="form_reimburse">
                    <div class="form-group alert alert-primary">
                        <label for="kode_bagian">Dibuat Oleh</label>
                        <input type="text" class="form-control" name="reimburse-dibuat" id="reimburse-dibuat" required="">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group alert alert-primary">
                        <label for="nama_bagian">Jabatan Yang Membuat</label>
                        <input type="text" class="form-control" name="reimburse-jabatan_pembuat" id="reimburse-jabatan_pembuat" required>
                        <span class="help-block"></span>
                    </div>

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
    });

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