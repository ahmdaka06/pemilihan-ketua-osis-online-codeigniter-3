<title>Calon || E-Pilketos</title>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Calon
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('admin') ?>"><i class="fa fa-users"></i> Home</a></li>
    <li>Calon</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box box-primary">
    <div class="box-header with-border">
      <button id="btn-tambah" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-form">
        <i class="fa fa-plus"></i> 
        Tambah Calon
      </button>
      <button id="hapusSemua" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-hapus">
        <i class="fa fa-trash"></i> 
        Hapus Semua
      </button>
    </div>  
    <div class="row" id="view">
      <?php $this->load->view('admin/calon-view') ?>
    </div>

  </div>

  <!-- < Modal -->
  <div class="modal fade" id="modal-form">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">
            <div id="modal-title"></div>
          </h4>
          <img src="<?= base_url() ?>assets/img/loading.gif" alt="" id="loading" style="height: 45px;">
        </div>
        <div class="modal-body">
        <div class="row">

          <form action="" enctype="multipart/form-data" id="form">
          <input type="hidden" id="data-id">
          <input type="hidden" id="data-foto">
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
              <label for="kelas">Kelas</label>
              <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas">
            </div>
            <div class="form-group">
              <label for="organisasi">Organisasi</label>
              <input type="text" class="form-control" id="organisasi" name="organisasi" placeholder="Organisasi">
            </div>
            <div class="form-group">
              <label for="foto">foto</label>
              <input type="file" class="form-control" id="foto" name="foto">
              <br>
              <img src="" class="img-responsive" style="height: 150px;" id="preview" alt="
                Ukuran foto 3x4. dengan format JPG. ukuran file Pasfoto tidak boleh lebih dari 1MB
              ">
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">
              <label for="visi">Visi</label>
              <textarea name="visi" id="visi" cols="30" rows="9" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="misi">Misi</label>
              <textarea name="misi" id="misi" cols="30" rows="9" class="form-control"></textarea>
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

  <div class="modal fade" id="modal-info">
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
                  <td id="_nama"></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>&nbsp;</td>
                  <td>:</td>
                  <td>&nbsp;</td>
                  <td id="_jns_kelamin"></td>
                </tr>
                <tr>
                  <td>Kelas</td>
                  <td>&nbsp;</td>
                  <td>:</td>
                  <td>&nbsp;</td>
                  <td id="_kelas"></td>
                </tr>
                <tr>
                  <td>Organisasi</td>
                  <td>&nbsp;</td>
                  <td>:</td>
                  <td>&nbsp;</td>
                  <td id="_organisasi"></td>
                </tr>
              </table><br>
                <b>VISI :</b>
                  <div id="_visi"></div>
                <b>MISI :</b>
                  <div id="_misi"></div>
            </div>
            <div class="col-sm-4">
              <img src="" alt="" class="img-responsive" id="_foto" style="height: 200px;">
            </div>
          </div>
        </div>
        <div class="modal-footer">
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
          <input type="hidden" id="data-id">
          <input type="hidden" id="data-foto">
          <div id="konfirmasi"></div>
          <img src="<?= base_url() ?>assets/img/loading.gif" alt="" id="load" style="height: 45px;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-flat" id="btn-hapus">Ya</button>
          <button type="button" class="btn btn-danger btn-flat" id="btn-hapusSemua">Ya</button>
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tidak</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.Modal -->

</section>
<!-- /.content -->
<script src="<?= base_url() ?>assets/js/ajax-calon.js"></script>