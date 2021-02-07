    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            
            <ol class="breadcrumb left">
              <li><a href="<?php  echo base_url('admin/kelola_tamu') ?>"><i class="fa fa-users"></i> List Tamu</a></li> 
              <li class="active">Tambah Tamu</li>
            </ol>

        </section>

        <!-- Main content -->
        <section class="content">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tambah Tamu</h3>
                        </div><!-- /.box-header -->
                        <form class="form" action="<?php echo site_url('admin/kelola_tamu/tambah');?>" method="post">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-5">

                            <div class="form-group <?php echo (form_error('nama')) ? 'has-error' : '';?>">
                                <label for="inputnama" class="control-label">Nama</label> 
                                <input class="form-control" type="text" name="nama" value="<?php echo set_value('nama'); ?>">
                                <?php echo (form_error('nama')) ? '<span class="help-block">' . form_error('nama') . '</span>' : '';?> 
                              </div> 
                              
                              <div class="form-group <?php echo (form_error('instansi')) ? 'has-error' : '';?>">
                                <label for="inputinstansi" class="control-label"> Instansi </label> 
                                <input class="form-control" type="text" placeholder="Masukan instansi"  name="instansi" value="<?php echo set_value('instansi'); ?>">
                                <?php echo (form_error('instansi')) ? '<span class="help-block">' . form_error('instansi') . '</span>' : '';?> 
                              </div> 

                              <div class="form-group <?php echo (form_error('keperluan')) ? 'has-error' : '';?>">
                                <label for="inputkeperluan" class="control-label">keperluan</label> 
                                <input class="form-control" type="text" name="keperluan" value="<?php echo set_value('keperluan'); ?>">
                                <?php echo (form_error('keperluan')) ? '<span class="help-block">' . form_error('keperluan') . '</span>' : '';?> 
                              </div> 

                              <div class="form-group <?php echo (form_error('id_pegawai')) ? 'has-error' : '';?>">
                                <label for="inputid_pegawai" class="control-label">id_pegawai</label> 
                                <input class="form-control" type="text" name="id_pegawai" value="<?php echo set_value('id_pegawai'); ?>">
                                <?php echo (form_error('id_pegawai')) ? '<span class="help-block">' . form_error('id_pegawai') . '</span>' : '';?> 
                              </div> 

                              <div class="form-group <?php echo (form_error('foto')) ? 'has-error' : '';?>">
                                <label for="inputfoto" class="control-label">foto</label> 
                                <input class="form-control" type="text" name="foto" value="<?php echo set_value('foto'); ?>">
                                <?php echo (form_error('foto')) ? '<span class="help-block">' . form_error('foto') . '</span>' : '';?> 
                              </div> 

                          </div><!-- end row -->
                        </div><!-- /.box-body -->
                        <div class="box-footer c">
                            <button class="btn btn-primary pull-right" type="submit" name="submit" value="save"><i class="fa fa-save"></i> Tambah rapat</button>
                        </div><!-- box-footer -->
                    </form>
                    </div><!-- /.box -->
        <a href="<?php  echo base_url('admin/kelola_tamu') ?>" class="btn btn-xs btn-default" href=""><i class="fa fa-long-arrow-left"></i> Kembali Ke list rapat</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <?php $this->load->view('admin/layout/footer'); ?>
<script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js">
  

var timepicker = new TimePicker('time', {
  lang: 'en',
  theme: 'dark'
});
timepicker.on('change', function(evt) {
  
  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
  evt.element.value = value;

});

</script>