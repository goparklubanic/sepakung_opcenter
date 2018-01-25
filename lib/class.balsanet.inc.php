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
    $sket = array();
    while($r = $qry->fetch()){
      $jamtgl = $this->timestampConvert($r['tanggal']);
      $data = array('kd_permohonan'=>$r['kd_permohonan'],'tanggal'=>$jamtgl,
                    'nik'=>$r['nik'],'nama_lengkap'=>$r['nama_lengkap'],
                    'rt'=>$r['rt'],'rw'=>$r['rw'],'keperluan'=>$r['keperluan'],
                    'status'=>$r['status']);
      array_push($sket,$data);
    }
    return ($sket);
    $qry = null;
  }

  function sketCari($id){
    $sql = "SELECT pengantar.kd_permohonan, pengantar.tanggal, pengantar.nik,
            penduduk.nama_lengkap,penduduk.rt, penduduk.rw,pengantar.keperluan,
            pengantar.status
            FROM pengantar,penduduk
            WHERE kd_permohonan = ? && penduduk.nik = pengantar.nik
            LIMIT 1";
    $sket = array();
    $qry = $this->transact($sql,array($id));
    while($r = $qry->fetch()){
      $jamtgl = $this->timestampConvert($r['tanggal']);
      $data = array('kd_permohonan'=>$r['kd_permohonan'],'tanggal'=>$jamtgl,
                    'nik'=>$r['nik'],'nama_lengkap'=>$r['nama_lengkap'],
                    'rt'=>$r['rt'],'rw'=>$r['rw'],'keperluan'=>$r['keperluan'],
                    'status'=>$r['status']);
        array_push($sket,$data);
    }
    return($sket);
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
    $ablc = array();
    $qry = $this->transact($sql);
    while($r = $qry->fetch()){
      $tg_masuk = $this->timestampConvert($r['tanggal_masuk']);
      $data = array('id_permintaan'=>$r['id_permintaan'],'tg_masuk'=>$tg_masuk,
                    'nama_lengkap'=>$r['nama_lengkap'],'nik_peminta'=>$r['nik_peminta'],
                    'peminta_rt'=>$r['rt'],'peminta_rw'=>$r['rw'],
                    'jp_rumah'=>$r['jemput_rumah'],'jp_rt_rw'=>$r['jemput_rt_rw'],
                    'tujuan'=>$r['tujuan'],'status'=>$r['responStatus']);
      array_push($ablc,$data);
    }
    return($ablc);
    $qry = null;
  }

  function ablcResponChange($id){
    $sql = "UPDATE ambulans SET tanggal_respon = current_timestamp()
            WHERE id_permintaan = '$id'";
    $qry = $this->transact($sql);
    $qry = null;
  }

  function ambulanStatus($status,$id){
    $sql = "UPDATE ambulans SET responStatus = '$status'
            WHERE id_permintaan = '$id' LIMIT 1";
    $qry = $this->transact($sql);
    $qry = null;
  }

  function emgc($nik){
    $sql = "SELECT * FROM SOSAlert WHERE nik='$nik' && status !='selesai' 
            ORDER BY id DESC LIMIT 10";
    $qry = $this->transact($sql);
    $emgc = array();
    while($r = $qry->fetch()){
      if($r['nik'] == $nik) {
        $style = 'font-weight: bold; color: #fff; background:#800000;';
      }else{
        $style = 'font-weight: bold; color: #000; background:#EEE;';
      }
      $data = array('id'=>$r['id'],'jamTgl'=>$r['jamTgl'],'nik'=>$r['nik'],
                    'lintang'=>$r['lintang'],'bujur'=>$r['bujur'],
                    'status'=>$r['status'],'style'=>$style);
      array_push($emgc,$data);
    }
    return($emgc); $qry = null;
  }
  function emgDtl($id){
    $emgc = $this->pickup('*','SOSAlert','id',array($id));
    return($emgc);
  }

  function emgChg($status,$id){

  }
}
?>
