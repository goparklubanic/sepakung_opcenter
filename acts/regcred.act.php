<?php
require("../lib/class.warga.inc.php");
$aku = new warga();
$sesandi = md5('*'.$_POST['uname'].'_'.$_POST['passwda'].'*');
$aku->update('kredensiWarga','namalogin,katasandi',array($_POST['uname'],$sesandi,$_POST['nik']),'nik');
header("Location:../?hal=konfirmasi&id=$_POST[nik]");
 ?>
