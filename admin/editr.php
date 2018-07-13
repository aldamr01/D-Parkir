<?php
  require_once "../function/init.php";

  if(isset($_POST['ubah'])){

    $status_ruang = $_POST['status_ruang'];
    $id_ruang     = $_POST['id_ruang'];

    if(ubahruang($status_ruang,$id_ruang)){
      header("Location : index.php");
    }else{
      echo "gagal";
      header("Location : index.php");
    }

  }elseif (isset($_POST['kosongkan'])) {

    $id_ruang   =$_POST['id_ruang'];
    $status_ruang = "kosong";

    if(ubahruang($status_ruang,$id_ruang)){
      header("Location : index.php");
    }else{
      echo "gagal";
      header("Location : index.php");
    }
  }else{

  }
 ?>
