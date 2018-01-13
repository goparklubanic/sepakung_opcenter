<?php
require('../lib/class.balsa.inc.php');
$sket = new balaiDesa();
// $sket->passedVars($_POST);
$data = array($_POST['kdMohon'],$_POST['nmSurat'],$_POST['tgAgenda'],
              $_POST['nmaPemaraf'],$_POST['jbtPemaraf']);
$sket->simpanAgenda($data);
$sket->update('pengantar','status',array('cetak',$_POST['kdMohon']),'kd_permohonan');
header("Location: ../balaidesa/pengantar.php?id=".$_POST['kdMohon']);
 ?>
