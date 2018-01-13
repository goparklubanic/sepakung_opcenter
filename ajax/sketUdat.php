<?php
require('../lib/class.balsa.inc.php');
$sket = new balaiDesa();
$sket->update('pengantar','status',array('batal',$_GET['id']),'kd_permohonan');
?>
