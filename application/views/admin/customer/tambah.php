    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            
            <ol class="breadcrumb left">
              <li><a href="<?php  echo base_url('customer') ?>"><i class="fa fa-users"></i> Customer</a></li> 
              <li class="active">Customer</li>
            </ol>

        </section>

        <!-- Main content -->
        <section class="content">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Customer</h3>
                        </div><!-- /.box-header -->
                        <form class="form" action="<?php echo site_url('customer/tambah');?>" method="post">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-5">

                            <div class="form-group <?php echo (form_error('code')) ? 'has-error' : '';?>">
                                <label for="inputcode" class="control-label">Customer Code</label> 
                                <input class="form-control" type="text" name="code" value="<?php echo set_value('code'); ?>" placeholder="Please Input Customer Code">
                                <?php echo (form_error('code')) ? '<span class="help-block">' . form_error('code') . '</span>' : '';?> 
                              </div> 


                              <div class="form-group <?php echo (form_error('name')) ? 'has-error' : '';?>">
                                <label for="inputname" class="control-label">Customer Name</label> 
                                <input class="form-control" type="text" name="name" value="<?php echo set_value('name'); ?>" placeholder="Please Input Customer Name">
                                <?php echo (form_error('name')) ? '<span class="help-block">' . form_error('name') . '</span>' : '';?> 
                              </div> 


                              <div class="form-group <?php echo (form_error('telp')) ? 'has-error' : '';?>">
                                <label for="inputtelp" class="control-label">Customer Telphone</label> 
                                <input class="form-control" type="text" name="telp" value="<?php echo set_value('telp'); ?>" placeholder="Please Input Customer Telphone">
                                <?php echo (form_error('telp')) ? '<span class="help-block">' . form_error('telp') . '</span>' : '';?> 
                              </div> 


                            </div>
                          </div><!-- end row -->
                        </div><!-- /.box-body -->
                        <div class="box-footer c">
                            <button class="btn btn-primary pull-right" type="submit" name="submit" value="save"><i class="fa fa-save"></i> Tambah  Customer</button>
                        </div><!-- box-footer -->
                    </form>
                    </div><!-- /.box -->
        <a href="<?php  echo base_url('customer') ?>" class="btn btn-xs btn-default" href=""><i class="fa fa-long-arrow-left"></i> Back To List  Customer</a>
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