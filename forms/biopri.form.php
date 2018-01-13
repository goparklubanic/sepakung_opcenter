<?php
//error_reporting(0);
require("./lib/class.public.inc.php");
require("./lib/class.crud.inc.php");
$pduk = new dbcrud();
$daum = new publicData();
if($_GET['id']== false ){
  $mod = 'add';
  $ro  = '';
  $nomorKK='';
  $nik='';
  $namaLengkap='';
  $kelamin='';
  $hukel='';
  $tempatLahir='';
  $tanggalLahir='';
  $perkawinan='';
  $agama='';
  $wn='';
  $golodar='';
  $pendidikan='';
  $pekerjaan='';
  $nomorAkteLahir='';
  $rw='';
  $rt='';
  $bpkNik='';
  $bpkNama='';
  $bpkTpLahir='';
  $bpkTgLahir='';
  $bpkAlamat='';
  $ibuNik='';
  $ibuNama='';
  $ibuTpLahir='';
  $ibuTgLahir='';
  $ibuAlamat='';

}else{
  $mod = 'chg';
  $ro  = 'readonly';
  $pddk = $pduk->pickup('*','penduduk','nik',array($_GET['id']));
  $nomorKK=$pddk['no_kk'];
  $nik=$pddk['nik'];
  $namaLengkap=$pddk['nama_lengkap'];
  $kelamin=$pddk['kelamin'];
  $hukel=$pddk['shk'];
  $tempatLahir=$pddk['tp_lahir'];
  $tanggalLahir=$pddk['tg_lahir'];
  $perkawinan=$pddk['st_kawin'];
  $agama=$pddk['agama'];
  $wn=$pddk['kewarganegaraan'];
  $golodar=$pddk['gol_darah'];
  $pendidikan=$pddk['pendidikan'];
  $pekerjaan=$pddk['pekerjaan'];
  $nomorAkteLahir=$pddk['no_akte_lahir'];
  $rw=$pddk['rw'];
  $rt=$pddk['rt'];
  $bpkNik=$pddk['bpkNik'];
  $bpkNama=$pddk['bpkNama'];
  $bpkTpLahir=$pddk['bpkTpLahir'];
  $bpkTgLahir=$pddk['bpkTgLahir'];
  $bpkAlamat=$pddk['bpkAlamat'];
  $ibuNik=$pddk['ibuNik'];
  $ibuNama=$pddk['ibuNama'];
  $ibuTpLahir=$pddk['ibuTpLahir'];
  $ibuTgLahir=$pddk['ibuTgLahir'];
  $ibuAlamat=$pddk['ibuAlamat'];
}

?>

