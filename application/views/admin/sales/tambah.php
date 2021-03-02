    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <ol class="breadcrumb left">
              <li><a href="<?php echo base_url('sales') ?>"><i class="fa fa-users"></i> Sales</a></li>
              <li class="active">Sales</li>
            </ol>

        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Sales</h3>
                        </div><!-- /.box-header -->
                        <form class="form" action="<?php echo site_url('sales/tambah'); ?>" method="post">
                        <div class="box-body">
                          <div class="row">
                          <?php echo validation_errors(); ?>
                          <div class="col-md-5">
                          <div class="form-group-lg <?php echo (form_error('no')) ? 'has-error' : ''; ?>">
                                <label for="inputno" class="control-label-lg">Transaction Number</label>
                                <input class="form-control" type="text" name="no" value="<?php echo date('Ymd'),$nomor->id + 1 ; ?>" readonly>
                              </div>

                            <div class="form-group-lg <?php echo (form_error('tgl')) ? 'has-error' : ''; ?>">
                                <label for="inputtgl" class="control-label-lg">Date </label>
                                <input class="form-control" type="date" name="tgl" value="<?php echo set_value('tgl');?>">
                              </div>
                              </div>
                              <div class="col-md-5">

                            <div class="form-group wey <?php echo (form_error('id_pegawai')) ? 'has-error' : ''; ?>">
                                <label for="id_pegawai" class="control-label">Select Customer</label>
                              <select class="form-control setinput" name="id_pegawai" id="id_pegawai" >
                                    <option value="">Select Customer</option>
                                    <?php foreach ($customer as $list) {?>
                                      <option value="<?php echo $list->id; ?>" <?php echo (set_value('id_pegawai') == $list->id) ? 'selected' : '';?> ><?php echo $list->name; ?></option>
                                    <?php }?>
                              </select>
                            </div>

                            <div class="form-group <?php echo (form_error('nama')) ? 'has-error' : ''; ?>">
                                <label for="inputnama" class="control-label">Name</label>
                                <input class="form-control" type="text" name="nama" value="" disabled>
                              </div>

                              <div class="form-group <?php echo (form_error('telp')) ? 'has-error' : ''; ?>">
                                <label for="inputtelp" class="control-label">Customer Telphone</label>
                                <input class="form-control" type="text" name="telp" value="" disabled>
                              </div>
                              </div>
                              <div class="col-md-12">
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                  Launch Extra Large Modal
                </button>
                          <div class="box-body">
                            <table id="" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="10%" rowspan="2" class="text-center">Aksi</th>
                                    <th rowspan="2" class="text-center">No </th>
                                    <th rowspan="2" class="text-center">Code Items</th>
                                    <th rowspan="2" class="text-center">Items Name</th>
                                    <th rowspan="2" class="text-center">Qty</th>
                                    <th rowspan="2" class="text-center">Harga Banderol</th>
                                    <th colspan="2" class="text-center">Diskon</th>
                                    <th rowspan="2" class="text-center">Harga Diskon</th>
                                    <th rowspan="2" class="text-center">Total Price</th>
                                </tr>
                                <tr>
                                    <th class="text-center">(%)</th>
                                    <th class="text-center">(Rp)</th>
                                </tr>
                                </thead>
                                <tbody>
                              
                                  <?php
                                  $i = 1;
                                  foreach ($this->cart->contents() as $items) {
                                  ?>
                                    <tr>
                                    <td class="text-center">
                                      <button type="button" class="btn btn-primary btn-xs btn_edit" data-rowid="<?php echo $items['rowid'];?>"><i class="fa fa-pencil"></i> Edit</button>
                                      <a href="<?php echo site_url('sales/del_cart/' . $items['rowid']);?>" class="btn btn-danger btn_hapus btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                    <td><?php echo $i++; ?></td>
                                    <td ><?php echo $items['item']->kode; ?></td>
                                    <td ><?php echo $items['item']->nama; ?></td>
                                    <td ><input type="number" min="0" data-rowid="<?php echo $items['rowid'];?>" id="qty<?php echo $items['rowid'];?>" class="form-control update" style="width: 60px;" name="qty" value="<?php echo $items['qty']; ?>"></td>
                                    <td ><?php echo format_rupiah($items['price']); ?></td>
                                    <td class="text-center" >
                                      <input type="number" min="0" max="100" data-rowid="<?php echo $items['rowid'];?>" id="discount<?php echo $items['rowid'];?>" class="form-control update" style="width: 60px;" name="discount" value="<?php echo $items['diskon'];?>">
                                    </td>
                                    <td id="diskon_nilai<?php echo $items['rowid'];?>"><?php echo format_rupiah($items['diskon_nilai']);?></td>
                                    <td id="diskon_harga<?php echo $items['rowid'];?>"><?php echo format_rupiah($items['diskon_harga']);?></td>
                                    <td id="total_price<?php echo $items['rowid'];?>"><?php echo format_rupiah($items['subtotal']); ?></td>

                                    </tr>
                                  <?php
                                  }
                                  ?>
                                  <tr>
                                    <td colspan="9" class="text-right">Sub Total</td>
                                    <td>
                                      <input type="number" min="0" class="form-control update" name="subtotal" id="subtotal" value="<?php echo $this->cart->total();?>" readonly>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="9" class="text-right">Diskon</td>
                                    <td>
                                      <input type="number" min="0" class="form-control update" name="diskon_akhir" id="diskon_akhir" value="<?php echo set_value('diskon_akhir');?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="9" class="text-right">Ongkir</td>
                                    <td>
                                      <input type="number" min="0" class="form-control update" name="ongkir" id="ongkir" value="<?php echo set_value('ongkir');?>">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="9" class="text-right">Total Bayar</td>
                                    <td>
                                      <input type="number" min="0" class="form-control update" name="total_bayar" id="total_bayar" value="<?php echo set_value('total_bayar');?>" reqiured>
                                    </td>
                                  </tr>
                                </tbody>
                            </table>
                            <div>
                            </div>
                            </div>
                          </div><!-- end row -->
                        </div><!-- /.box-body -->
                        <div class="box-footer c">
                            <button class="btn btn-primary pull-right" type="submit" name="submit" value="save"><i class="fa fa-save"></i> Tambah  Sales</button>
                        </div><!-- box-footer -->
                    </form>
                    </div><!-- /.box -->
        <a href="<?php echo base_url('Sales') ?>" class="btn btn-xs btn-default" href=""><i class="fa fa-long-arrow-left"></i> Back To List  Customer</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="table-responsive">
                  <table id="table-regular" class="table table-bordered">
                      <thead>
                      <tr>
                      <?php $i = 1;?>
                          <th>No </th>
                          <th>Code</th>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($result as $res) {?>
                      <tr>
                          <td width="5%"><?php echo $i++; ?></td>
                          <td ><?php echo $res->kode; ?></td>
                          <td ><?php echo $res->nama; ?></td>
                          <td ><?php echo $res->harga; ?></td>
                          <td>
                          <a href="<?php echo site_url('sales/add_cart/' . $res->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-plus"></i> Pilih</a>
                          </td>
                      </tr>
                  <?php }?>
                      </tbody>
                  </table>
                </div><!-- end table responsive -->
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    <?php $this->load->view('admin/layout/footer');?>
<script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<script type="text/javascript">

