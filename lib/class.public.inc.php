<?php
class publicData
{
  function transact($sql,$data=array()){
    include('koneksi.inc.php');
    $tqry=$conn->prepare($sql);
    $tqry->execute($data);
    return($tqry);
  }

  function pidat($kat){
    $sql = "SELECT optData FROM pildata WHERE optGroup = ?
            ORDER BY optData";
    $qry = $this->transact($sql,array($kat));
    $pidat = array();
    while($data = $qry->fetch()){
      array_push($pidat,$data['optData']);
    }
    return($pidat);
    $qry = null;
  }

}
?>
