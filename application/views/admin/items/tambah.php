    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            
            <ol class="breadcrumb left">
              <li><a href="<?php  echo base_url('items') ?>"><i class="fa fa-users"></i> Items</a></li> 
              <li class="active">Items</li>
            </ol>

        </section>

        <!-- Main content -->
        <section class="content">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Items</h3>
                        </div><!-- /.box-header -->
                        <form class="form" action="<?php echo site_url('items/tambah');?>" method="post">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-5">

                            <div class="form-group <?php echo (form_error('kode')) ? 'has-error' : '';?>">
                                <label for="inputkode" class="control-label">Item Code</label> 
                                <input class="form-control" type="text" name="kode" value="<?php echo set_value('kode'); ?>" placeholder="Please Input Item Code">
                                <?php echo (form_error('kode')) ? '<span class="help-block">' . form_error('kode') . '</span>' : '';?> 
                              </div> 


                              <div class="form-group <?php echo (form_error('nama')) ? 'has-error' : '';?>">
                                <label for="inputname" class="control-label">Item Name</label> 
                                <input class="form-control" type="text" name="nama" value="<?php echo set_value('nama'); ?>" placeholder="Please Input Item Name">
                                <?php echo (form_error('nama')) ? '<span class="help-block">' . form_error('nama') . '</span>' : '';?> 
                              </div> 


                              <div class="form-group <?php echo (form_error('harga')) ? 'has-error' : '';?>">
                                <label for="inputharga" class="control-label">Item Price</label> 
                                <input class="form-control" type="text" name="harga" value="<?php echo set_value('harga'); ?>" placeholder="Please Input Item Price">
                                <?php echo (form_error('harga')) ? '<span class="help-block">' . form_error('harga') . '</span>' : '';?> 
                              </div> 


                            </div>
                          </div><!-- end row -->
                        </div><!-- /.box-body -->
                        <div class="box-footer c">
                            <button class="btn btn-primary pull-right" type="submit" name="submit" value="save"><i class="fa fa-save"></i> Tambah  Customer</button>
                        </div><!-- box-footer -->
                    </form>
                    </div><!-- /.box -->
        <a href="<?php  echo base_url('items') ?>" class="btn btn-xs btn-default" href=""><i class="fa fa-long-arrow-left"></i> Back To List  Customer</a>
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