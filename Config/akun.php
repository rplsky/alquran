<?php
  error_reporting(0);
  SESSION_START();
  include "koneksi.php";
  if(empty($_SESSION['id_user'])){
  	$_SESSION['id_user'] = "";
  }else{
  	$user=$_SESSION['id_user'];
    $level=$_SESSION['level'];

    $sql="select * from tbl_user where userid='$user'";
    $query=$pdo->prepare($sql);
    $query->execute();
    $dataakun=$query->fetch();

    $jk_akun = $dataakun['jeniskelamin'];
    if ($jk_akun=="L") {
      $ft_akun = "user_laki.png";
    } else {
      $ft_akun = "user_cewe.png";
    }
  }
?>