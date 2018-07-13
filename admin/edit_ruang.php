<?php
  require_once "../function/init.php";
  $showplat    = showmobil();
  

  if (isset($_POST['edit'])) {
    $id_ruang = $_POST['id_ruang'];
    $list = show_ruang($id_ruang);
  }else{
    header("Location:index.php");
  }

  if(isset($_POST['ubah'])){

    $status_ruang = $_POST['status_ruang'];
    $id_ruang     = $_POST['id_ruang'];

    if(ubahruang($status_ruang,$id_ruang)){
      header("Location: index.php");
    }else{
      echo "gagal";
      header("Location: index.php");
    }

  }elseif (isset($_POST['kosongkan'])) {

    $id_ruang   =$_POST['id_ruang'];
    $status_ruang = "kosong";

    if(ubahruang($status_ruang,$id_ruang)){
      header("Location: index.php");
    }else{
      echo "gagal";
      header("Location: index.php");
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
                <h2 class="judul" align="center">Tambah Mobil pada Ruangan</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <?php
                  while ($hasil = mysqli_fetch_assoc($list)) {
                 ?>
                <form  action="edit_ruang.php" method="post">
                  <div class="form-group">
                    <span>Nomor Ruangan</span>
                    <input type="text" class="form-control" name="id_ruangx" value="<?=$hasil['id_ruang'];?>"readonly>
                  </div>
                  <div class="form-group">
                    <span>Lantai Ruangan</span>
                    <input type="text" name="lantai_ruang" class="form-control" value="<?=$hasil['lantai_ruang'];?>"readonly>
                  </div>
                  <div class="form-group">
                    <span>Penghuni</span>
                    <?php
                      if ($hasil['status_ruang'] != "kosong") {
                    ?>
                    <input type="text" name="status_ruang" value="<?=$hasil['status_ruang'];?>" class="form-control" readonly>
                    <?php
                      }else{
                    ?>
                    <select class="form-control" name="status_ruang">
                      <?php
                        while ($hasilx = mysqli_fetch_assoc($showplat)) {
                      ?>
                      <option value="<?=$hasilx['no_plat'];?>"><?=$hasilx['no_plat'];?></option>
                    <?php } ?>
                    </select>
                    <?php
                      }
                     ?>
                  </div>
                  <input type="text"  name="id_ruang" value="<?=$hasil['id_ruang'];?>" hidden>
                  <p align="center">
                    <?php
                      if ($hasil['status_ruang'] == "kosong") {
                    ?>
                    <button type="submit" name="ubah" class="btn btn-success">Masukan !</button>
                  </p>
                </form><?php }else{ ?>
                <form class="kosong" action="edit_ruang.php" method="post">
                  <input type="text" name="id_ruang" value="<?=$hasil['id_ruang'];?>" hidden>
                  <input type="text" name="status_ruang" value="kosong" hidden>
                  <p align="center">
                    <button type="submit" name="kosongkan" class="btn btn-danger">Kosongkan !</button>
                  </p>
                </form>
              <?php } } ?>
              </div>
            </div><!--End of row -->
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
