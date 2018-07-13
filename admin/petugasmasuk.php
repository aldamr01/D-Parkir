<?php
  require_once "../function/init.php";

  $map1     = check_peta1();
  $map2     = check_peta2();
  $map3     = check_peta3();
  $map4     = check_peta4();
  $show_map1 = show_peta1();
  $show_map2 = show_peta2();
  $show_map3 = show_peta3();
  $show_map4 = show_peta4();
  $car1      = count_car1();
  $room1     = count_room1();
  $car2      = count_car2();
  $room2     = count_room2();
  $car3      = count_car3();
  $room3     = count_room3();
  $car4      = count_car4();
  $room4     = count_room4();
  $allcar    = count_allcars();
  $showmobil = showmobil();
  $showmobil2 = showmobil();

  if (isset($_POST['inputmobil'])) {
    $no_plat  = $_POST['no_plat'];
    $jenis_kendaraan  =$_POST['jenis_kendaraan'];
    $tgl_masuk      = date("d-m-Y");
    $status         ="on_area";
    if(tambahmobil($no_plat,$jenis_kendaraan,$tgl_masuk,$status)){
      header("Location: petugasmasuk.php");
    }else{
      echo "gagal";
      header("Location: petugasmasuk.php");
    }
  }
 ?>

<html lang="id" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>D'parking</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
  	<link rel="stylesheet" href="../assets/css/mycss.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/leaflet/leaflet.css" />
    <script src="../assets/leaflet/leaflet.js"></script>
  	<script src="../assets/js/menumaker.min.js" charset="utf-8"></script>
  	<script src="../assets/js/jquery.min.js" charset="utf-8"></script>
  	<script src="../assets/js/bootstrap.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../assets/js/jquery.rwdImageMaps.js" charset="utf-8"></script>
    <script type="text/javascript" src="../assets/js/jquery.maphilight.js"></script>
    <script>
      function writeText(txt) {
          document.getElementById("desc").innerHTML = txt;
      }
      function writeText2(txt) {
          document.getElementById("desc2").innerHTML = txt;
      }
      function writeText3(txt) {
          document.getElementById("desc3").innerHTML = txt;
      }
    </script>


  </head>
  <body>
    <div class="container-fluid">
      <div class="header">
        <nav class="navbar navbar-default navbar-static-top" style="margin-bottom:0px;">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header" s>
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						  <a class="navbar-brand" href="#">D ' parking</a>
						</div

						<!-- komponen navbar lainnya (link, tombol, teks, dsb -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							 <ul class="nav navbar-nav">
								<li class="active"><a href="#">Home</a></li>
								<li><a href="#check">Check Availability</a></li>
								<li><a href="#">Live parking Map</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="login.php">Login</a></li>
							</ul>
						</div>
					 </div><!-- /.container -->
				</nav>
        <div class="tengah">
          <div class="item-tengah">
            <b><h1 style="color:rgb(196, 196, 196)" align="center">D'Parking System</h1></b>
            <h4 style="color:rgb(196, 196, 196)" align="center">A New Smart parking Platform for all Mall in Indonesia</h4>
            <div class="btn btn-lg btn-success" style="float:left;margin-top:40px">
              &nbsp; Get Started &nbsp;
            </div>
            <div class="btn btn-lg btn-primary" style="float:right;margin-top:40px">
              &nbsp; Find a Place  &nbsp;
            </div>
          </div>

        </div>
      </div>
      <div class="body" style="margin-top:40px">
        <div class="container">
          <section id="check">
            <div class="row">
              <div class="col-md-12">
                <h2 class="judul" align="center">Petugas Masuk</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <img class="map" src="../assets/img/imgmap2.png" usemap="#image-map">
                <map name="image-map">
                    <area data-toggle="pill" href="#floor3" target="" alt="floor3" title="floor3" href="" coords="113,228,369,107,488,168,488,210,371,167,244,212,114,259,113,247,113,238" shape="poly">
                    <area data-toggle="pill" href="#floor2" target="" alt="floor2" title="floor2" href="" coords="488,239,491,286,371,264,113,323,114,285,371,210,434,225" shape="poly">
                    <area data-toggle="pill" href="#floor1" target="" alt="floor1" title="floor1" href="" coords="376,298,489,314,490,357,375,358,115,367,115,339" shape="poly">
                    <area class="x1 " data-toggle="pill" href="#rooftop" target="" id="x1" alt="rooftop" title="rooftop" href="" coords="372,44,488,115,488,136,372,69,125,187,123,169" shape="poly">
                </map>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <form class="" action="index.html" method="post">

                  </form>
                </div>
                <div class="row">
                  <div id="myTabContent" class="tab-content">
        					  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledBy="home-tab"><br><br><br>
                        <h3 class="judul2">Masukan Data Mobil </h3>
                        <table class="table table-responsive table-striped table-bordered">
                        <thead class="bg-success">
                          <tr>
                            <td>Plat Nomor</td>
                            <td>Jenis Kendaraan</td>
                            <td>Action</td>
                          </tr>
                        </thead>
                        <tbody>
                          <form class="" action="petugasmasuk.php" method="post">
                          <tr>
                            <td align="center">
                              <input type="text" name="no_plat" value=""class="form-control">
                            </td>
                            <td align="center">
                              <select class="form-control" name="jenis_kendaraan">
                                <option value="mobil dinas">Mobil dinas</option>
                                <option value="mobil pribadi">Mobil pribadi</option>
                              </select>
                            </td>
                            <td align="center">
                              <button type="submit" class="btn btn-info" name="inputmobil">Masukan</button>
                            </td>
                          </tr>
                        </form>
                        </tbody>
                      </table>

        					  </div>
        					  <div role="tabpanel" class="tab-pane fade" id="floor1" aria-labelledBy="profile-tab"><br><br><br>
                      <h3 class="judulf1">Floor 1's Information</h3>
                      <table class="table table-responsive table-striped table-bordered">
                        <thead class="bg-success">
                          <tr>
                            <td>Floor</td>
                            <td>Total Car</td>
                            <td>Available Room</td>
                            <td>Car in Area</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td align="center">1</td>
                            <td align="center"> <span class="fa fa-car">&nbsp;</span><?=$car1;?> </td>
                            <td align="center"><?=$room1;?> <span class="fa fa-square-o">&nbsp;</span></td>
                            <td align="center"><?=$allcar;?> <span class="fa fa-spinner fa-spin">&nbsp;</span></td>
                          </tr>
                        </tbody>
                      </table><br>
                      <div class="panel-footer">
                        <h3>See The Map : </h3>&nbsp;<a data-toggle="pill" href="#map-floor1" class="btn btn-success">Show map</a>
                      </div>
        					  </div>
        					  <div role="tabpanel" class="tab-pane fade" id="floor2" aria-labelledBy="dropdown1-tab"><br><br><br>
                      <h3 class="judulf2">Floor 2's Information</h3>
                      <table class="table table-responsive table-striped table-bordered">
                        <thead class="bg-primary">
                          <tr>
                            <td>Floor</td>
                            <td>Total Car</td>
                            <td>Available Room</td>
                            <td>Car in Area</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td align="center">2</td>
                            <td align="center"> <span class="fa fa-car">&nbsp;</span><?=$car2;?> </td>
                            <td align="center"><?=$room2;?> <span class="fa fa-square-o">&nbsp;</span></td>
                            <td align="center"><?=$allcar;?> <span class="fa fa-spinner fa-spin">&nbsp;</span></td>
                          </tr>
                        </tbody>
                      </table><br>
                      <div class="panel-footer">
                        <h3>See The Map : </h3>&nbsp;<a data-toggle="pill" href="#map-floor2" class="btn btn-primary">Show map</a>
                      </div>
        					  </div>
        					  <div role="tabpanel" class="tab-pane fade" id="floor3" aria-labelledBy="dropdown2-tab"><br><br><br>
                      <h3 class="judulf3">Floor 3's Information</h3>
                      <table class="table table-responsive table-striped table-bordered">
                        <thead class="bg-warning">
                          <tr>
                            <td>Floor</td>
                            <td>Total Car</td>
                            <td>Available Room</td>
                            <td>Car in Area</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td align="center">3</td>
                            <td align="center"> <span class="fa fa-car">&nbsp;</span><?=$car3;?> </td>
                            <td align="center"><?=$room3;?> <span class="fa fa-square-o">&nbsp;</span></td>
                            <td align="center"><?=$allcar;?> <span class="fa fa-spinner fa-spin">&nbsp;</span></td>
                          </tr>
                        </tbody>
                      </table><br>
                      <div class="panel-footer">
                        <h3>See The Map : </h3>&nbsp;<a data-toggle="pill" href="#map-floor3" class="btn btn-warning">Show map</a>
                      </div>
        					  </div>
                    <div role="tabpanel" class="tab-pane fade" id="rooftop" aria-labelledBy="dropdown2-tab"><br><br><br>
                      <h3 class="judulrf">Roof top's Information</h3>
                      <table class="table table-responsive table-striped table-bordered">
                        <thead class="bg-danger">
                          <tr>
                              <td>Floor</td>
                              <td>Total Car</td>
                              <td>Available Room</td>
                              <td>Car in Area</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td align="center">rooftop</td>
                            <td align="center"> <span class="fa fa-car">&nbsp;</span><?=$car4;?> </td>
                            <td align="center"><?=$room4;?> <span class="fa fa-square-o">&nbsp;</span></td>
                            <td align="center"><?=$allcar;?> <span class="fa fa-spinner fa-spin">&nbsp;</span></td>
                          </tr>
                        </tbody>
                      </table><br>
                      <div class="panel-footer">
                        <h3>See The Map : </h3>&nbsp;<a data-toggle="pill" href="#map-rooftop" class="btn btn-danger">Show map</a>
                      </div>
        					  </div>
        					</div>
                </div>
              </div>
            </div><!--End of row -->
          </section>
          <section id="map-area">
            <div class="row">
              <div class="col-md-12">
                <h2 class="judul" align="center">D'Parking Area MAP</h2>
              </div>
            </div>
            <!--Petanya disini-->
            <div class="row">
              <div class="col-md-12">
                <div id="myTabContent2" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active" id="map-floor1" aria-labelledBy="home-tab">
                    <div class="row">
                      <div class="col-md-8">
                        <img class="map img img-responsive" src="../assets/img/floor1.png" usemap="#image-map1">
                        <map name="image-map1" class="">
                          <?php
                            while($hasil1= mysqli_fetch_array($map1)){
                           ?>
                            <area shape="<?=$hasil1['shape_ruang'];?>" coords="<?=$hasil1['kordinat_ruang'];?>" href="" title="<?=$hasil1['id_ruang'];?>" alt="<?=$hasil1['id_ruang'];?>" onmouseover="writeText('<?=$hasil1['jenis_kendaraan'];?>');writeText2('<?=$hasil1['no_plat'];?>');writeText3('<?=$hasil1['jam_masuk'];?>')"
                            onmouseout ="writeText('arahkan pada peta');writeText2('untuk melihat');writeText3('info pemakai ruang');"
                            >
                           <?php
                            }
                           ?>
                        </map>
                      </div>
                      <div class="col-md-4">
                        <h3 class="judulf1">Floor 1's Information</h3>
                        <table class="table table-responsive table-striped table-bordered ">
                          <thead class="bg-success">
                            <tr>
                              <td>Tipe Kendaraan</td>
                              <td>Plat Nomor</td>
                              <td>Jam Masuk</td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td id="desc">arahkan pada peta</td>
                              <td id="desc2">untuk melihat</td>
                              <td id="desc3">info pemakai ruang</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="row">
                      <table class="table table-responsive table-bordered">
                        <?php
                  /*        $i=1;
                          for ($i=0; $i < 10; $i++) {
                            while ($hasil1a = mysqli_fetch_array($show_map1)) {
                              echo "<td>".$hasil1a['id_ruang']."</td>";
                            }
                          }*/$x=0;
                          while ($hasil1a = mysqli_fetch_array($show_map1)) {

                            if ($x==0 || $x%10==0) {
                              echo "<tr>";
                              if ($hasil1a['status_ruang']!="kosong") {
                                ?><td class="bg-danger">
                                  <form class="" action="edit_ruang.php" method="post">
                                    <input type="text" name="id_ruang" value="<?=$hasil1a['id_ruang'];?>"hidden="hidden">
                                    <button type="submit" name="edit"><?=$hasil1a['id_ruang'];?></button>
                                  </form>
                                </td>
                                <?php
                              }else {
                              ?><td class="bg-success">
                                <form class="" action="edit_ruang.php" method="post">
                                  <input type="text" name="id_ruang" value="<?=$hasil1a['id_ruang'];?>"hidden="hidden">
                                  <button type="submit" name="edit"><?=$hasil1a['id_ruang'];?></button>
                                </form>
                              </td>
                              <?php
                              }

                            }else {
                              if ($hasil1a['status_ruang']!="kosong") {
                                ?> <td class="bg-danger">
                                  <form class="" action="edit_ruang.php" method="post">
                                    <input type="text" name="id_ruang" value="<?=$hasil1a['id_ruang'];?>"hidden="hidden">
                                    <button type="submit" name="edit"><?=$hasil1a['id_ruang'];?></button>
                                  </form>
                                </td>
                                <?php
                              }else { ?>
                                <td class="bg-success">
                                  <form class="" action="edit_ruang.php" method="post">
                                    <input type="text" name="id_ruang" value="<?=$hasil1a['id_ruang'];?>"hidden="hidden">
                                    <button type="submit" name="edit"><?=$hasil1a['id_ruang'];?></button>
                                  </form>
                                </td>
                          <?php
                              }
                            }
                            if ($x==9 ||$x==19 ||$x==29 ||$x==39 ||$x==49 ||$x==59 ||$x==69 ||$x==79 ||$x==89 ||$x==99 ||$x==109) {
                              echo "</tr>";
                            }
                            $x++;
                          }
                        ?>
                      </table>
                    </div>
                  </div>

                  <div role="tabpanel" class="tab-pane fade active" id=map-floor2 aria-labelledBy="home-tab">
                    <div class="row">
                      <div class="col-md-8">
                        <img class="map img img-responsive" src="../assets/img/floor2.png" usemap="#image-map2">
                        <map name="image-map2" class="">
                          <?php
                            while($hasil2= mysqli_fetch_array($map2)){
                           ?>
                            <area shape="<?=$hasil2['shape_ruang'];?>" coords="<?=$hasil2['kordinat_ruang'];?>" href="#" title="<?=$hasil2['id_ruang'];?>" alt="<?=$hasil2['id_ruang'];?>"
                            onmouseover="writeText('<?=$hasil2['jenis_kendaraan'];?>');writeText2('<?=$hasil2['no_plat'];?>');writeText3('<?=$hasil2['jam_masuk'];?>')"
                            onmouseout ="writeText('arahkan pada peta');writeText2('untuk melihat');writeText3('info pemakai ruang');">
                           <?php
                            }
                           ?>
                        </map>
                      </div>
                      <div class="col-md-4">
                        <h3 class="judulf1">Floor 2's Information</h3>
                        <table class="table table-responsive table-striped table-bordered ">
                          <thead class="bg-primary">
                            <tr>
                              <td>Tipe Kendaraan</td>
                              <td>Plat Nomor</td>
                              <td>Jam Masuk</td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td id="desc">arahkan pada peta</td>
                              <td id="desc2">untuk melihat</td>
                              <td id="desc3">info pemakai ruang</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="row">
                      <table class="table table-responsive table-bordered">
                        <?php
                  /*        $i=1;
                          for ($i=0; $i < 10; $i++) {
                            while ($hasil1a = mysqli_fetch_array($show_map1)) {
                              echo "<td>".$hasil1a['id_ruang']."</td>";
                            }
                          }*/$x=0;
                          while ($hasil2a = mysqli_fetch_array($show_map2)) {

                            if ($x==0 || $x%10==0) {
                              echo "<tr>";
                              if ($hasil2a['status_ruang']!="kosong") {
                                echo '<td class="bg-danger">'.$hasil2a['id_ruang']."</td>";
                              }else {
                                echo '<td class="bg-success">'.$hasil2a['id_ruang']."</td>";
                              }

                            }else {
                              if ($hasil2a['status_ruang']!="kosong") {
                                echo '<td class="bg-danger">'.$hasil2a['id_ruang']."</td>";
                              }else {
                                echo '<td class="bg-success">'.$hasil2a['id_ruang']."</td>";
                              }
                            }
                            if ($x==9 ||$x==19 ||$x==29 ||$x==39 ||$x==49 ||$x==59 ||$x==69 ||$x==79 ||$x==89 ||$x==99 ||$x==109) {
                              echo "</tr>";
                            }
                            $x++;
                          }
                        ?>
                      </table>
                    </div>
                  </div>

                  <div role="tabpanel" class="tab-pane fade active" id="map-floor3" aria-labelledBy="home-tab">
                    <div class="row">
                      <div class="col-md-8">
                        <img class="map img img-responsive" src="../assets/img/floor3.png" usemap="#image-map3">
                        <map name="image-map3" class="">
                          <?php
                            while($hasil3= mysqli_fetch_array($map3)){
                           ?>
                            <area shape="<?=$hasil3['shape_ruang'];?>" coords="<?=$hasil3['kordinat_ruang'];?>" href="#" title="<?=$hasil3['id_ruang'];?>" alt="<?=$hasil3['id_ruang'];?>"
                            onmouseover="writeText('<?=$hasil3['jenis_kendaraan'];?>');writeText2('<?=$hasil3['no_plat'];?>');writeText3('<?=$hasil3['jam_masuk'];?>')"
                            onmouseout ="writeText('arahkan pada peta');writeText2('untuk melihat');writeText3('info pemakai ruang');">
                           <?php
                            }
                           ?>
                        </map>
                      </div>
                      <div class="col-md-4">
                        <h3 class="judulf1">Floor 1's Information</h3>
                        <table class="table table-responsive table-striped table-bordered ">
                          <thead class="bg-warning">
                            <tr>
                              <td>Tipe Kendaraan</td>
                              <td>Plat Nomor</td>
                              <td>Jam Masuk</td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td id="desc">arahkan pada peta</td>
                              <td id="desc2">untuk melihat</td>
                              <td id="desc3">info pemakai ruang</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="row">
                      <table class="table table-responsive table-bordered">
                        <?php
                  /*        $i=1;
                          for ($i=0; $i < 10; $i++) {
                            while ($hasil1a = mysqli_fetch_array($show_map1)) {
                              echo "<td>".$hasil1a['id_ruang']."</td>";
                            }
                          }*/$x=0;
                          while ($hasil3a = mysqli_fetch_array($show_map3)) {

                            if ($x==0 || $x%10==0) {
                              echo "<tr>";
                              if ($hasil3a['status_ruang']!="kosong") {
                                echo '<td class="bg-danger">'.$hasil3a['id_ruang']."</td>";
                              }else {
                                echo '<td class="bg-success">'.$hasil3a['id_ruang']."</td>";
                              }

                            }else {
                              if ($hasil3a['status_ruang']!="kosong") {
                                echo '<td class="bg-danger">'.$hasil3a['id_ruang']."</td>";
                              }else {
                                echo '<td class="bg-success">'.$hasil3a['id_ruang']."</td>";
                              }
                            }
                            if ($x==9 ||$x==19 ||$x==29 ||$x==39 ||$x==49 ||$x==59 ||$x==69 ||$x==79 ||$x==89 ||$x==99 ||$x==109) {
                              echo "</tr>";
                            }
                            $x++;
                          }
                        ?>
                      </table>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade active" id="map-rooftop" aria-labelledBy="home-tab">
                    <div class="row">
                      <div class="col-md-8">
                        <img class="map img img-responsive" src="../assets/img/floor2.png" usemap="#image-map4">
                        <map name="image-map4" class="">
                          <?php
                            while($hasil4= mysqli_fetch_array($map4)){
                           ?>
                            <area shape="<?=$hasil4['shape_ruang'];?>" coords="<?=$hasil4['kordinat_ruang'];?>" href="#" title="<?=$hasil4['id_ruang'];?>" alt="<?=$hasil4['id_ruang'];?>"
                            onmouseover="writeText('<?=$hasil4['jenis_kendaraan'];?>');writeText2('<?=$hasil4['no_plat'];?>');writeText3('<?=$hasil4['jam_masuk'];?>')"
                            onmouseout ="writeText('arahkan pada peta');writeText2('untuk melihat');writeText3('info pemakai ruang');">
                           <?php
                            }
                           ?>
                        </map>
                      </div>
                      <div class="col-md-4">
                        <h3 class="judulf1">Rooftop's Information</h3>
                        <table class="table table-responsive table-striped table-bordered ">
                          <thead class="bg-danger">
                            <tr>
                              <td>Tipe Kendaraan</td>
                              <td>Plat Nomor</td>
                              <td>Jam Masuk</td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td id="desc">arahkan pada peta</td>
                              <td id="desc2">untuk melihat</td>
                              <td id="desc3">info pemakai ruang</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="row">
                      <table class="table table-responsive table-bordered">
                        <?php
                  /*        $i=1;
                          for ($i=0; $i < 10; $i++) {
                            while ($hasil1a = mysqli_fetch_array($show_map1)) {
                              echo "<td>".$hasil1a['id_ruang']."</td>";
                            }
                          }*/$x=0;
                          while ($hasil4a = mysqli_fetch_array($show_map4)) {

                            if ($x==0 || $x%10==0) {
                              echo "<tr>";
                              if ($hasil4a['status_ruang']!="kosong") {
                                echo '<td class="bg-danger">'.$hasil4a['id_ruang']."</td>";
                              }else {
                                echo '<td class="bg-success">'.$hasil4a['id_ruang']."</td>";
                              }

                            }else {
                              if ($hasil4a['status_ruang']!="kosong") {
                                echo '<td class="bg-danger">'.$hasil4a['id_ruang']."</td>";
                              }else {
                                echo '<td class="bg-success">'.$hasil4a['id_ruang']."</td>";
                              }
                            }
                            if ($x==9 ||$x==19 ||$x==29 ||$x==39 ||$x==49 ||$x==59 ||$x==69 ||$x==79 ||$x==89 ||$x==99 ||$x==109) {
                              echo "</tr>";
                            }
                            $x++;
                          }
                        ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <script type="text/javascript">
            $(function() {
              $('.map').maphilight({fade: true});
            });
          </script>
          <script src="assets/js/jquery.rwdImageMaps.min.js"></script>
          <script>
          $(document).ready(function(e) {
          	$('img[usemap]').rwdImageMaps();

          	/*$('area').on('click', function() {
          		alert($(this).attr('alt') + ' clicked');
          	});*/
          });
          </script>
        </div>
      </div>
    </div>
  </body>
</html>
