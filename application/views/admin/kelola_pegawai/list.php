    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          
          <ol class="breadcrumb left">
            <li class="active"><i class="fa fa-user-secret"></i> List Pegawai </li>  
          </ol> 
            
        </section>

        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Daftar Pegawai</h3>
                            <div class="box-tools pull-right">
                                <!-- Buttons, labels, and many other things can be placed here! -->
                                <!-- Here is a label for example -->
                                <a class="btn btn-sm btn-primary" href="<?php echo site_url('admin/kelola_pegawai/tambah');?>"><i class="fa fa-plus"></i> Tambah Pegawai</a> 
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                            <table id="table-regular" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>NIP</th>  
                                    <th>Warna</th>
                                    <th>Nama Pegawai</th>  
                                    <th>Password</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($result as $res) { ?>
                                <tr>
                                    <td><?php echo $res->nip;?></td>
                                    
                                    <td><input  type="color" value="<?php echo $res->warna;?>"></input></td>
                                    <td><?php echo $res->nama_pegawai;?></td> 
                                    <td><?php echo $res->password;?></td> 
                                    <td> 
                                    <a href="<?php echo site_url('admin/kelola_pegawai/edit/' . $res->id_pegawai);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> edit</a>
                                    <a href="<?php echo site_url('admin/kelola_pegawai/delete/' . $res->id_pegawai);?>" class="btn btn-danger btn_hapus btn-xs"><i class="fa fa-trash"></i> hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                                </tbody>
                            </table>
                            </div><!-- end table responsive -->
                        </div><!-- /.box-body -->
                        <div class="box-footer"> 
                        </div><!-- box-footer -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


 
    <?php $this->load->view('admin/layout/footer'); ?>

    <script type="text/javascript">
        table_regular.on('click', '.btn_hapus', function(){
            return confirm('apakah anda yakin?');
        });
    </script>
 