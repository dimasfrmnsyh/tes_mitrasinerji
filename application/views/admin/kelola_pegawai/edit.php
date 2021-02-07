    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            
            <ol class="breadcrumb left">
              <li><a href="<?php  echo base_url('admin/kelola_pegawai') ?>"><i class="fa fa-users"></i> List pegawai</a></li> 
              <li class="active">Edit pegawai</li>
            </ol>
             
        </section>

        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit pegawai</h3>
                        </div><!-- /.box-header -->
                        <form class="" action="<?php echo site_url('admin/kelola_pegawai/edit/' . $id_pegawai);?>" method="post" enctype="multipart/form-data">
                               <div class="box-body">
                          <div class="row">
                          <div class="col-md-5">
                              <div class="form-group <?php echo (form_error('nip')) ? 'has-error' : '';?>">
                                <label for="inputnip" class="control-label">NIP :</label> 
                                <input class="form-control" type="text" name="nip" value="<?php echo $pegawai->nip;?>">
                                <?php echo (form_error('nip')) ? '<span class="help-block">' . form_error('nip') . '</span>' : '';?> 
                              </div> 

                              <div class="form-group <?php echo (form_error('nama_pegawai')) ? 'has-error' : '';?>">
                                <label for="inputnama_pegawai" class="control-label">Nama Pegawai :</label> 
                                <input class="form-control" type="text" name="nama_pegawai" value="<?php echo $pegawai->nama_pegawai;?>">
                                <?php echo (form_error('nama_pegawai')) ? '<span class="help-block">' . form_error('nama_pegawai') . '</span>' : '';?> 
                              </div> 
                              <div class="form-group <?php echo (form_error('password')) ? 'has-error' : '';?>">
                                <label for="inputpassword" class="control-label">Password :</label> 
                                <input class="form-control" type="text" name="password" value="<?php echo $pegawai->password;?>">
                                <?php echo (form_error('password')) ? '<span class="help-block">' . form_error('password') . '</span>' : '';?> 
                              </div> 
                              <div class="col-md-5">
                              <div class="form-group <?php echo (form_error('warna')) ? 'has-error' : '';?>">
                                <label for="inputwarna" class="control-label">Warna</label> 
                                <input class="form-control" type="color" name="warna" value="<?php echo $pegawai->warna;?>">
                                <?php echo (form_error('warna')) ? '<span class="help-block">' . form_error('warna') . '</span>' : '';?> 
                              </div> 
                            </div>
                            

                          </div><!-- end row -->
                        </div><!-- /.box-body --><div class="box-footer c">
                            <button class="btn btn-primary pull-right" type="submit" name="submit" value="save"><i class="fa fa-save"></i> Edit pegawai</button>
                        </div><!-- box-footer -->
                    </form>
                    </div><!-- /.box -->
        <a href="<?php  echo base_url('admin/kelola_pegawai') ?>" class="btn btn-xs btn-default" href=""><i class="fa fa-long-arrow-left"></i> Kembali Ke list Pegawai</a>

                    
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    

    <?php $this->load->view('admin/layout/footer'); ?>

     