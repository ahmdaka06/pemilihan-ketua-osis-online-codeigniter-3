$(document).ready(function(){

  /*============*/
  /*====Calon===*/
  /*============*/
  $('#loading').hide();
  $('#btn-tambah').click(function(){
    $('#btn-ubah').hide();
    $('#btn-simpan').show();
    $('#modal-title').html('Form Tambah Data');
    $("#form input, #form textarea").val(""); 
    $('#preview').attr('src', '');
  });

  $('#modal-form').on('hidden.bs.modal', function (e) {
    $("#form input, #form textarea").val(""); 
    $('#preview').attr('src', '');
    tinymce.get('visi').setContent('');
    tinymce.get('misi').setContent('');
  })

  // Tambah Calon
  $('#btn-simpan').click(function(){
    var n = $('#nama').val();
    var jk = $('#jns_kelamin').val();
    var k = $('#kelas').val();
    var o = $('#organisasi').val();
    var v = $('#visi').val();
    var m = $('#misi').val();
    var f = $('#foto').val();
    
    if( n == '' || jk == '' || k == '' || o == '' || f == '' ){
      swal("Oops...", "Form tidak boleh ada yang kosong!", "error");
    }else{
      tinymce.triggerSave();
      var data = new FormData();

      data.append('nama', $('#nama').val());
      data.append('jns_kelamin', $('#jns_kelamin').val());
      data.append('kelas', $('#kelas').val());
      data.append('organisasi', $('#organisasi').val());
      data.append('visi', $('#visi').val());
      data.append('misi', $('#misi').val());

      data.append('type', 'insert');

      data.append('foto', $("#foto")[0].files[0]);

      $('#loading').show();
      $.ajax({
        url         : 'calon/action',
        type        : 'POST',
        data        : data,
        processData : false,
        contentType : false,
        dataType    : 'json',
        beforeSend  : function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success     : function(response){ 
          $("#loading").hide(); 
          
          if(response.status == "sukses"){ 
            $("#view").html(response.html);
            swal("Good job!", "Data berhasil disimpan", "success");
            $("#form input, #form textarea").val(""); 
            $('#preview').attr('src', '');
            $("#modal-form").modal('hide');
          }else{ 
            swal("Oops...", "Ada yang error!", "error");
          }
        },
        error       : function (xhr, ajaxOptions, thrownError) {
          alert("ERROR : "+xhr.responseText); 
        }
      });
    }

  });

  // Ubah data Calon
  $('#btn-ubah').click(function(){
    var n = $('#nama').val();
    var jk = $('#jns_kelamin').val();
    var k = $('#kelas').val();
    var o = $('#organisasi').val();
    var v = $('#visi').val();
    var m = $('#misi').val();
    
    if( n == '' || jk == ''  || k == '' || o == '' ){
      swal("Oops...", "Form tidak boleh ada yang kosong!", "error");
    }else{
      tinymce.triggerSave();
      var data = new FormData();

      data.append('nama', $('#nama').val());
      data.append('jns_kelamin', $('#jns_kelamin').val());
      data.append('kelas', $('#kelas').val());
      data.append('organisasi', $('#organisasi').val());
      data.append('visi', $('#visi').val());
      data.append('misi', $('#misi').val());

      data.append('data-id', $('#data-id').val());
      data.append('data-foto', $('#data-foto').val());

      data.append('type', 'update');

      data.append('foto', $("#foto")[0].files[0]);

      $('#loading').show();
      $.ajax({
        url         : 'calon/action',
        type        : 'POST',
        data        : data,
        processData : false,
        contentType : false,
        dataType    : 'json',
        beforeSend  : function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success     : function(response){ 
          $("#loading").hide(); 
          
          if(response.status == "sukses"){ 
            $("#view").html(response.html);
            swal("Good job!", "Data berhasil diubah", "success");
            $("#form input, #form textarea").val(""); 
            $('#preview').attr('src', '');
            $("#modal-form").modal('hide'); 
          }else{ 
            swal("Oops...", "Ada yang error!", "error");
          }
        },
        error       : function (xhr, ajaxOptions, thrownError) {
          alert("ERROR : "+xhr.responseText); 
        }
      });
    }

  });

  // Hapus Calon
  $("#btn-hapus").click(function(){ 
    
    var data = new FormData();
    data.append('data-id', $('#data-id').val());
    data.append('data-foto', $('#data-foto').val());
    data.append('type', 'delete');
    
    $("#load").show(); 
    
    $.ajax({
      url: 'calon/action',
      type: 'POST',
      data: data, 
      processData: false,
      contentType: false,
      dataType: "json",
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function(response){ 
        $("#load").hide(); 
        $("#view").html(response.html);
        swal("Good job!", "Data berhasil dihapus", "success");
        $("#modal-hapus").modal('hide');
      },
      error: function (xhr, ajaxOptions, thrownError) { 
        alert("ERROR : "+xhr.responseText); 
      }
    });
  });

  // Hapus Semua Calon
  $('#hapusSemua').click(function(){
    $('#konfirmasi').html('Apakah anda yakin ingin menghapus semua data ini?');
    $('#btn-hapus').hide();
    $('#btn-hapusSemua').show();
    $('#load').hide();
  });
  // Hapus Semua Calon
  $("#btn-hapusSemua").click(function(){ 
    
    var data = new FormData();
    data.append('type', 'deleteAll');
    
    $("#load").show(); 
    
    $.ajax({
      url: 'calon/action',
      type: 'POST',
      data: data, 
      processData: false,
      contentType: false,
      dataType: "json",
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function(response){ 
        $("#load").hide(); 
        $("#view").html(response.html);
        swal("Good job!", "Data berhasil dihapus", "success");
        $("#modal-hapus").modal('hide');
      },
      error: function (xhr, ajaxOptions, thrownError) { 
        alert("ERROR : "+xhr.responseText); 
      }
    });
  });





});