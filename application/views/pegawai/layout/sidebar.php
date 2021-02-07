
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <div class="user-panel"> 
        <div class="pull-left info">
        </div>
      </div> 
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu tree"> 

      <li <?php echo ($menu == 'dashboard') ? 'class="active"' : '';?>><a href="<?php echo site_url('pegawai/dashboard' . get_url_cache()) ?>"><i class="fa fa-tachometer"></i> <span>Jadwal Kegiatan</span></a></li>

      <li <?php echo ($menu == 'kelola_kegiatan') ? 'class="active"' : '';?>><a href="<?php echo site_url('pegawai/kegiatan' . get_url_cache()) ?>"><i class="fa fa-handshake-o"></i> <span>Lihat Kegiatan</span></a></li> 
     </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>