// var timepicker = new TimePicker('time', {
//   lang: 'en',
//   theme: 'dark'
// });
// timepicker.on('change', function(evt) {

//   var value = (evt.hour || '00') + ':' + (evt.minute || '00');
//   evt.element.value = value;

// });

function update_cart(rowid, qty, discount) {
  $.post("<?php echo site_url('sales/update_cart');?>/" + rowid,
  {
    qty: qty,
    discount: discount
  },
  function(data, status){
    $('#diskon_nilai' + rowid).text(data.diskon_nilai);
    $('#diskon_harga' + rowid).text(data.diskon_harga);
    $('#total_price' + rowid).text(data.subtotal);
  })
}

$(document).ready(function() {

  $('.update').change(function() {
    var val = $(this).val();
    var rowid = $(this).data('rowid');
    var qty = $('#qty' + rowid).val();
    var discount = $('#discount' + rowid).val();
    if (discount == "") discount = 0;
    update_cart(rowid, qty, discount);
  });

  $('#diskon_akhir').change(function() {
    var subtotal = parseInt($('#subtotal').val());
    var diskon = parseInt($(this).val());
    var ongkir = parseInt($('#ongkir').val());
    $('#total_bayar').val(diskon + ongkir);
  });
  
  $('#ongkir').change(function() {
    var subtotal = parseInt($('#subtotal').val());
    var diskon = parseInt($('#diskon_akhir').val());
    var ongkir = parseInt($(this).val());
    $('#total_bayar').val(diskon + ongkir);
  });

});

$('body').on('change','.setinput',function(){
  var BASE_URL = "<?php echo base_url();?>";
    $.ajax({
        url: BASE_URL + 'sales/get_cust_name',
        type:'POST',
        data:{id:$(this).val()},
        success:function(result){
          $('input[name="nama"]').val(result);
        }
    })
});
$('body').on('change','.setinput',function(){
  var BASE_URL = "<?php echo base_url();?>";
    $.ajax({
        url: BASE_URL + 'sales/get_cust_telp',
        type:'POST',
        data:{id:$(this).val()},
        success:function(result){
          $('input[name="telp"]').val(result);
        }
    })
});
</script>
