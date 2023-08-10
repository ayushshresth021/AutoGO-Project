<?php
  session_start();
  error_reporting(E_ALL ^ E_WARNING);
  $username = "$_SESSION[username]";
 ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta charset="UTF-8">
        <link href="https://api.fontshare.com/css?f[]=gambetta@2,2&display=swap" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <title>AutoGo About</title>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="aboutus.css" rel="stylesheet" />
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
    </head>
    <body>
        <!-- Navigation-->
        <div class="navbar-logo-left-2 wf-section" style="background-color: white">
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
        <!-- Page Content-->
        <section>
          <div class="about-container">
            <h1 contenteditable>AutoGo</h1>
            <h2>Welcome to our car reservation system! </h2>
            <p>Our company is a leading provider of rental cars, offering a wide range of vehicles to suit your needs. Our reservation system is designed to make the process of renting a car quick and easy. Simply visit our website or give us a call to make a reservation. We offer a variety of vehicles to choose from, including compact cars, SUVs, vans, and luxury cars. When you make a reservation, you'll be asked to provide some basic information, such as your name, contact information, and the dates you'd like to rent a car. You'll also have the option to choose your preferred vehicle type and any additional features or services you may need, such as a GPS or child seat.</p>
              <br>
              
              <p>At our company, we believe that renting a car should be a stress-free experience. That's why we've made it our mission to provide exceptional customer service and quality vehicles at affordable prices. Thank you for choosing us for your rental car needs!</p>
              <br>
              <br>
              <a href="./homepage.php" class="button-2 w-button">Reserve Your Car Now!</a>
            </div>
        </section>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>