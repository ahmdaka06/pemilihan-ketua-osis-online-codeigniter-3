	</div>

  <!-- Main Footer -->
	<footer class="main-footer">
		<!-- To the right -->
		<div class="pull-right hidden-xs">
    I <span class="text-danger">❤</span> MAN 2 Jombang
		</div>
		<!-- Default to the left -->
    <span>Copyright &copy; <?=date('Y'); ?> All rights reserved.</span>
	</footer>

	<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-users"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-user-plus"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">&nbsp;<b>Admin</b></h3>
        <ul class="control-sidebar-menu" id="view-admin">
          <?php 
          $data['adminTampil'] = $this->Admin_model->adminTampil();
          $this->load->view('admin/admin-view', $data); 
          ?>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post"  id="formtambah">
          <h3 class="control-sidebar-heading"><b>Tambah Admin</b></h3>
					<small>* wajib diisi!!</small>
          <div class="form-group">
            <label for="nama">Nama Lengkap *</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" id="namaAdmin">
          </div>
          <div class="form-group">
            <label for="user">Username *</label>
            <input type="text" class="form-control" name="user" placeholder="Username" id="user">
          </div>
          <div class="form-group">
            <label for="pass">Password *</label>
            <input type="password" class="form-control" name="pass" placeholder="Password" id="pass">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="mail@mail.com" id="mail">
          </div>

        </form><br>
        <!-- /.form-group -->
        <button type="button" class="btn btn-primary btn-flat" id="btn-tambahAdmin" style="float: left;">Tambah</button>
        <div id="loadingTambah">&nbsp;&nbsp;&nbsp;Loading...</div>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper --> 

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Form Ubah Data</h4>
        <img src="<?= base_url() ?>assets/img/loading.gif" alt="" id="loadingUbah" style="height: 45px;">
      </div>
      <div class="modal-body">
        <form method="post" id="formubah">
        	<input type="hidden" id="idAdmin">
					<div class="form-group">
						<label for="">Nama</label>
						<input class="form-control" type="text" id="nameAdmin" placeholder="Nama">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input class="form-control" type="text" id="username" placeholder="Username">
					</div>
					<div class="form-group">
						<label for="">Password lama</label>
						<input class="form-control" type="password" id="passwordlama" placeholder="Password lama">
					</div>
					<div class="form-group">
						<label for="">Password baru</label>
						<input class="form-control" type="password" id="passwordbaru" placeholder="Password baru">
					</div>
					<div class="form-group">
						<label for="">Password baru verifikasi</label>
						<input class="form-control" type="password" id="passwordverif" placeholder="Password baru">
						<small id="passSalah">Password Verifikasi salah!</small>
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input class="form-control" type="email" id="email" placeholder="Email">
					</div>
				</form>
      </div>
      <div class="modal-footer">
	      <button type="button" class="btn btn-primary btn-flat" id="btn-ubahAdmin">Ubah</button>
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="hapus">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Konfirmasi</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id-val">
        <div>Apakah anda yakin ingin menghapus data ini?</div>
        <img src="<?= base_url() ?>assets/img/loading.gif" alt="" id="loadingHapus" style="height: 45px;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat" id="btn-hapusAdmin">Ya</button>
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>
<!-- /.Modal -->

<!-- Sweet Alert -->
<script src="<?= base_url() ?>assets/js/sweetalert.min.js"></script>
<!-- TinyMCE -->
<script src="<?= base_url() ?>assets/tinymce/tinymce.min.js"></script>
<!-- Highchart -->
<script src="<?= base_url() ?>assets/js/highcharts.js"></script>
<!-- jQuery easeScroll -->
<script src="<?= base_url() ?>assets/js/jquery.easeScroll.js"></script>
<!-- Ajax -->
<script src="<?= base_url() ?>assets/js/ajax.js"></script>
<!-- Script -->
<script src="<?= base_url() ?>assets/js/script.js"></script>
<script>

	$(document).ready(function(){
		// easeScroll
		$("html").easeScroll();
	});

</script>

</body>
</html>