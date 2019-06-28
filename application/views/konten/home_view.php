<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url() ?>"><i class="ik ik-home"></i></a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-12 col-lg-6">
        <div class="widget">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h5 id="hari_tanggal">Sedang memuat informasi tanggal...</h5>
                        <h2 id="jam">Sedang memuat informasi jam...</h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-clock"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
        <div class="widget">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h5>Selamat Datang,</h5>
                        <h2><?= $this->session->userdata('nama'); ?></h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-user"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#hari_tanggal').text(moment().format('dddd, DD MMMM YYYY'))
        $('#jam').text(moment().format('HH:mm:ss'))
        setInterval(function(){
            $('#jam').text(moment().format('HH:mm:ss'))
        }, 1000)
    });
</script>
