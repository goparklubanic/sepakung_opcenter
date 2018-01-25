<?php
require('../lib/class.balsa.inc.php');
$sos = new balaiDesa();
if($_GET['mod']=='ins'){
  $sets = 'id,jamTgl,nik,bujur,lintang,status';
  $data = array($_POST['id'],$_POST['jamTgl'],$_POST['nik'],$_POST['bujur'],
          $_POST['lintang'],$_POST['status']);
  $sos->insert('SOSAlert',$sets,$data);
  echo "Data Emergency Tersimpan";
}
if($_GET['mod']=='chg'){
  $sos->update('SOSAlert','status',array($_POST['status'],$_POST['id']),'id');
  echo "Data Emergency Terupdate";
}
 ?>
