    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            
            <ol class="breadcrumb left">
              <li><a href="<?php  echo base_url('customer') ?>"><i class="fa fa-users"></i>Customer</a></li> 
              <li class="active">Edit Customer</li>
            </ol>
             
        </section>

        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Customer</h3>
                        </div><!-- /.box-header -->
                        <form class="" action="<?php echo site_url('customer/edit/' . $id);?>" method="post" enctype="multipart/form-data">
                               <div class="box-body">
                          <div class="row">
                          <div class="col-md-5">
   
                            <div class="form-group <?php echo (form_error('code')) ? 'has-error' : '';?>">
                                <label for="inputcode" class="control-label">Customer Code</label> 
                                <input class="form-control" type="text" name="code" value="<?php echo $customer->code;?>">
                              </div> 

                              <div class="form-group <?php echo (form_error('name')) ? 'has-error' : '';?>">
                                <label for="inputname" class="control-label">Customer Name</label> 
                                <input class="form-control" type="text" name="name" value="<?php echo $customer->name;?>">
                              </div> 

    
                              <div class="form-group <?php echo (form_error('telp')) ? 'has-error' : '';?>">
                                <label for="inputtelp" class="control-label">Customer Telphone</label> 
                                <input class="form-control" type="text" name="telp" value="<?php echo $customer->telp;?>" >
                              </div> 

    


                            </div><!-- end col -->
                          </div><!-- end row -->
                        </div><!-- /.box-body --><div class="box-footer c">
                            <button class="btn btn-primary pull-right" type="submit" name="submit" value="save"><i class="fa fa-save"></i> Edit Customer</button>
                        </div><!-- box-footer -->
                    </form>
                    </div><!-- /.box -->
        <a href="<?php  echo base_url('customer') ?>" class="btn btn-xs btn-default" href=""><i class="fa fa-long-arrow-left"></i> Back To Customer List</a>

                    
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    

    <?php $this->load->view('admin/layout/footer'); ?>

     