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
                                    <th data-width="8%">Nominal Anggaran</th>
                                    <th data-width="15%">Keterangan</th>
                                    <th data-width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <p><i>Nb: Klik pada status untuk melihat detil keterangan</i></p>
                    </div>

                    <div class="row">
                         <div class="col-md-12" id="alert_project_form">
                         </div>
                    </div>
                    <button id="btnSimpan" type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <button class="btn btn-danger" type="button" id="btnBack">Batal</button>
                </form>
            </div>
        </div>
        <div class="card" id="form_tender_card" style="display: none">
            <div class="card-header">
                <h3 class="col-6 float-left">Form Tender</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" id="form_tender" method="POST" action="javascript:;">
                    <input type="hidden" name="id_project_tender" id="id_project_tender">
                    <input type="hidden" name="tgl_pengisian_tender" id="tgl_pengisian_tender">
                    <div class="row">
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <div class="form-group" style="display: none">
                                <label for="kode_project_tender">Kode Project</label>
                                <input type="text" class="form-control" name="kode_project_tender" id="kode_project_tender" readonly>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="nama_project_tender">Nama Project</label>
                                <input type="text" class="form-control" name="nama_project_tender" id="nama_project_tender" readonly>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="nama_customer_tender">Nama Customer</label>
                                <input type="text" class="form-control" name="nama_customer_tender" id="nama_customer_tender" readonly>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="tipe_pembelian_tender">Tipe Pembelian</label>
                                <input type="text" class="form-control" name="tipe_pembelian_tender" id="tipe_pembelian_tender" readonly>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="status_project_tender">Status Project</label>
                                <select name="status_project_tender" id="status_project_tender" class="form-control cmb_select2" required="required">
                                    <option></option>
                                    <option value="P">Waiting</option>
                                    <option value="W">Win</option>
                                    <option value="L">Lose</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                            <div id="fs_barang_tender" style="display: none">
                            <h6 class="font-weight-bold">FS Barang</h6>
                            <hr>
                            <div class="form-group">
                                <label for="spk_fs_barang_tender">No. PO/SPKB</label>
                                <input type="text" class="form-control" name="spk_fs_barang_tender" id="spk_fs_barang_tender" required>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="tgl_fs_barang_tender">Tanggal Terima</label>
                                <input type="text" class="form-control tgl" data-target="#tgl_fs_barang_tender" name="tgl_fs_barang_tender" id="tgl_fs_barang_tender" required>
                                <span class="help-block"></span>
                            </div>
                            <hr>
                            </div>

                            <div id="fs_jasa_tender" style="display: none">
                            <h6 class="font-weight-bold">FS Jasa</h6>
                            <hr>
                            <div class="form-group">
                                <label for="spk_fs_jasa_tender">No. SPK</label>
                                <input type="text" class="form-control" name="spk_fs_jasa_tender" id="spk_fs_jasa_tender" required>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="tgl_fs_jasa_tender">Tanggal Terima</label>
                                <input type="text" class="form-control tgl" data-target="#tgl_fs_jasa_tender" name="tgl_fs_jasa_tender" id="tgl_fs_jasa_tender" required>
                                <span class="help-block"></span>
                            </div>
                            <hr>
                            </div>
                            <div class="form-group">
                                <label for="nilai_project_tender">Nilai Project</label>
                                <input type="text" class="form-control autonumeric" name="nilai_project_tender" id="nilai_project_tender" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="text-center"> 
                                <img src="<?= base_url() ?>assets/img/avatar.png" class="img-thumbnail" width="200" id="foto_preview_tender">
                                <h4 class="card-title mt-20">Foto Customer</h4>
                            </div>
                        </div>
                    </div>
                    <button id="btnSimpanTender" type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <button class="btn btn-danger" type="button" id="btnBackTender">Batal</button>
                </form>
            </div>
        </div>
        <div class="card" id="form_tender_vendor_card" style="display: none;">
            <div class="card-header d-block">
                <h3>Form Tender Vendor</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="forms-sample" id="form_tender_vendor" method="POST" action="javascript:;">
                            <input type="hidden" name="id_project_tv" id="id_project_tv">
                            <input type="hidden" name="tgl_fs_approved_tv" id="tgl_fs_approved_tv">
                            <input type="hidden" name="tgl_project_final_tv" id="tgl_project_final_tv">
                            <div class="row">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <div class="form-group" style="display: none">
                                        <label for="kode_project_tv">Kode Project</label>
                                        <input type="text" class="form-control" name="kode_project_tv" id="kode_project_tv" readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_project_tv">Nama Project</label>
                                        <input type="text" class="form-control" name="nama_project_tv" id="nama_project_tv" readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_customer_tv">Nama Customer</label>
                                        <input type="text" class="form-control" name="nama_customer_tv" id="nama_customer_tv" readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipe_pembelian_tv">Tipe Pembelian</label>
                                        <input type="text" class="form-control" name="tipe_pembelian_tv" id="tipe_pembelian_tv" readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="status_project_tv">Status Project</label>
                                        <input type="text" class="form-control" name="status_project_tv" id="status_project_tv" readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="nilai_project_tv">Nilai Project</label>
                                        <input type="text" class="form-control autonumeric" name="nilai_project_tv" id="nilai_project_tv" readonly>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <div class="text-center"> 
                                        <img src="<?= base_url() ?>assets/img/avatar.png" class="img-thumbnail" width="200" id="foto_preview_tv">
                                        <h4 class="card-title mt-20">Foto Customer</h4>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h6 class="font-weight-bold">Data Tender Vendor</h6>
                            <hr>
                            <div class="row" >
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="nama_vendor_tv">Vendor</label>
                                        <div class="input-group">
                                            <input type="hidden" name="id_vendor_tv" id="id_vendor_tv">
                                            <input type="hidden" name="tipe_pembelian_tender_vendor_tv" id="tipe_pembelian_tender_vendor_tv">
                                            <input type="text" class="form-control" id="nama_vendor_tv" placeholder="Nama Vendor" readonly>
                                            <span class="input-group-append" role="button" id="btn_cari_vendor">
                                                <label class="input-group-text btn btn-success bg-success" role="button" style="color: white"><i class="fa fa-search"></i></label>
                                            </span>
                                        </div>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_commitment">Vendor Commitment</label>
                                         <input type="text" class="form-control tgl_range" name="vendor_commitment" id="vendor_commitment" required disabled>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_po_spk">No. PO/SPK</label>
                                        <input type="text" class="form-control" name="no_po_spk" id="no_po_spk" required disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="font-weight-bold">Target Date Tender Vendor</h6>
                            <hr>
                            <div class="row" >
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="spl_create">Target SPL Create</label>
                                        <input type="text" class="form-control tgl" data-target="#spl_create" name="spl_create" id="spl_create" required readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="spl_internal_approve">Target SPL Internal Approve</label>
                                        <input type="text" class="form-control tgl" data-target="#spl_internal_approve" name="spl_internal_approve" id="spl_internal_approve" required readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="spl_full_approve">Target SPL Full Approve</label>
                                        <input type="text" class="form-control tgl" data-target="#spl_full_approve" name="spl_full_approve" id="spl_full_approve" required readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="fpt_sent">Target FPT Sent</label>
                                        <input type="text" class="form-control tgl" data-target="#fpt_sent" name="fpt_sent" id="fpt_sent" required readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_nego">Target Tgl Nego</label>
                                        <input type="text" class="form-control tgl" data-target="#tgl_nego" name="tgl_nego" id="tgl_nego" required readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="wbs_create">Target WBS Create</label>
                                        <input type="text" class="form-control tgl" data-target="#wbs_create" name="wbs_create" id="wbs_create" required readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="p3_fps_create">Target P3 FPS Create</label>
                                        <input type="text" class="form-control tgl" data-target="#p3_fps_create" name="p3_fps_create" id="p3_fps_create" required readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="p3_fps_release">Target P3 FPS Release</label>
                                        <input type="text" class="form-control tgl" data-target="#p3_fps_release" name="p3_fps_release" id="p3_fps_release" required readonly>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="sp_release">Target SP Release</label>
                                        <input type="text" class="form-control tgl" data-target="#sp_release" name="sp_release" id="sp_release" required readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="spk_fps_create">Target SPK FPS Create</label>
                                        <input type="text" class="form-control tgl" data-target="#spk_fps_create" name="spk_fps_create" id="spk_fps_create" required readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="spk_fps_approve">Target SPK FPS Approve</label>
                                        <input type="text" class="form-control tgl" data-target="#spk_fps_approve" name="spk_fps_approve" id="spk_fps_approve" required readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="contract_po_create">Target Contract PO Create</label>
                                        <input type="text" class="form-control tgl" data-target="#contract_po_create" name="contract_po_create" id="contract_po_create" required readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="contract_po_release">Target Contract PO Release</label>
                                        <input type="text" class="form-control tgl" data-target="#contract_po_release" name="contract_po_release" id="contract_po_release" required readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="p3_fpb_cancel">Target P3 FPB Cancel</label>
                                        <input type="text" class="form-control tgl" data-target="#p3_fpb_cancel" name="p3_fpb_cancel" id="p3_fpb_cancel" required readonly>
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="cancel_vendor">Target Cancel Vendor</label>
                                        <input type="text" class="form-control tgl" data-target="#cancel_vendor" name="cancel_vendor" id="cancel_vendor" required readonly>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <button id="btnSimpanTenderVendor" type="submit" class="btn btn-primary mr-2" disabled>Simpan</button>
                            <button class="btn btn-danger" type="button" id="btnBackTenderVendor">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var mys;
    var form_validator;
    var form_validator_vendor;
    var form_validator_tender;
    var tabel_detail_permintaan;
    var data_vendor = [];

    $(document).ready(function() {
        mys = Object.create(myscript_js);
        mys.init('<?= base_url() ?>');

        load_sales();
        load_vendor();
        load_unit_kerja();
        load_anggaran();
        load_kategori();


        $('#tabel').DataTable({
            "scrollCollapse": true,
            "sDom": "t<'row'<'col-md-4'i><'col-md-8'p>>",
            "processing": true,
            "iDisplayLength": 10,
            "scrollX":true,
            "ajax":{
                url : mys.base_url+'project/get_data',
                type : 'GET',
            },
            "language": {
                "url": mys.base_url+"assets/plugins/datatables.net/lang/Indonesian.json"
            },
            "columnDefs": [
            {"visible" : false, "targets" : []},
            {
                render: function ( data, type, row ) {
                    if (type == 'sort') {
                        return data;
                    }
                    return moment(data).format('DD MMM YYYY');
                },
                targets: [4,5]
            },
            {
                render: function ( data, type, row ) {
                    return data == 'P' ? '<span class="badge badge-pill badge-secondary">Waiting</span>' : data == 'W' ? '<span class="badge badge-pill badge-success">WIN</span>' : '<span class="badge badge-pill badge-danger">Lose</span>';
                },
                targets: [6]
            },
            {
                render: function ( data, type, row ) {
                    return '<button type="button" class="btn btn-primary tender_vendor" data-toggle="tooltip" title="Kelola Tender Vendor">\
                                            <span class="badge badge-light">'+data+'</span>\
                                            &nbsp;Tender Vendor\
                                        </button>'

                },
                targets: [7]
            },
            {
                "render": function ( data, type, row ) {
                   return '<?= $ha['view']? '<button type="button" title="View Data" data-toggle="tooltip" class="btn btn-primary ubah"><span class="fa fa-edit"></span></button> ' : '' ?><?= $ha['delete']? '<button type="button" title="Hapus Data" data-toggle="tooltip" class="btn btn-danger hapus"><span class="fa fa-trash"></span></button>' : '' ?>'+' <button type="button" title="Kelola Tender Project" data-toggle="tooltip" class="btn btn-info tender"><span class="fa fa-folder"></span></button>';
                },
                "targets": [8]
            },
            // {"className": "dt-center", "targets": [0,3]}
            ],
            "columns": [
            {"width": "5%" },
            {"width": "10%"},
            {"width": "15%"},
            {"width": "15%"},
            {"width": "10%"},
            {"width": "10%"},
            {"width": "10%"},
            {"width": "10%", "orderable": false},
            {"width": "15%", "orderable": false}
            ],
            "order" : [
            [0, "asc"],
            ],
            "fnDrawCallback" : function(oSettings){
                $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });
            },
        });

        tabel_detail_permintaan= $('#tabel_detail_permintaan').DataTable({
            scrollCollapse: true,
            sDom: "t<'row'<'col-md-4'i><'col-md-8'p>>",
            processing: true,
            iDisplayLength: 10,
            scrollX:true,
            language: {
                url: mys.base_url+"assets/plugins/datatables.net/lang/Indonesian.json"
            },
            rowsGroup: [1],
            columnDefs: [
            {visible : false, targets : []},
            {
                render: function ( data, type, row ) {
                   return data == 'B' ? 'Barang' : 'Jasa';
                },
                targets: [2]
            },
            {
                render: function ( data, type, row ) {
                    if (type=='sort') {
                        return data;
                    } else{
                        return mys.formatMoney(data,0,',','.');
                    }
                },
                targets: [3,4]
            },
            // {
            //     render: function ( data, type, row ) {
            //         return moment(data).format('DD MMM YYYY')
            //     },
            //     targets: [6]
            // },
            {
                render: function ( data, type, row ) {
                    if (data!= null && typeof(data) == "object") {
                        return data.name;
                    }

                    return data? '<a class="btn btn-link btn-rounded" href="'+mys.base_url+'project/download_lampiran?file='+data+'&project='+row['id_permintaan']+'" title="Download Lampiran" data-toggle="tooltip"><span class="fa fa-download"></span>&nbsp; '+data+'</a>' : '<span class="badge badge-pill badge-default">Tidak Ada Lampiran</span>';
                },
                targets: [5]
            },
            {
                render: function ( data, type, row ) {
                    return data == 'W' ? '<a href="javascript:;" role="button" class="badge badge-success mb-1 status_vendor_project" title="Klik untuk melihat Keterangan" data-toggle="tooltip">WIN</a>' : '<a href="javascript:;" role="button" class="badge badge-danger mb-1 status_vendor_project" title="Klik untuk melihat Keterangan" data-toggle="tooltip">LOSE</a>'
                },
                targets: [6]
            },
            {
                render: function ( data, type, row ) {
                    var ubah  = '';
                    var hapus = '';
                        ubah= '<button type="button" title="Ubah Data" data-toggle="tooltip" class="btn btn-primary ubah_vendor"><span class="fa fa-edit"></span></button>&nbsp;';
                        hapus = '<button type="button" title="Hapus Data" data-toggle="tooltip" class="btn btn-danger hapus_vendor"><span class="fa fa-trash"></span></button>';
                    return ubah+hapus;
                },
                targets: [7]
            },
            // {"className": "dt-center", "targets": [0,3]}
            ],
            data: data_vendor,
            columns : [
                { data : null},
                { data : "nama_vendor"},
                { data : "tipe_pembelian"},
                // { data : "uraian"},
                { data : "nilai_quotation_awal"},
                { data : "nilai_quotation_akhir"},
                // { data : "expired_quotation"},
                { data : "lampiran"},
                { data : "status"},
                { data : "id_vendor", "orderable": false},
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

        tabel_list_vendor= $('#tabel_list_vendor').DataTable({
            scrollCollapse: true,
            sDom: "t<'row'<'col-md-4'i><'col-md-8'p>>",
            processing: true,
            iDisplayLength: 10,
            scrollX:true,
            language: {
                url: mys.base_url+"assets/plugins/datatables.net/lang/Indonesian.json"
            },
            rowsGroup: [1],
            columnDefs: [
            {visible : false, targets : []},
            {
                render: function ( data, type, row ) {
                   return data == 'B' ? 'Barang' : 'Jasa';
                },
                targets: [2]
            },
            {
                render: function ( data, type, row ) {
                    return data == 'W' ? '<a href="javascript:;" role="button" class="badge badge-success mb-1 status_vendor_project" title="Klik untuk melihat Keterangan" data-toggle="tooltip">WIN</a>' : '<a href="javascript:;" role="button" class="badge badge-danger mb-1 status_vendor_project" title="Klik untuk melihat Keterangan" data-toggle="tooltip">LOSE</a>'
                },
                targets: [3]
            },
            {
                render: function ( data, type, row ) {
                    return '<button type="button" class="btn btn-success pilih">Pilih</button>'
                },
                targets: [4]
            },
            // {"className": "dt-center", "targets": [0,3]}
            ],
            data: data_vendor,
            columns : [
                { data : null},
                { data : "nama_vendor"},
                { data : "tipe_pembelian"},
                { data : "status"},
                { data : "id_vendor", "orderable": false},
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

        form_validator_vendor = $('#form_det_permintaan').validate({
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

        form_validator_tender = $('#form_tender').validate({
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

        form_validator_tender_vendor = $('#form_tender_vendor').validate({
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
                if (data_vendor.length == 0) {
                    mys.swconfirm('Simpan','Data Vendor Masih Kosong. Apakah anda ingin melanjutkan simpan data project?',simpan);                    
                } else{
                    simpan();
                }
            }
        });

        $("#form_det_permintaan").submit(function(event) {
            if (form_validator_vendor.form()) {
                tambah_vendor();
            }
        });

        $("#form_tender").submit(function(event) {
            if (form_validator_tender.form()) {
                simpan_tender();
            }
        });

        $("#form_tender_vendor").submit(function(event) {
            if (form_validator_tender_vendor.form()) {
                simpan_tender();
            }
        });

        $('#btn_add_det_anggaran').on('click', function(event) {
            reset_form_det_permintaan();
            $('#jenis_masukan').val('new');
            $('#modal_vendor').modal('toggle');
            $('#alert_det_permintaan').empty();
        });

        $('#btn_insert_det_permintaan').on('click', function(event) {
            $('#form_det_permintaan').submit();
        });


        $('#start_end_date').change(function(event) {
            var val = $(this).val();
            var date_arr = val.split(" s.d. ");
            var start_date = moment(date_arr[0],"DD-MM-YYYY");
            var end_date = moment(date_arr[1],"DD-MM-YYYY");
            var selisih_hari = end_date.diff(start_date,'days');
            // $('#durasi_pengerjaan').val(end_date.to(start_date,true));
        $('#durasi_pengerjaan').val(selisih_hari+' hari');
        });

        $('#tabel tbody').on( 'click', '.ubah', function () {
            var row = $(this);
            var table = $('#tabel').DataTable();
            var data = table.row( row.parents('tr') ).data();
            ubah_data(data[8]);
        });

        $('#tabel tbody').on( 'click', '.tender', function () {
            var row = $(this);
            var table = $('#tabel').DataTable();
            var data = table.row( row.parents('tr') ).data();
            kelola_tender(data[8]);
        });

        $('#tabel tbody').on( 'click', '.tender_vendor', function () {
            var row = $(this);
            var table = $('#tabel').DataTable();
            var data = table.row( row.parents('tr') ).data();
            kelola_tender_vendor(data[8]);
        });

        $('#tabel tbody').on( 'click', '.hapus', function () {
            var row = $(this);
            var table = $('#tabel').DataTable();
            var data = table.row( row.parents('tr') ).data();
            mys.swconfirm("Hapus","Apakah anda yakin ingin menghapus data ini?",hapus,data[8]);
        });

        $('#tabel_detail_permintaan tbody').on( 'click', '.ubah_vendor', function () {
            var row = $(this);
            var table = $('#tabel_detail_permintaan').DataTable();
            var data = table.row( row.parents('tr') ).data();
            var index = data_vendor.findIndex(x => x.id == data.id_vendor+''+data.tipe_pembelian);
            if (index != -1) {
                ubah_vendor(index);
            } else{
                mys.notifikasi('Data Tidak Ditemukan','error');
            }
        });

        $('#tabel_detail_permintaan tbody').on( 'click', '.hapus_vendor', function () {
            var row = $(this);
            var table = $('#tabel_detail_permintaan').DataTable();
            var data = table.row( row.parents('tr') ).data();
            mys.swconfirm("Hapus","Apakah anda yakin ingin menghapus data ini?",function(){
                var index = data_vendor.findIndex(x => x.id == data.id_vendor+''+data.tipe_pembelian);
                if (index != -1) {
                    data_vendor.splice(index, 1);
                    reload_tabel_detail_permintaan();
                } else{
                    mys.notifikasi('Data Tidak Ditemukan','error');
                }
            });
        });

        $('#tabel_detail_permintaan tbody').on( 'click', '.status_vendor_project', function () {
            var row = $(this);
            var table = $('#tabel_detail_permintaan').DataTable();
            var data = table.row( row.parents('tr') ).data();
            var index = data_vendor.findIndex(x => x.id == data.id_vendor+''+data.tipe_pembelian);
            if (index != -1) {
                tampil_keterangan(index);
            } else{
                mys.notifikasi('Data Tidak Ditemukan','error');
            }
        });

        $('#tabel_list_vendor tbody').on( 'click', '.pilih', function () {
            var row = $(this);
            var table = $('#tabel_list_vendor').DataTable();
            var data = table.row( row.parents('tr') ).data();
            var index = data_vendor.findIndex(x => x.id == data.id_vendor+''+data.tipe_pembelian);
            if (index != -1) {
                load_tender_vendor(index);
            } else{
                mys.notifikasi('Data Tidak Ditemukan','error');
            }
        });

        $('#input_pencarian').on('keyup', function(event) {
            var tabel = $('#tabel');
            tabel.dataTable().fnFilter($(this).val());
        });
        
        $('#input_pencarian_detail').on('keyup', function(event) {
            tabel_detail_permintaan.search( $(this).val() ).draw();
        });

        $('#input_pencarian_list_vendor').on('keyup', function(event) {
            tabel_list_vendor.search( $(this).val() ).draw();
        });

        $('#btnAdd').on('click', function(event) {
            buka_form();
        });

        $('#btnBack').on('click', function(event) {
            tutup_form();
        });

        $('#btnBackTender').on('click', function(event) {
            tutup_form();
        });

        $('#btnBackTenderVendor').on('click', function(event) {
            tutup_form();
        });

        $('#id_customer').on('change', function(event) {
            load_detil_customer($(this).val());
        });

        $('#id_sales').on('change', function(event) {
            load_detil_sales($(this).val());
        });

        $('#cb_fs_barang').on('click', function(event) {
            if ($(this).is(':checked')) {
                $('.fs_barang').prop('disabled',false);
            } else{
                $('.fs_barang').prop('disabled',true);
                reset_form_fs('barang');
            } 
        });

        $('#cb_fs_jasa').on('click', function(event) {
            if ($(this).is(':checked')) {
                $('.fs_jasa').prop('disabled',false);
            } else{
                $('.fs_jasa').prop('disabled',true);
                reset_form_fs('jasa');
            } 
        });

        $('.btn_status').on('click', function(event) {

            var id = $(this).prop('id');

            var pesan1 = 'Klik untuk Memilih Status';
            var pesan2 = 'Klik untuk Reset Status';

            if (id=='btnWin') {
                if ($(this).hasClass('btn-success')) {
                    $(this).removeClass('btn-success');
                    $('#btnLose').removeClass('btn-danger');
                    $('.btn_status').prop('title', pesan1);                    
                }else{
                    $(this).addClass('btn-success');
                    $('#btnLose').removeClass('btn-danger');
                    $('.btn_status').prop('title', pesan2);                    
                }
                // $(this).prop('disabled', true);
            } else{
                if ($(this).hasClass('btn-danger')) {
                    $(this).removeClass('btn-danger')                    
                    $('#btnWin').removeClass('btn-success');                    
                    $('.btn_status').prop('title', pesan1);                    
                }else{
                    $(this).addClass('btn-danger');
                    $('#btnWin').removeClass('btn-success');                    
                    $('.btn_status').prop('title', pesan2);                    
                }
            }
            
        });

        $('#btn_cari_vendor').on('click', function(event) {
            $('#modal_list_vendor').modal('show');
            // $('#tabel_list_vendor').DataTable().columns.adjust().draw();
        });

        $('#modal_list_vendor').on('shown.bs.modal', function(event) {
            $('#tabel_list_vendor').DataTable().columns.adjust().draw();
        });
    });


    function buka_form() {
        reset_form();
        $('#tabel_card').hide();
        $('#form_tender_card').hide();
        $('#form_tender_vendor_card').hide();
        $('#form_card').show();
        // $('#status_project').val('P').trigger('change');
        reload_tabel_detail_permintaan();
        $('#tabel_detail_permintaan').DataTable().columns.adjust().draw();
    }

    function buka_form_tender() {
        reset_form_tender();
        $('#tabel_card').hide();
        $('#form_card').hide();
        $('#form_tender_vendor_card').hide();
        $('#form_tender_card').show();
    }

    function buka_form_tender_vendor() {
        // reset_form_tender();
        $('#tabel_card').hide();
        $('#form_card').hide();
        $('#form_tender_card').hide();
        $('#form_tender_vendor_card').show();
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
                var project = data.project;
                    $('#id_permintaan').val(project.id_permintaan);
                    $('#kode_project').val(project.kode_project);
                    $('#kode_project').parents('.form-group').show();
                    $('#nama_project').val(project.nama_project);
                    $('#project_year').val(project.project_year);
                    $('#id_product').val(project.id_product).trigger('change');
                    $('#project_type').val(project.project_type).trigger('change');
                    // $('#start_end_date').val(mys.toDate(project.project_start_date)+" s.d. "+mys.toDate(project.project_end_date)).trigger('change');
                    $('#start_end_date').data('daterangepicker').setStartDate(mys.toDate(project.project_start_date));
                    $('#start_end_date').data('daterangepicker').setEndDate(mys.toDate(project.project_end_date));
                    $('#no_fs_barang').val(project.no_fs_barang);
                    $('#nilai_fs_barang').val(project.nilai_fs_barang);
                    if (project.no_fs_barang) {
                        $('#cb_fs_barang').click();
                    }
                    $('#no_fs_jasa').val(project.no_fs_jasa);
                    $('#nilai_fs_jasa').val(project.nilai_fs_jasa);
                    if (project.no_fs_jasa) {
                        $('#cb_fs_jasa').click();
                    }
                    $('#id_customer').val(project.id_customer).trigger('change');
                    $('#nama_pic_project').val(project.nama_pic_project);
                    $('#no_hp_pic_project').val(project.no_hp_pic_project);
                    $('#email_pic_project').val(project.email_pic_project);
                    $('#id_sales').val(project.id_sales).trigger('change');
                    $('#tgl_fs_approved').val(mys.toDate(project.tgl_fs_approved));
                    $('#tgl_project_final').val(mys.toDate(project.tgl_project_final));

                var vendor = data.vendor;
                    data_vendor = vendor;
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

                data_vendor = data.vendor;
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

    function load_tender_vendor(index){
        var data = data_vendor[index];
        mys.blok()
        $.ajax({
            url: mys.base_url+'project/load_tender_vendor',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id_permintaan: data.id_permintaan,
                id_vendor: data.id_vendor,
                tipe_pembelian: data.tipe_pembelian,
            },
            success: function(data_received){
                $('#id_vendor_tv').val(data.id_vendor);
                $('#nama_vendor_tv').val(data.nama_vendor);
                $('#vendor_commitment').prop('disabled', false);
                $('#no_po_spk').prop('disabled', false);
                if(data_received.v_commitment_start)
                    $('#vendor_commitment').data('daterangepicker').setStartDate(mys.toDate(data_received.v_commitment_start));
                if(data_received.v_commitment_finish)
                    $('#vendor_commitment').data('daterangepicker').setEndDate(mys.toDate(data_received.v_commitment_finish));
                $('#no_po_spk').val(data_received.no_po_spk);
                $('#tipe_pembelian_tender_vendor_tv').val(data.tipe_pembelian);
                $('#btnSimpanTenderVendor').prop('disabled', false);
                var final_project = moment($('#tgl_project_final_tv').val());
                var target_date = {};
                    target_date.fs_approve = moment($('#tgl_fs_approved_tv').val());
                    target_date.spl_create = moment(target_date.fs_approve).add(1,'d');
                    target_date.spl_internal_approve = moment(target_date.spl_create).add(2,'d');
                    target_date.spl_full_approve = moment(target_date.spl_create).add(6,'d');
                    target_date.fpt_sent = moment(target_date.fs_approve).add(3,'d');
                    target_date.tgl_nego = moment(target_date.fpt_sent).add(6,'d');
                    target_date.wbs_create = moment(target_date.fs_approve).add(2,'d');
                    target_date.p3_fps_create = moment(target_date.wbs_create).add(1,'d');
                    target_date.p3_fps_release = moment(target_date.wbs_create).add(1,'d');
                    target_date.sp_release = moment(target_date.p3_fps_release).add(2,'d');
                    target_date.spk_fps_create = moment(target_date.sp_release).add(1,'d');
                    target_date.spk_fps_approve = moment(target_date.spk_fps_create).add(7,'d');
                    if (data.tipe_pembelian =='B') {
                        target_date.contract_po_create = moment(target_date.sp_release).add(1,'d');
                    } else{
                        target_date.contract_po_create = moment(target_date.sp_release).add(15,'d');
                    }
                    target_date.contract_po_release =  moment(target_date.contract_po_create).add(1,'d');
                    target_date.p3_fpb_cancel =  moment(final_project).add(1,'d');
                    target_date.cancel_vendor =  moment(final_project).add(1,'d');
                $('#spl_create').val(target_date.spl_create.format('DD-MM-YYYY'));
                $('#spl_internal_approve').val(target_date.spl_internal_approve.format('DD-MM-YYYY'));
                $('#spl_full_approve').val(target_date.spl_full_approve.format('DD-MM-YYYY'));
                $('#fpt_sent').val(target_date.fpt_sent.format('DD-MM-YYYY'));
                $('#tgl_nego').val(target_date.tgl_nego.format('DD-MM-YYYY'));
                $('#wbs_create').val(target_date.wbs_create.format('DD-MM-YYYY'));
                $('#p3_fps_create').val(target_date.p3_fps_create.format('DD-MM-YYYY'));
                $('#p3_fps_release').val(target_date.p3_fps_release.format('DD-MM-YYYY'));
                $('#sp_release').val(target_date.sp_release.format('DD-MM-YYYY'));
                $('#spk_fps_create').val(target_date.spk_fps_create.format('DD-MM-YYYY'));
                $('#spk_fps_approve').val(target_date.spk_fps_approve.format('DD-MM-YYYY'));
                $('#contract_po_create').val(target_date.contract_po_create.format('DD-MM-YYYY'));
                $('#contract_po_release').val(target_date.contract_po_release.format('DD-MM-YYYY'));
                $('#p3_fpb_cancel').val(target_date.p3_fpb_cancel.format('DD-MM-YYYY'));
                $('#cancel_vendor').val(target_date.cancel_vendor.format('DD-MM-YYYY'));

                $('#modal_list_vendor').modal('hide');

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

        var start_end_date = $('#start_end_date').val();
        var date_arr = start_end_date.split(" s.d. ");

        var tipe_pembelian = '';

        if ($('#cb_fs_barang').is(':checked')) {
            tipe_pembelian += 'B';
        }

        if ($('#cb_fs_jasa').is(':checked')) {
            tipe_pembelian += 'J';
        }

        // var menang = data_vendor.findIndex(x => x.status == 'W');
        // var vendor_pemenang = menang != '-1' ? data_vendor[menang] : null;

        var data_project = new Object();
            data_project.id_permintaan = $('#id_permintaan').val();
            data_project.nama_project = $('#nama_project').val();
            data_project.project_year = $('#project_year').val();
            data_project.nama_project = $('#nama_project').val();
            data_project.id_product = $('#id_product').val();
            data_project.project_start_date = mys.toDate(date_arr[0]);
            data_project.project_end_date = mys.toDate(date_arr[1]);
            data_project.project_type = $('#project_type').val();
            data_project.no_fs_barang = $('#no_fs_barang').val()?$('#no_fs_barang').val():null;
            data_project.nilai_fs_barang = $('#nilai_fs_barang').val()?mys.reverse_format_ribuan($('#nilai_fs_barang').val()):null;
            data_project.no_fs_jasa = $('#no_fs_jasa').val()?$('#no_fs_jasa').val():null;
            data_project.nilai_fs_jasa = $('#nilai_fs_jasa').val()?mys.reverse_format_ribuan($('#nilai_fs_jasa').val()):null;
            data_project.id_customer = $('#id_customer').val();
            data_project.nama_pic_project = $('#nama_pic_project').val();
            data_project.no_hp_pic_project = $('#no_hp_pic_project').val();
            data_project.email_pic_project = $('#email_pic_project').val();
            data_project.id_sales = $('#id_sales').val();
            data_project.tipe_pembelian = tipe_pembelian != '' ? tipe_pembelian : null;
            data_project.tgl_fs_approved = mys.toDate($('#tgl_fs_approved').val());
            data_project.tgl_project_final = mys.toDate($('#tgl_project_final').val());

        data_post.append('data_project',JSON.stringify(data_project));

        $.each(data_vendor, function(index, val) {
            var d = {};
                d.id_vendor = val.id_vendor; 
                d.nama_vendor = val.nama_vendor; 
                d.uraian = val.uraian; 
                d.tipe_pembelian = val.tipe_pembelian; 
                d.nilai_quotation_awal = val.nilai_quotation_awal; 
                d.nilai_quotation_akhir = val.nilai_quotation_akhir; 
                d.expired_quotation = val.expired_quotation; 
                d.status = val.status; 
                d.keterangan = val.keterangan; 
                d.lampiran = typeof(val.lampiran) =='object'? 'upload' : val.lampiran; 
            data_post.append('data_vendor[]',JSON.stringify(d));
            if (typeof(val.lampiran) =='object') {
                data_post.append('lampiran_vendor[]',val.lampiran);
                data_post.append('id_vendor_upload[]',val.id_vendor)
            }
        });

        if (!data_vendor) {
            data_post.append('data_vendor[]',null);
            data_post.append('lampiran_vendor[]',null);
            data_post.append('id_vendor_upload[]',null);
        }

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
                    data_vendor = [];
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

    function simpan_tender() {
        mys.blok()
        var data_send = {};
            data_send.id_permintaan = $('#id_project_tender').val();
            data_send.status_project = $('#status_project_tender').val();
            data_send.tgl_pengisian_tender = $('#tgl_pengisian_tender').val();
            data_send.nilai_project = mys.reverse_format_ribuan($('#nilai_project_tender').val());
            data_send.spk_fs_barang = $('#spk_fs_barang_tender').val() !='' ? $('#spk_fs_barang_tender').val() : null;
            data_send.tgl_fs_barang = $('#tgl_fs_barang_tender').val() !='' ? mys.toDate($('#tgl_fs_barang_tender').val()) : null;
            data_send.spk_fs_jasa = $('#spk_fs_jasa_tender').val() !='' ? $('#spk_fs_jasa_tender').val() : null;
            data_send.tgl_fs_jasa = $('#tgl_fs_jasa_tender').val() !='' ? mys.toDate($('#tgl_fs_jasa_tender').val()) : null;
        $.ajax({
            url: mys.base_url+'project/save_tender',
            type: 'POST',
            dataType: 'JSON',
            data: data_send,
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
        data_vendor = [];
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
        form_validator_vendor.resetForm();
        $('#form_det_permintaan')[0].reset();
        $('#form_det_permintaan').find('input[type="hidden"]').val('');
        $('#form_det_permintaan').find('label,select,input,textarea').removeClass('is-invalid text-red');
        $('#form_det_permintaan').find('.cmb_select2').val('').trigger('change');
        $('#btn_pilih_lampiran').prop('disabled', false);
        $('#lampiran_vendor_project').prop('required',true);
        $('#lampiran_vendor_project').prop('disabled', false);
        $('#id_vendor').prop('disabled', false);
        $('#tipe_pembelian').prop('disabled', false);
        $('#btn_insert_det_permintaan').html('(+) Tambahkan');
    }

    function reset_form_tender() {
        form_validator_tender.resetForm();
        $('#form_tender')[0].reset();
        $('#form_tender').find('input[type="hidden"]').val('');
        $('#form_tender').find('label,select,input,textarea').removeClass('is-invalid text-red');
        $('#form_tender').find('.cmb_select2').val('').trigger('change');
        $('#kode_project_tender').parents('.form-group').hide();
        $('#fs_barang_tender').hide();
        $('#fs_jasa_tender').hide();
    }

    function reset_form_tender_vendor() {
        form_validator_tender_vendor.resetForm();
        $('#form_tender_vendor')[0].reset();
        $('#form_tender_vendor').find('input[type="hidden"]').val('');
        $('#form_tender_vendor').find('label,select,input,textarea').removeClass('is-invalid text-red');
        $('#form_tender_vendor').find('.cmb_select2').val('').trigger('change');
        $('#kode_project_tv').parents('.form-group').hide();
        $('#nama_vendor_tv').prop('disabled', true);
        $('#vendor_commitment').prop('disabled', true);
        $('#no_po_spk').prop('disabled', true);
        $('#btnSimpanTenderVendor').prop('disabled', true);
    }  

    function reset_form_fs(jenis) {
        $('.fs_'+jenis).val(null);
        $('.fs_'+jenis).parent('div').find('.help-block').empty();
        $('.fs_'+jenis).parent('div').find('label,select,input,textarea').removeClass('is-invalid text-red');
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

    function load_customer(){
        $.ajax({
            url: mys.base_url+'project/get_customer',
            type: 'POST',
            dataType: 'JSON',
            data: null,
            success: function(data){
                var select_html = ''
                $('#id_customer').empty();
                select_html += '<option></option>';
                var group = '';
                $.each(data, function(index, val) {
                    if (group != val.group) {
                        if (group != '') {
                            select_html += '</optgroup>';
                        }
                        group = val.group;
                        select_html += '<optgroup label="'+val.group+'">';
                    }
                    select_html += '<option value="'+val.id+'">'+ val.name+'</option>';
                });
                if (group!='') {
                    select_html += '</optgroup>';
                }
                $('#id_customer').html(select_html);
            },
            error:function(data){
                mys.notifikasi("Gagal Ambil Data.","error");
            }
        })
    }

    function load_sales(){
        $.ajax({
            url: mys.base_url+'project/get_sales',
            type: 'POST',
            dataType: 'JSON',
            data: null,
            success: function(data){
                $('#id_sales').empty();
                $('#id_sales').append('<option></option>');
                $.each(data, function(index, val) {
                    $('#id_sales').append('<option value="'+val.id+'">'+ val.name+'</option>');
                });
            },
            error:function(data){
                mys.notifikasi("Gagal Ambil Data.","error");
            }
        })
    }

    function load_vendor(){
        $.ajax({
            url: mys.base_url+'project/get_vendor',
            type: 'POST',
            dataType: 'JSON',
            data: null,
            success: function(data){
                $('#id_vendor').empty();
                $('#id_vendor').append('<option></option>');
                $.each(data, function(index, val) {
                    $('#id_vendor').append('<option value="'+val.id+'">'+ val.name+'</option>');
                });
            },
            error:function(data){
                mys.notifikasi("Gagal Ambil Data.","error");
            }
        })
    }

    function load_detil_customer(id_customer = null) {
        $('#telp_customer').val(null);
        $('#email_customer').val(null);
        mys.blok();
        var data_send = {};
        data_send.id = id_customer;
        $.ajax({
            url: mys.base_url+'project/get_detil_customer',
            type: 'POST',
            dataType: 'JSON',
            data: data_send,
            success: function(data){
                if (data) {
                    if (data.path_foto_customer){
                        $('#foto_preview').prop('src', mys.base_url+'assets/upload/customer/foto/'+id_customer+'/'+data.path_foto_customer);
                    } else{
                        $('#foto_preview').prop('src', mys.base_url+'assets/img/avatar.png');
                    }
                    $('#telp_customer').val(data.telp_customer);
                    $('#email_customer').val(data.email_customer);
                }
            },
            error:function(data){
                mys.notifikasi("Gagal Ambil Data.","error");
            }
        }).always(function(){
            mys.unblok();
        })
    }

    function load_detil_sales(id_sales = null) {
        $('#telp_sales').val(null);
        $('#email_sales').val(null);
        mys.blok();
        var data_send = {};
        data_send.id = id_sales;
        $.ajax({
            url: mys.base_url+'project/get_detil_sales',
            type: 'POST',
            dataType: 'JSON',
            data: data_send,
            success: function(data){
                if (data) {
                    $('#telp_sales').val(data.telp_sales);
                    $('#email_sales').val(data.email_sales);
                }
            },
            error:function(data){
                mys.notifikasi("Gagal Ambil Data.","error");
            }
        }).always(function(){
            mys.unblok();
        })
    }

    function tambah_vendor() {
        //validasi
        var jenis_masukan = $('#jenis_masukan').val();
        var id_vendor = $('#id_vendor').val();
        var tipe_pembelian = $('#tipe_pembelian').val();
        var id_permintaan = $('#id_permintaan').val();
        var status = $('#status_vendor_project').val();

        if (jenis_masukan == 'new') {
            //insert
            var index = data_vendor.findIndex(x => x.id== (id_vendor+''+tipe_pembelian));

            var menang = data_vendor.findIndex(x => x.status == 'W');

            if (index != '-1') {
                //jika data sudah ada
                $('#alert_det_permintaan').empty();
                $('#alert_det_permintaan').html('<div class="alert alert-danger" role="alert">\
                    <strong>Error!</strong> Data Vendor sudah dimasukkan...\
                </div>');
                $('#alert_det_permintaan').fadeIn('slow');
                setTimeout(function(){
                    $('#alert_det_permintaan').fadeOut('slow');
                    $('#alert_det_permintaan').empty();
                }, 5000)
                return;
            }


            var d = {
                    "id_permintaan" : $('#id_permintaan').val(),
                    "id" : $('#id_vendor').val()+''+$('#tipe_pembelian').val(),
                    "id_vendor" : $('#id_vendor').val(),
                    "nama_vendor" : $('#id_vendor option:selected').text(),
                    "tipe_pembelian" : $('#tipe_pembelian').val(),
                    "uraian" : $('#uraian').val(),
                    "nilai_quotation_awal" : parseInt(mys.reverse_format_ribuan($('#nilai_quotation_awal').val())),
                    "nilai_quotation_akhir" : parseInt(mys.reverse_format_ribuan($('#nilai_quotation_akhir').val())),
                    "expired_quotation": mys.toDate($('#expired_quotation').val()),
                    "status": $('#status_vendor_project').val(),
                    "keterangan": $('#keterangan_vendor').val(),
                    "lampiran": $('#lampiran_vendor_project').prop("files")[0],
            }
            data_vendor.push(d);

        } else{
            //update
            var index = data_vendor.findIndex(x => x.id == (id_vendor+''+tipe_pembelian));

            var menang = data_vendor.findIndex(x => x.status == 'W');
            // if (menang != '-1' && menang != index && status == 'W') {
            //      //jika pemenang lebih dari 1
            //     $('#alert_det_permintaan').empty();
            //     $('#alert_det_permintaan').html('<div class="alert alert-danger" role="alert">\
            //         <strong>Error!</strong> Vendor yang berstatus <span class="badge badge-pill badge-success">WIN</span> hanya boleh satu...\
            //     </div>');
            //     $('#alert_det_permintaan').fadeIn('slow');
            //     setTimeout(function(){
            //         $('#alert_det_permintaan').fadeOut('slow');
            //         $('#alert_det_permintaan').empty();
            //     }, 5000)
            //     return;
            // }

            var d_lama = data_vendor[index];

            var d_baru = {
                "id_permintaan" : $('#id_permintaan').val(),
                "id" : d_lama.id_vendor+''+d_lama.tipe_pembelian,
                "id_vendor" : d_lama.id_vendor,
                "nama_vendor" : d_lama.nama_vendor,
                "tipe_pembelian" : $('#tipe_pembelian').val(),
                "uraian" : $('#uraian').val(),
                "nilai_quotation_awal" : parseInt(mys.reverse_format_ribuan($('#nilai_quotation_awal').val())),
                "nilai_quotation_akhir" : parseInt(mys.reverse_format_ribuan($('#nilai_quotation_akhir').val())),
                "expired_quotation": mys.toDate($('#expired_quotation').val()),
                "status": $('#status_vendor_project').val(),
                "keterangan": $('#keterangan_vendor').val(),
                "lampiran": ($('#lampiran_vendor_project').prop("files")[0] == undefined) ? d_lama.lampiran : $('#lampiran_vendor_project').prop("files")[0],
            }

            data_vendor[index] = d_baru;
        }

        reload_tabel_detail_permintaan();
        $('#modal_vendor').modal('toggle');
        
    }

    function ubah_vendor(index) {
        reset_form_det_permintaan();
        var data = data_vendor[index];
        $('#btn_insert_det_permintaan').html('Simpan Perubahan')
        $('#lampiran_vendor_project').prop('required',false);
        //set data vendor on form
        $('#id_vendor').val(data.id_vendor).trigger('change').prop('disabled', true);
        $('#uraian').val(data.uraian);
        $('#tipe_pembelian').val(data.tipe_pembelian).trigger('change').prop('disabled', true);
        $('#nilai_quotation_awal').val(data.nilai_quotation_awal);
        $('#nilai_quotation_akhir').val(data.nilai_quotation_akhir);
        $('#expired_quotation').val( mys.toDate(data.expired_quotation));
        $('#status_vendor_project').val( data.status).trigger('change');
        $('#keterangan_vendor').val( data.keterangan);
        var lampiran = data.lampiran;
        $('#file_lampiran_name').val((typeof(lampiran) == "object") ? lampiran.name : lampiran);
        $('#modal_vendor').modal('toggle'); 
    }

    function tampil_keterangan(index) {
        reset_modal_keterangan()
        var data = data_vendor[index];
        $('#nama_vendor_view').html(data.nama_vendor);
        $('#tipe_pembelian_view').html(data.tipe_pembelian == 'B' ? 'Barang' : 'Jasa');
        $('#label_status_view').html( (data.status == 'W' ? '<span class="badge badge-pill badge-success">WIN</span>' : '<span class="badge badge-pill badge-danger">LOSE</span>') );
        $('#keterangan_vendor_view').html(data.keterangan);
        $('#modal_keterangan').modal('toggle');
    }

    function reset_modal_keterangan() {
        $('#nama_vendor_view').html('');
        $('#label_status_view').html('');
        $('#keterangan_vendor_view').html('');
    }

    function reload_tabel_detail_permintaan() {
        tabel_detail_permintaan.clear();
        tabel_detail_permintaan.rows.add(data_vendor);
        tabel_detail_permintaan.draw();
    }

    function reload_tabel_list_vendor() {
        tabel_list_vendor.clear();
        tabel_list_vendor.rows.add(data_vendor);
        tabel_list_vendor.draw();
    }


</script>

<div class="modal fade" id="modal_vendor" role="dialog" aria-labelledby="modal_vendorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_vendorLabel">Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form_det_permintaan" action="javascript:;" method="POST">
                    <input type="hidden" name="jenis_masukan" id="jenis_masukan">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="uraian">uraian</label>
                                <input type="text" class="form-control" name="uraian" id="uraian" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="nominal">nominal</label>
                                <input type="text" class="form-control" name="nominal" id="nominal" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="keterangan">keterangan</label>
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

<div class="modal fade" id="modal_list_vendor" role="dialog" aria-labelledby="modal_vendorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_vendorLabel">Daftar Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3" style="text-align:right;padding-top:7px">
                            Cari :
                        </div>
                        <div class="col-lg-9">
                            <input type="text" id="input_pencarian_list_vendor" class="form-control pull-right" placeholder="ketik disini untuk mencari ...">
                        </div>
                    </div>
                    <table id="tabel_list_vendor" class="table table-inverse table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th data-width="5%">No.</th>
                                <th data-width="50%">Nama</th>
                                <th data-width="15%">Tipe</th>
                                <th data-width="15%">Status</th>
                                <th data-width="10%">Pilih</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_keterangan" role="dialog" aria-labelledby="modal_keteranganLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_keteranganLabel">Keterangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <table>
                    <tbody>
                        <tr>
                            <td style="width: 30%" class="font-weight-bold">Nama Vendor</td>
                            <td style="width: 5%">&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td style="width: 68%" id="nama_vendor_view"></td>
                        </tr>
                        <tr>
                            <td style="width: 30%" class="font-weight-bold">Tipe</td>
                            <td style="width: 5%">&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td style="width: 68%" id="tipe_pembelian_view"></td>
                        </tr>
                        <tr>
                            <td style="width: 30%" class="font-weight-bold">Status</td>
                            <td style="width: 5%">&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td style="width: 68%" id="label_status_view"></td>
                        </tr>
                        <tr>
                            <td style="width: 30%" class="font-weight-bold">Keterangan</td>
                            <td style="width: 5%">&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                            <td style="width: 68%" id="keterangan_vendor_view"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>