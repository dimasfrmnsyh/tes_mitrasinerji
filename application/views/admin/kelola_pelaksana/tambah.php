
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            
            <ol class="breadcrumb left">
              <li><a href="<?php  echo base_url('admin/kelola_pelaksana') ?>"><i class="fa fa-users"></i> List Pelaksana</a></li> 
              <li class="active">Tambah Pelaksana</li>
            </ol>

        </section>

        <!-- Main content -->
        <section class="content">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tambah Pelaksana</h3>
                        </div><!-- /.box-header -->
                        <form class="form" action="<?php echo site_url('admin/kelola_pelaksana/tambah');?>" method="post">
                        <div class="box-body">
                          <div class="row">
                            
                            <div class="col-md-5">
                              <div class="form-group <?php echo (form_error('nama_pelaksana')) ? 'has-error' : '';?>">
                                <label for="inputnama_pelaksana" class="control-label">Nama Pelaksana</label> 
                                <input class="form-control" type="text" name="nama_pelaksana" value="<?php echo set_value('nama_pelaksana'); ?>">
                                <?php echo (form_error('nama_pelaksana')) ? '<span class="help-block">' . form_error('nama_pelaksana') . '</span>' : '';?> 
                              </div> 
                            </div><!-- end col -->
                            
                            
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
                            <button class="btn btn-primary pull-right" type="submit" name="submit" value="save"><i class="fa fa-save"></i> Tambah Kegiatan</button>
                        </div><!-- box-footer -->
                    </form>
                    </div><!-- /.box -->
        <a href="<?php  echo base_url('admin/kelola_pelaksana') ?>" class="btn btn-xs btn-default" href=""><i class="fa fa-long-arrow-left"></i> Kembali Ke list Kegiatan</a>
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