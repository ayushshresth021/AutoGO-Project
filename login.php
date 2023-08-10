<?php
  session_start();

  error_reporting(E_ERROR | E_PARSE);

  $username = "$_SESSION[username]";
  if ("$_SESSION[username]" === "incorrect password" || "$_SESSION[username]" === "One of the information is empty" || "$_SESSION[username]" === "Account has been created! Please log in with your brand new account."){
    echo $username;
  }

  if (isset($_POST["username"]) &&
      isset($_POST["password"])) {
    if ($_POST["username"] && $_POST["password"]) {
      $username = $_POST["username"];
      $password = $_POST["password"];
      $_SESSION['username'] = $username;

      //create connection
      $conn = mysqli_connect("localhost", "root", "", "autogo");

      //Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      // select user, check for password
      $sql = "SELECT password FROM users WHERE username = '$username'";
      $results = mysqli_query($conn, $sql);

      if ($results) {
        $row = mysqli_fetch_assoc($results);
        if ($row["password"] === $password) {
          $logged_in = true;
          $sql = "SELECT * FROM users";
          $results = mysqli_query($conn, $sql);
          // Store username variable, go to main
          $_SESSION['username']=$username;
          header("Location: ./accountInfo.php");
        } else {
            $_SESSION["username"] = "incorrect password";
            echo "password incorrect";
          header("Location: ./login.php");
          echo "password incorrect";
        }
      } else {
        echo mysqli_error($conn);
      }
      mysqli_close($conn); //close connection
    }else {
      $_SESSION["username"] = "One of the information is empty";
      header("Location: ./login.php");
      echo "Nothing was submitted";
    }
  }
  else{
    session_destroy();
    unset ($_SESSION['username']);
  }

  ?>



<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Sat May 06 2023 03:14:17 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="6451a8c92eebfa5839a89f9b" data-wf-site="644ae8923d92094098ec3617">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta content="Login" property="og:title">
  <meta content="Login" property="twitter:title">
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
      <a href="./homepage.php" class="navbar-brand-3 w-nav-brand"><img src="img/autogo_logo.png" loading="lazy" alt="" class="image-5" style="width: 500px;"></a>
      <nav role="navigation" class="nav-menu-wrapper-3 w-nav-menu">
          <ul role="list" class="nav-menu-two-2 w-list-unstyled">
          <li>
              <a href="./homepage.php" class="nav-link-3">Home</a>
          </li>
          <li>
              <a href="./about.php" class="nav-link-3">About</a>
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
                      <a href="./accountInfo.php" class="nav-link-3"><img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" style="width: 40px; height: 40px"/></a>
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
  <div class="w-row">
    <div class="w-col w-col-6"><img src="images/3jjqle26oyqlppuy.jpg" loading="lazy" sizes="(max-width: 479px) 96vw, (max-width: 767px) 97vw, (max-width: 991px) 48vw, 49vw" srcset="images/3jjqle26oyqlppuy-p-500.jpg 500w, images/3jjqle26oyqlppuy-p-800.jpg 800w, images/3jjqle26oyqlppuy-p-1080.jpg 1080w, images/3jjqle26oyqlppuy.jpg 1280w" alt="" class="image-4"></div>
    <div class="column w-col w-col-6">
      <div class="container-2">
        <div class="section-title">
          <h2 class="text">LOGIN</h2>
          <div class="text-2">Welcome Back!</div>
        </div>
        <div class="form-wrapper w-form">
          <form id="webflow-form" name="webflow-form" data-name="Webflow Form" method="post" class="form-3" action="./login.php">
            <div class="input-wrapper"><label for="username" class="form-block-label">User Name</label><input type="text" class="form-text-input w-input" maxlength="256" name="username" data-name="Name" placeholder="Your user name" id="username"></div>
            <div class="input-wrapper"><label for="password" class="form-block-label">Password</label><input type="password" class="form-text-input-2 w-input" maxlength="256" name="password" data-name="Name" placeholder="Password" id="password"></div>
            <div class="input-wrapper"></div><input type="submit" value="Submit" data-wait="Logging in..." class="form-button w-button">
            <a href="./create.php" class="button-4 w-button">Don&#x27;t have an account? Click here to create an account!</a>
          </form>
          <div class="w-form-done">
            <div>Thank you! Your submission has been received!</div>
          </div>
          <div class="w-form-fail">
            <div>Oops! Something went wrong while submitting the form.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=644ae8923d92094098ec3617" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
