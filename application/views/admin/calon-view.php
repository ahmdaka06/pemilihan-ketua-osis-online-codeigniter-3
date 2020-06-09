<?php 
$no = 1;
foreach( $calonTampil as $data ){
?>

<div class="col-sm-6 col-md-3">
  <div class="box box-default">
    <div class="box-body text-center">
      <img src="<?= base_url() ?>assets/img/Calon/<?=$data['foto']; ?>" alt="" class="img-responsive">
    </div>
    <center>
      <b><?=$no.'. '.$data['nama']; ?></b><br>
      <?=$data['organisasi']; ?>
    </center>
    <div class="box-footer text-center">
      <button class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-info" onclick="info(<?=$no; ?>)">
        &nbsp;<i class="fa fa-info"></i>&nbsp;
      </button>
      <button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-form" onclick="edit(<?=$no; ?>)">
        <i class="fa fa-edit"></i>
      </button>
      <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-hapus" onclick="hapus(<?=$no; ?>)">
        <i class="fa fa-trash"></i>
      </button>
    </div>
  </div>
  <input type="hidden" id="id-val-<?=$no; ?>" value="<?=$data['id']; ?>">
  <input type="hidden" id="nama-val-<?=$no; ?>" value="<?= $data['nama']; ?>">
  <input type="hidden" id="gender-val-<?=$no; ?>" value="<?= ($data['jns_kelamin'] == 'L') ? 'Laki Laki' : 'Perempuan' ?>">
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

<script>
  
function info(no) {
  var nama       = $('#nama-val-'+no).val();
  var gender       = $('#gender-val-'+no).val();
  var kelas      = $('#kelas-val-'+no).val();
  var organisasi = $('#organisasi-val-'+no).val();
  var visi       = $('#visi-val-'+no).val();
  var misi       = $('#misi-val-'+no).val();
  var foto       = $('#foto-val-'+no).val();

  $('#_nama').html(nama);
  $('#_jns_kelamin').html(gender);
  $('#_kelas').html(kelas);
  $('#_organisasi').html(organisasi);
  $('#_visi').html(visi);
  $('#_misi').html(misi);
  $('#_foto').attr('src', '<?= base_url() ?>assets/img/Calon/'+foto);
}

function edit(no) {
  $('#btn-simpan').hide();
  $('#btn-ubah').show();
  $('#modal-title').html('Form Ubah Data');

  var id         = $('#id-val-'+no).val();
  var nama       = $('#nama-val-'+no).val();
  var gender     = $('#gender-val-'+no).val();
  var kelas      = $('#kelas-val-'+no).val();
  var organisasi = $('#organisasi-val-'+no).val();
  var visi       = $('#visi-val-'+no).val();
  var misi       = $('#misi-val-'+no).val();
  var foto       = $('#foto-val-'+no).val();

  $('#nama').val(nama);
  $('#jns_kelamin').append('<option value="'+ gender +'" selected="selected">'+ gender +'</option>');
  $('#kelas').val(kelas);
  $('#organisasi').val(organisasi);
  tinymce.get('visi').setContent(visi);
  tinymce.get('misi').setContent(misi);
  $('#foto').val('');

  $('#data-id').val(id);
  $('#data-foto').val(foto);
}

function hapus(no) {
  var id   = $('#id-val-'+no).val();
  var foto = $('#foto-val-'+no).val();

  $('#data-id').val(id);
  $('#data-foto').val(foto); 
  $('#load').hide();
  $('#konfirmasi').html('Apakah anda yakin ingin menghapus data ini?');
  $('#btn-hapus').show();
  $('#btn-hapusSemua').hide();
}

</script>