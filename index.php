<!DOCTYPE html>
<html lang="en">
<head>
  <title>NAGARI</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <script src="./js/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <!-- custom script -->
  <script src="./js/nagari.warga.js"></script>
  <!-- custom script -->

  <!-- custom style -->
  <style media="screen">
  @import url('https://fonts.googleapis.com/css?family=Arima+Madurai|Overlock');
    .jumbotron {
      padding: 10px;
      font-family: 'Arima Madurai', cursive; text-align: center;
    }
    .jumbotron {margin-bottom: 0;}
    .jumbotron p{margin:0;}
    .jumbotron p.service-name {font-size: 24px; font-weight: bold;}
    .jumbotron p.service-abbr {font-size: 36px; letter-spacing: 15px; font-weight: bold;}
    .jumbotron p.service-user {font-size: 16px;}
    .container{font-family:'Overlock', cursive; font-size: 16px;}
    #nav {background-color: #000; color: #EEE; margin-top:0; padding: 5px; font-weight: bold;}
    #nav a{text-decoration: none; font-size: 20px; color: #FFF; padding:5px;}
    #nav a:hover{color: #FF0;}


    .konten-utama form {background-color: #DDD;}
    .konten-utama #default-page {text-align: center;}
    @media screen and (min-width: 480px) {
      .konten-utama { padding: 20px; background: #EEE; }
      .konten-utama form {margin: 20px 50px; padding: 20px; border: 1px solid #000; border-radius: 15px;}
      .konten-utama form .form-group h2 {background-color: #000; color: #FFF; padding: 5px 20px;}
      .konten-utama #default-page img { width: 637px; margin: auto;}
    }

    @media screen and (max-width: 480px) {
      .konten-utama { padding: 2px; background: #EEE; }
      .konten-utama form {margin: 2px 5px; padding: 2px; border: 0px solid #000; border-radius: 15px;}
      .konten-utama form .form-group h2 {background-color: #000; color: #FFF; padding: 5px 2px;}
      #default-page img { width:100%;}
    }
  </style>

</head>
<body>
  <div class="container" style="min-height: 450px;">
    <div class="jumbotron">
      <p class='service-name'>Layanan Warga Mandiri</p>
      <p class='service-abbr'>NAGARI</p>
      <p class='service-user'>Desa ..... Kecamatan .... Kabupaten Semarang</p>
    </div>
    <div id="nav">
      <a href="./?hal=registrasi">Daftar !</a>
    </div>
    <div class="konten-utama">
  <?php

  if(!$_GET['hal']){
    include('default.html');
  }

  if($_GET['hal']=="registrasi"){
    include("forms/biopri.form.php");
  }

  if($_GET['hal']=="denrga"){
    include("forms/regilog.form.php");
  }

  if($_GET['hal']=="konfirmasi"){
    include("dawa.php"); // data warga
  }

  if($_GET['hal']=="revisi"){
    include("forms/biopri.form.php"); // data warga
  }
  ?>
    </div> <!-- konten utama -->
<!--
    <div id="pesan" style="font-size: 24px;">
      test
    </div>
    <div id="lokasi" style="font-size: 14px;">
      koordinat
    </div>
  -->
  </div> <!-- container -->
<!--
  <script src="https://www.gstatic.com/firebasejs/4.8.1/firebase.js"></script>
  <script>
    // Initialize Firebase
    var config = {
      apiKey: "AIzaSyDvmTV7mIejMv3OANsoxjB4zhNUau8CjlE",
      authDomain: "nunukdemopushnotif.firebaseapp.com",
      databaseURL: "https://nunukdemopushnotif.firebaseio.com",
      projectId: "nunukdemopushnotif",
      storageBucket: "nunukdemopushnotif.appspot.com",
      messagingSenderId: "376367601132"
    };
    firebase.initializeApp(config);

    var pesan = document.getElementById('pesan');
    var msRef = firebase.database().ref().child('pesan');

    var place = document.getElementById('lokasi');
    var plRef = firebase.database().ref().child('koordinat');

    msRef.on('value',snap => pesan.innerText = snap.val());
    plRef.on('value',snap => place.innerText = snap.val());
  </script>
-->
</body>
</html>
