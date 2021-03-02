    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          
          <ol class="breadcrumb left">
            <li class="active"><i class="fa fa-user-secret"></i> Sales </li>  
          </ol> 
            
        </section>

        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sales List</h3>
                            <div class="box-tools pull-right">
                                <!-- Buttons, labels, and many other things can be placed here! -->
                                <!-- Here is a label for example -->
                                <a class="btn btn-sm btn-primary" href="<?php echo site_url('sales/tambah');?>"><i class="fa fa-plus"></i> Add Sales</a>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                            <table id="table-regular" class="table table-bordered">
                                <thead>
                                <tr>
                                <?php $i = 1;?>
                                    <th>No </th>
                                    <th>Code</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Total Items</th>
                                    <th>Sub Total</th>
                                    <th>Discount</th>
                                    <th>Ongkir</th>
                                    <th>Total Price</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($result as $res) { ?>
                                <tr>
                                    <td width="5%"><?php echo $i++;?></td>
                                    <td ><?php echo $res->kode;?></td>
                                    <td ><?php echo tanggal_lokal($res->tgl);?></td>
                                    <td ><?php echo $res->name;?></td>
                                    <td ><?php echo $res->qty;?></td>
                                    <td ><?php echo $res->subtotal;?></td>
                                    <td ><?php echo $res->diskon_pct;?></td>
                                    <td ><?php echo $res->ongkir;?></td>
                                    <td ><?php echo $res->total;?></td>
                                    <td> 
                                    <!-- <a href="<?php echo site_url('sales/edit/' . $res->id);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a> -->
                                    <a href="<?php echo site_url('sales/delete/' . $res->id);?>" class="btn btn-danger btn_hapus btn-xs"><i class="fa fa-trash"></i> Delete</a>
                                   
                                    </td>
                                </tr>
                            <?php } ?>
                                </tbody>
                            </table>
                            </div><!-- end table responsive -->
                        </div><!-- /.box-body -->
                        <div class="box-footer"> 
                        </div><!-- box-footer -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


 
    <?php $this->load->view('admin/layout/footer'); ?>

    <script type="text/javascript">
        table_regular.on('click', '.btn_hapus', function(){
            return confirm('apakah anda yakin?');
        });
    </script>
 