<?php
  // this php code checks if user is logged in
  session_start();
  if (isset($_SESSION['username'])){
    $username = "$_SESSION[username]";
  }
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['orderdelete'])){
      $selected = $_POST['orderdelete'];
      $conn = mysqli_connect("localhost", "root", "", "autogo");
      //$sql = "SELECT balance FROM accounts where account = $selected";
      $sql = "SELECT * FROM `reservations` WHERE `username`='$username'  ";
      $results = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($results);

      //$selected = $_POST['accountdelete'];
      echo "Order $selected has been deleted!<BR><BR>";
      $conn = mysqli_connect("localhost", "root", "", "autogo");
      $sql = "DELETE FROM `reservations` WHERE `confirm` = '$selected'";
      // convirmation order is confirm. we want to  deleted the $selected
      $result = $conn->query($sql);

      // set cars to available
      $sql = "UPDATE `cars` SET `available`='yes' WHERE 1";
      $result = $conn->query($sql);

    }


  if (isset($_POST['returning'])){
    $returning = $_POST['returning'];
    //echo "returning car: ".$returning;

      $conn = mysqli_connect("localhost", "root", "", "autogo");
      //$sql = "SELECT balance FROM accounts where account = $selected";
      $sql = "SELECT * FROM `reservations` WHERE `username`='$username'  ";
      $results = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($results);

      //$selected = $_POST['accountdelete'];
      echo "Order $returning has been returned!<BR><BR>";
      $conn = mysqli_connect("localhost", "root", "", "autogo");
      $returnval= "returned";
      $sql = "UPDATE `reservations` SET `option2`='$returnval' WHERE `confirm` = '$returning'";
      //UPDATE `reservations` SET `option2`='returned' WHERE `confirm`=
      // convirmation order is confirm. we want to  deleted the $selected
      $result = $conn->query($sql);



      // we want to set available to yes in car reservation
      /*
      $sql = "SELECT `license` FROM `reservations` WHERE `confirm` ='$returning'";
      $result = $conn->query($sql);
      while ($row = mysql_fetch_array($result))
      {
        $model = $row['license'];
      }
      $conn = mysqli_connect("localhost", "root", "", "autogo");
      */
      $sql = "UPDATE `cars` SET `available`='yes' WHERE 1";
      // the session[license] is the model name, we changed some things
      $result = $conn->query($sql);



    }
  }
 ?>



<!DOCTYPE html><!--  This site was created in Webflow. https://www.webflow.com  -->
<!--  Last Published: Sat May 06 2023 03:14:17 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="6451a8c92eebfa5839a89f9b" data-wf-site="644ae8923d92094098ec3617">
<head>
  <meta charset="utf-8">
  <title>Account Information</title>
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

  <style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f7f7f7;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
			color: #333;
		}
		table {
			border-collapse: collapse;
			width: 80%;
			margin: 0 auto;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0,0,0,0.1);
			border-radius: 5px;
			overflow: hidden;
			margin-top: 30px;
			margin-bottom: 50px;
		}
		th, td {
			padding: 12px 15px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #f2f2f2;
			color: #666;
		}
		td {
			color: #333;
		}
    .btn {
    display: inline-block;
    padding: 12px 24px;
    font-size: 16px;
    font-weight: 600;
    text-align: center;
    text-decoration: none;
    background-color: #d60e0e;
    color: #fff;
    border-radius: 4px;
    transition: background-color 0.2s ease-in-out;
  }

  .btn:hover {
    background-color: #d74f4f;
  }

  .nav-btn {
    margin-right: 16px;
  }

  .center {
  display: flex;
  justify-content: center;
  align-items: center;
}
.box {
			width: 750px;
			height: 300px;
			border: 2px solid black;
			background-color: lightgray;
			padding: 10px;
			text-align: center;
		}

#orderdelete {
  display: inline-block;

  padding: 10px;
  max-width: 560px;
  margin: 0 5%;
  text-align: center;
}

#returncar {
  display: inline-block;

  padding: 10px;
  max-width: 560px;
  margin: 0 5%;
  text-align: center;
}

h3 {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
}

h4 {
  font-size: 18px;
  margin-bottom: 10px;
}

select {
  padding: 10px;
  margin-bottom: 20px;
  width: 100%;
  border-radius: 4px;
  border: 1px solid #ccc;
}

