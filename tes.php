<!DOCTYPE html>
<html lang="en">
<head>
  <title>NAGARI</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <script src="./js/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
</head>
<body>
  <div class='container'>
    <div class='sendingSection'>
      <div class='form-group'>
        <label class='col-md-2'>Pesan Dikirim</label>
        <div class='col-md-10'>
          <input class='form-control' type='text' id='sankir' value='Sampurasun !' />
        </div>
      </div>
      <div class='form-group'>
        <button class='btn btn-primary' id='kipes'>Kirim</button>
      </div>
    </div>
    <div class='retrievingSection'>
      <p id='diterima'>Pesan diterima</p>
      <p id='pesanLbl'>Label pesan</p>
      <p id='placeLbl'>Label Koordinat</p>
    </div>
  </div> <!-- container -->

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
  </script>
  <script>
    var sanpai = $('#diterima');
    var fbRef = firebase.database().ref();
    var pesanRef = fbRef.child('pesan');
    var placeRef = fbRef.child('koordinat');
    var pesanLbl = document.getElementById('pesanLbl')
    var placeLbl = document.getElementById('placeLbl')

    pesanRef.on('value',snap=>pesanLbl.innerText = snap.val());
    placeRef.on('value',snap=>placeLbl.innerText = snap.val());

    $('#kipes').click(function(){
      var sankir = $('#sankir').val();
      //alert(sankir);
      fbRef.child('pesan').set(sankir);
    });

    fbRef.on('child_changed',function(snapshot){

      //console.log('Pesan ' + snapshot.val());
      $('#diterima').html(snapshot.val());



      /*
      $('#pesanLbl').html(pesanRef.val());
      $('#placeLbl').html(placeRef.val());
      */

    });

  </script>

</body>
</html>
