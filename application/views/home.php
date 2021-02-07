<head>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styleq.css">
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="<?= base_url() ?>assets/images/logo.gif" />
<!------ Include the above in your HEAD tag ---------->
<title>Kegiatan BAPPPPEDA Sumedang </title> 
<style type="text/css">


.flip-card {
  width: 200px;
  height: 100px;
  border: 1px solid #f1f1f1;
  perspective: 1000px; /* Remove this if you don't want the 3D effect */
}



@keyframes rotate { 
  10% { 
    transform: rotateY(180deg);
  }
}
/* This container is needed to position the front and back side */
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 5s;
  transform-style: preserve-3d;
  animation: rotate 10s ;
  animation-delay: 5s;
  animation-iteration-count: infinite;
} 

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-card:hover .flip-card-inner {
  /*transform: rotateY(180deg);*/
}


/* Position the front and back side */
.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */
.flip-card-front {
  background-color: #008d99;
  color: #fff;
}

/* Style the back side */
.flip-card-back {
  background-color: #008d99;
  color: white;
  transform: rotateY(180deg);

}
    body{
        font-size: 12px;
        padding:  15px 0px;
        font-family: 'Roboto', sans-serif;
    }
    .heading{
        margin-bottom: 15px;
        height: 100px; 
        background: #008d99; 
        border: 2px solid #026e77;
        position: relative;
        padding: 10px;
        text-align: right;
        padding-right: 100px;
    }   
    .heading .logo{
        position: absolute;
        top: 10px;
        left: 10px;
    }
    .title{
        font-size: 30px;
        padding-right: 10px;
        font-weight: 700;
        color: #fff;
    }
    .title h1{ 
        margin-top: 5px;
        margin-bottom: 0px;
    }
    .title div{
        font-size: 20px;
        font-weight: 400;
    }

    .date{
        padding: 10px;
        background: yellow;
        position: absolute;
        top: 10px;
        border: 2px solid #026e77; 
        height: 80px;
        text-transform: uppercase;
        font-size: 20px;
        font-weight: 700;
        right: 10px;
    }
    .rapat-box{
        position: relative;
        margin-bottom: 15px;
        height: 150px;
        padding: 10px;
        border: 2px solid #026e77;
    }
    .rapat-title{
        margin-bottom: 10px;
        font-size: 16px;
        font-weight: 700;
    }
    .rapat-time{
        color: orange;
        margin-bottom: 20px;
        font-weight: 700;
        font-size: 30px;
    }
    .rapat-caption{
        position: absolute;
        bottom: 5px;
        font-size: 14px;
    }

    table{
        border: 2px solid #026e77 !important;

    }

    table tr td, table tr th  {
        color: #fff;
        font-size: 14px;
        text-align: center;
        border-color: #026e77 !important;
        background: #008d99 !important;
        vertical-align: middle !important;
        }
    @keyframes moveSlideshow {
      100% { 
        transform: translateY(-50%);  
      }
    }
    #no-more-tables{
        background: #008d99;
        overflow-y: hidden;
        margin-bottom: 20px;
        height: calc(100vh - 350px);
        
    }

    



    .animation-scroll{ 
        animation: moveSlideshow 30s linear infinite;
    }
 

    table tr:nth-child(even) td {
        background-color: #00848e !important;
    }
</style>



