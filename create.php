<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /*
    echo "<BR>username: ".$_POST["userid"];
    echo "<BR>pass: ".$_POST["pass"];
    echo "<BR>name: ".$_POST["name"];
    echo "<BR>last name: ".$_POST["name-2"];
    echo "<BR>phone: ".$_POST["phone"];
    echo "<BR>email: ".$_POST["email"];
    echo "<BR>address: ".$_POST["address"]."<BR>";
    */
    if (isset($_POST["userid"]) && isset($_POST["pass"]) && isset($_POST["name"]) && isset($_POST["name-2"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["address"]))
    {
      $username = $_POST["userid"];
      $password = $_POST["pass"];
      $firstname = $_POST["name"];
      $lastname = $_POST["name-2"];
      $phone = $_POST["phone"];
      $email = $_POST["email"];
      $address = $_POST["address"];

      // Create connection
      $conn = mysqli_connect("localhost", "root", "", "autogo");

      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      //login user
      // $sql = "INSERT  creditcard (creditCardNumber, pin) VALUES ('$creditCardNumber', '$pin')";
      $sql = "INSERT INTO users (username, password, firstname, lastname, phone, email, address) VALUES ('$username', '$password', '$firstname', '$lastname', '$phone', '$email', '$address');";
      $results = mysqli_query ($conn, $sql);

      if ($results){
        echo "The user has been added.";
      } else { echo "something went wrong.<BR>";
        echo mysqli_error($conn);
      }
    }
    else
    {
        $error_message = "Missing input";
    }
  }
?>



<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Sat May 06 2023 03:14:17 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="6451ad8f588f28ce3b7a46b5" data-wf-site="644ae8923d92094098ec3617">
<head>
  <meta charset="utf-8">
  <title>Signup</title>
  <meta content="Signup" property="og:title">
  <meta content="Signup" property="twitter:title">
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
  <div class="navbar-logo-left-2 wf-section">
    <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar-logo-left-container-2 shadow-three w-nav">
      <div class="container-3">
        <div class="navbar-wrapper-3">
          <a href="#" class="navbar-brand-3 w-nav-brand"><img src="img/autogo_logo-p-500.png" loading="lazy" alt="" class="image-5"></a>
          <nav role="navigation" class="nav-menu-wrapper-3 w-nav-menu">
            <ul role="list" class="nav-menu-two-2 w-list-unstyled">
              <li>
                <a href="homepage.php" class="nav-link-3">Home</a>
              </li>
              <li>
                <a href="#" class="nav-link-3">About</a>
              </li>
              <li class="mobile-margin-top-12">
                <a href="login.php" class="button-2 w-button">Login</a>
              </li>
            </ul>
          </nav>
          <div class="menu-button-3 w-nav-button">
            <div class="w-icon-nav-menu"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="columns-2 w-row">
    <div class="w-col w-col-6">
      <div class="container-2">
        <div class="section-title">
          <h2 class="text">Create Account</h2>
          <div class="text-2">Welcome to autoGo!</div>
        </div>
        <div class="form-wrapper w-form">
        <form id="webflow-form" name="webflow-form" data-name="Webflow Form" method="post" action="create.php" class="form-3">
          <div class="input-wrapper"><label for="email" class="form-block-label">Email</label><input type="email" class="form-text-input w-input" maxlength="256" name="email" data-name="email" placeholder="Enter your email" id="email"></div>
          <div class="input-wrapper"><label for="userid" class="form-block-label">UserId</label><input type="userid" class="form-text-input w-input" maxlength="256" name="userid" data-name="userid" placeholder="Enter a user name" id="userid"></div>
          <div class="input-wrapper"><label for="pass" class="form-block-label">Password</label><input type="pass" class="form-text-input-2 w-input" maxlength="256" name="pass" data-name="pass" placeholder="Password" id="pass"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"><required/></div>
          <div class="input-wrapper"><label for="name" class="form-block-label">First Name</label><input type="name" class="form-text-input w-input" maxlength="256" name="name" data-name="name" placeholder="First Name" id="name"></div>
          <div class="input-wrapper"><label for="name-2" class="form-block-label">Last Name</label><input type="name-2" class="form-text-input w-input" maxlength="256" name="name-2" data-name="name-2" placeholder="Last Name" id="name-2"></div>
          <div class="input-wrapper"><label for="phone" class="form-block-label">Phone Number</label><input type="phone" class="form-text-input w-input" maxlength="256" name="phone" data-name="phone"  id="phone"pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890"></div>
          <div class="input-wrapper"><label for="address" class="form-block-label">Address</label><input type="address" class="form-text-input w-input" maxlength="256" name="address" data-name="address" placeholder="Address" id="address"></div>
            <div class="input-wrapper"></div><input type="submit" value="Submit" data-wait="Waiting..." class="form-button w-button">
            <a href="login.php" class="button-4 w-button">Already a customer? Click here to Login!</a>
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
    <div class="w-col w-col-6"><img src="images/photo-1564188537512-f6bd010d1e2a.jpeg" loading="lazy" sizes="100vw" srcset="images/photo-1564188537512-f6bd010d1e2a-p-500.jpeg 500w, images/photo-1564188537512-f6bd010d1e2a-p-800.jpeg 800w, images/photo-1564188537512-f6bd010d1e2a.jpeg 1000w" alt=""></div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=644ae8923d92094098ec3617" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
