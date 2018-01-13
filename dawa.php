<?php
require('./lib/class.warga.inc.php');
$data = new warga();
$dawa = $data->pickup("*",'penduduk','nik',array($_GET['id']));
$cred = $data->pickup('namalogin','kredensiWarga','nik',array($_GET['id']));
if($dawa['kelamin']=="L"){ $kelamin = "Laki - Laki"; }else{ $kelamin = "Perempuan"; }
echo "
<table class='table'>
  <tr><td width='300'>Nomor KK</td><td>".$dawa['no_kk']."</td></tr>
  <tr><td>N I K</td><td>".$dawa['nik']."</td></tr>
  <tr><td>Nama Lengkap</td><td>".$dawa['nama_lengkap']."</td></tr>
  <tr><td>Tempat dan Tanggal Lahir</td>
      <td>".$dawa['tp_lahir'].", ".$data->tanggalTerbaca($dawa['tg_lahir'])."</td>
      </tr>
  <tr>
    <td>Jn. Kelamin, Agama, Gol. Darah</td>
    <td>".$kelamin.", ".ucfirst(strtolower($dawa['agama'])).", ".$dawa['gol_darah']."</td></tr>
  <tr><td>Status Hubungan Keluarga</td><td>".ucfirst(strtolower($dawa['shk']))."</td></tr>
  <tr><td>Status Perkawinan</td><td>".$dawa['st_kawin']."</td></tr>
  <tr><td>Pendidikan</td><td>".$dawa['pendidikan']."</td></tr>
  <tr><td>Pekerjaan</td><td>".ucfirst(strtolower($dawa['pekerjaan']))."</td></tr>
  <tr><td>kewarganegaraan</td><td>".$dawa['kewarganegaraan']."</td></tr>
  <tr>
    <td>Alamat Tinggal</td>
    <td>
      RT. ".$dawa['rt'].", RW. ".$dawa['rw']." Desa ... Kec .... Kab. Semarang
    </td>
  </tr>
  <tr>
    <td valign='top'>Informasi Ayah</td>
    <td>".$dawa['bpkNama']." (".$dawa['bpkNik'].")<br/>
    Lahir: ".$dawa['bpkTpLahir'].", ".$data->tanggalTerbaca($dawa['bpkTgLahir'])."<br />
    Alamat: ".$dawa['bpkAlamat']."
    </br/>
    </td>
  </tr>
  <tr>
    <td valign='top'>Informasi Ibu</td>
    <td>".$dawa['ibuNama']." (".$dawa['ibuNik'].")<br/>
    Lahir: ".$dawa['ibuTpLahir'].", ".$data->tanggalTerbaca($dawa['ibuTgLahir'])."<br />
    Alamat: ".$dawa['ibuAlamat']."
    </br/>
    </td>
  </tr>
  <tr>
    <td>Nama Login</td>
    <td>".$cred['namalogin']."</td>
  </tr>
  <tr>
    <td>Kata Sandi</td>
    <td>****************</td>
  </tr>
  <tr>
    <td align='right' colspan='2'>
      <a href='./' class='btn btn-primary'>Data Benar</a>&nbsp;&nbsp;
      <a href='./?hal=revisi&id=$_GET[id]' class='btn btn-success'>Ganti Data</a>&nbsp;&nbsp;
    </td>
  </tr>
</table>
";

?>
