<?php
  require_once "../function/init.php";
 ?>

<html lang="id" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>D'parking</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
  	<link rel="stylesheet" href="../assets/css/mycss.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script src="../assets/js/menumaker.min.js" charset="utf-8"></script>
  	<script src="../assets/js/jquery.min.js" charset="utf-8"></script>
  	<script src="../assets/js/bootstrap.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



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
                <h2 class="judul" align="center">Laporan Keuangan</h2>
              </div>
            </div>
            <div class="row">
              <form class="" action="cetak" method="post">
                <input placeholder="Tanggal awal" type="date" name="mulai" value="" required>&nbsp;<span>&nbsp; s/d&nbsp; </span><input placeholder="Tanggal akhir" type="date" name="sampai" value=""required>&nbsp;
                <button type="submit" class="btn btn-primary" name="tanggal">Cetak Laporan</button>
              </form>
            </div><!--End of row -->
          </section>


        </div>
      </div>
    </div>
  </body>
</html>
