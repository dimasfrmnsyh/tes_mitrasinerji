    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            
            <ol class="breadcrumb left">
              <li><a href="<?php  echo base_url('admin/kelola_pegawai') ?>"><i class="fa fa-users"></i> List Pegawai</a></li> 
              <li class="active">Tambah Pegawai</li>
            </ol>

        </section>

        <!-- Main content -->
        <section class="content">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tambah Pegawao</h3>
                        </div><!-- /.box-header -->
                        <form class="form" action="<?php echo site_url('admin/kelola_pegawai/tambah');?>" method="post">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-5">
                            <div class="form-group <?php echo (form_error('nip')) ? 'has-error' : '';?>">
                                <label for="inputnip" class="control-label">NIP</label> 
                                <input class="form-control" type="text" name="nip" value="<?php echo set_value('nip'); ?>">
                                <?php echo (form_error('nip')) ? '<span class="help-block">' . form_error('nip') . '</span>' : '';?> 
                              </div> 
       
                              <div class="form-group <?php echo (form_error('nama_pegawai')) ? 'has-error' : '';?>">
                                <label for="inputnama_pegawai" class="control-label">Nama Pegawai :</label> 
                                <input class="form-control" type="text" name="nama_pegawai" value="<?php echo set_value('nama_pegawai'); ?>">
                                <?php echo (form_error('nama_pegawai')) ? '<span class="help-block">' . form_error('nama_pegawai') . '</span>' : '';?> 
                              </div> 
                              <div class="form-group <?php echo (form_error('password')) ? 'has-error' : '';?>">
                                <label for="inputpassword" class="control-label">Password :</label> 
                                <input class="form-control" type="text" name="password" value="<?php echo set_value('password'); ?>">
                                <?php echo (form_error('password')) ? '<span class="help-block">' . form_error('password') . '</span>' : '';?> 
                            </div>
                            
                              <div class="col-md-5">
                              <div class="form-group <?php echo (form_error('warna')) ? 'has-error' : '';?>">
                                <label for="inputwarna" class="control-label">Warna</label> 
                                <input class="form-control" value="#e66465" type="color" name="warna" value="<?php echo set_value('warna'); ?>">
                                <?php echo (form_error('warna')) ? '<span class="help-block">' . form_error('warna') . '</span>' : '';?> 
                              </div> 
                            </div>
                            



                          </div><!-- end row -->
                        </div><!-- /.box-body -->
                        <div class="box-footer c">
                            <button class="btn btn-primary pull-right" type="submit" name="submit" value="save"><i class="fa fa-save"></i> Tambah Pegawai</button>
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