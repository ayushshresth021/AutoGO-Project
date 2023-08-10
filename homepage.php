<?php
  session_start();
  error_reporting(E_ALL ^ E_WARNING);
  $username = "$_SESSION[username]";
 ?>

<?php
    //Checking to see that all fields are filled before proceeding to next page
    if(isset($_POST['sub'])) {
        if( isset($_POST['pickup']) || isset($_POST['dropoff']) || isset($_POST['rentRange']) ) {
            $pickup = $_POST['pickup'];
            $dropoff = $_POST['dropoff'];
            $rentRange = $_POST['rentRange'];
            if($pickup && $dropoff && $rentRange) {
                $_SESSION['pickup'] = $pickup;
                $_SESSION['returncar'] = $dropoff;
                $_SESSION['date'] = explode(" - ", $rentRange)[0];
                $_SESSION['dateend'] = explode(" - ", $rentRange)[1];
                header('Location: ./transactions2.php');
            }
            else {
                header('Location: homepage.php');
            }
        }
        else {
            header('Location: homepage.php');
        }
    }
?>

<!DOCTYPE html>
<html data-wf-page="6451a8c92eebfa5839a89f9b" data-wf-site="644ae8923d92094098ec3617">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/homepage.css"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cardo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa+One&display=swap" rel="stylesheet">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Calendar API -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Map API -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <!-- Dropdown API -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Webflow Stuff -->
    <meta content="Homepage" property="og:title">
    <meta content="Homepage" property="twitter:title">
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
    <div class="banner">
        <h1>Book your ride, hit the road, and let the journey unfold.</h1>
        <img src="banner_img.png"/>   
    </div>
    <div class="info-container">
        <form name="myForm" action="homepage.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
            <label for="pickLoc">Pick-up Location</label>
            <select class="form-control" id="pickLoc" name="pickup">
                <option value="" disabled selected hidden>Select a location</option>
                <option value="San Francisco International Airport">San Francisco International Airport</option>
                <option value="San Jose International Airport">San Jose International Airport</option>
                <option value="Los Angeles International Airport">Los Angeles International Airport</option>
                <option value="AutoGo Car Rental - Sunnyvale">AutoGo Car Rental - Sunnyvale</option>
                <option value="AutoGo Car Rental - Sacramento">AutoGo Car Rental - Sacramento</option>
                <option value="AutoGo Car Rental - San Diego">AutoGo Car Rental - San Diego</option>
                <option value="AutoGo Car Rental - Santa Rosa">AutoGo Car Rental - Santa Rosa</option>
            </select>
            </div>
            <div class="form-group">
            <label for="dropLoc">Drop-off Location</label>
            <select class="form-control" id="dropLoc" name="dropoff">
                <option value="" disabled selected hidden>Select a location</option>
                <option value="San Francisco International Airport">San Francisco International Airport</option>
                <option value="San Jose International Airport">San Jose International Airport</option>
                <option value="Los Angeles International Airport">Los Angeles International Airport</option>
                <option value="AutoGo Car Rental - Sunnyvale">AutoGo Car Rental - Sunnyvale</option>
                <option value="AutoGo Car Rental - Sacramento">AutoGo Car Rental - Sacramento</option>
                <option value="AutoGo Car Rental - San Diego">AutoGo Car Rental - San Diego</option>
                <option value="AutoGo Car Rental - Santa Rosa">AutoGo Car Rental - Santa Rosa</option>
            </select>
            </div>
            <div class="form-group">
            <label for="rentRange">Rental Dates</label>
            <input class="form-control" type="text" id="rentRange" name="rentRange" placeholder="Select rental dates" />
            </div>
            <div class="choosecar">
                <button type="submit" class="btn" name="sub">Choose your car!</button>
            </div>
        </form>
    </div>
    <script>
        $(function(){
            $('input[name="rentRange"]').daterangepicker({
                opens: 'left',
                "minDate": moment()
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
    <div class="our-locations"><h1>Our Locations</h1></div>
    <div id="map"></div>
    <script>
        var map = L.map('map').setView([37.875255, -120.101326], 6);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var sfo = L.marker([37.62849461978403, -122.40038974457457], {title: 'SFO Int. Airport'}).addTo(map);
        var sj = L.marker([37.36537254130734, -121.92265044091677], {title: 'SJ Int. Airport'}).addTo(map);
        var la = L.marker([33.95562282727402, -118.38545670331429], {title: 'LA Int. Airport'}).addTo(map);
        var sunnyvale = L.marker([37.36332712789239, -122.027683631124], {title: 'Sunnyvale Location'}).addTo(map);
        var sac = L.marker([38.59081825227345, -121.48249357895044], {title: 'Sacramento Location'}).addTo(map);
        var sanDiego = L.marker([32.737733769001046, -117.17511466157211], {title: 'San Diego Location'}).addTo(map);
        var santaRosa = L.marker([38.42727221566011, -122.71367374644063], {title: 'Santa Rosa Location'}).addTo(map);
    </script>

    <script>
        $(document).ready(function() {
            $('#pickLoc').select2();
            $('#dropLoc').select2();
        });
    </script>
    <!-- Alert if one or more fields are not filled -->
    <script>
        function validateForm(){
            if( document.forms["myForm"]["pickup"].value == '' || document.forms["myForm"]["dropoff"].value == '' || document.forms["myForm"]["rentRange"].value == ''){
                alert('One or more fields are incomplete!');
                return false;
            }
            else {
                return true;
            }
        }
    </script>
</body>
</html>
