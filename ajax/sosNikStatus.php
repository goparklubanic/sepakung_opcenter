<?php
  require '../lib/class.crud.inc.php';
  $ns = new dbcrud();
  $nama = $ns->pickup('nama_lengkap nama','penduduk','nik',array($_GET['nik']));
  $sql = "SELECT status FROM SOSAlert ORDER BY id DESC limit 1";
  $qry = $ns->transact($sql);
  $res = $qry->fetch();
  $sost = $res['status'];
  $rd = array($nama['nama'],$sost);
  echo json_encode($rd);
 ?>
