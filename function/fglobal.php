<?php


  function run($query){
    global $link;
    if($result = mysqli_query($link,$query) or die('mysqli failure')){
        return $result;
    }
  }

  function print_laporan($xmin,$xmax){
    $query ="SELECT *FROM tb_laporan where tb_laporan.tgl_masuk BETWEEN '$xmin' AND '$xmax';";
    return run($query);
  }

  function randomizer($panjang) {
     $karakter  = 'ABCDEFGHIJKL1234567890';
     $string    = '';
     for ($i = 0; $i < $panjang; $i++) {
        $pos = rand(0, strlen($karakter)-1);
        $string .= $karakter{$pos};
      }
      return $string;
  }

  function check_peta1(){
    $query  = "SELECT * FROM tb_ruang INNER JOIN tb_report ON tb_ruang.status_ruang = tb_report.no_plat WHERE lantai_ruang='floor_1'";
    return run($query);
  }

  function check_peta2(){
    $query  = "SELECT * FROM tb_ruang INNER JOIN tb_report ON tb_ruang.status_ruang = tb_report.no_plat WHERE lantai_ruang='floor_2'";
    return run($query);
  }

  function check_peta3(){
    $query  = "SELECT * FROM tb_ruang INNER JOIN tb_report ON tb_ruang.status_ruang = tb_report.no_plat WHERE lantai_ruang='floor_3'";
    return run($query);
  }

  function check_peta4(){
    $query  = "SELECT * FROM tb_ruang INNER JOIN tb_report ON tb_ruang.status_ruang = tb_report.no_plat WHERE lantai_ruang='floor_4'";
    return run($query);
  }

  function show_peta1(){
    $query  = "SELECT * FROM tb_ruang WHERE lantai_ruang='floor_1'";
    return run($query);
  }

  function show_peta2(){
    $query  = "SELECT * FROM tb_ruang WHERE lantai_ruang='floor_2'";
    return run($query);
  }

  function show_peta3(){
    $query  = "SELECT * FROM tb_ruang WHERE lantai_ruang='floor_3'";
    return run($query);
  }

  function show_peta4(){
    $query  = "SELECT * FROM tb_ruang WHERE lantai_ruang='rooftop'";
    return run($query);
  }

  function count_car1(){
    $query  = "SELECT * FROM tb_ruang WHERE lantai_ruang='floor_1' AND status_ruang !='kosong'";
    return mysqli_num_rows(run($query));
  }
  function count_room1(){
    $query  = "SELECT * FROM tb_ruang WHERE lantai_ruang='floor_1' AND status_ruang ='kosong'";
    return mysqli_num_rows(run($query));
  }
  function count_car2(){
    $query  = "SELECT * FROM tb_ruang WHERE lantai_ruang='floor_2' AND status_ruang !='kosong'";
    return mysqli_num_rows(run($query));
  }
  function count_room2(){
    $query  = "SELECT * FROM tb_ruang WHERE lantai_ruang='floor_2' AND status_ruang ='kosong'";
    return mysqli_num_rows(run($query));
  }
  function count_car3(){
    $query  = "SELECT * FROM tb_ruang WHERE lantai_ruang='floor_3' AND status_ruang !='kosong'";
    return mysqli_num_rows(run($query));
  }
  function count_room3(){
    $query  = "SELECT * FROM tb_ruang WHERE lantai_ruang='floor_3' AND status_ruang ='kosong'";
    return mysqli_num_rows(run($query));
  }
  function count_car4(){
    $query  = "SELECT * FROM tb_ruang WHERE lantai_ruang='rooftop' AND status_ruang !='kosong'";
    return mysqli_num_rows(run($query));
  }
  function count_room4(){
    $query  = "SELECT * FROM tb_ruang WHERE lantai_ruang='rooftop' AND status_ruang ='kosong'";
    return mysqli_num_rows(run($query));
  }
  function count_allcars(){
    $query  = "SELECT * FROM tb_report WHERE status = 'on_area'";
    return mysqli_num_rows(run($query));
  }

  function ubahruang($status_ruang,$id_ruang){
    $query  = "UPDATE tb_ruang SET status_ruang = '$status_ruang' WHERE tb_ruang.id_ruang = '$id_ruang'";
    return run($query);
  }

  function ubahmobil($status_mobil,$no_plat){
    $query  = "UPDATE tb_report SET status = '$status_mobil' WHERE tb_report.no_plat = '$no_plat'";
    return run($query);
  }

  function tambahmobil($no_plat,$jenis_kendaraan,$tgl_masuk,$status){
    $query = "INSERT INTO tb_report(no_plat,jenis_kendaraan,tgl_masuk,status) VALUES ('$no_plat','$jenis_kendaraan','$tgl_masuk','$status')";
    return run($query);
  }

  function delmob($noplat){
    $query  = "DELETE FROM tb_report WHERE tb_report.no_plat = '$noplat'";
    return run($query);
  }

  function show_ruang($id_ruang){
    $query = "SELECT * FROM tb_ruang WHERE tb_ruang.id_ruang = '$id_ruang'";
    return run($query);
  }
  function showmobil(){
    $query = "SELECT * FROM tb_report ";
    return run($query);
  }
 ?>
