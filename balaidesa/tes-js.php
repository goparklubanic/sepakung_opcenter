<!DOCTYPE html>
<html lang="en">
<head>
  <title>NAGARI-TES</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- custom script -->
  <script>
  $(document).ready(function(){

    $('.list-group-item').click(function(){
      var i = $(this).index();
      var teks = $('li.list-group-item').eq(i).html();
      alert(teks);
    });

  });
  </script>
  <!-- custom script -->

  <!-- custom style -->
</head>
<body>
  <div class="container-fluid">
    <div class='list-group'>
      <li class='list-group-item'>100</li>
      <li class='list-group-item'>101</li>
      <li class='list-group-item'>102</li>
      <li class='list-group-item'>103</li>
    </div>
  </div>
</body>
</html>
