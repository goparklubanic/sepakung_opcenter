<?php
  require("../lib/class.crud.inc.php");
  $ajax = new dbcrud();
  if($_GET['log'] == 0){
    $job = 'Penonaktifan';
    $stt = 'inaktif';
  }else{
    $job = 'Pengaktifan';
    $stt = 'aktif';
  }
  $aktf = $ajax->update('kredensiWarga','statusLog',array($stt,$_GET['nik']),'nik');



  echo $job." Berhasil";
?>
