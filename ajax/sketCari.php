<?php
require("../lib/class.balsa.inc.php");
$sket = new balaiDesa();
$sket->sketCari($_GET['noref']);
?>
<script>
$('tr').click(function(){
  var i = $(this).index();
  var kdMohon = $('.kdm-id').eq(i).html();
  $.ajax('../ajax/sketUdat.php?id='+kdMohon);
});
</script>
