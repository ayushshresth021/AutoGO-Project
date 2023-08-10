<?php
  session_start();
  $username = "$_SESSION[username]";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["cars"]) && isset($_POST["option1"]))
    {

      echo "Your order sub-total<BR>";
      $confirm = rand(10000,99999); // random number
      $confirm = "A".$confirm;
      $license = $_POST["cars"];
      $option1 = $_POST["option1"];
      $pickup = $_SESSION['pickup'];
      $returncar = $_SESSION['returncar'];
      $date = $_SESSION['date'];
      $dateend = $_SESSION['dateend'];
      $total = 78;


      $_SESSION['confirm'] = $confirm;
      $_SESSION['license'] = $license;
      $_SESSION['option1'] = $option1;
      $_SESSION['total'] = $total;


      echo "Order number: ".$confirm;
      echo "<BR>";
      echo "car option: ".$license;
      echo "<BR>";
      echo "pick up date: ".$date;
      echo "<BR>";
      echo "drop off date ".$dateend;
      echo "<BR>";
      echo "insurance option: ".$option1;
      echo "<BR>";
      echo "customer (username): ".$username;
      echo "<BR>";
      echo "Pick up location: ".$pickup;
      echo "<BR>";
      echo "The total cost is: ".$total;

      header('Location: /checkout-page.php');

      $conn = mysqli_connect("localhost", "root", "", "autogo");

      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $sql = "INSERT INTO reservations (username, confirm, license, option1, pickup, returncar, total)  VALUES ('$username', '$confirm', '$license', '$option1', '$pickup', '$returncar', '$total' );";
      $results = mysqli_query ($conn, $sql);
      if ($results){
        echo "<BR><BR>Your reservation has been created.";
      } else {
        echo mysqli_error($conn);
      }


      
    }
  }

?>

<html>
  <head.
    <title>Transaction (continued)</title>
  </head>
  <body>


  </body>
</html>
