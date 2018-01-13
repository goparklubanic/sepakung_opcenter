<?php
  require("../lib/class.crud.inc.php");
  $ajax = new dbcrud();
  $user = $ajax->pickup('*','vwLogin','nik',array($_GET['nik']));
  echo "
  <table class='table table-bordered'>
    <tr>
      <td width='300'>Nomor Induk Kependudukan</td>
      <td id='usernik'>".$user['nik']."</td>
    </tr>

    <tr>
      <td width='200'>Nama Lengkap ( L / P )</td>
      <td>".$user['nama_lengkap']." ( ".$user['kelamin']." )</td>
    </tr>

    <tr>
      <td width='200'>Tanggal Lahir</td>
      <td>".$ajax->tanggalTerbaca($user['tg_lahir'])."</td>
    </tr>

    <tr>
      <td width='200'>Alamat</td>
      <td>RT. ".$user['rt']." RW. ".$user['rw']."</td>
    </tr>

    <tr>
      <td width='200'>Nama Pengguna</td>
      <td>".$user['namalogin']."</td>
    </tr>

    <tr>
      <td width='200'>Status Kepenggunaan</td>
      <td>".$user['statusLog']."</td>
    </tr>

    <tr>
      <td width='200'>Tindakan</td>
      <td>
        <select class='form-control' id='userAction'>
          <option>Pilih Tindakan</option>
          <option>Detil</option>
          <option>Aktifkan</option>
          <option>Nonaktifkan</option>
          <option>Hapus</option>
        </select>
      </td>
    </tr>
  </table>
  ";
 ?>
 <div id="process-status"></div>
 </div>
 <!-- Modal -->
 <div id="userModal" class="modal fade" role="dialog">
 <div class="modal-dialog">

   <!-- Modal content-->
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
       <h4 class="modal-title">Detil Data Penduduk Pengguna</h4>
     </div>
     <div class="modal-body" id="modalContent">

     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </div>
   </div>

 </div>
 </div>

<script>
$(document).ready(function(){
  $('#userAction').change(function(){
    var job = $(this).val();
    var nik = $('#usernik').html();
    if(job == 'Detil'){
      $.ajax({
        url:'../ajax/detilUser.php?nik='+nik,
        success:function(duser){
          $('#userModal').modal('show');
          $('#modalContent').html(duser);
        }
      });
    }
    if(job == 'Aktifkan'){
      $.ajax({
        url:'../ajax/aktifasiUser.php?nik='+nik+'&log=1',
        success:function(status){
          $('#process-status').html(status);
        }
      });
    }
    if(job == 'Nonaktifkan'){
      $.ajax({
        url:'../ajax/aktifasiUser.php?nik='+nik+'&log=0',
        success:function(status){
          $('#process-status').html(status);
        }
      });
    }
    if(job == 'Hapus'){
      $.ajax({
        url:'../ajax/buangUser.php?nik='+nik,
        success:function(status){
          $('#process-status').html(status);
        }
      });
    }
  });
});
</script>
