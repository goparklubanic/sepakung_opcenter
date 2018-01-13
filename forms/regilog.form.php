<?php
require("./lib/class.warga.inc.php");
$aku = new warga();
$uname = $aku->kredenku($_GET['id']);
$nik=$_GET['id'];

 ?>
<form action="acts/regcred.act.php?mode=<?php echo $mod; ?>" method="post">
  <div class="form-group">
    <label>Nomor Induk Kependudukan</label>
    <input type="text" class="form-control" name="nik" readonly value="<?php echo $nik; ?>" />
  </div>

  <div class="form-group">
    <label>Nama Pengguna</label>
    <input type="text" class="form-control" name="uname" value="<?php echo $uname; ?>" required />
  </div>

  <div class="form-group">
    <label>Kata Sandi</label>
    <input type="password" class="form-control" name="passwda" id="passwada" required />
  </div>

  <div class="form-group">
    <label>Ulangi Kata Sandi</label>
    <input type="password" class="form-control" id="passwadz" />
    <div id="passwad_info"></div>
  </div>

  <div class="form-group">
    <label>Kode Validasi</label>
    <input type="text" class="form-control" disabled id="valkey_o" value="<?php randomValidationCode(); ?>"
    style="font-family:monospace;letter-spacing: 5px;"/>
  </div>

  <div class="form-group">
    <label>Masukkan Kode Validasi</label>
    <input type="text" class="form-control" id="valkey_i" required
    style="font-family:monospace;letter-spacing: 5px;"/>
  </div>

  <div class="form-group mepet-kanan">
    <input type="submit" value="Simpan" class="btn btn-primary"  />
    <input type="reset"  value="Ulangi" class="btn btn-warning"  />
  </div>
</form>

<?php
  function randomValidationCode(){
    $vcc=array('b','N','1','c','P','3','d','Q','5','f','R','6','g','S','8','j','V','k','W','l','X','m','Y','n','Z');

    $vaco = array_rand($vcc,10);
    echo $vcc[$vaco[0]].$vcc[$vaco[2]].$vcc[$vaco[4]].$vcc[$vaco[6]].$vcc[$vaco[8]].$vcc[$vaco[3]];
  }
 ?>
