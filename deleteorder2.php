<?php
  session_start();
  $username = "$_SESSION[username]";
  /*
  have session_start(); on every page. $_SESSION[username] is saved when logged in, need for many functions
  We'll put the username back into $username, easier to use.
  */
 ?>

<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles2.css">
    <title>Autogo Cancel Reservation</title>
  </head>

  <body>

<!-- Top of bar box. Designed with CSS flexdispalays.  -->
      <div class = "topBox">
        <div class = "leftBoxL">
          <button class="toplink"><a href="index.php" id="topcolor">Autogo</a></button>
        </div>
        <div class = "buttonGroup">

          <div class = "buttonGroup">
            <div class = "rightBoxR">
              <button class="toplink"><a href="index.php" id="topcolor">Logout</a></button>
            </div>
          </div>

      </div>
    </div>

<!-- Delete Account php code here  -->


    <?php
    $selected = $_POST['orderdelete'];
    $conn = mysqli_connect("localhost", "root", "", "autogo");
    //$sql = "SELECT balance FROM accounts where account = $selected";
    $sql = "SELECT * FROM `reservations` WHERE `username`='$username'  ";
    $results = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($results);

      //$selected = $_POST['accountdelete'];
      echo "Order $selected has been deleted.<BR>";
      $conn = mysqli_connect("localhost", "root", "", "autogo");
      $sql = "DELETE FROM `reservations` WHERE `confirm` = '$selected'";
      // convirmation order is confirm. we want to  deleted the $selected
      $result = $conn->query($sql);
    ?>



      </body>
    </html>
