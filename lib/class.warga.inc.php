<?php
  require("class.crud.inc.php");
  class warga extends dbcrud
  {

    function kredenku($nik){
      $datalogin = $this->pickup("namalogin","kredensiWarga","nik",array($nik));
      return($datalogin['namalogin']);
    }

    function kulanuwun($u,$p){
      $sandi = md5('*'.$u.'_'.$p.'*');
      $sql = "SELECT nik,nama_lengkap,kelamin,tg_lahir,rt,rw FROM vwLogin
              WHERE katasandi = ? && statusLog='aktif' LIMIT 1";
      $qry = $this->transact($sql,array($sandi));
      $r = $qry->fetch();
      return $r;
      $qry = null;
    }

    function referid(){
      $aiki = date('ym');
      $sql = "SELECT MAX(kd_permohonan) kd_permohonan FROM pengantar WHERE kd_permohonan LIKE '$aiki%'";
      $qry = $this->transact($sql);
      $res = $qry->fetch();

      if($res['kd_permohonan'] == NULL ){
        $kdper = $aiki.'0001';
      }else{
        $kdper = $res['kd_permohonan'] + 1;
      }

      return($kdper);
    }

    function referequest($nomor,$nonik,$perlu){
      $sets = 'kd_permohonan,nik,keperluan';
      $data = array($nomor,$nonik,$perlu);
      $this->insert('pengantar',$sets,$data);
    }

    function referlist($nik){
      $sql = "SELECT tanggal,keperluan,status FROM pengantar
              WHERE nik = '$nik' ORDER BY tanggal DESC
              LIMIT 60";
      $qry = $this->transact($sql);
      $data = array();
      while($r = $qry->fetch()){
        list($tanggal)=explode(" ",$r['tanggal']);
        $tgl = $this->tanggalTerbaca($tanggal);
        $refer = array('tanggal'=>$tgl, 'keperluan'=>$r['keperluan'],
                'status'=>$r['status']);
        array_push($data,$refer);
      }
      return($data); $qry = null;
    }

    function ambulaceNewReqId(){
      $ym = date('ym');
      $sql = "SELECT MAX(id_permintaan) id_permintaan FROM ambulans
              WHERE id_permintaan LIKE '$ym%'";
      $qry = $this->transact($sql);
      $res = $qry->fetch();
      if($res['id_permintaan'] == NULL ){
        $ambulanceReqId = $ym.'0001';
      }else{
        $ambulanceReqId = $res['id_permintaan'] + 1;
      }
      return($ambulanceReqId);
      $qry = null;
    }

    function ambulanceRequest($nik, $rumah, $rt_rw, $tujuan){
      $idper = $this->ambulaceNewReqId();
      $sql   = "INSERT INTO ambulans
                SET id_permintaan = ?, nik_peminta = ? , jemput_rumah = ?,
                    jemput_rt_rw = ? ,tujuan = ?";
      $data = array($idper,$nik,$rumah,$rt_rw,$tujuan);
      $qry  = $this->transact($sql,$data);
      $qry  = null;

    }

    function ambulanceStatus($nik){
      $sql = "SELECT * FROM ambulans WHERE nik_peminta = ?
              ORDER BY tanggal_masuk DESC LIMIT 1";
      $qry = $this->transact($sql,array($nik));
      $res = $qry->fetch();
      return($res);
    }

    function hrtimestamp($datime){
      list($tgl,$jam) = explode(" ",$datime);
      list($th,$bl,$hr) = explode("-",$tgl);
      $newTimeStamp=$hr.'-'.$bl.'-'.$th.' '.$jam;
      return($newTimeStamp);
    }

    function sosAlert($nik,$lat,$lon){
      $this->insert('SOSAlert','nik,bujur,lintang',array($nik,$lon,$lat));
    }

  }
  // 1515806589406
 ?>
