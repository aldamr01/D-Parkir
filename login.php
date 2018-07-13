<?php
  require_once "function/init.php";
  //session_start();

  if(isset($_SESSION['username'])){
    header('Location : admin/');
  }
 ?>
<html lang="en">
  <head>
        <meta charset="utf-8">
    	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	  <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled Document</title>
      <!-- Bootstrap -->
	      <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/login.css">
        <link rel="stylesheet" href="assets/css/dcomp.css">
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/jquery-1.11.3.min.js"></script>
    </head>
    <body>
      <div class="container">
       <div class="tengah">
        <div class="panel  border-tb-flat-2 item-tengah">
          <div class="panel-heading ">
           <h3 align="center">Login Page</h3>
          </div>
          <div class="panel-footer">
            <form action="function/flogin.php" method="post" name="login">
                <div class="form-group">
                  <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </span>
                  <input name="username" type="text" class="form-control" id="username" placeholder="masukin id mu "></div>
                </div>
                <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                  <input name="password" type="password" id="password" class="form-control" placeholder="pasword nya juga">
                </div></br> </br>
                <button type="submit" name="login" class="btn btn-warning btn-block">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