<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12"> 
            <div class="heading">
                <div class="logo">
                    <img src="<?= base_url() ?>assets/images/logo.gif" width="80"> 
                </div>
                <div class="title">
                    <h1>JADWAL KEGIATAN BAPPPPEDA SUMEDANG</h1>
                    <div>MEETING ARRENGER</div>
                </div>
                <div class="date">
                    <?= date('d'); ?>
                    <?= date('M'); ?><br>
                    <?= date('Y'); ?>
                </div> 
            </div>
        </div>
        <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <br>
         <div class="col-md-12"> 
            <table class="col-md-12 table table-striped table-bordered table-dark">
                <thead class="cf">
                    <tr class="danger ">
                            <th class="text-center df" width="3%">No</th> 
                            <th class="text-center df" width="5%">Jam</th>
                            <th class="text-center df" width="20%">Uraian</th>
                            <th width="20%" fclass="text-center df" >Tempat Kegiatan</th>
                            <th class="text-center df"width="18%">Alamat Kegiatan</th>
                            <th class="text-center df"width="8%">Pegawai</th>
                            <th class="text-center df" width="18%">Keterangan</th>
                        </tr>
                     </table>  
                    </div>
        <div class="col-md-12">
            <div id="no-more-tables">
                <table id="table_prim" class="col-md-12 table table-striped table-bordered table-dark animation-scroll">
                    <thead class="cf">
 
                                    <?php $i=1; ?>
                                    <?php foreach($result as $res) { 
                                    $style = ' style="background-color: '. $res->warna .' !important ;"';
                                        ?>
                                    <tr>
                                        <td <?= $style  ?>width="3%"><?php echo $i++; ?></td>
                                        <td <?= $style  ?> class="text-center" width="5%"><?php echo substr($res->jam_mulai, 0, 5);?> <br> - <br> <?php echo substr($res->jam_selesai, 0, 5);?></td>
                                        <td <?= $style  ?> class="df" width="20%"><?php echo $res->uraian_kegiatan;?></td>
                                        <td <?= $style  ?> width="20%"><?php echo $res->tempat_kegiatan;?></td>
                                        <td <?= $style  ?> width="18%"class="df"><?php echo $res->alamat;?></td>
                                        <td <?= $style  ?>width="8%"><?php echo $res->nama_pegawai;?></td>
                                        <td <?= $style  ?> width="18%"class="df"><?php echo $res->keterangan;?></td> 
                                    </tr>
                  <?php } ?>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div> 
    </div> 
    <div class="row">
        <div class="col-md-2 pl-6">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front"> 
                    <?php 
                    if($this->model_kegiatan->cekBerapaRapatHariIni(1) > 1){
                        $selanjutnya = $this->model_kegiatan->selanjutnya(isset($sedang_berjalan->jam) ? $sedang_berjalan->jam : '', 1); 
                    }else{
                        $selanjutnya = $this->model_kegiatan->getRapatTunggal(1);                         
                    }
                        ?>  
                        
                    <h4><?=  ($selanjutnya) ? $selanjutnya->nama_ruangan : '' ?></h4>
                    <p><?= ($selanjutnya) ? $selanjutnya->nama_rapat : 'tidak ada rapat selanjutnya' ?></p>
                    <p><?= ($selanjutnya) ? $selanjutnya->jam : '' ?></p> 
                </div>
                <div class="flip-card-back">
                  <h4> <?= ($sedang_berjalan) ? $sedang_berjalan->nama_ruangan : '' ?></h4>
                  <p><?= ($sedang_berjalan) ? $sedang_berjalan->nama_rapat : 'tidak ada rapat sedang berjalan' ?></p>
                  <p><?= ($sedang_berjalan) ? $sedang_berjalan->jam : '' ?></p> 
                </div>
              </div>
            </div>   
        </div>                                
        <div class="col-md-8">     
        <br><br>
                            <?php foreach($pesan as $list) { ?>
                           <h1><marquee><?php echo $list->pesan;?></marquee></h1>
                           <?php } ?> </div>
        <div class="col-md-2">
            <div class="flip-card pull-right">
              <div class="flip-card-inner">
                <div class="flip-card-front"> 
                    <?php 
                    if($this->model_kegiatan->cekBerapaRapatHariIni(2) > 1){
                    }else{
                        $selanjutnya2 = $this->model_kegiatan->getRapatTunggal(2);                         
                    }
                        ?>  
                    <h4> <?=  ($selanjutnya2) ? $selanjutnya2->nama_ruangan : '' ?></h4>
                    <p><?= ($selanjutnya2) ? $selanjutnya2->nama_rapat : 'tidak ada rapat selanjutnya' ?></p>
                    <p><?= ($selanjutnya2) ? $selanjutnya2->jam : '' ?></p> 
                </div>
                <div class="flip-card-back">
                  <h4> <?= ($sedang_berjalan2) ? $sedang_berjalan2->nama_ruangan : '' ?></h4>
                  <p><?= ($sedang_berjalan2) ? $sedang_berjalan2->nama_rapat : 'tidak ada rapat sedang berjalan' ?></p>
                  <p><?= ($sedang_berjalan2) ? $sedang_berjalan2->jam : '' ?></p> 
                </div>
              </div>
            </div>   
        </div>  
    </div>

</body> 

<script language="javascript">
        <?php 
        $jam = array(); 
            $year = Date('Y');
            $month = Date('m');
            $day = Date('d');

            if($selanjutnya){
                $hour = explode(':', $selanjutnya->jam)[0];
                $min = explode(':', $selanjutnya->jam)[1];
                array_push($jam, "new Date('$year', '$month', '$day', '$hour', '$min')");  
            }

            if($selanjutnya2){
                $hour = explode(':', $selanjutnya2->jam)[0];
                $min = explode(':', $selanjutnya2->jam)[1];
                array_push($jam, "new Date('$year', '$month', '$day', '$hour', '$min')");  
            }
    
        ?>
    const jam = <?php echo str_replace('"', "",json_encode($jam)) ?>;
    const today = new Date();
    console.log(jam);
    setTimeout(function(){
        jam.map(time => { 
            if( time > today ){ 
            window.location.reload(1);
            }
        }) 
    }, 6000);

    var d = new Date();
    var tglSekarang = d.getDate();
    var jam12 = function () {
        var a = new Date();
        //if (a.getHours() == 23 && a.getDate() == tglSekarang) {
        if (a.getDate() != tglSekarang) {
            window.location.reload(1);
            tglSekarang = a.getDate();
        }
    }
    setInterval(jam12, 5000);
    // console.log($('#table_prim').height() + ' - ' + $('#no-more-tables').height());
    if($('#table_prim').height() < $('#no-more-tables').height()){
        $('#table_prim').removeClass('animation-scroll');
    }
 
 
    // console.log($('#table_prim').height() + ' - ' + $('#no-more-tables').height());
    if($('#table_prim').height() < $('#no-more-tables').height()){
        $('#table_prim').removeClass('animation-scroll');
    }
 
    

 
</script>