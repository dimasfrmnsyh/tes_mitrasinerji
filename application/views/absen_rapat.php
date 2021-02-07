<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Absen Rapat</title>

    <!-- Icons font CSS-->
    <link href="<?php echo base_url();?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url();?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet" media="all">
    <style>
        #my_camera video{
			object-fit: cover;
			width: 100% !important;
			height: 100% !important;
		}
		
		#my_camera{ 
			width: 100% !important;
			height: 100% !important;
        }

        .card{
            display: flex;
        }

        .card-heading, .card-body{
            display: block;
        }
        h1{
        color: #fff;
        position: relative;
        left:27%;
        font-size:48px;
        font-weight: bold;
        letter-spacing: -3px;
    }         
       img{
        float:left; 
        width:85px;
        height:85px;
        position:relative;
        left:24%;
        margin-bottom: 20px;
        margin-top: -10px;
       }
       body {
        background: url("<?php echo site_url('assets/images/bgfix.png'); ?>") no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
       }
    </style>
</head>

<body>
    <div class="page-wrapper p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
        <img src="<?php echo base_url();?>logobapedaa.png"> </img>
    <h1 >TAMU RAPAT 
    </h1>    
            <div class="card card-3">
                <div class="card-heading">
                    <div id="my_camera"> <input type="hidden" id="poto_field" name="foto"></div>
                </div>  
                <div class="card-body">
                    <form method="POST" id="tambah">
                                                   

                        <input type="hidden" id="id_ruangan" name="id_ruangan">        
                        <div class="input-group">
                            <input type="hidden" id="poto_field" name="foto">
                            <label style="color:white; font-size:16px;">Nama</label> 
                            <input class="input--style-3" type="text"  name="nama_tamu_rapat" id="nama_tamu_rapat">
                        </div>
                        <div class="input-group">
                        <label style="color:white; font-size:16px;">Dinas Instansi</label> 
                            <input class="input--style-3" type="text" name="instansi" id="instansi">
                        </div>
                    
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                            <label style="color:white; font-size:16px;">Pilih Rapat</label> 
                                <select name="id_rapat" id="id_rapat">
                                <?php if ( $rapat === [] ) : ?>
                                <option value="">Tidak Ada Rapat Hari Ini</option>
                                <?php else : ?>    
								<option value=""></option>  
                                <?php endif; ?>
							<?php foreach ($rapat as $rapatt):?>
                                <option value="<?=$rapatt->id_rapat;?>"><?=$rapatt->nama_rapat;?> - PUKUL : <?=$rapatt->jam;?></option>
   							 <?php endforeach;?>
                                  </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div> 
                        <div class="input-group">
                        <label style="color:white; font-size:16px;">Ruangan</label>     
                            <input class="input--style-3" type="text" readonly name="nama_ruangan" id="nama_ruangan">
                        </div>             


                        <div class="p-t-10">
                            
                            <button class="btn btn--pill btn--green" type="submit" onclick="location.href='<?php echo base_url();?>page'">Ambil Foto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
    <!-- Jquery JS-->
    <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?php echo base_url();?>vendor/select2/select2.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datepicker/daterangepicker.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
     $('#id_rapat').select2({
      allowClear: true
     });
 });
</script>
    <!-- Main JS-->
    <script src="<?php echo base_url();?>assets/js/global.js"></script>
	<script language="JavaScript">
		Webcam.set({
			width: 540,
			height: 360,
			image_format: 'jpeg',
			jpeg_quality: 100
		});
		Webcam.attach( '#my_camera' );
	</script>
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script type="text/javascript">		
	$('#tambah').on('submit', function (event) {
			event.preventDefault();
			Webcam.snap( function(data_uri) {
				image = data_uri;
				$('#poto_field').val(image);
				
			});
			var foto = $('#poto_field').val();
			var id_rapat = $('#id_rapat').val();
			var id_ruangan = $('#id_ruangan').val();
            var nama_tamu_rapat = $('#nama_tamu_rapat').val();
			var instansi = $('#instansi').val();
			
			
			$.ajax({
				url: '<?php echo site_url("absen_rapat/tambah");?>',
				type: 'POST',
				dataType: 'json',
				data: {foto: foto,id_rapat: id_rapat,id_ruangan: id_ruangan,nama_tamu_rapat:nama_tamu_rapat,instansi : instansi
		},
			})
			.done(function(data) {
				if (data > 0) {
					alert('insert data sukses');
					$('#tambah')[0].reset();
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
			
        });
        
        $('#id_rapat').on("change", function (event) {
            var id_rapat = this.value;
            $.ajax({
				url: '<?php echo site_url("absen_rapat/get_ruangan/");?>'+id_rapat+'',
				type: 'POST',
				dataType: 'json',
				data: {id_rapat: id_rapat
		        },
			})
			.done(function(data) {
                $('#id_ruangan').val(data.id_ruangan);
                $('#nama_ruangan').val(data.nama_ruangan);
                console.log(data.nama_ruangan);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
        });

	</script>
    

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->