input[type="submit"] {
  background-color: #d60e0e;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 4px;
  cursor: pointer;
}

	</style>
</head>
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

  <br>
  <br>
  <br>

  <div class="container-3">
     <div class="navbar-wrapper-3">
     <ul role="list" class="nav-menu-two-2 w-list-unstyled">
      <li>
        <a href="orders.php" class="btn nav-btn">Order Information</a>
      </li>
      <li>
        <a href="accountInfo.php" class="btn nav-btn">Account Information</a>
      </li>
    </ul>

    </div>
</div>

<!-- Remove a reservation -->
<form id="orderdelete" name="orderdelete" method="post" action="./orders.php">
  <div class = "box">
  <div class="center">
  <div id="orderdelete">
    <h3>Cancel Reservation:</h3>
    <h4><b>Select a reservation to cancel </b><BR>Only pending reservations can be cancelled</h4>
    <select name="orderdelete">
      <?php
      $conn = mysqli_connect("localhost", "root", "", "autogo");
      $sql = "SELECT * FROM `reservations` WHERE `username`='$username' AND `option2` = ''";
      $result = $conn->query($sql);
      foreach($result as $row) {
      ?>
      <option value="<?php echo $row['confirm']; ?>"><?php echo $row['confirm']; ?></option>
      <?php }?>
    </select>
    <input type="submit" name="delete" value="Cancel this Reservation">
  </div>
</form>

<form id="returning" name="returning" method="post" action="./orders.php">
  <div id="returning">
        <br><br><br>
       <h4> Select a car to return<h4>
        <select name="returning">
        <?php
          $conn = mysqli_connect("localhost", "root", "", "autogo");
          $sql = "SELECT * FROM `reservations` WHERE `username`='$username' AND `option2`='' ";
          $result = $conn->query($sql);
          foreach($result as $row){?>
        <option value="<?php echo $row['confirm']; ?>"><?php echo $row['confirm']; ?></option>
          <?php }?>
      </select>
    <input type="submit" value="Return this car ">
  </div>
  </div>
  </div>
</div>
</form>

  <?php
  if (isset($_SESSION['username'])){
            // checks username, and puts the table row into variables
            // prints out
                $conn = mysqli_connect("localhost", "root", "", "autogo");
                $sql = "SELECT * FROM `reservations` WHERE `username`='$username'  ";
                $result = $conn->query($sql);
                //$_SESSION['username']=$username;
                foreach($result as $row) {
                  $username = $row["username"];
                  $license = $row["license"];
                  $confirm = $row["confirm"];
                  $date = $row["date"];
                  $dateend = $row["dateend"];
                  $option1 = $row["option1"];
                  $option2 = $row["option2"];
                  $option3 = $row["option3"];
                  $pickup = $row["pickup"];
                  $returncar = $row["returncar"];
                  $total = $row["total"];

                  echo "<table>";
                  echo  "<tr>";
                  echo    "<th>Username</th>";
                  echo    "<th>".$username."</th>";
                  echo "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Car/Vehicle</th>";
                  echo    "<th>".$license."</th>";
                  echo "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Order number</th>";
                  echo    "<th>".$confirm."</th>";
                  echo  "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Date pickup</th>";
                  echo    "<th>".$date."</th>";
                  echo  "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Date return</th>";
                  echo    "<th>".$dateend."</th>";
                  echo  "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Location pickup</th>";
                  echo    "<th>".$pickup."</th>";
                  echo  "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Location return</th>";
                  echo    "<th>".$returncar."</th>";
                  echo  "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Insurance Option </th>";
                  echo    "<th>".$option1."</th>";
                  echo  "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Status</th>";
                  //echo    "<th>".$option2."</th>";

                  if ($option2 == ""){
                    echo "<th>Preparing reservation</th>";
                  }
                  else{
                    echo    "<th>".$option2."</th>";
                  }

                  /*
                  echo  "<tr/>";
                  echo  "<tr>";
                  echo    "<th>Option 3</th>";
                  echo    "<th>".$option3."</th>";
                  echo  "<tr/>";
                  */
                  echo  "<tr>";
                  echo    "<th>Total order</th>";
                  echo    "<th>".$total."</th>";
                  echo  "<tr/>";
                  echo"</table>";
                }
              }
              else {
                echo "You are not signed in !";
              }
            ?>


 </html>