<form action="acts/biopri.act.php?mode=<? echo $mod; ?>" method="post">
  <div class="form-group">
    <h2>Data Pribadi</h2>
  </div>
  <div class="form-group">
    <label>Nomor Kartu Keluarga</label>
    <input type="text" class="form-control" name="nomorKK" id="nomorKK" value="<?php echo $nomorKK; ?>" required />
  </div>

  <div class="form-group">
    <label>Nomor Induk Kependudukan</label>
    <input type="text" class="form-control" name="nik" id="nik" value="<?php echo $nik; ?>" required  <?php echo $ro; ?> />
  </div>

  <div class="form-group">
    <label>Nama Lengkap</label>
    <input type="text" class="form-control" name="namaLengkap" id="namaLengkap" value="<?php echo $namaLengkap; ?>" required />
  </div>

  <div class="form-group">
    <label>Tempat Lahir</label>
    <input type="text" class="form-control" name="tempatLahir" id="tempatLahir" value="<?php echo $tempatLahir; ?>" />
  </div>

  <div class="form-group">
    <label>Tanggal Lahir</label>
    <input type="date" placeHolder="mm/dd/yyyy" class="form-control" name="tanggalLahir" id="tanggalLahir" value="<?php echo $tanggalLahir; ?>" />
  </div>

  <div class="form-group">
    <label>Jenis Kelamin</label>
    <select class="form-control" name="kelamin" id="kelamin">
      <option value="L" <?php if($pddk['kelamin'] == 'L'){ echo 'selected'; }?> >Laki-laki</option>
      <option value="P" <?php if($pddk['kelamin'] == 'P'){ echo 'selected'; }?> >Perempuan</option>
    </select>
  </div>

  <div class="form-group">
    <label>Agama</label>
    <select name="agama" id="agama" class='form-control'>
      <option value="">Pilih Salah Satu</option>
      <?php
      $agama = $daum->pidat('agama');
      for($i = 0 ; $i < count($agama) ; $i++){
        if($agama[$i] == $pddk['agama']){ $sel = "selected"; } else { $sel = ""; }
        echo "<option $sel >".$agama[$i]."</option>";
      }
      ?>
    </select>

  </div>

  <div class="form-group">
    <label>Gologan Darah</label>
    <select name="golodar" id="golodar" class='form-control'>
      <option value="">Pilih Salah Satu</option>
      <?php
      $godar = $daum->pidat('golDarah');
      for($i = 0 ; $i < count($godar) ; $i++){
        if($godar[$i] == $pddk['gol_darah']){ $sel = "selected"; } else { $sel = ""; }
        echo "<option $sel >".$godar[$i]."</option>";
      }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label>Alamat Tempat tinggal</label>
    <div>
      <div class="col-md-2">
        <label>RT</label>
      </div>
      <div class="col-md-4">
        <input type="text" class="form-control" name="rt" id="rt" value="<?php echo $rt; ?>" />
      </div>
      <div class="col-md-2">
        <label>RW</label>
      </div>
      <div class="col-md-4">
        <input type="text" class="form-control" name="rw" id="rw" value="<?php echo $rw; ?>" />
      </div>
    </div>
  </div>

  <div class="form-group">
    <label>Status Hubungan Keluarga</label>
    <select name="hukel" id="hukel" class='form-control'>
      <option value="">Pilih Salah Satu</option>
      <?php
      $hukel = $daum->pidat('hubKeluarga');
      for($i = 0 ; $i < count($hukel) ; $i++){
        if($hukel[$i] == $pddk['shk']){ $sel = "selected"; } else { $sel = ""; }
        echo "<option $sel >".$hukel[$i]."</option>";
      }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label>Status Perkawinan</label>
    <select name="perkawinan" id="perkawinan" class='form-control'>
      <option value="">Pilih Salah Satu</option>
      <?php
      $kawin = $daum->pidat('st_kawin');
      for($i = 0 ; $i < count($kawin) ; $i++){
        if($kawin[$i] == $pddk['st_kawin']){ $sel = "selected"; } else { $sel = ""; }
        echo "<option $sel >".$kawin[$i]."</option>";
      }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label>Pendidikan</label>
    <select name="pendidikan" id="pendidikan" class='form-control'>
      <option value="">Pilih Salah Satu</option>
      <?php
      $didik = $daum->pidat('pendidikan');
      for($i = 0 ; $i < count($didik) ; $i++){
        if($didik[$i] == $pddk['pendidikan']){ $sel = "selected"; } else { $sel = ""; }
        echo "<option $sel >".$didik[$i]."</option>";
      }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label>Pekerjaan</label>
    <select name="pekerjaan" id="pekerjaan" class='form-control'>
      <option value="">Pilih Salah Satu</option>
      <?php
      $pekerjaan = $daum->pidat('pekerjaan');
      for($i = 0 ; $i < count($pekerjaan) ; $i++){
        if($pekerjaan[$i] == $pddk['pekerjaan']){ $sel = "selected"; } else { $sel = ""; }
        echo "<option $sel >".$pekerjaan[$i]."</option>";
      }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label>Kewarganegaraan</label>
    <input type="text" class="form-control" name="wn" id="wn" value="<?php echo $wn; ?>" />
  </div>

  <div class="form-group">
    <label>Nomor Akte Kelahiran</label>
    <input type="text" class="form-control" name="nomorAkteLahir" id="nomorAkteLahir" value="<?php echo $nomorAkteLahir; ?>" />
  </div>

  <div class="form-group">
    <h2>Data Ayah</h2>
  </div>

  <div class="form-group">
    <label>Nomor Induk Kependudukan</label>
    <input type="text" class="form-control" name="bpkNik" id="bpkNik" value="<?php echo $bpkNik; ?>" />
  </div>

  <div class="form-group">
    <label>Nama Lengkap</label>
    <input type="text" class="form-control" name="bpkNama" id="bpkNama" value="<?php echo $bpkNama; ?>" />
  </div>

  <div class="form-group">
    <label>Tempat Lahir</label>
    <input type="text" class="form-control" name="bpkTpLahir" id="bpkTpLahir" value="<?php echo $bpkTpLahir; ?>" />
  </div>

  <div class="form-group">
    <label>Tanggal Lahir</label>
    <input type="date" placeHolder="mm/dd/yyyy" class="form-control" name="bpkTgLahir" id="bpkTgLahir" value="<?php echo $bpkTgLahir; ?>" />
  </div>

  <div class="form-group">
    <label>Alamat Tinggal</label>
    <input type="text" class="form-control" name="bpkAlamat" id="bpkAlamat" value="<?php echo $bpkAlamat; ?>" />
  </div>

  <div class="form-group">
    <h2>Data Ibu</h2>
  </div>

  <div class="form-group">
    <label>Nomor Induk Kependudukan</label>
    <input type="text" class="form-control" name="ibuNik" id="ibuNik" value="<?php echo $ibuNik; ?>" />
  </div>

  <div class="form-group">
    <label>Nama Lengkap</label>
    <input type="text" class="form-control" name="ibuNama" id="ibuNama" value="<?php echo $ibuNama; ?>" />
  </div>

  <div class="form-group">
    <label>Tempat Lahir</label>
    <input type="text" class="form-control" name="ibuTpLahir" id="ibuTpLahir" value="<?php echo $ibuTpLahir; ?>" />
  </div>

  <div class="form-group">
    <label>Tanggal Lahir</label>
    <input type="date" placeHolder="mm/dd/yyyy" class="form-control" name="ibuTgLahir" id="ibuTgLahir" value="<?php echo $ibuTgLahir; ?>" />
  </div>

  <div class="form-group">
    <label>Alamat Tinggal</label>
    <input type="text" class="form-control" name="ibuAlamat" id="ibuAlamat" value="<?php echo $ibuAlamat; ?>" />
  </div>



  <div class="form-group">
    <label>&nbsp;</label>
    <input type="submit" class='btn btn-primary' value="Simpan" />
    <input type="reset"  class='btn btn-danger'  value="Ulangi" />
  </div>
</form>
