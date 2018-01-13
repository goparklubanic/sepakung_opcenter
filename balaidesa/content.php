<?php
  switch($_GET['obj']){

    case 'user'   : include("penduduk-mgmt.php"); break;
    case 'sket'   : include("surantar-mgmt.php"); break;
    case 'ablc'   : include("ambulans-mgmt.php"); break;
    case 'agrf'   : include("agdantar-mgmt.php"); break;
    case 'emck'   : include("emergcy-check.php"); break;
    default       : include("realtime-mgmt.php"); break;
  }

 ?>
