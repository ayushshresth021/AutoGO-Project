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


            <form id="orderdelete" name="orderdelete" method="post" action="deleteorder2.php">
              <div id="orderdelete">
                        <!--<form method="post" action="accountDeleted.php">-->
                            <h3>Reservation List:</h3>
                            Select a reservation to cancel
                            <BR>
                            <select name="orderdelete">

                              <?php
                              $conn = mysqli_connect("localhost", "root", "", "autogo");
                              $sql = "SELECT * FROM `reservations` WHERE `username`='$username'  ";
                              $result = $conn->query($sql);
                              foreach($result as $row){?>
                                <option value="<?php echo $row['confirm']; ?>"><?php echo $row['confirm']; ?></option>
                              <?php }?>
                            </select>
                        <input type="submit" name="delete" value="Cancel this Reservation ">
                        </div>
                        </form>



<!--DELETE FROM `accounts` WHERE `account` = $accountdelete -->

      </body>
    </html>
