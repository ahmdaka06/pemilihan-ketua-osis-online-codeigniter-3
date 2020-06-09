<title>Data Guru Pemilih || E-Pilketos</title>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Guru Pemilih
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url() ?>"><i class="fa fa-users"></i> Home</a></li>
    <li>Data Guru Pemilih</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box box-primary">
    <div class="box-header with-border">
      <button id="btn-tambah-manual" class="btn btn-primary btn-flat"  data-toggle="modal" data-target="#modal-form">
        <i class="fa fa-plus"></i> 
        Tambah Data Manual
      </button>
      <button class="btn btn-success btn-flat"  data-toggle="modal" data-target="#modal-tambah">
        <i class="fa fa-plus"></i> 
        Tambah Data Excel
      </button>
      <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-hapus">
        <i class="fa fa-trash"></i> 
        Hapus Semua
      </button>
    </div>
    <div class="box-body table-responsive" id="view-data">
      <?php
      $data['dataTampil'] = $this->Guru_model->dataTampil()->result_array();
      $this->load->view('admin/data-guru-view', $data); 
      ?>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="fa fa-info-circle"></i> 
          File <strong>XLS</strong> (Excel 97-2003) yang diizinkan!!
        </div>
        <a href="<?= base_url() ?>contoh/format-data-guru.xls" target="_blank" class="btn btn-success btn-flat">
          <i class="fa fa-download"></i>
           Download Format
        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/loading.gif" alt="" id="loading" style="height: 45px;"><br><br>
        <form action="" enctype="multipart/form-data" id="form">
          <input type="file" name="file" id="file" class="form-control pull-left" style="width: 50%;">
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-flat" id="btn-upload">Upload</button>
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

   <!-- Modal -->
  <div class="modal fade" id="modal-form">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">
            <div id="modal-title"></div>
          </h4>
          <img src="<?= base_url() ?>assets/img/loading.gif" alt="" id="loading-manual" style="height: 45px;">
        </div>
        <div class="modal-body">
        <div class="row">

          <form action="" id="form">
          <input type="hidden" id="data-id">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" autofocus>
            </div>
            <div class="form-group">
              <label for="jns_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jns_kelamin" name="jns_kelamin">
                  <option value="">Pilih Salah Satu</option>
                  <option value="L">Laki - Laki</option>
                  <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="text" class="form-control" id="password" name="password" placeholder="Password">
            </div>
          </div>
          </form>

        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-flat" id="btn-simpan">Simpan</button>
          <button type="button" class="btn btn-primary btn-flat" id="btn-ubah">Ubah</button>
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal-hapus">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
        </div>
        <div class="modal-body">
          <div id="konfirmasi">Apakah anda yakin ingin menghapus semua data ini?</div>
          <img src="<?= base_url() ?>assets/img/loading.gif" alt="" id="load" style="height: 45px;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-flat" id="btn-hapusData">Ya</button>
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tidak</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.Modal -->

</section>
<!-- /.content -->
<script src="<?= base_url() ?>assets/js/ajax-data-guru.js"></script>