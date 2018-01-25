<?php
require('../lib/class.balsa.inc.php');
$sket = new balaiDesa();
if($_GET['mod']=='ins'){
  $sets = 'kd_permohonan,nik,keperluan';
  $data = array($_POST['kode'],$_POST['nik'],$_POST['perlu']);
  $sket->insert('pengantar',$sets,$data);
  echo "Pengantar Tersimpan";
}
 ?>
