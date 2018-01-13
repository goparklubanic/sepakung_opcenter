<?php
  require("../lib/class.crud.inc.php");
  $ajax = new dbcrud();
  $user = $ajax->pickup('*','penduduk','nik',array($_GET['nik']));
  echo "
  <table class='table table-bordered'>
    <tr><td colspan='2'>DATA DIRI</td></tr>

    <tr>
      <td width='300'>Nomor Kartu Keluarga</td>
      <td id='usernik'>".$user['no_kk']."</td>
    </tr>

    <tr>
      <td>Nomor Induk Kependudukan</td><td>".$user['nik']."</td>
    </tr>

    <tr>
      <td width='200'>Nama Lengkap ( L / P )</td>
      <td>".$user['nama_lengkap']." ( ".$user['kelamin']." )</td>
    </tr>

    <tr>
      <td width='200'>Tempat & Tanggal Lahir</td>
      <td>".$user['tp_lahir'].", ".$ajax->tanggalTerbaca($user['tg_lahir'])."</td>
    </tr>

    <tr>
      <td>Stats Hubungan Keluarga</td><td>".$user['shk']."</td>
    </tr>

    <tr>
      <td>Stats Perkawinan</td><td>".$user['st_kawin']."</td>
    </tr>

    <tr>
      <td width='200'>Alamat</td>
      <td>RT. ".$user['rt']." RW. ".$user['rw']."</td>
    </tr>

    <tr>
      <td>Agama, Gol. Darah</td><td>".$user['agama'].", ".$user['gol_darah']."</td>
    </tr>

    <tr>
      <td>kewarganegaraan</td><td>".$user['kewarganegaraan']."</td>
    </tr>

    <tr>
      <td>Pendidikan</td><td>".$user['pendidikan']."</td>
    </tr>

    <tr>
      <td>Pekerjaan</td><td>".$user['pekerjaan']."</td>
    </tr>

    <tr><td colspan='2'>DATA AYAH</td></tr>

    <tr>
      <td>Nama Ayah</td><td>".$user['bpkNama']."</td>
    </tr>

    <tr>
      <td>Nik Ayah</td><td>".$user['bpkNik']."</td>
    </tr>

    <tr>
      <td>Tempat dan Tanggal Lahir</td><td>".$user['bpkTpLahir'].", ".$ajax->tanggalTerbaca($user['bpkTgLahir'])."</td>
    </tr>

    <tr>
      <td>Alamat Tinggal</td><td>".$user['bpkAlamat']."</td>
    </tr>

    <tr><td colspan='2'>DATA IBU</td></tr>

    <tr>
      <td>Nama Ibu</td><td>".$user['ibuNama']."</td>
    </tr>

    <tr>
      <td>Nik Ibu</td><td>".$user['ibuNik']."</td>
    </tr>

    <tr>
      <td>Tempat dan Tanggal Lahir</td><td>".$user['ibuTpLahir'].", ".$ajax->tanggalTerbaca($user['ibuTgLahir'])."</td>
    </tr>

    <tr>
      <td>Alamat Tinggal</td><td>".$user['ibuAlamat']."</td>
    </tr>

  </table>
  ";
 ?>
<pre>
  <?php # print_r($user); ?>
</pre>
