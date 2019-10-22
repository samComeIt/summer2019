<?php	//manageQuantity.php
  require_once 'hhh3login.php';
  include('session.php');
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
      
  
	$query  = "SELECT productId,SUM(numberofItem) FROM Cart GROUP BY productId";
	
  //$query  = "SELECT productId,SUM(numberofItem) FROM Cart GROUP BY productId";
  //$query  = "SELECT C.productId,cost FROM Cart C, Products P WHERE C.productId = P.productId";
  //,Products P, TV, Fridge F, Washer W WHERE C.productId=TV.productId OR C.productId=F.productId OR C.productId=W.productId;";
  
  /*$query = SELECT C.productId, FROM Cart C, Product P, TV, Fridge F, Washer W
INNER JOIN Product ON C.productId=TV.productId OR C.productId=F.productId OR C.productId=W.productId;*/

  $result = $conn->query($query);
 
  
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
  <pre>
Product ID: $row[0]
Number of Items: $row[1]
	 
      </pre>
  <form action="purchaseCart.php" method="post">
  <form action="purchaseCart.php" method="post">
  
</form>
_END;
  }
  
  if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myproductId = mysqli_real_escape_string($conn,$_POST['productId']);
      //$mysumI = mysqli_real_escape_string($conn,$_POST['numberofItem']);
	  
	  //$sql = "SELECT SUM(numberofItem) FROM Cart WHERE productId = '$mysumI'";
      $sql = "SELECT productId FROM Cart WHERE productId = '$myproductId'";
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