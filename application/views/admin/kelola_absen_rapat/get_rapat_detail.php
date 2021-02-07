    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          
            
        <ol class="breadcrumb left">
              <li><a href="<?php  echo base_url('admin/kelola_absen_rapat') ?>"><i class="fa fa-user-secret"></i> List Rapat</a></li> 
              <li class="active">List Absen Rapat</li>
            </ol> 
             
            
        </section>

        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <!-- <h3 class="box-title"</h3>
                            <p class="h4"></p>  -->
                            <blockquote class="blockquote text-right">
                            <p class="box-title">Daftar Absen Rapat <?php echo $get->nama_rapat[0]; ?></p>
                            <footer class="blockquote-footer">Tanggal : <?php echo $get->tanggal; ?> </footer>
                        </blockquote> 
                            <div class="box-tools pull-right">
                            <section class="content-header">
                            <h1>
                            
                            </h1>
                            </section>
                              <!-- Buttons, labels, and many other things can be placed here! -->
                                <!-- Here is a label for example -->

                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                            <table id="table-regular" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Nama Tamu Rapat</th>
                                    <th>Instansi</th>
                                    <th>Foto</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <?php foreach($detail_rapat as $detail_rapat) { ?>
                                    <td><?php echo $detail_rapat->nama_tamu_rapat; ?></td>
                                    <td><?php echo $detail_rapat->instansi; ?></td>
                                    <td><img src="<?= base_url() . "uploads/absen_rapat/$detail_rapat->foto"; ?>" width="73" height="53"></td>
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
 