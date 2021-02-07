    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            
            <ol class="breadcrumb left">
              <li><a href="<?php  echo base_url('admin/kelola_ruangan') ?>"><i class="fa fa-users"></i> List Ruangan</a></li> 
              <li class="active">Edit Ruangan</li>
            </ol>
             
        </section>

        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Ruangan</h3>
                        </div><!-- /.box-header -->
                        <form class="" action="<?php echo site_url('admin/kelola_ruangan/edit/' . $id_ruangan);?>" method="post">
                               <div class="box-body">
                          <div class="row">
                            <div class="col-md-5">

                              <div class="form-group <?php echo (form_error('nama_ruangan')) ? 'has-error' : '';?>">
                                <label for="inputnama_ruangan" class="control-label">Nama Ruangan</label> 
                                <input class="form-control" type="text" name="nama_ruangan" value="<?php echo $ruangan->nama_ruangan; ?>">
                                <?php echo (form_error('nama_ruangan')) ? '<span class="help-block">' . form_error('nama_ruangan') . '</span>' : '';?> 
                              </div> 
                          </div><!-- end row -->
                        </div><!-- /.box-body --><div class="box-footer c">
                            <button class="btn btn-primary pull-right" type="submit" name="submit" value="save"><i class="fa fa-save"></i> Tambah Ruangan</button>
                        </div><!-- box-footer -->
                    </form>
                    </div><!-- /.box -->
        <a href="<?php  echo base_url('admin/kelola_ruangan') ?>" class="btn btn-xs btn-default" href=""><i class="fa fa-long-arrow-left"></i> Kembali Ke list Ruangan</a>

                    
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    

    <?php $this->load->view('admin/layout/footer'); ?>

     