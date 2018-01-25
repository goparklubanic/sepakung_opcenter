<?php
header("Access-Control-Allow-Origin: *");
?>
<?php
error_reporting(E_ALL & ~E_NOTICE);
if($_GET){
  require('../lib/class.balsanet.inc.php');
  $bd = new balaiDesa();
  $sw = $_GET['obj'];

  if($sw == 'sketList'){
    $sket = $bd->sketList();
    echo json_encode($sket);
  }

  if($sw == 'sketCetak'){
    $bd->update('pengantar','status',array('cetak',$_POST['kd_permohonan']),'kd_permohonan');
    echo "Sket update";
  }

  if($sw == 'sketCari'){
    $id = $_GET['id'];
    $sket = $bd->sketCari($id);
    echo json_encode($sket);
  }

  if($sw == 'ablcReq'){
    $ablc = $bd->ambulanceReqList();
    echo json_encode($ablc);
  }

  if($sw == 'ablcRst'){
    $bd->ambulanStatus($_POST['status'],$_POST['id']);
    if($_POST['status']=='proses'){
      $bd->ablcResponChange($_POST['id']);
    }
    echo "Status Ambulans Terupdate";
  }

  if($sw == 'emergency'){
    $emgc = $bd->emgc($_GET['nik']);
    echo json_encode($emgc);
  }

  if($sw == 'emgcData'){
    $emgc = $bd->emgDtl($_POST['id']);
    echo json_encode($emgc);
  }

  if($sw == 'emgUpdt'){
    $bd->update('SOSAlert','status',array($_POST['status'],$_POST['id']),'id');
    echo "Status Emergency Terupdate";
  }

}else{
  include "index.html";
}
?>
