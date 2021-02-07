
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jadwal Rapat  | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/skins/skin-custom.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .login-page, .register-page{
      background-color: #fff;
    }
  </style>
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo"> 
    <a href="#">LOGIN ADMIN</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

 
    <p class="login-box-msg">Silahkan Login Untuk Melanjutkan</p>

    <form action="<?php echo site_url('login/check');?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div> 
      <div class="form-group">       
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
      </div>   
      
      <!-- <a href="<?php echo base_url() ?>" class="pull-left"><i class="fa fa-long-arrow-left"></i> kembali ke home</a> -->
        <!-- /.col -->
      </div>
    </form>

  

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3.1.1 -->
<script src="<?php echo base_url('assets/plugins/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- notify  -->
<script src="<?php echo base_url();?>assets/js/notify.min.js"></script>


<script type="text/javascript">
    <?php
  if($this->session->flashdata('sukses')) { 
    echo alert_sukses($this->session->flashdata('sukses'));
  }
  if($this->session->flashdata('warning')) { 
  echo alert_warning($this->session->flashdata('warning'));
  }
  if($this->session->flashdata('error')) { 
  echo alert_error($this->session->flashdata('error'));
  }
  if($this->session->flashdata('info')) { 
  echo alert_info($this->session->flashdata('info'));
  }
 
  ?>
  
</script>
</body>
</html>

</body>
</html>



