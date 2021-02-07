    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            
            <ol class="breadcrumb left">
              <li><a href="<?php  echo base_url('admin/kelola_kegiatan') ?>"><i class="fa fa-users"></i> List Kegiatan</a></li> 
              <li class="active">Tambah Kegiatan</li>
            </ol>

        </section>

        <!-- Main content -->
        <section class="content">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tambah Kegiatan</h3>
                        </div><!-- /.box-header -->
                        <form class="form" action="<?php echo site_url('admin/kelola_kegiatan/tambah');?>" method="post">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-5">

                              <div class="form-group <?php echo (form_error('tanggal')) ? 'has-error' : '';?>">
                                <label for="inputtanggal" class="control-label">Tanggal</label> 
                                <input class="form-control" type="date" name="tanggal" value="<?php echo set_value('tanggal'); ?>">
                                <?php echo (form_error('tanggal')) ? '<span class="help-block">' . form_error('tanggal') . '</span>' : '';?> 
                              </div> 


                              <div class="form-group <?php echo (form_error('jam_mulai')) ? 'has-error' : '';?>">
                                <label for="inputjam_mulai" class="control-label">Jam Mulai</label> 
                                <input class="form-control" type="text" placeholder="HH:MM:SS" id="time" name="jam_mulai" value="<?php echo set_value('jam_mulai'); ?>">
                                <?php echo (form_error('jam_mulai')) ? '<span class="help-block">' . form_error('jam_mulai') . '</span>' : '';?> 
                              </div> 

                              <div class="form-group <?php echo (form_error('jam_selesai')) ? 'has-error' : '';?>">
                                <label for="inputjam_selesai" class="control-label">Jam Selesai</label> 
                                <input class="form-control" type="text" placeholder="HH:MM:SS" id="time" name="jam_selesai" value="<?php echo set_value('jam_selesai'); ?>">
                                <?php echo (form_error('jam_selesai')) ? '<span class="help-block">' . form_error('jam_selesai') . '</span>' : '';?> 
                              </div> 

                              <div class="form-group <?php echo (form_error('uraian_kegiatan')) ? 'has-error' : '';?>">
                                <label for="inputuraian_kegiatan" class="control-label">Uraian</label> 
                                <input class="form-control" type="text" name="uraian_kegiatan" value="<?php echo set_value('uraian_kegiatan'); ?>">
                                <?php echo (form_error('uraian_kegiatan')) ? '<span class="help-block">' . form_error('uraian_kegiatan') . '</span>' : '';?> 
                              </div> 

                            </div><!-- end col -->
                            <div class="col-md-5">  
                               <div class="form-group <?php echo (form_error('tempat_kegiatan')) ? 'has-error' : '';?>">
                                 <label for="inputNama" class="control-label">Tempat Kegiatan</label> 
                                 <input class="form-control" name="tempat_kegiatan"><?php echo set_value('tempat_kegiatan'); ?></input>
                                 <?php echo (form_error('tempat_kegiatan')) ? '<span class="help-block">' . form_error('tempat_kegiatan') . '</span>' : '';?> 
                            </div> <!-- end col --> 
                          </div>


                             <div class="col-md-5">  
                               <div class="form-group <?php echo (form_error('alamat')) ? 'has-error' : '';?>">
                                 <label for="inputNama" class="control-label">Alamat</label> 
                                 <input class="form-control" name="alamat"><?php echo set_value('alamat'); ?></input>
                                 <?php echo (form_error('alamat')) ? '<span class="help-block">' . form_error('alamat') . '</span>' : '';?> 
                            </div> <!-- end col -->
                          </div>


                          <div class="col-md-5">  
                              <div class="form-group <?php echo (form_error('id_pegawai')) ? 'has-error' : '';?>">
                                <label for="id_pegawai" class="control-label">Pelaksana</label> 
                              <select class="form-control" name="id_pegawai" id="id_pegawai">
                                    <option value="">Pilih Pelaksana</option>  
                                    <?php foreach ($data_pegawai as $list) { ?>
                                      <option value="<?php echo $list->id_pegawai; ?>"><?php echo $list->nama_pegawai; ?></option>  
                                    <?php } ?>
                              </select>
                            </div>  
                          </div>


                          <div class="col-md-5">  
                               <div class="form-group <?php echo (form_error('keterangan')) ? 'has-error' : '';?>">
                                 <label for="inputNama" class="control-label">Keterangan</label> 
                                 <input class="form-control" name="keterangan"><?php echo set_value('keterangan'); ?></input>
                                 <?php echo (form_error('keterangan')) ? '<span class="help-block">' . form_error('keterangan') . '</span>' : '';?> 
                            </div> <!-- end col -->

                          </div><!-- end row -->
                        </div><!-- /.box-body -->
                        <div class="box-footer c">
                            <button class="btn btn-primary pull-right" type="submit" name="submit" value="save"><i class="fa fa-save"></i> Tambah Kegiatan</button>
                            
                        </div><!-- box-footer -->
                    </form>
                    </div><!-- /.box -->
        <a href="<?php  echo base_url('admin/kelola_kegiatan') ?>" class="btn btn-xs btn-default" href=""><i class="fa fa-long-arrow-left"></i> Kembali Ke list Kegiatan</a>
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