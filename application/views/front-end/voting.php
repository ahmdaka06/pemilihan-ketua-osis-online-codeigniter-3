<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMKENMO - Kelulusan</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/AdminLTE.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <!-- SweetAlert -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/sweetalert.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

  <!-- Main Header -->
  <header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">

      <div class="container">
        <div class="navbar-header">

          <!-- Logo -->
          <a href="<?=base_url() ?>" class="logo">
          </a>
        </div>
        <!-- Navbar Right Menu -->
      </div>
    </nav>
  </header>
  
<div class="row">
  <div class="col-sm-6 col-md-6">
    <div class="row left">
      <div class="col-md-6">
        <img src="assets/img/kpo.png" alt="" class="img-responsive">
      </div><br>
      <div class="col-md-6">
        <p>
          <b>Cara Memilih:</b><br>
          <p>
            Login dengan memasukan Nama dan NIS yang sudah ditentukan untuk melakukan pemilihan Ketua OSIS. Pilih dengan cara mengklik tombol pilih
          </p>
        </p>
      </div>
    </div><hr>
  </div>
  <div class="col-sm-6 col-md-6 right">
    <h1>Selamat Datang di E-Pilketos</h1>
    <p>Kita satukan tekad untuk Pemilu yang Luber dan Jurdil</p><br>
    <div class="login-box">
      <div class="login-box-body">
      <p class="login-box-msg">Login untuk mulai memilih</p>
        <form action="" method="post" id="form-login">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama" autofocus>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="NIS" id="nis">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
        </form>
        <div class="row">
          <div class="col-xs-6 col-sm-4">
            <button type="button" class="btn btn-primary btn-block btn-flat" id="btn-login">Login</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    
    <footer class="footer">
      <div class="container">
        <span class="pull-left">Copyright &copy; <?=date('Y'); ?>.</span>
        <span class="pull-right">I <span class="text-danger">❤</span> MAN 2 Jombang</span>
      </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <!-- Sweet Alert -->
    <script src="<?= base_url() ?>assets/js/sweetalert.min.js"></script>
    <!-- Ajax -->
    <script src="<?= base_url() ?>assets/js/ajax-voting.js"></script>

  </body>
</html>