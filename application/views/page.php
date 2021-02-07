<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Bappppeda Sumedang</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@600&display=swap" rel="stylesheet">
<style>
  html, body {
    width: 100%;
    height: 100%;
  }
  body {
    background: url("<?php echo site_url('assets/images/backgrounsd.png'); ?>") no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
  .jost{
    font-family: 'Jost', sans-serif;
    color: #fff;
    font-size: 3.5vw;
  }
  .icon1{
    font-family: 'Jost', sans-serif;
    color: #4f3f3f;
    font-weight: bold;
    font-size: 1.5vw;
    top: -1;
  }
  .icon2{
    font-family: 'Jost', sans-serif;
    color: #004baa;
    font-weight: bold;
    font-size: 1.5vw;
    top: -1;
  }
  .footer{
    font-family: 'Jost', sans-serif;
    color: rgba(255,255,255,0.6)
  }
</style>
  </head>
<body>
  <div class="h-100 py-3 container-fluid d-flex flex-column justify-content-between">
  <div class="row" style="height: 100px">
    <div class="col-sm-3" >
      <div class ="row">
        <div class="col text-right pt-3 pb-3">
          <img src="<?php echo site_url('assets/images/logoinsunmedal.png'); ?>" width="75px">
          </div>
        <div class="col pt-3 pb-3">
          <img src="<?php echo site_url('assets/images/logobapedaa.png'); ?>" width="75px">
        </div>
      </div>
    </div>
    <div class="col-sm-6"></div>
    <div class="col-sm-3">
      <div class="row">
        <div class="col"></div>
        <div class="col pt-4 pb-3"><img src="<?php echo site_url('assets/images/ogolbapeda.png'); ?>" width="170px"></div>
      </div>
    </div>
  </div>

<div>
  <div class="row">
  <div class="mx-auto"><label class="jost">SILAHKAN PILIH APLIKASI</label></div>
  </div>
  <div class="row">
  <div class="col"></div>
  <div class="col">
  <div class="row">
  <div class="col text-center">
  <a href="<?php echo site_url('absen_rapat'); ?>"><img src="<?php echo site_url('assets/images/icon1.png'); ?>" width="170px">
  <label class="icon1" width="inherit">TAMU RAPAT</label></a>
  </div>
  <div class="col"></div>
  <div class="col text-center">
  <a href="<?php echo site_url('tamu'); ?>">
  <img src="<?php echo site_url('assets/images/icon2.png'); ?>" width="170px" class="pt-5">
  <label class="icon2">BUKU TAMU</label></a>
  </div>
  </div>
  </div>
  <div class="col"></div>
  </div>
</div>

  <div class="row">
  <div class="mx-auto mt-5 footer" >POWERED BY BAPPPPEDA KABUPATEN SUMEDANG</div>
  </div>

  </div>

</body>

</html>