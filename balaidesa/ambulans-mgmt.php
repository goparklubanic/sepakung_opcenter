
<div>
  <label>Masukkan Nomor Permohonan</label>
  <input type="text" id="mohon-cari" class="boxCari" />
</div>
<div class='table-responsive'>
  <table class='table table-hover table-sm'>
    <thead>
      <tr>
        <th>Nomor<br />Permintaan</th>
        <th>Tanggal Masuk</th>
        <th>Peminta</th>
        <th>Titik Jemput</th>
        <th>Tujuan</th>
        <th>Status</th>
        <th>Tindakan</th>
      </tr>
    </thead>
    <tbody id='ablc-data'>
      <?php
        require("../lib/class.balsa.inc.php");
        $ablc = new balaiDesa();
        $ablc->ambulanceReqList();
       ?>
    </tbody>
  </table>
</div>
<!--script>
$('.btn-send').click(function(){
  var i = $(this).index();
  var idReq = $('.ablc-id').eq(i).html();
  alert('kirim '+idReq);
});

$('.btn-done').click(function(){
  var i = $(this).index();
  var idReq = $('.ablc-id').eq(i).html();
  alert('Selesai '+idReq);
});
</script-->
