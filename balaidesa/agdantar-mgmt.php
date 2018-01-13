<?php
require('../lib/class.balsa.inc.php');
$sket = new balaiDesa();
$ref = $sket->pickup('nik,keperluan','pengantar','kd_permohonan',array($_GET['id']));
$wrg = $sket->pickup('*','penduduk','nik',array($ref['nik']));
//echo "<pre>"; print_r($ref); print_r($wrg); echo "</pre>";
//form agenda surat
?>
  <table class="table table-sm" id="tbl-refer">
    <tr>
      <td colspan='2'>
        Yang bertanda tangan di bawah ini menerangkan bahwa:
      </td>
    </tr>
    <tr>
      <td width='300'>Nama Lengkap</td>
      <td><?php echo $wrg['nama_lengkap']; ?></td>
    </tr>
    <tr>
      <td width='300'>Tempat, tanggal lahir</td>
      <td><?php echo $wrg['tp_lahir'].', '. $sket->tanggalTerbaca($wrg['tg_lahir']); ?></td>
    </tr>
    <tr>
      <td width='300'>Kewarganegaraan, Agama</td>
      <td><?php echo $wrg['kewarganegaraan'].', '.$wrg['agama']; ?></td>
    </tr>
    <tr>
      <td width='300'>Status perkawinan</td>
      <td><?php echo $wrg['st_kawin']; ?></td>
    </tr>
    <tr>
      <td width='300'>Pekerjaan</td>
      <td><?php echo ucfirst(strtolower($wrg['pekerjaan'])); ?></td>
    </tr>
    <tr>
      <td width='300'>Tempat tinggal</td>
      <td>RT. <?php echo $wrg['rt']; ?> RW. <?php echo $wrg['rw']; ?> Desa Sepakung, Kec. Banyubiru, Kab. Semarang</td>
    </tr>
    <tr>
      <td width='300'>Surat bukti diri</td>
      <td>
        <label style="width: 60px">No. KK</label>: <?php echo $wrg['no_kk']; ?><br />
        <label style="width: 60px">NIK</label>: <?php echo $wrg['nik']; ?>
      </td>
    </tr>
    <tr>
      <td width='300'>Keperluan</td>
      <td><?php echo $ref['keperluan']; ?></td>
    </tr>
    <tr>
      <td width='300'>Berlaku Mulai</td>
      <td><?php echo $sket->tanggalTerbaca(date('Y-m-d')); ?> s.d selesai</td>
    </tr>
    <tr>
      <td width='300'>Keterangan</td>
      <td>Yang bersangkutan benar-benar warga Desa Sepakung, Kecamatan Banyubiru, Kabupaten Semarang</td>
    </tr>

  </table>
<form action='../acts/agdantar-act.php' method='post'>
  <input type='hidden' name='kdMohon' value='<?php echo $_GET['id']; ?>' />
  <div class="form-group">
    <label class='col-sm-3'>Nomor Surat</label>
    <div class='col-sm-9'>
      <input class='form-control' type='text' name='nmSurat' />
    </div>
  </div>

  <div class="form-group">
    <label class='col-sm-3'>Tanggal Agenda</label>
    <div class='col-sm-9'>
      <input class='form-control' type='date' name='tgAgenda' value='<?php echo date('Y-m-d'); ?>' />
    </div>
  </div>

  <div class="form-group">
    <label class='col-sm-3'>Nama Penandatangan</label>
    <div class='col-sm-9'>
      <input class='form-control' type='text' name='nmaPemaraf' />
    </div>
  </div>

  <div class="form-group">
    <label class='col-sm-3'>Jabatan Penadatangan</label>
    <div class='col-sm-9'>
      <input class='form-control' type='text' name='jbtPemaraf' />
    </div>
  </div>

  <div class='form-group'>
    <input type='submit' value='Proses' class='btn btn-primary' />
  </div>
</form>
