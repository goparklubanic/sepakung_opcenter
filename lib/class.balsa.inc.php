<?php
require("class.crud.inc.php");
class balaiDesa extends dbcrud
{
  function sketList(){
    //nomohon,tanggal,nik,nama,rt,rw,keperluan,status
    $sql = "SELECT pengantar.kd_permohonan, pengantar.tanggal, pengantar.nik,
            penduduk.nama_lengkap,penduduk.rt, penduduk.rw,pengantar.keperluan,
            pengantar.status
            FROM pengantar,penduduk
            WHERE pengantar.nik = penduduk.nik && pengantar.status = 'antri'
            ORDER BY pengantar.kd_permohonan LIMIT 30";
    $qry = $this->transact($sql);
    while($r = $qry->fetch()){
      $jamtgl = $this->timestampConvert($r['tanggal']);
      echo "
        <tr>
          <td class='kdm-id'>".$r['kd_permohonan']."</td>
          <td>".$jamtgl."</td>
          <td>".$r['nik']."</td>
          <td>".$r['nama_lengkap']."</td>
          <td>".$r['rt']." / ".$r['rw']."</td>
          <td>".$r['keperluan']."</td>
          <td>".$r['status']."</td>
          <td>
            <a class='btn btn-default' href='./?obj=agrf&id=".$r['kd_permohonan']."'>
              <img src='../citra/printer.png' width='20px'/>
            </a>
            <a class='btn btn-default btn-dl' href='#'>
              <img src='../citra/shredder.png' width='20px'/>
            </a>
        </tr>
      ";
    }
    $qry = null;
  }

  function sketCari($id){
    $sql = "SELECT pengantar.kd_permohonan, pengantar.tanggal, pengantar.nik,
            penduduk.nama_lengkap,penduduk.rt, penduduk.rw,pengantar.keperluan,
            pengantar.status
            FROM pengantar,penduduk
            WHERE kd_permohonan = ? && penduduk.nik = pengantar.nik
            LIMIT 1";
    $qry = $this->transact($sql,array($id));
    while($r = $qry->fetch()){
      $jamtgl = $this->timestampConvert($r['tanggal']);
      echo "
        <tr>
          <td class='kdm-id'>".$r['kd_permohonan']."</td>
          <td>".$jamtgl."</td>
          <td>".$r['nik']."</td>
          <td>".$r['nama_lengkap']."</td>
          <td>".$r['rt']." / ".$r['rw']."</td>
          <td>".$r['keperluan']."</td>
          <td>".$r['status']."</td>
          <td>
            <a class='btn btn-default' href='./?obj=agrf&id=".$r['kd_permohonan']."'>
              <img src='../citra/printer.png' width='20px'/>
            </a>
            <a class='btn btn-default btn-dl' href='#'>
              <img src='../citra/shredder.png' width='20px'/>
            </a>
          </td>
        </tr>
      ";
    }
    $qry = null;
  }

  function simpanAgenda($data){
    $sets = "kd_permohonan,nmAgenda,tgAgenda,nmaPemaraf,jbtPemaraf";
    $this->insert('agendaPengantar',$sets,$data);
  }

  function ambulanceReqList(){
    $sql  = " SELECT  id_permintaan, tanggal_masuk,nik_peminta,jemput_rumah,
                      jemput_rt_rw, tujuan, responStatus, nama_lengkap, rt,rw
              FROM ambulans,penduduk
              WHERE responStatus !='selesai' && nik = nik_peminta
              ORDER BY id_permintaan DESC
              LIMIT 30";
    $qry = $this->transact($sql);
    while($r = $qry->fetch()){
      echo "
      <tr class='ablc'>
        <td class='ablc-id'>".$r['id_permintaan']."</td>
        <td>".$this->timestampConvert($r['tanggal_masuk'])."</td>
        <td>".
            $r['nama_lengkap']."<br />
            [ ".$r['nik_peminta']." ] - RT. ".$r['rt']."  RT. ".$r['rw']."</td>
        <td>Rumah: ".$r['jemput_rumah']."<br />RT/RW: ".$r['jemput_rt_rw']."</td>
        <td>".$r['tujuan']."</td>
        <td>".$r['responStatus']."</td>
        <td>
          <a class='btn btn-default btn-send' id='send_".$r['id_permintaan']."' href='#'>Kirim</a>
          <a class='btn btn-default btn-done' id='done_".$r['id_permintaan']."' shref='#'>Selesai</a>
        </td>
      </tr>
      ";
    }
  }

  function ablcResponChange($id){
    $sql = "UPDATE ambulans SET tanggal_respon = current_timestamp()
            WHERE id_permintaan = '$id'";
    $qry = $this->transact($sql);
    $qry = null;
  }

  function emgc($nik){
    $sql = "SELECT * FROM SOSAlert ORDER BY id DESC LIMIT 10";
    $qry = $this->transact($sql);
    while($r = $qry->fetch()){
      if($r['nik'] == $nik) {
        $style = 'font-weight: bold; color: #fff; background:#800000;';
      }else{
        $style = 'font-weight: bold; color: #000; background:#EEE;';
      }
      echo "
      <tr style=$style>
        <td>".$r['id']."</td>
        <td>".$r['jamTgl']."</td>
        <td>".$r['nik']."</td>
        <td>".$r['lintang'].",".$r['bujur']."</td>
        <td>".strtoupper($r['status'])."</td>
        <td>";
      if($r['status'] == 'antri'){
        echo "<button class='btn btn-danger' onClick='setSosResponse($r[id])'>TANGGAPI</button>";
      }else{
        echo "<button class='btn btn-danger' onClick='setSosFinished($r[id])'>SELESAI</button>";
      }
      echo "
        </td>
      </tr>
      ";
    }
  }
}
?>
