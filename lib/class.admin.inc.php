<?php
  require("class.crud.inc.php");
  class pamdesadmin extends dbcrud
  {

    function kulanuwun($u,$p){
      $sandi = md5('**'.$u.'-'.$p.'**');
      $sql = "SELECT * FROM adminLog
              WHERE upass = ? LIMIT 1";
      $qry = $this->transact($sql,array($sandi));
      $r = $qry->fetch();
      return $r;
      $qry = null;
    }

    function loginUpdate($id){
      $sql = "UPDATE adminLog SET lastLogin = current_timestamp()
              WHERE id = '$id' LIMIT 1";
      $qry = $this->transact($sql);
      $qry = null;
    }

    function adminBaru($u,$p,$n,$j){
      $sandi = md5('**'.$u.'-'.$p.'**');
      $sets = 'uname,upass,nama,jabatan';
      $data = array($u,$sandi,$n,$j);
      $this->insert('adminLog',$sets,$data);
    }

    function adminData($id){
      $admData = $this->pickup('uname,nama,jabatan','adminLog','id',array($id));
      return $admData;
    }

    function adminList(){
      $sql = 'SELECT id,uname,nama,jabatan FROM adminLog ORDER BY id LIMIT 20';
      $qry = $this->transact($sql);
      while($r = $qry->fetch()){
        if($r['uname'] == $_SESSION['uname']){
          $style = "style='visibility:hidden'";
        }else{
          $style = "style='visibility:visible'";
        }
        echo "
        <tr>
          <td>".$r['id']."</td>
          <td>".$r['uname']."</td>
          <td>".$r['nama']."</td>
          <td>".$r['jabatan']."</td>
          <td>
            <a href='./adminArea.php?id=".$r['id']."' class='btn btn-primary'>edit</a>
            <a href=javascript:void(0) $style onClick=yaqeen(".$r['id'].") class='btn btn-danger'>hapus</a>
          </td>
        </tr>
        ";
      }
    }

    function adminGanti($u,$p,$n,$j,$id){
      $sandi = md5('**'.$u.'-'.$p.'**');
      $data  = 'uname,upass,nama,jabatan';
      $sets  = array($u,$sandi,$n,$j,$id);
      $this->Update('adminLog',$data,$sets,'id');
    }

  }
 ?>
