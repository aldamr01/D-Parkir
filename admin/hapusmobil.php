<?php
  require_once "../function/init.php";

if (isset($_POST['mobilkeluar'])) {
  $noplat  = $_POST['no_plat'];
  if(delmob($noplat)){
    header("Location: index.php");
  }else{
    echo "gagal";
    header("Location: ../index.php");
  }
}
 ?>
