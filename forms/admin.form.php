<?php
require('../lib/class.admin.inc.php');
$adm = new pamdesadmin();
if($_GET['id']){
  $login = $adm->adminData($_GET['id']);
  $admID    =$_GET['id'];
  $uname    = $login['uname'];
  $upass    = '';
  $nama     = $login['nama'];
  $jabatan  = $login['jabatan'];
  $sbmtBtn  = 'Update';
  $mod      = 'chg';
}else{
  $admID    ='';
  $uname    ='';
  $upass    ='';
  $nama     ='';
  $jabatan  ='';
  $sbmtBtn  = 'Simpan';
  $mod      = 'ins';
}
?>
<div style='padding: 20px 0px; text-align:center; font-weight:bold; font-size: 1.2em;'>
  <p>Form Admin<br/>PAMDES</p>
</div>
<form action='../acts/admin.act.php?mod=<?php echo $mod; ?>' method='post'>
  <input type='hidden' name='admid' value='<?php echo $admID; ?>' />
  <div class='form-group'>
    <input class='form-control' type='text' name='uname' value='<?php echo $uname ; ?>'
    placeholder="Username" required />
  </div>
  <div class='form-group'>
    <input class='form-control' type='password' name='upass' id='p1'
    placeholder="Password" required />
  </div>
  <div class='form-group'>
    <input class='form-control' type='password' id='p2'
    placeholder="Ulangi pasword" required onblur="padhakne()"/>
  </div>
  <div class='form-group'>
    <input class='form-control' type='text' name='nama' value='<?php echo $nama ; ?>'
    placeholder="Nama Lengkap" />
  </div>
  <div class='form-group'>
    <input class='form-control' type='text' name='jabatan' value='<?php echo $jabatan ; ?>'
    placeholder="Jabatan" />
  </div>
  <div class='form-group'>
    <input class='form-control btn btn-success' type='submit' value='<?php echo $sbmtBtn ; ?>' />
  </div>
</form>
<script>
function padhakne(){
  if( $("#p1").val() != $("#p2").val() ){
    alert('Password Tidak Sama');
    $('#p1').val('');
    $('#p2').val('');
    $('#p1').focus();
  }
}


</script>
