<?php
require('../lib/class.balsa.inc.php');
$ablc = new balaiDesa();
$ablc->update('ambulans','responStatus',array($_GET['rs'],$_GET['id']),'id_permintaan');
if($_GET['rs']=='proses'){
  $ablc->ablcResponChange($_GET['id']);
}
?>
