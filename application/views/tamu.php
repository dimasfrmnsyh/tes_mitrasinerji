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
    <title>Guest Book</title>

    <!-- Icons font CSS-->
    <link href="<?php echo base_url();?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url();?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet">
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
        body {
        background: url("<?php echo site_url('assets/images/bgfix.png'); ?>") no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
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
    </style>
</head>

<body>            
    <div class="page-wrapper p-t-180 p-b-100 font-poppins">
    <div class="wrapper wrapper--w780">
    <img src="<?php echo base_url();?>logobapedaa.png"> </img>
    <h1 >TAMU LAINNYA 
    </h1>    
            <div class="card card-3">
                <div class="card-heading">
                    <div id="my_camera"></div>
                    <input type="hidden" id="poto_field" name="foto">

                </div>  
                <div class="card-body">
                   <form id="tambah" method="POST">
                        <div class="input-group">
                        <label style="color:white; font-size:16px;">Nama</label> 
                            <input class="input--style-3" type="text" name="nama">
                        </div>
                        <div class="input-group">
                            <label style="color:white; font-size:16px;">Instansi/Alamat </label> 
                            <input class="input--style-3" type="text" name="instansi">
                        </div>
                        <div class="input-group">
                            <label style="color:white; font-size:16px;">NIK</label> 
                            <input class="input--style-3" type="text" name="nik">
                        </div>
                        <div class="input-group">
                            <label style="color:white; font-size:16px;">Keperluan</label> 
                            <input class="input--style-3" type="text" name="keperluan">
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                            <label style="color:white; font-size:16px;">Kepada</label> 
                            <select name="id_pegawai" id="id_pegawai">
                                <option disabled="disabled" selected="selected"></option>
                                   <?php foreach ($pegawai as $res):?>
										<option value="<?=$res->id_pegawai;?>"><?=$res->nama_pegawai;?></option>
   							 <?php endforeach;?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit">Ambil Foto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url();?>assets/js/webcam.js"></script>
    <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?php echo base_url();?>vendor/select2/select2.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datepicker/daterangepicker.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
     $('#id_pegawai').select2({
      allowClear: true
     });
 });
</script>
    <!-- Main JS-->
    <script src="<?php echo base_url();?>assets/js/global.js"></script>
	<script language="JavaScript">
Webcam.set({
    width: 500,
    height: 400,
    image_format: "jpeg",
    jpeg_quality: 90,
    force_flash: false,
    flip_horiz: true,
    fps: 45
});
Webcam.set("constraints", {
    optional: [{ minWidth: 600 }]
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
			var nama = $('[name="nama"]').val();
			var nik = $('[name="nik"]').val();
			var instansi = $('[name="instansi"]').val();
			var keperluan = $('[name="keperluan"]').val();
            var id_pegawai = $('[name="id_pegawai"]').val();
            
			$.ajax({
				url: '<?php echo base_url("tamu/tambah");?>',
				type: 'POST',
				dataType: 'json',
                data: {foto: foto, nama: nama,nik:nik, instansi: instansi, keperluan:keperluan,id_pegawai:id_pegawai},
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
                window.location.href = '<?php echo base_url();?>page';
			});
			
			
		});
	</script>
    <!-- Jquery JS-->


</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->