<html>
<body style="background-color:#F0F8FF">
   <head>
   <div style="text-align:center">
      <title>View My Order </title>
	  <style>
	  li {
		 display: inline-block;
			margin-right:10px;		 
		color:#B0C4DE;
		background-color:#AEE0C5;
	  }
	  </style>
   </head>
   
   </body>
   <header>
   <nav>
   <li><h3><a href="welcome.php">Go back to Client page</a></h3></li>
   <li></li>
       <h1>View My Order</h1> </div>
</html>
<?php	//manageQuantity.php
  require_once 'hhh3login.php';
  include('session.php');

  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  echo "<div style=\"text-align:center\">";
  
if (isset($_POST['delete']) && isset($_POST['productId'])) {
    $productId = get_post($conn, 'productId');
    $query  = "DELETE FROM Cart2 WHERE productId='$productId'";
    $result = $conn->query($query);
    if (!$result)
      echo "DELETE failed: $query<br>" . $conn->error . "<br><br>";
  }
	   
  echo <<<_END
  <form action="orderPage.php" method="post"><pre>

_END;

  $query  = "SELECT C.productId, C.orderDate,C.periodId,SUM(numberofItem), cost FROM Cart2 C GROUP BY C.productId, C.orderDate,C.periodId";
 
  //$query = "SELECT productId,clientId,orderDate, cost, SUM(numberofItem) FROM Cart2 GROUP BY productId";
  //$query = "SELECT deliveryId, deliveryDate, address, currStatus FROM Shipping WHERE clientId = '$login_session'";
  $query = "SELECT * FROM Shipping WHERE clientId = '$login_session'";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
    echo <<<_END
 <pre>
Delivery Code: $row[1]
Ordered Date: $row[2]
Address: $row[3]
Current Status: $row[4]</pre>
_END;
  }
  
  if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myproductId = mysqli_real_escape_string($conn,$_POST['productId']);
      //$mysumI = mysqli_real_escape_string($conn,$_POST['numberofItem']);
	  
	  //$sql = "SELECT SUM(numberofItem) FROM Cart WHERE productId = '$mysumI'";
	  
      $sql = "SELECT productId FROM Cart2 WHERE productId = '$myproductId'";
      $result = mysqli_query($conn,$sql);
      $count = $result->num_rows;

      if($count >0) {
         $_SESSION['edit_cart'] = $myproductId;
         
         header("location: welcomeC.php");
      }else {
         $error = "Your Product ID is invalid";
      }
   }
  
  $result->close();
  $conn->close();

  // real_escape_string to strip out any characters that a hacker
  // may have inserted.
  function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }

?>