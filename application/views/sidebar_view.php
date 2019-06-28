<div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <!-- <div class="nav-lavel">Navigasi</div> -->
            <?php 
                $level = strtolower($this->session->level);
                $this->load->view('hak_akses_user/akses_'.$level);
             ?>
        </nav>
    </div>
</div>