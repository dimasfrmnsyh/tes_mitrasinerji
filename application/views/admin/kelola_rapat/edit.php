    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            
            <ol class="breadcrumb left">
              <li><a href="<?php  echo base_url('admin/kelola_rapat') ?>"><i class="fa fa-users"></i> List rapat</a></li> 
              <li class="active">Edit rapat</li>
            </ol>
             
        </section>

        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit rapat</h3>
                        </div><!-- /.box-header -->
                        <form class="" action="<?php echo site_url('admin/kelola_rapat/edit/' . $id_rapat);?>" method="post">
                               <div class="box-body">
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group <?php echo (form_error('nama_rapat')) ? 'has-error' : '';?>">
                                <label for="inputnama_rapat" class="control-label">Nama Rapat</label> 
                                <input class="form-control" type="text" name="nama_rapat" value="<?php echo $rapat->nama_rapat;?>">
                                <?php echo (form_error('nama_rapat')) ? '<span class="help-block">' . form_error('nama_rapat') . '</span>' : '';?> 
                              </div> 


                              <div class="form-group <?php echo (form_error('tanggal')) ? 'has-error' : '';?>">
                                <label for="inputtanggal" class="control-label">Tanggal Rapat </label> 
                                <input class="form-control" type="date" placeholder="Masukan Tanggal Rapat" id="time" name="tanggal" value="<?php echo $rapat->tanggal; ?>">
                                <?php echo (form_error('tanggal')) ? '<span class="help-block">' . form_error('tanggal') . '</span>' : '';?> 
                              </div> 

                              <div class="form-group <?php echo (form_error('jam')) ? 'has-error' : '';?>">
                                <label for="inputjam" class="control-label">Jam Rapat</label> 
                                <input class="form-control" type="text" placeholder="HH:MM:SS" id="time" name="jam" value="<?php echo $rapat->jam; ?>">
                                <?php echo (form_error('jam')) ? '<span class="help-block">' . form_error('jam') . '</span>' : '';?> 
                              </div> 

                              <div class="form-group <?php echo (form_error('id_ruangan')) ? 'has-error' : '';?>">
                                <label for="id_ruangan" class="control-label">Ruangan</label> 
                              <select class="form-control" name="id_ruangan" id="id_ruangan">
                                    <option value="">Pilih Ruangan</option>  
                                    <?php foreach ($data_ruangan as $list) { ?>
                                      <option value="<?php echo $list->id_ruangan; ?>"><?php echo $list->nama_ruangan; ?></option>  
                                    <?php } ?>
                              </select>
                            </div>  

                          </div><!-- end row -->
                        </div><!-- /.box-body --><div class="box-footer c">
                            <button class="btn btn-primary pull-right" type="submit" name="submit" value="save"><i class="fa fa-save"></i> Tambah rapat</button>
                        </div><!-- box-footer -->
                    </form>
                    </div><!-- /.box -->
        <a href="<?php  echo base_url('admin/kelola_rapat') ?>" class="btn btn-xs btn-default" href=""><i class="fa fa-long-arrow-left"></i> Kembali Ke list produk</a>

                    
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    

    <?php $this->load->view('admin/layout/footer'); ?>

     