<div class="row">
  <div class='row-header-strip'>
    PERMINTAAN AMBULANS
  </div>
  <div>
    <table class='table table-bordered'>
      <tr>
        <td width='300'>Tanggal dan jam Pengiriman</td>
        <td id='ablId'></td>
      </tr>
      <tr>
        <td>Titik Penjemputan</td>
        <td id='jemput'></td>
      </tr>
      <tr>
        <td>Tujuan</td>
        <td id='tujuan'></td>
      </tr>
      <tr>
        <td>Status</td>
        <td></td>
      </tr>
      <tr style="display:none;">
        <audio id='ablSirine'>
          <source src="ambulans.mp3" type="audio/mpeg">
          Your browser does not support the audio element.
        </audio>
      </tr>
    </table>
  </div>
</div>
<div class="row">
  <div class='row-header-strip'>
    PERMINTAAN BANTUAN DARURAT
  </div>
  <div>
    <table class='table table-bordered'>
      <tr>
        <td width='300'>NIK Pengirim Sinyal</td>
        <td><a href='javascript:void(0)' id='nik' onclick="checkEmergency(this.innerHTML)" class='btn btn-info'></a></td>
      </tr>
      <!--tr>
        <td>Nama Pengirim</td>
        <td id='sender'></td>
      </tr-->
      <tr>
        <td>Koordinat</td>
        <td><span id='lat'></span>,<span id='lon'></span></td>
      </tr>
      <tr>
        <td>Tanggal dan jam kirim</td>
        <td id='tms'></td>
      </tr>
      <!--tr>
        <td>Status</td>
        <td id='statusos'></td>
      </tr-->
      <tr>
        <td>Peta</td>
        <td>
          <div id="mapholder">

          </div>
        </td>
      </tr>
      <tr style='display:none;'>
        <td>
          Sirine:
        </td>
        <td>
          <audio id='sirine' control>
            <source src="sirine.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
        </td>
      </tr>
    </table>
  </div>
</div>
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
  var sosRef = firebase.database().ref().child('sos');
  var ablRef = firebase.database().ref().child('ambulans');

  sosRef.on('value',function(dataSOS){
    var tglJam = new Date(parseInt(dataSOS.val().tms));

    $("#nik").html(dataSOS.val().nik);
    $("#lon").html(dataSOS.val().lon);
    $("#lat").html(dataSOS.val().lat);
    $("#tms").html(tglJam);

    $("#mapholder").html(
      "<iframe style='border:none; height: 400px; width: 100%' "+
      "src='https://klubaners.web.id/sosmap.php?bjr="+dataSOS.val().lat+"&ltg="+dataSOS.val().lon+"'></iframe>"

    );
    var etms = localStorage.getItem('etms');

    if(etms != tglJam){
      sirineOn();
    }

    setOldEmgTms(tglJam);

  });

  ablRef.on('value',function(ablData){

    var reqTms = ablData.val().tms;
    var jemput = 'Rumah '+ ablData.val().rumah +', RT. '+ablData.val().rt+' RW. ';
    var tujuan = 'Ke '+ablData.val().tujuan;
    var ablTms = localStorage.getItem('atms');

    $('#ablId').html(reqTms);
    $('#jemput').html(jemput);
    $('#tujuan').html(tujuan);

    if(ablTms != reqTms){
      ambulanceOn();
    }

    setOldAblTms(reqTms);
  });

  function setOldEmgTms(tms){
    localStorage.setItem('etms',tms);
  }
  function setOldAblTms(tms){
    localStorage.setItem('atms',tms);
  }
</script>
<script>
  function checkEmergency(nik){
    window.location='./?obj=emck&nik='+nik;
  }
  function sirineOn(){
    var suara = document.getElementById('sirine');
    suara.play();
  }
  function ambulanceOn(){
    var suara = document.getElementById('ablSirine');
    suara.play();
  }
</script>
