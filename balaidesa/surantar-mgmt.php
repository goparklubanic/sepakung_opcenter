
<div>
  <label>Masukkan Nomor Permohonan</label>
  <input type="text" id="mohon-cari" class="boxCari" />
</div>
<div class='table-responsive'>
  <table class='table table-hover table-sm'>
    <thead>
      <tr>
        <th>Nomor<br />Permohonan</th>
        <th>Tanggal</th>
        <th>NIK</th>
        <th>Nama Pemohon</th>
        <th>RT/RW</th>
        <th>Keperluan</th>
        <th>Status</th>
        <th>Tindakan</th>
      </tr>
    </thead>
    <tbody id='sketData'>
      <?php
        require("../lib/class.balsa.inc.php");
        $sket = new balaiDesa();
        $sket->sketList();
       ?>
    </tbody>
  </table>
</div>
<script>
$('tr').click(function(){
  var i = $(this).index();
  var kdMohon = $('.kdm-id').eq(i).html();
  $.ajax('../ajax/sketUdat.php?id='+kdMohon);
  window.location='./?obj=sket&nh=1';
});
</script>
