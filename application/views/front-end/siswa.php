<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Pilketos</title>

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
    <script>
    var base_url = '<?= base_url() ?>' // Buat variabel base_url agar bisa di akses di semua file js
    </script>
  </head>
  <body>

  <!-- Main Header -->
  <header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">

      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Logo -->
          <a href="<?= base_url() ?>" class="logo">
            <img src="<?= base_url() ?>assets/img/logo.png" alt="" class="img-responsive">
          </a>
        </div>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu collapse navbar-collapse" id="collapse">
          <ul class="nav navbar-nav">
            <?php if ($this->session->userdata('login') == true) {?>
              <li id="user">
                <b style="text-transform: uppercase;"><?= $users['nama']; ?></b><br>
                <i style="text-transform: uppercase;"><?= $users['jns_kelamin']; ?></i>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  
  <div class="container">

<?php
if ($this->session->userdata('login') == true) {
?>
<div class="konten">
      
  <h3 class="text-center">
    Pemilihan Ketua OSIS Periode <?php echo date('Y'); echo "/"; echo date('Y')+1; ?>
  </h3>

  <?php 
  $no = 1;
  foreach($calon->result_array() as $data ){
  ?>

  <div class="col-sm-6 col-md-3">
    <div class="box box-primary">
      <div class="box-body text-center">
        <img src="<?= base_url() ?>assets/img/Calon/<?= $data['foto']; ?>" alt="" class="img-responsive">
      </div>
      <center>
        <b><?=$no.'. '.$data['nama']; ?></b><br>
        <?=$data['organisasi']; ?>
      </center>
      <div class="box-footer text-center">
        <button class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-detail" onclick="detail(<?=$no; ?>)">
        <i class="fa fa-info-circle"></i>&nbsp;
        Detail
      </button>
        <button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-pilih" onclick="pilih(<?=$no; ?>)">
          <i class="fa fa-check-circle"></i>
          Pilih
        </button>
      </div>
    </div>
    <input type="hidden" id="id-val-<?=$no; ?>" value="<?=$data['id']; ?>">
    <input type="hidden" id="nama-val-<?=$no; ?>" value="<?=$data['nama']; ?>">
    <input type="hidden" id="kelas-val-<?=$no; ?>" value="<?=$data['kelas']; ?>">
    <input type="hidden" id="organisasi-val-<?=$no; ?>" value="<?=$data['organisasi']; ?>">
    <input type="hidden" id="visi-val-<?=$no; ?>" value="<?=$data['visi']; ?>">
    <input type="hidden" id="misi-val-<?=$no; ?>" value="<?=$data['misi']; ?>">
    <input type="hidden" id="foto-val-<?=$no; ?>" value="<?=$data['foto']; ?>">
  </div>
  <?php 
  $no++;
  }
  ?>
  
</div>

<!-- Modal info-->
<div class="modal fade" id="modal-detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Visi dan Misi</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-8">
            <table>
              <tr>
                <td>Nama</td>
                <td>&nbsp;</td>
                <td>:</td>
                <td>&nbsp;</td>
                <td id="nama"></td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td>&nbsp;</td>
                <td>:</td>
                <td>&nbsp;</td>
                <td id="kelas"></td>
              </tr>
              <tr>
                <td>Organisasi</td>
                <td>&nbsp;</td>
                <td>:</td>
                <td>&nbsp;</td>
                <td id="organisasi"></td>
              </tr>
            </table><br>
              <b>VISI :</b>
                <div id="visi"></div>
              <b>MISI :</b>
                <div id="misi"></div>
          </div><br>
          <div class="col-sm-4">
            <img src="" alt="" class="img-responsive" id="foto" style="height: 200px; margin: 0 auto;">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Konfirmasi -->
<div class="modal fade" id="modal-pilih">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id-calon">
        <div>Apakah Anda yakin ingin memilihnya?</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-flat" id="btn-pilih">Ya</button>
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>

<script>
function detail(no) {
  var nama       = $('#nama-val-'+no).val();
  var kelas      = $('#kelas-val-'+no).val();
  var organisasi = $('#organisasi-val-'+no).val();
  var visi       = $('#visi-val-'+no).val();
  var misi       = $('#misi-val-'+no).val();
  var foto       = $('#foto-val-'+no).val();

  $('#nama').html(nama);
  $('#kelas').html(kelas);
  $('#organisasi').html(organisasi);
  $('#visi').html(visi);
  $('#misi').html(misi);
  $('#foto').attr('src', '<?= base_url() ?>assets/img/Calon/'+foto);
}

function pilih(no){
  var id = $('#id-val-'+no).val();

  $('#id-calon').val(id);
}
</script>
<?php } else { ?>
<div class="row">
  <div class="col-sm-6 col-md-6">
    <div class="row left">
      <div class="col-md-6">
        <img src="<?= base_url() ?>assets/img/logo1.png" alt="" class="img-responsive">
      </div><br>
      <div class="col-md-6">
        <p>
          <b>Cara Memilih:</b><br>
          <p>
            Login dengan memasukan Username dan Password yang sudah ditentukan untuk melakukan pemilihan Ketua OSIS. Pilih dengan cara mengklik tombol pilih
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
            <input type="text" class="form-control" placeholder="Username" id="username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" id="password">
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
<?php
}
?>    

  </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <footer class="footer">
      <div class="container">
        <span class="pull-left">Copyright &copy; <?=date('Y'); ?>.</span>
        <span class="pull-right">I <span>❤</span> MAN 2 Jombang</span>
      </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <!-- Sweet Alert -->
    <script src="<?= base_url() ?>assets/js/sweetalert.min.js"></script>
    <!-- Ajax -->
    <script src="<?= base_url() ?>assets/js/ajax-voting-siswa.js"></script>

  </body>
</html>