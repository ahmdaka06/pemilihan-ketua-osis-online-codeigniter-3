$(document).ready(function(){
  /*============*/
  /*====Pilih===*/
  /*============*/
  // Login
  $('#btn-login').click(function(){
    var nm = $('#username').val();
    var ns = $('#password').val()
    if (nm == '' || ns == '') {
      swal("Oops...", "Nama dan NIS tidak boleh kosong!", "error");
    }else{
      var data = new FormData();
      data.append('username', $('#username').val());
      data.append('password', $('#password').val());
      data.append('type', 'login');

      $.ajax({
        url         : 'ajax/voting_siswa',
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
          if(response.status == "ada"){ 
            document.location="";
          }else{ 
            swal("Oops...", "Nama atau NIS anda salah / anda sudah memilih", "error");
            return false;
          }
        },
        error       : function (xhr, ajaxOptions, thrownError) {
          alert("ERROR : "+xhr.responseText); 
        }
      });
    }

  });

  // Proses Pilih
  $('#btn-pilih').click(function(){

    var data = new FormData();
    data.append('id_calon', $('#id-calon').val());
    data.append('type', 'pilih');

    $.ajax({
      url         : 'ajax/voting_siswa',
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
        if(response.status == "sukses"){ 
          swal({
            title: "Good job!",
            text: "Terima Kasih",
            type:"success"
          }, 
          function(){
            document.location='';
          });
        }else{ 
          swal("Oops...", "Ada yang Error!", "error");
          return false;
        }
      },
      error       : function (xhr, ajaxOptions, thrownError) {
        alert("ERROR : "+xhr.responseText); 
      }
    });

  });