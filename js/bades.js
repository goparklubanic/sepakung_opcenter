$(document).ready(function(){
  $('#nik-cari').keyup(function(){
    var nik = $(this).val();
    if(nik.length == 4){
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

  });

});
