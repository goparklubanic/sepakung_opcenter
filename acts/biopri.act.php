<?php
require("../lib/class.crud.inc.php");
$biodata = new dbcrud();
/*
$biodata->colmet('penduduk');
$post = $biodata->passedVars($_POST);
*/

if($_GET && $_GET['mode']=="add"){

  $sets = "no_kk,nik,nama_lengkap,kelamin,shk,tp_lahir,tg_lahir,st_kawin,agama,
          kewarganegaraan,gol_darah,pendidikan,pekerjaan,no_akte_lahir,rw,rt,
          bpkNik,bpkNama,bpkTpLahir,bpkTgLahir,bpkAlamat,
          ibuNik,ibuNama,ibuTpLahir,ibuTgLahir,ibuAlamat,
          mutasi,tglmutasi";
  $data = array(
    $_POST['nomorKK'],$_POST['nik'],$_POST['namaLengkap'],$_POST['kelamin'],
    $_POST['hukel'],$_POST['tempatLahir'],$_POST['tanggalLahir'],
    $_POST['perkawinan'],$_POST['agama'],$_POST['wn'],$_POST['golodar'],
    $_POST['pendidikan'],$_POST['pekerjaan'],$_POST['nomorAkteLahir'],
    $_POST['rw'],$_POST['rt'],$_POST['bpkNik'],$_POST['bpkNama'],
    $_POST['bpkTpLahir'],$_POST['bpkTgLahir'],$_POST['bpkAlamat'],
    $_POST['ibuNik'],$_POST['ibuNama'],$_POST['ibuTpLahir'],$_POST['ibuTgLahir'],
    $_POST['ibuAlamat'],'datang',date('Y-m-d'));

    $biodata->insert('penduduk',$sets,$data);
    $biodata->insert('kredensiWarga','nik',array($_POST['nik']));
    header("Location:../?hal=denrga&id=$_POST[nik]");

}

if($_GET && $_GET['mode']=="chg"){
  $tkey = 'nik';
  $sets = "no_kk,nama_lengkap,kelamin,shk,tp_lahir,tg_lahir,st_kawin,agama,
          kewarganegaraan,gol_darah,pendidikan,pekerjaan,no_akte_lahir,rw,rt,
          bpkNik,bpkNama,bpkTpLahir,bpkTgLahir,bpkAlamat,
          ibuNik,ibuNama,ibuTpLahir,ibuTgLahir,ibuAlamat";

  $data = array(
    $_POST['nomorKK'],$_POST['namaLengkap'],$_POST['kelamin'],
    $_POST['hukel'],$_POST['tempatLahir'],$_POST['tanggalLahir'],
    $_POST['perkawinan'],$_POST['agama'],$_POST['wn'],$_POST['golodar'],
    $_POST['pendidikan'],$_POST['pekerjaan'],$_POST['nomorAkteLahir'],
    $_POST['rw'],$_POST['rt'],$_POST['bpkNik'],$_POST['bpkNama'],
    $_POST['bpkTpLahir'],$_POST['bpkTgLahir'],$_POST['bpkAlamat'],
    $_POST['ibuNik'],$_POST['ibuNama'],$_POST['ibuTpLahir'],$_POST['ibuTgLahir'],
    $_POST['ibuAlamat'],$_POST['nik']);

    $biodata->update('penduduk',$sets,$data,$tkey);
    header("Location:../?hal=konfirmasi&id=$_POST[nik]");
}


?>
