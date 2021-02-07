
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <div class="user-panel"> 
        <div class="pull-left info">
          <p><i class="fa fa-user-circle"></i> <?php echo $this->model_admin->getNama($this->session->admin_id); ?></p>
          <a href="<?php echo site_url('admin/kelola_admin/edit/') . $this->session->admin_id ?>"><i class="fa fa-gear text-green"></i> Kelola profil</a>
        </div>
      </div> 

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu tree"> 


        <li <?php echo ($menu == 'dashboard') ? 'class="active"' : '';?>><a href="<?php echo site_url('admin/dashboard' . get_url_cache()) ?>"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>

        <li <?php echo ($menu == 'kelola_admin') ? 'class="active"' : '';?>><a href="<?php echo site_url('admin/kelola_admin' . get_url_cache()) ?>"><i class="fa fa-user-secret"></i> <span>Kelola Admin</span></a></li> 

        <li <?php echo ($menu == 'kelola_kegiatan') ? 'class="active"' : '';?>><a href="<?php echo site_url('admin/kelola_kegiatan' . get_url_cache()) ?>"><i class="fa fa-handshake-o"></i> <span>Kelola Kegiatan</span></a></li> 

        <li <?php echo ($menu == 'kelola_rapat') ? 'class="active"' : '';?>><a href="<?php echo site_url('admin/kelola_rapat' . get_url_cache()) ?>"><i class="fa fa-users"></i> <span>Kelola Rapat</span></a></li> 

        <li <?php echo ($menu == 'kelola_ruangan') ? 'class="active"' : '';?>><a href="<?php echo site_url('admin/kelola_ruangan' . get_url_cache()) ?>"><i class="fa fa-meetup"></i> <span>Kelola Ruangan</span></a></li> 

        <li <?php echo ($menu == 'kelola_pelaksana') ? 'class="active"' : '';?>><a href="<?php echo site_url('admin/kelola_pelaksana' . get_url_cache()) ?>"><i class="fa fa-user"></i> <span>Kelola Pelaksana</span></a></li> 

        <li <?php echo ($menu == 'kelola_pesan') ? 'class="active"' : '';?>><a href="<?php echo site_url('admin/kelola_pesan' . get_url_cache()) ?>"><i class="fa fa-envelope"></i> <span>Kelola Pesan Selamat Datang</span></a></li> 

        <li <?php echo ($menu == 'kelola_tamu') ? 'class="active"' : '';?>><a href="<?php echo site_url('admin/kelola_tamu' . get_url_cache()) ?>"><i class="fa fa-address-book "></i> <span>Kelola Tamu</span></a></li> 
        <li <?php echo ($menu == 'absen_rapat') ? 'class="active"' : '';?>><a href="<?php echo site_url('admin/kelola_absen_rapat' . get_url_cache()) ?>"><i class="fa fa-vcard-o"></i> <span>Kelola Absen Rapat</span></a></li> 

        <li <?php echo ($menu == 'kelola_pegawai') ? 'class="active"' : '';?>><a href="<?php echo site_url('admin/kelola_pegawai' . get_url_cache()) ?>"><i class="fa fa-user-o"></i> <span>Kelola Pegawai</span></a></li> 
 
   
      <li <?php echo ($menu == '') ? 'class="active"' : '';?>><a href="<?php echo site_url('home' . get_url_cache()) ?>"><i class="fa fa-arrow-right"></i> <span>Kunjungi Website</span></a></li> 
                
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>