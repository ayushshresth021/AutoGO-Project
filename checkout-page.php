<?php
  session_start();
  if (isset($_GET['option1'])){
    $_SESSION['option1'] = $_GET['option1'];
    echo "option1 = ".$_GET['option1'];
  }

  // calculating prices based on car selection and insurance option

  $date1 = strtotime($_SESSION['date']);
  $date2 = strtotime($_SESSION['dateend']);
  $datediff = $date2-$date1;
  $datediff = round($datediff / (60 * 60 * 24));
  $datediff = $datediff + 1; // because may 15 - may 15 should be 1 day
  //echo "days: ".$datediff;

  if (isset($_SESSION['price'])){
    $total = ($datediff)*($_SESSION['price']);
  }
  else{
    $total = ($datediff)*(78);
  }
  if ($_SESSION['option1']=='gold'){
    $total =$total + 50*$datediff;
  }
  else if ($_SESSION['option1']=='silver'){
    $total =$total + 40*$datediff;
  }
  else if ($_SESSION['option1']=='bronze'){
    $total =$total + 30*$datediff;
  }
  //echo "Total: ".$total;
  $_SESSION['subtotal'] = $total;
  $total = round($total * 1.0925,2);
  $_SESSION['total'] = $total;






  if(isset($_SESSION['username'])){
    //echo "You are signed in.<BR>";
  }
  else {
    echo "You need to sign in to modify or cancel orders. <a href='./create.php'>Sign up!</a>";
  }
?>


<!DOCTYPE html>
<html data-wf-page="6434a92a0ef584ce850d74b5" data-wf-site="641939e3ca3dd150d6a37597">
<head>
  <meta charset="utf-8">
  <title>Checkout Page</title>
  <meta content="Checkout Page" property="og:title">
  <meta content="Checkout Page" property="twitter:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/car-e3b3bf.webflow.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">WebFont.load({  google: {    families: ["Droid Serif:400,400italic,700,700italic"]  }});</script>
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>
<body>
  <div class="contact-form-2 wf-section">
    <div class="container-3">
      <div class="section-title">
        <h2 class="get-in-touch">Payment Information</h2>
        <div class="text-6">Reservations must be cancelled prior to pick-up time or will be subject to a No-Show Fee. A valid credit card must be presented at the time of rental to complete the reservation.</div>
      </div>
      <div class="form-wrapper-2 w-form">
        <form action="./complete.php" id="CheckoutForms" name = "CheckoutForms" method="post" class = "form">
          <?php
          if (!isset($_SESSION['username'])){
            echo "<div class='input-wrapper'><label for='email' class='form-block-label'>Email (for guest checkout)</label>";
            echo "<input type='text' class='form-text-input w-input' maxlength='256' name='email' data-name='email' placeholder='email' id='email'></div>";
          }
            ?>
          <div class="input-wrapper"><label for="name" class="form-block-label">Card Name</label>
            <input type="text" class="form-text-input w-input" maxlength="256" name="name" data-name="Name" placeholder="Full Name" id="name"></div>
          <div class="input-wrapper"><label for="name" class="form-block-label">Card Number</label>
            <input type="text" class="form-text-input-3 w-input" maxlength="256" name="name" data-name="Name" placeholder="" id="name"></div>
          <div class="input-wrapper"><label for="name" class="form-block-label">Expiration Date</label>
            <input type="text" class="form-text-input w-input" maxlength="256" name="name" data-name="Name" placeholder="MM/YY" id="name"></div>
          <div class="input-wrapper"><label for="name" class="form-block-label">Billing Address</label>
            <input type="text" class="form-text-input-2 w-input" maxlength="256" name="name" data-name="Name" placeholder="Address" id="name"></div>
          <div class="input-wrapper-2"><label for="name" class="form-block-label">City</label>
            <input type="text" class="form-text-input-4 w-input" maxlength="256" name="name" data-name="Name" placeholder="" id="name"></div><label for="name" class="form-block-label">State</label><input type="text" class="form-text-input-5 w-input" maxlength="256" name="name" data-name="Name" placeholder="" id="name">
            <input type="submit" value="Create your reservation!">
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
  <div class="contact-form wf-section">
    <div class="container-2">
      <div class="section-title">
        <h2 class="get-in-touch">Order Summary</h2>
      </div>
      <div class="form-wrapper w-form">
        <form id="CheckoutForms" name="CheckoutForms" data-name="Form" method="get" class="form">
          <BR>Order Subtotal
          <BR>Your name : <?php
          if(isset($_SESSION['username'])){
            echo $_SESSION['username'];
          }
          else {
            echo "Enter your email for a guest checkout!";
          }
          ?>
          <BR>Confirmation number: <?php echo $_SESSION['confirm'];?>
          <BR>Car model: <?php echo $_SESSION['license'];?>
            <?php if(isset($_SESSION['price'])){
              echo ", $".$_SESSION['price']."/day";}?>

          <BR>Pick up location: <?php echo $_SESSION['pickup'];?>
          <BR>Drop off location: <?php echo $_SESSION['returncar'];?>
          <BR>Pick up time: <?php echo $_SESSION['date'];?>
          <BR>Drop off time: <?php echo $_SESSION['dateend'];?>
          <BR>Insurance option: <?php echo $_SESSION['option1'];?>
          <BR>Subtotal: <?php echo "$".$_SESSION['subtotal'].", taxes 9.25%: $".round(($_SESSION['subtotal'])*0.0925,2);?>
          <?php
          if ($datediff > 6){
            echo "<BR> 10% discount for renting for 7 or more days at a time!";
            $_SESSION['total'] = round(($_SESSION['total']), 2);
          }
          ?>
          <BR>Total: $<?php echo $_SESSION['total'];?>


          <!--
          <div class="input-wrapper"><label for="name" class="form-block-label">Name</label><input type="text" class="form-text-input w-input" maxlength="256" name="name" data-name="Name" placeholder="Your full name" id="name"></div>
          <div class="input-wrapper"><label for="name" class="form-block-label">Email</label><input type="text" class="form-text-input-2 w-input" maxlength="256" name="name" data-name="Name" placeholder="me@company.com" id="name"></div>
          <div class="input-wrapper"><label for="name" class="form-block-label">Phone Number </label></div>
          <input type="text" class="form-text-input w-input" maxlength="256" name="name" data-name="Name" placeholder="Your full name" id="name">
          -->
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
  <div class="w-container"><img src="img/autogo_logo.png" loading="lazy" width="510" sizes="(max-width: 767px) 100vw, 510px" srcset="img/autogo_logo-p-500.png 500w, img/autogo_logo.png 728w" alt="" class="image-4"></div>
  <div class="small-container">
    <div class="content">
      <div class="text-7">EST. TOTAL</div>
      <div class="text-8">$<?php echo $_SESSION['total'];?></div>
      <!--<a href="complete.php" class="button-8">
        <div class="text-9">SUBMIT</div>-->
      </a>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=641939e3ca3dd150d6a37597" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
</body>
</html>
