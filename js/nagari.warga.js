$(document).ready(function(){

  $('#passwadz').blur(function(){
    if($('#passwadz').val() !== $('#passwada').val()){
      $('#passwada').val('');
      $('#passwadz').val('');
      $('#passwad_info').html('Kata Sandi Tidak Identik!');
      $('#passwad_info').css({'color':'maroon','font-weight':'bold'});
      $('#passwada').focus();
    }
  });

  $('#passwada').blur(function(){
    $('#passwad_info').html('');
  });

  $('#valkey_i').blur(function(){
    if($('#valkey_i').val() !== $('#valkey_o').val()){
      $('#valkey_i').val('');
      $('#valkey_i').focus();
    }
  });




});
