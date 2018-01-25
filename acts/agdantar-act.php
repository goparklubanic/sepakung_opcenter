<?php
require('../lib/config.inc.php');
require('../lib/class.balsa.inc.php');
$sket = new balaiDesa();
// $sket->passedVars($_POST);
$data = array($_POST['kdMohon'],$_POST['nmSurat'],$_POST['tgAgenda'],
              $_POST['nmaPemaraf'],$_POST['jbtPemaraf']);
$sket->simpanAgenda($data);
$sket->update('pengantar','status',array('cetak',$_POST['kdMohon']),'kd_permohonan');
echo "
<script src='../js/jquery.min.js'></script>
<script>
  $.post('$remoteUrl?obj=sketCetak',
         {
           kd_permohonan  : '".$_POST['kdMohon']."'
         },
        function(response){
          alert(response);
          window.location='../balaidesa/pengantar.php?id=".$_POST['kdMohon']."';
        });
</script>
";
//header("Location: ../balaidesa/pengantar.php?id=".$_POST['kdMohon']);
 ?>
