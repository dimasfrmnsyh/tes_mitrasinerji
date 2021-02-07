    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          
          <ol class="breadcrumb left">
            <li class="active"><i class="fa fa-user-secret"></i> List Kegiatan </li>  
          </ol> 
            
        </section>

        <!-- Main content -->
        <section class="content">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-red">
                        <div class="box-header with-border">
                            <h3 class="box-title">Daftar Kegiatan</h3>
                            <div class="box-tools pull-right">
                                <!-- Buttons, labels, and many other things can be placed here! -->
                                <!-- Here is a label for example -->
                                <a class="btn btn-sm btn-primary" href="<?php echo site_url('admin/kelola_kegiatan/tambah');?>"><i class="fa fa-plus"></i> Tambah Kegiatan</a> 
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <form method="get" action="<?= base_url() ?>admin/kelola_kegiatan/print" target="_blank">
                                    <div class="col-md-3"> 
                                        <select class="form-control" name="periode">
                                            <option value="all">all</option>
                                            <?php foreach ($this->model_kegiatan->getListBulan() as $res): ?>
                                                <option value="<?= $res->bulan ?>-<?= $res->tahun ?>"><?= $res->bulan ?> - <?= $res->tahun ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>Cetak Laporan</button>
                                    </div>
                                </form>
                            </div>

                            <div class="table-responsive">
                            <table id="table-regular" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Tanggal </th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Uraian Kegiatan</th>  
                                    <th>Tempat</th>
                                    <th>Alamat Kegiatan</th>  
                                    <th>Pegawai</th>  
                                    <th>Uraian</th>  
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($result as $res) { ?>
                                <tr>
                                    <td><?php echo $res->tanggal;?></td>
                                    <td><?php echo $res->jam_mulai;?></td>
                                    <td><?php echo $res->jam_selesai;?></td>
                                    <td><?php echo $res->uraian_kegiatan;?></td>
                                    <td><?php echo $res->tempat_kegiatan;?></td>
                                    <td><?php echo $res->alamat;?></td>
                                    <td><?php echo $res->nama_pegawai;?></td>
                                    <td><?php echo $res->keterangan;?></td> 
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
 