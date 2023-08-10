<?php
session_start();
  if (isset($_GET['option1'])) {
    $_SESSION['option1']=$_GET['option1'];
    $confirm = rand(10000,99999); // random number
    $confirm = "A".$confirm;
    $_SESSION['confirm'] = $confirm;
    header('Location: ./checkout-page.php');
  }
?>


<!DOCTYPE html>
<html data-wf-page="64349c658080478384fb1946" data-wf-site="641939e3ca3dd150d6a37597">
<head>
  <meta charset="utf-8">
  <title>Insurance</title>
  <meta content="Insurance" property="og:title">
  <meta content="Insurance" property="twitter:title">
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
  <div class="w-container"><img src="img/autogo_logo.png" loading="lazy" width="219" sizes="219px" srcset="img/autogo_logo-p-500.png 500w, img/autogo_logo.png 728w" alt="" class="image-3"></div>
  <div class="text-block-2"><strong>ADD-ONS OPTIONS</strong></div>
  <div class="columns f2wf-columns">
    <div class="column-3">
      <div class="intro-2">
        <div class="name">
          <div class="text">Silver</div>
        </div>
        <div class="pricing">
          <div class="_599-mo">$40/per day</div>
        </div>
        <a href="./insurance.php?option1=silver" target="_blank" class="button-6">
          <div class="text-4">SELECT</div>
        </a>
      </div>
      <div class="separator"></div>
      <div class="features"></div>
      <div class="features">
        <div class="pricing-feature">
          <div class="icon"><img src="https://uploads-ssl.webflow.com/64345be24eb545e54528d2c5/64349beb18f85a772d3d745e_Icon-Wrapper.svg" loading="lazy" width="24" height="24" alt="" class="icon-wrapper"></div>
          <div class="feature-item">Protect the car</div>
        </div>
        <div class="pricing-feature">
          <div class="icon"><img src="https://uploads-ssl.webflow.com/64345be24eb545e54528d2c5/64349beb18f85a772d3d745e_Icon-Wrapper.svg" loading="lazy" width="24" height="24" alt="" class="icon-wrapper"></div>
          <div class="feature-item">Protect yourself from liability</div>
        </div>
        <div class="pricing-feature">
          <div class="icon"><img src="https://uploads-ssl.webflow.com/64345be24eb545e54528d2c5/64349beb18f85a772d3d745e_Icon-Wrapper.svg" loading="lazy" width="24" height="24" alt="" class="icon-wrapper"></div>
          <div class="feature-item">Protect yourself and passenger</div>
        </div>
      </div>
    </div>
    <div class="column-2">
      <div class="intro-2">
        <div class="name">
          <div class="text">GOLD</div>
        </div>
        <div class="pricing">
          <div class="_599-mo">$50/per day</div>
        </div>
        <a href="./insurance.php?option1=gold" class="button-5">
          <div class="text-3">SELECT</div>
        </a>
      </div>
      <div class="separator"></div>
      <div class="features-2">
        <div class="pricing-feature-2">
          <div class="icon"><img src="https://uploads-ssl.webflow.com/64345be24eb545e54528d2c5/64349beb18f85a772d3d745e_Icon-Wrapper.svg" loading="lazy" width="24" height="24" alt="" class="icon-wrapper-2"></div>
          <div class="feature-item">Protect the car</div>
        </div>
        <div class="pricing-feature-2">
          <div class="icon"><img src="https://uploads-ssl.webflow.com/64345be24eb545e54528d2c5/64349beb18f85a772d3d745e_Icon-Wrapper.svg" loading="lazy" width="24" height="24" alt="" class="icon-wrapper-2"></div>
          <div class="feature-item">Protect yourself from liability</div>
        </div>
        <div class="pricing-feature-2">
          <div class="icon"><img src="https://uploads-ssl.webflow.com/64345be24eb545e54528d2c5/64349beb18f85a772d3d745e_Icon-Wrapper.svg" loading="lazy" width="24" height="24" alt="" class="icon-wrapper-2"></div>
          <div class="feature-item">Protect yourself and passenger</div>
        </div>
        <div class="pricing-feature-2">
          <div class="icon"><img src="https://uploads-ssl.webflow.com/64345be24eb545e54528d2c5/64349beb18f85a772d3d745e_Icon-Wrapper.svg" loading="lazy" width="24" height="24" alt="" class="icon-wrapper-2"></div>
          <div class="feature-item">Protect your belongings</div>
        </div>
        <div class="pricing-feature-2">
          <div class="icon"><img src="https://uploads-ssl.webflow.com/64345be24eb545e54528d2c5/64349beb18f85a772d3d745e_Icon-Wrapper.svg" loading="lazy" width="24" height="24" alt="" class="icon-wrapper-2"></div>
          <div class="feature-item">Free child seat</div>
        </div>
      </div>
    </div>
    <div class="column-3">
      <div class="intro-2">
        <div class="name">
          <div class="text">Bronze</div>
        </div>
        <div class="pricing">
          <div class="_599-mo">$30/per day</div>
        </div>
        <a href="./insurance.php?option1=bronze" target="_blank" class="button-6">
          <div class="text-4">SELECT</div>
        </a>
      </div>
      <div class="separator"></div>
      <div class="features">
        <div class="features">
          <div class="pricing-feature">
            <div class="icon"><img src="https://uploads-ssl.webflow.com/64345be24eb545e54528d2c5/64349beb18f85a772d3d745e_Icon-Wrapper.svg" loading="lazy" width="24" height="24" alt="" class="icon-wrapper"></div>
            <div class="feature-item">Protect the car</div>
          </div>
          <div class="pricing-feature">
            <div class="icon"><img src="https://uploads-ssl.webflow.com/64345be24eb545e54528d2c5/64349beb18f85a772d3d745e_Icon-Wrapper.svg" loading="lazy" width="24" height="24" alt="" class="icon-wrapper"></div>
            <div class="feature-item">Protect yourself and passenger</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <form method = "POST"><a href="./insurance.php?option1=none" class="button-7 w-button">None</a>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=641939e3ca3dd150d6a37597" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
