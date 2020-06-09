$(document).ready(function(){

  /*============*/
  /*====Admin===*/
  /*============*/
  $('#loadingTambah').hide();
  $('#loadingUbah').hide();
  $('#loadingHapus').hide();
  // Tambah Admin
  $('#btn-tambahAdmin').click(function(){
    var n = $('#namaAdmin').val();
    var u = $('#user').val();
    var p = $('#pass').val();
    
    if( n == '' || u == '' || p == '' ){
      swal("Oops...", "Form tidak boleh kosong!", "error");
    }else{
      var data = new FormData();

      data.append('nama', $('#namaAdmin').val());
      data.append('user', $('#user').val());
      data.append('pass', $('#pass').val());
      data.append('mail', $('#mail').val());

      data.append('type', 'insert');

      $('#loadingTambah').show();
      $.ajax({
        url         : 'admin/action',
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
          $("#loadingTambah").hide(); 
          
          if(response.status == "sukses"){ 
            $("#view-admin").html(response.html);
            swal("Good job!", "Data berhasil disimpan", "success");
            $("#formtambah input").val(""); 
          }else if(response.status == "nama"){ 
            swal("Oops...", "Username sudah ada", "error");
          }else if(response.status == "gagal"){ 
            swal("Oops...", "Ada yang error!", "error");
          }
        },
        error       : function (xhr, ajaxOptions, thrownError) {
          alert("ERROR : "+xhr.responseText); 
        }
      });
    }

  });

  $('#passSalah').hide();

  $('#edit').on('hidden.bs.modal', function (e) {
    $('#formubah input').val('');
    $('#passSalah').hide();
    $('#passwordverif').css('border-color', '#d2d6de');
  })

  // Ubah Admin
  $('#btn-ubahAdmin').click(function(){
    var n = $('#nameAdmin').val();
    var u = $('#username').val();
    var pl = $('#passwordlama').val();
    var pb = $('#passwordbaru').val();
    var pv = $('#passwordverif').val();
    
    if( n == '' || u == '' || pl == '' || pb == '' || pv == '' ){
      swal("Oops...", "Form tidak boleh kosong!", "error");
    }else{
      if( pb == pv ){
        var data = new FormData();

        data.append('id', $('#idAdmin').val());
        data.append('nama', $('#nameAdmin').val());
        data.append('user', $('#username').val());
        data.append('passL', $('#passwordlama').val());
        data.append('passB', $('#passwordbaru').val());
        data.append('mail', $('#email').val());

        data.append('type', 'update');

        $('#loadingUbah').show();
        $.ajax({
          url         : 'admin/action',
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
            $("#loadingUbah").hide(); 
            
            if(response.status == "sukses"){ 
              $("#view-admin").html(response.html);
              swal("Good job!", "Data berhasil diubah", "success");
              $("#formubah input").val("");
              $("#edit").modal('hide');
            }else if(response.status == "gagal"){ 
              swal("Oops...", "Ada yang error!", "error");
            }else if(response.status == "pass"){
              swal("Oops...", "Password lama salah!", "error");
            }
          },
          error       : function (xhr, ajaxOptions, thrownError) {
            alert("ERROR : "+xhr.responseText); 
          }
        });
      }else{
        $('#passwordverif').css('border-color', 'red');
        $('#passSalah').css('color', 'red');
        $('#passSalah').show();
      }
    }

  });

  // Hapus Admin
  $('#btn-hapusAdmin').click(function(){

    var data = new FormData();
    data.append('id', $('#id-val').val());
    data.append('type', 'delete');
    
    $("#loadingHapus").show(); 
    
    $.ajax({
      url: 'admin/action',
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
        $("#loadingHapus").hide();
        if(response.status == "sukses"){ 
          $("#view-admin").html(response.html);
          swal("Good job!", "Data berhasil dihapus", "success");
          $("#hapus").modal('hide'); 
        }else{ 
          swal("Oops...", "Tidak boleh dihapus!!", "error");
        }
      },
      error: function (xhr, ajaxOptions, thrownError) { 
        alert("ERROR : "+xhr.responseText); 
      }
    });

  });

});