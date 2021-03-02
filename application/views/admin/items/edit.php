    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            
            <ol class="breadcrumb left">
              <li><a href="<?php  echo base_url('items') ?>"><i class="fa fa-users"></i>Items</a></li> 
              <li class="active">Edit Items</li>
            </ol>
             
        </section>

        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Items</h3>
                        </div><!-- /.box-header -->
                        <form class="" action="<?php echo site_url('items/edit/' . $id);?>" method="post" enctype="multipart/form-data">
                               <div class="box-body">
                          <div class="row">
                          <div class="col-md-5">
   
                            <div class="form-group <?php echo (form_error('kode')) ? 'has-error' : '';?>">
                                <label for="inputkode" class="control-label">Items Code</label> 
                                <input class="form-control" type="text" name="kode" value="<?php echo $items->kode;?>">
                              </div> 

                              <div class="form-group <?php echo (form_error('nama')) ? 'has-error' : '';?>">
                                <label for="inputname" class="control-label">Items Name</label> 
                                <input class="form-control" type="text" name="nama" value="<?php echo $items->nama;?>">
                              </div> 

    
                              <div class="form-group <?php echo (form_error('harga')) ? 'has-error' : '';?>">
                                <label for="inputharga" class="control-label">Items price</label> 
                                <input class="form-control" type="text" name="harga" value="<?php echo $items->harga;?>" >
                              </div> 

    


                            </div><!-- end col -->
                          </div><!-- end row -->
                        </div><!-- /.box-body --><div class="box-footer c">
                            <button class="btn btn-primary pull-right" type="submit" name="submit" value="save"><i class="fa fa-save"></i> Edit Items</button>
                        </div><!-- box-footer -->
                    </form>
                    </div><!-- /.box -->
        <a href="<?php  echo base_url('items') ?>" class="btn btn-xs btn-default" href=""><i class="fa fa-long-arrow-left"></i> Back To Items List</a>

                    
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    

    <?php $this->load->view('admin/layout/footer'); ?>

     