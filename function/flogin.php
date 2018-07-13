<?php
session_start();
require_once "init.php";
require_once "db.php";


if(isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $pass     = $_POST['password'];

  $login = mysqli_query("SELECT * FROM tb_user WHERE user_name = '$username' AND user_password='$pass'");

  $row   =mysqli_fetch_array($login);
    if ($row['email'] == $username AND $row['password'] == $pass){

      $_SESSION['username']   = $username;
      $_SESSION['password']   = $row['user_password'];
      $_SESSION['jabatan']    = $row['user_status'];
      header('location: ../admin/');

    }else{
      header("Location : ../index.php");
    }
  }else{
    header("Location : ../index.php");
  }

 ?>
