<?php/*
  // this php code checks if user is logged in
  session_start();
  error_reporting(E_ALL ^ E_WARNING);
  $username = "$_SESSION[username]";*/
 ?>

 <?php
   session_start();
   if (isset($_GET['price'])&&isset($_GET['model'])) {
     $_SESSION['price'] = $_GET['price'];
     $_SESSION['license'] = $_GET['model'];
     header('Location: ./insurance.php');
   }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/vendor/daterangepicker/daterangepicker.css">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <!-- Webflow Stuff -->
    <meta content="Car Select" property="og:title">
    <meta content="Car Select" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link href="css/webflow.css" rel="stylesheet" type="text/css">
    <link href="css/autogo.webflow.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({  google: {    families: ["Changa One:400,400italic","Droid Serif:400,400italic,700,700italic","Bitter:400,700,400italic"]  }});</script>
    <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="images/webclip.png" rel="apple-touch-icon">
    <title>AutoGo</title>
</head>
<body>
  <div class="navbar-logo-left-2 wf-section">
      <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar-logo-left-container-2 shadow-three w-nav">
      <div class="container-3">
          <div class="navbar-wrapper-3">
          <a href="homepage.php" class="navbar-brand-3 w-nav-brand"><img src="img/autogo_logo.png" loading="lazy" alt="" class="image-5" style="width: 500px;"></a>
          <nav role="navigation" class="nav-menu-wrapper-3 w-nav-menu">
              <ul role="list" class="nav-menu-two-2 w-list-unstyled">
              <li>
                  <a href="homepage.php" class="nav-link-3">Home</a>
              </li>
              <li>
                  <a href="about.php" class="nav-link-3">About</a>
              </li>
              <?php
                  if (!isset($_SESSION['username'])){
                  echo
                      '<li class="mobile-margin-top-12">
                          <a href="./login.php" class="button-2 w-button">Login</a>
                          <a href="./create.php" class="button-2 w-button">Sign Up</a>
                      </li>';
                  }
                  else {
                  echo
                      '
                      <li>
                          <a href="accountInfo.php" class="nav-link-3"><img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" style="width: 40px; height: 40px"/></a>
                      </li>
                      <li class="mobile-margin-top-12">
                          <a href="./login.php" class="button-2 w-button">Logout</a>
                      </li>';
                  }
              ?>
              </ul>
          </nav>
          <div class="menu-button-3 w-nav-button">
              <div class="w-icon-nav-menu"></div>
          </div>
          </div>
      </div>
      </div>
  </div>
  <?php

      $objects = get_objects_from_db();

      foreach ($objects as $object) {
          echo '<div class="card rounded" style="width: 1000px; margin: 0 auto; float: none; margin-bottom: 30px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);">';
          echo    '<div class="mx-auto row g-0">';
          echo       '<div class="col-md-4">';
          if($object['available']=='yes') {
          echo          '<img src="'.($object['img']).'" class="img-fluid rounded-start" style="height: 350px; min-width: 475px; border-radius: 4px; margin-left: 50px">';
          echo     '</div>';
          echo     '<div class="col-md-8">';
          echo          '<div class="card-body" style="text-align: center">';
          echo              '<h3 class="card-title" style="margin-top: 70px; font-weight: bold; margin-left: 200px">'.($object['model']).'</h3>';
          echo              '<p class="card-text" style="font-size: 18px; line-height: 1.6; margin-left: 200px"> Transmission: '.($object['transmission']).'</p>';
          echo              '<p class="card-text" style="font-size: 18px; line-height: 1.6; margin-left: 200px"> Seats: '.($object['seats']).'</p>';
          echo              '<p class="card-text" style="font-size: 18px; line-height: 1.6; margin-left: 200px"> MPG: '.($object['mpg']).'</p>';
          echo              '<p class="card-text" style="font-size: 18px; line-height: 1.6; margin-left: 200px"> Price: $'.($object['price'])."/day".'</p>';
          echo              "<button type='button' style='margin-top: 5px; margin-left: 200px' class='btn btn-danger btn-md' onclick='window.location.href=\"./transactions2.php?price=".$object["price"]."&model=".$object["model"]."\"'>Rent this car</button>";
          echo          '</div>';
          echo     '</div>';
          }
          echo    '</div>';
          echo '</div>';
      }

      function get_objects_from_db() {
          // Replace with your own database connection code
          $conn = mysqli_connect("localhost", "root", "", "autogo");
          if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
          }
          $sql = "SELECT * FROM cars";
          $result = $conn->query($sql);
          // Retrieve the objects and return them as an array
          $objects = array();
          if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              $objects[] = $row;
          }
          }
          $conn->close();
          return $objects;
      }
  ?>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
