<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h5>Anggaran</h5>
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
                    <li class="breadcrumb-item active" aria-current="page">Anggaran</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card" id="tabel_card">

            <div class="card-header d-block">
                <!-- <h6 style="font-weight: bold;">Filter Berdasarkan:</h6> -->
                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                        <label for="fl_tahun">Tahun Anggaran</label>
                        <input type="text" class="form-control tahun" data-target="#fl_tahun" name="fl_tahun" id="fl_tahun" required>
                        <!-- <span class="help-block"></span> -->
                    </div>
                    </div>

                </div>
            </div>

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
                                <th>Kode Anggaran</th>
                                <th>Nama Anggaran</th>
                                <th>Nominal</th>
                                <th>Tahun</th>
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
                    <input type="hidden" name="id_anggaran" id="id_anggaran">
                    <div class="form-group">
                        <label for="kode_anggaran">Kode Anggaran</label>
                        <input type="text" class="form-control" name="kode_anggaran" id="kode_anggaran">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <label for="nama_anggaran">Nama Anggaran</label>
                        <input type="text" class="form-control" name="nama_anggaran" id="nama_anggaran" required>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="text" class="form-control autonumeric" name="nominal" id="nominal" required>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <label for="tahun">Tahun Anggaran</label>
                        <input type="text" class="form-control tahun" data-target="#tahun" name="tahun" id="tahun" required>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group">
                        <label for="status">Status Anggaran</label>
                        <select name="status" id="status" class="form-control cmb_select2" required="required">
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

        $('#fl_tahun').val(moment().format('YYYY'));

        $('#tabel').dataTable({
            "scrollCollapse": true,
            "sDom": "t<'row'<'col-md-4'i><'col-md-8'p>>",
            "processing": true,
            "iDisplayLength": 10,
            "scrollX":true,
            "ajax":{
                url : mys.base_url+'anggaran/get_data',
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
                    if (data) {
                        data = mys.formatMoney(data,0,',','.')
                    }else{
                        data = '';
                    };
                    return '<p class="text-right">'+data+'</p>';
                },
                "targets": [3]
            },
            {
                "render": function ( data, type, row ) {
                    return data == 'A'? '<span class="badge badge-pill badge-success">Aktif</span>' : '<span class="badge badge-pill badge-danger">Tidak Aktif</span>';
                },
                "targets": [5]
            },
            {
                "render": function ( data, type, row ) {
                   return '<?= $ha['view']? '<button type="button" title="Ubah Data" data-toggle="tooltip" class="btn btn-primary ubah"><span class="fa fa-edit"></span></button> ' : '' ?><?= $ha['delete']? '<button type="button" title="Hapus Data" data-toggle="tooltip" class="btn btn-danger hapus"><span class="fa fa-trash"></span></button>' : '' ?>';
                },
                "targets": [6]
            },
            // {"className": "dt-center", "targets": [0,3]}
            ],
            "aoColumns": [
            {"sWidth": "2%" },
            {"sWidth": "5%" },
            {"sWidth": "45%"},
            {"sWidth": "18%"},
            {"sWidth": "5%"},
            {"sWidth": "5%"},
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
                kode_anggaran: {    
                    required: true,
                    remote: {
                        url: mys.base_url+"Anggaran/cek_kode_anggaran",
                        type: "POST",
                        data: {
                            id_anggaran: function() {
                                return $( "#id_anggaran" ).val();
                            },
                            kode_anggaran: function() {
                                return $( "#kode_anggaran" ).val();
                            },
                            tahun: function() {
                                return $( "#tahun" ).val();
                            }}
                        }
                    }
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
            ubah_data(data[6]);
        });

        $('#tabel tbody').on( 'click', '.hapus', function () {
            var row = $(this);
            var table = $('#tabel').DataTable();
            var data = table.row( row.parents('tr') ).data();
            mys.swconfirm("Hapus","Apakah anda yakin ingin menghapus data ini?",hapus,data[6]);
        });

        $('#input_pencarian').on('keyup', function(event) {
            var tabel = $('#tabel');
            tabel.dataTable().fnFilter($(this).val());
        });

        $('#btnAdd').on('click', function(event) {
            buka_form();
            $('#kode_bagian').prop('readonly', false);
        });

        $('#tahun').on('change.datetimepicker', function(event) {
            $("#kode_anggaran").focus();
            $("#kode_anggaran").blur();
        });

        $('#btnBack').on('click', function(event) {
            tutup_form();
        });
    });

    function buka_form() {
        reset_form();
        $('#tabel_card').hide();
        $('#form_card').show();
        mys.year_picker();
        $('#tahun').val(moment().format("YYYY"));
        $('#status').val('A').trigger('change');
        
    }

    function ubah_data(id){
        mys.blok()
        $.ajax({
            url: mys.base_url+'anggaran/get_data_by_id',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function(data){
                buka_form();
                <?= !$ha['update'] ? '$("#btnSimpan").prop("disabled",true);' : '' ?>
                <?= !$ha['update'] ? '$("#form").find("select,input,textarea").prop("disabled",true);' : '' ?>
                $('#id_anggaran').val(data.id_anggaran);
                $('#kode_anggaran').val(data.kode_anggaran);
                $('#nama_anggaran').val(data.nama_anggaran);
                $('#nominal').val(data.nominal);
                $('#tahun').val(data.tahun);
                $('#status').val(data.status).trigger('change');
                // $('#kode_anggaran').prop('readonly', true);

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
            url: mys.base_url+'anggaran/save',
            type: 'POST',
            dataType: 'JSON',
            data: $('#form').serialize(),
            success: function(data){
                console.log(data);
                if (data.status == true) {
                    mys.notifikasi("Data Berhasil Disimpan","success");
                    tutup_form();
                } else if(data.status == 'ada'){
                    mys.notifikasi
                }else{
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
            url: mys.base_url+'anggaran/delete',
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

    $('#fl_tahun').on('change.datetimepicker', function(event) {
        mys.blok();
        var tahun = $('#fl_tahun').val();
        $('#tabel').DataTable().ajax.url(mys.base_url + 'anggaran/get_data?tahun=' +tahun).load();
        mys.unblok();
    });

</script>  