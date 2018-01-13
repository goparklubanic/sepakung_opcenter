<?php
require('../lib/class.balsa.inc.php');
$emgc = new balaiDesa();
 ?>
 <table class='table table-sm'>
   <tr>
     <th>ID</th>
     <th>Tanggal Jam</th>
     <th>NIK</th>
     <th>KOORDINAT</th>
     <th>STATUS</th>
     <th>TINDAKAN</th>
   </tr>
   <?php $emgc->emgc($_GET['nik']); ?>
 </table>
