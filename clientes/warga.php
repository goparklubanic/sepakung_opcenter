<?php
header("Access-Control-Allow-Origin: *");
require("../lib/class.warga.inc.php");
$job = $_POST['does'];
$wrg = new warga();

if($job == 'kulanuwun'){
  $dw = $wrg->kulanuwun($_POST['uname'],$_POST['upass']);

  $nik = $dw['nik'];
  $nma = $dw['nama_lengkap'];
  $klm = $dw['kelamin'];
  $lhr = $dw['tg_lahir'];
  $rt_ = $dw['rt'];
  $rw_ = $dw['rw'];

  $kw = array('nik'=>$nik,'nama'=>$nma,'kelamin'=>$klm,'tgLahir'=>$lhr,'rt'=>$rt_,'rw'=>$rw_);
  echo json_encode($kw);
}

if($job == "nomoreq"){
  $kdper = $wrg->referid();
  echo $kdper;
}

if($job == "refreq"){
  $nomor = $_POST['nomor'];
  $nonik = $_POST['nonik'];
  $perlu = $_POST['perlu'];

  $wrg->referequest($nomor,$nonik,$perlu);
  echo "Permohonan pengantar No. $nomor sudah masuk ke dalam antrian";
}

if($job == 'referlist'){
  $dft = $wrg->referlist($_POST['nik']);
  echo json_encode($dft);
}

if($job == 'ambulance'){
  $wrg->ambulanceRequest($_POST['nonik'],$_POST['rumah'],
        $_POST['rt_rw'],$_POST['tjuan']);
}

if($job == 'ambulanStatus'){
  echo "Status Permintaan Ambulans";
  $data = $wrg->ambulanceStatus($_POST['nik']);

  $logMasuk = $wrg->hrtimestamp($data['tanggal_masuk']);
  $logProses= $wrg->hrtimestamp($data['tanggal_respon']);
  echo "
  <table class='table table-sm'>
    <tr>
      <td width='150'>ID Permintaan</td><td>".$data['id_permintaan']."</td>
    </tr>
    <tr>
      <td valign='top'>Titik Penjemputan</td>
      <td valign='top'>
        Rumah ".$data['jemput_rumah']."<br/>RT/RW : ".$data['jemput_rt_rw']."
      </td>
    </tr>
    <tr>
      <td>Tujuan</td><td>".$data['tujuan']."</td>
    </tr>
    <tr>
      <td valign='top'>Tanggal & Jam Permintaan</td>
      <td valign='top'>".$logMasuk."</td>
    </tr>
    <tr>
      <td valign='top'>Tanggal & Jam Respon</td>
      <td valign='top'>".$logProses."</td>
    </tr>
    <tr>
      <td>Status</td><td>".$data['responStatus']."</td>
    </tr>
  </table>
  ";

}

if($job == 'sosAlert'){
  $wrg->sosAlert($_POST['nik'],$_POST['lat'],$_POST['lon']);
}

 ?>
