    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          
          <ol class="breadcrumb left">
            <li class="active"><i class="fa fa-user-secret"></i> List Tamu </li>  
          </ol> 
            
        </section>

        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Daftar Tamu</h3>
                            <div class="box-tools pull-right">
                                <!-- Buttons, labels, and many other things can be placed here! -->
                                <!-- Here is a label for example -->

                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->

          
                                </form>
                            </div>

                            <div class="table-responsive">
                            <table id="table-regular" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Nama </th>
                                    <th>Instansi</th>
                                    <th>NIK</th>
                                    <th>Keperluan</th>
                                    <th>Bertemu Dengan</th>
                                    <th>Foto</th>
  
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($result as $res) { ?>
                                <tr>
                                    <td><?php echo $res->nama;?></td>
                                    <td><?php echo $res->nik;?></td>
                                    <td><?php echo $res->instansi;?></td>
                                    <td><?php echo $res->keperluan;?></td>
                                    <td><?php echo $res->nama_pegawai;?></td>
                                    <td><img src="<?= base_url() . "uploads/$res->foto"; ?>" width="73" height="53"></td> 
                                    <td> 
                                    <a href="<?php echo site_url('admin/kelola_tamu/delete/' . $res->id_tamu);?>" class="btn btn-danger btn_hapus btn-xs"><i class="fa fa-trash"></i> hapus</a>
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
 