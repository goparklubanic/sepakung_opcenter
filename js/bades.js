$(document).ready(function(){
  $('#nik-cari').keyup(function(){
    var nik = $(this).val();
    if(nik.length == 16){
      $.ajax({url:'../ajax/cariUser.php?nik='+nik,success:function(udata){
        $('#userData').html(udata);
      }});
    }
  });

  $('#mohon-cari').keyup(function(){
    var nr = $(this).val();
    var pk = nr.length;
    if(pk == 8){
      $.ajax({
        url:'../ajax/sketCari.php?noref='+nr,
        success: function(sket){
          $("#sketData").html(sket);
        }
      });
    }
  });

  $('.btn-send').click(function(){
    var bt = $(this).attr('id');
    var id = bt.split('_');

    $.ajax({
      url:'../ajax/ablcResp.php?rs=proses&id='+id[1],
      success: function(){
        window.location='./?obj=ablc&nh=1';
      }
    });

    $.post(serviceUrl+'?obj=ablcRst',
      {
        status  : 'proses',
        id      : id[1]
      },function(response){
        alert(response);
      });

  });

  $('.btn-done').click(function(){
    var bt = $(this).attr('id');
    var id = bt.split('_');

    $.ajax({
      url:'../ajax/ablcResp.php?rs=selesai&id='+id[1],
      success: function(){
        window.location='./?obj=ablc&nh=1';
      }
    });

    $.post(serviceUrl+'?obj=ablcRst',
      {
        status  : 'selesai',
        id      : id[1]
      },function(response){
        alert(response);
      });
  });

});


function setSosResponse(id){
  // cari detil sos
  $.post(serviceUrl+'?obj=emgcData',{
    id : id
  },function(response){
    var data = JSON.parse(response);
    // console.log(response);
    var id  = data.id;
    var jm  = data.jamTgl;
    var nik = data.nik;
    var bjr = data.bujur;
    var ltg = data.lintang;
    var stt = data.status;

    console.log('jam:'+jm);
    // simpan ke local db dgn staus proses
    $.post('../acts/emergency-act.php?mod=ins',{
      id        : id,
      jamTgl    : jm,
      nik       : nik,
      bujur     : bjr,
      lintang   : ltg,
      status    : stt
    },function(response){
      alert(response);
    });
    // update status proses di inet site

    $.post(serviceUrl+'?obj=emgUpdt',{
      id : id,
      status : 'tanggap'
    },function(response){
      alert(response);
      location.reload();
    });
  });

}
function setSosFinished(id){
  // cari detil sos
  $.post(serviceUrl+'?obj=emgcData',{
    id : id
  },function(response){
    var data = JSON.parse(response);
    // console.log(response);
    var id  = data.id;
    var jm  = data.jamTgl;
    var nik = data.nik;
    var bjr = data.bujur;
    var ltg = data.lintang;
    var stt = data.status;

    console.log('jam:'+jm);
    // simpan ke local db dgn staus proses
    $.post('../acts/emergency-act.php?mod=chg',{
      id        : id,
      status    : 'selesai'
    },function(response){
      alert(response);
    });
    // update status proses di inet site

    $.post(serviceUrl+'?obj=emgUpdt',{
      id : id,
      status : 'selesai'
    },function(response){
      alert(response);
      location.reload();
    });
  });
}
