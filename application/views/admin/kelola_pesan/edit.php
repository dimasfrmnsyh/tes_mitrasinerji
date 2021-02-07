    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            
            <ol class="breadcrumb left">
              <li><a href="<?php  echo base_url('admin/kelola_pesan') ?>"><i class="fa fa-users"></i> List Pesan</a></li> 
              <li class="active">Edit Pesan</li>
            </ol>
             
        </section>

        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Pesan</h3>
                        </div><!-- /.box-header -->
                        <form class="" action="<?php echo site_url('admin/kelola_pesan/edit/' . $id_pesan);?>" method="post">
                        <div class="box-body">
                          <div class="row">
                            
                            <div class="col-md-5">
                              <div class="form-group <?php echo (form_error('pesan')) ? 'has-error' : '';?>">
                                <label for="inputnama" class="control-label">Nama Pesan</label> 
                                <input class="form-control" type="text" name="pesan" value="<?php echo $pesan->pesan; ?>">
                                <?php echo (form_error('pesan')) ? '<span class="help-block">' . form_error('pesan') . '</span>' : '';?>
                              </div> 
                            </div><!-- end col -->
                       </div><!-- end row -->
                        </div><!-- /.box-body --><div class="box-footer c">
                            <button class="btn btn-primary pull-right" type="submit" name="submit" value="save"><i class="fa fa-save"></i> Tambah Pesan</button>
                        </div><!-- box-footer -->
                    </form>
                    </div><!-- /.box -->
        <a href="<?php  echo base_url('admin/kelola_pesan') ?>" class="btn btn-xs btn-default" href=""><i class="fa fa-long-arrow-left"></i> Kembali Ke list Pesan</a>

                    
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    

    <?php $this->load->view('admin/layout/footer'); ?>

