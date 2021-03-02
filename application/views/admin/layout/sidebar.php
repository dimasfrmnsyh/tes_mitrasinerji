
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <div class="user-panel"> 
        <div class="pull-left info">
          <p><i class="fa fa-user-circle"></i> Hi,Have A Good Day:)</p>
          <a href="<?php echo site_url('admin/kelola_admin/edit/') . $this->session->admin_id ?>"><i class="fa fa-gear text-green"></i> Profile</a>
        </div>
      </div> 

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu tree"> 


        <li <?php echo ($menu == 'dashboard') ? 'class="active"' : '';?>><a href="<?php echo site_url('home' . get_url_cache()) ?>"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>

        <li <?php echo ($menu == 'customer') ? 'class="active"' : '';?>><a href="<?php echo site_url('customer' . get_url_cache()) ?>"><i class="fa fa-user"></i> <span>Customer</span></a></li>

        <li <?php echo ($menu == 'items') ? 'class="active"' : '';?>><a href="<?php echo site_url('items' . get_url_cache()) ?>"><i class="fa fa-tags"></i> <span>Items</span></a></li>
        <li <?php echo ($menu == 'sales') ? 'class="active"' : '';?>><a href="<?php echo site_url('sales' . get_url_cache()) ?>"><i class="fa fa-area-chart"></i> <span>Sales</span></a></li>

   
                
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>