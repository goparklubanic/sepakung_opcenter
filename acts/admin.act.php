<?php
require("../lib/class.admin.inc.php");
$adm = new pamdesadmin();
if($_GET['mod']=='ins'){
  $adm->adminBaru($_POST['uname'],$_POST['upass'],$_POST['nama'],$_POST['jabatan']);
  echo "
  <script>
    alert('Admin baru tersimpan');
    window.location='../balaidesa/adminArea.php';
  </script>
  ";
}

if($_GET['mod']=='chg'){
  $adm->adminGanti($_POST['uname'],$_POST['upass'],$_POST['nama'],
        $_POST['jabatan'],$_POST['admid']);
  echo "
  <script>
    alert('Admin baru tersimpan');
    window.location='../balaidesa/adminArea.php';
  </script>
  ";
}

if($_GET['mod']=='rmv'){
  $adm->delete('adminLog','id',$_POST['id']);
}


?>
