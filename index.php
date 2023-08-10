<?php
session_start();
// If we select the locations and dates, go ahead and store into session variables.
// move to next page, transactions2.php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['pickup'] = $_POST["pickup"];
    $_SESSION['returncar'] = $_POST["dropoff"];
    $_SESSION['date'] = $_POST["date"];
    $_SESSION['dateend'] = $_POST["dateend"];
    echo "<BR>pick location:".$_SESSION['pickup'];
    echo "<BR>drop off location:".$_SESSION['returncar'];
    echo "<BR>Pick up date:".$_POST['date'];
    echo "<BR>Drop off date:".$_POST['dateend'];
    header('Location: /transactions2.php');
  }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="homepage.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendor/daterangepicker/daterangepicker.css">
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
    <title>AutoGo</title>
</head>
<body>
    <div class="bg_img"></div>
    <div class="navbar">
        <div class="logo">
          <img src="images/autogo_logo.png" class="center" loading="lazy" sizes="200px" srcset="images/autogo_logo-p-500.png 500w, images/autogo_logo.png 728w" alt="">
            <!--<img src="./img/autogo_logo.png" alt="logo"/>-->
        </div>
        <div class="nav">
            <a href="./contact.html">Contact</a>
            <a href="./contact.html">Contact</a>
            <a href="./contact.html">Contact</a>
        </div>
        <?php
        //session_start();
        if (!isset($_SESSION['username'])){
        echo "<div class='user_info'>
            <a href='./login.php'>Login</a>
            <a href='./create.php'>Sign Up</a>
        </div>";
        }
        else {
          echo "Your are logged in already!";
        }
        ?>
    </div>
    <div class="infoContainer">
        <form action="index.php" method="post">
            <fieldset>
                <legend>
                    Pick-Up & Drop-Off Information
                </legend>
                <label for="pickup">Pick-up Location:</label>
                <select id="pickup" style="width:350px" name="pickup">
                    <option value="" disabled selected hidden>Choose a pick up location</option>
                    <option value="San Francisco International Airport">San Francisco International Airport</option>
                    <option value="San Jose International Airport">San Jose International Airport</option>
                    <option value="Los Angeles International Airport">Los Angeles International Airport</option>
                    <option value="AutoGo Car Rental - Sunnyvale">AutoGo Car Rental - Sunnyvale</option>
                    <option value="AutoGo Car Rental - Sacramento">AutoGo Car Rental - Sacramento</option>
                    <option value="AutoGo Car Rental - San Diego">AutoGo Car Rental - San Diego</option>
                    <option value="AutoGo Car Rental - Santa Rosa">AutoGo Car Rental - Santa Rosa</option>
                </select>
                <label for="dropoff"><br>Drop-off Location:</label>
                <select id="dropoff" style="width:350px" name="dropoff">
                    <option value="" disabled selected hidden>Choose a pick up location</option>
                    <option value="San Francisco International Airport">San Francisco International Airport</option>
                    <option value="San Jose International Airport">San Jose International Airport</option>
                    <option value="Los Angeles International Airport">Los Angeles International Airport</option>
                    <option value="AutoGo Car Rental - Sunnyvale">AutoGo Car Rental - Sunnyvale</option>
                    <option value="AutoGo Car Rental - Sacramento">AutoGo Car Rental - Sacramento</option>
                    <option value="AutoGo Car Rental - San Diego">AutoGo Car Rental - San Diego</option>
                    <option value="AutoGo Car Rental - Santa Rosa">AutoGo Car Rental - Santa Rosa</option>
                </select>
                <label for "date"><BR>Pick up date: <input type="date" select id="date" name="date">
                <label for "dateend"><BR>Drop off date: <input type="date" select id="dateend" name="dateend">
                <!--<label><br>Rental Dates: <input type="text" name="rentRange"/></label>-->
            </fieldset>
            <input type="submit" value="Choose your car!">
        </form>

        <div class="choosecar">
            <a href="./transactions2.php">Choose your car!</a>
        </div>
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

    <div id="map" style="
        height: 50%;
        width: 30%;
        display: flex;
        top: 30%;
        left: 9%;
        align-items: center;
        justify-content: space-between;
        position: absolute;
    "></div>
    <script>
        var map = L.map('map').setView([37.875255, -120.101326], 5);

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
            $_SESSION['pickup'] = $('#pickLoc').select2();

            $('#dropLoc').select2();
            $_SESSION['returncar'] = $('#dropLoc').select2();


        });
    </script>


</body>
</html>
