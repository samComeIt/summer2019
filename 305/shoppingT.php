<html>
   <head>
      <title>Shopping Products </title>
   </head>
   
   <body>
      <h1>Shopping Products 

      </h1> 
    
</html>
</html>
<?php // manageProduct.php
  require_once 'hhh3login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  include('sessionCart.php');
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['add']) && isset($_POST['numberofItem'])&& isset($_POST['productId'])) {
	  $productId = get_post($conn, 'productId');
    $numberofItem = get_post($conn, 'numberofItem');
    $query  = "INSERT INTO Cart(productId, clienId, cost, numberofItem) VALUES 
	('$productId','$login_session', '$cost','$numberofItem')";
    $result = $conn->query($query);
    if (!$result)
      echo "DELETE failed: $query<br>" . $conn->error . "<br><br>";
  }

  if (isset($_POST['maker'])   &&
      isset($_POST['productId'])    &&
      isset($_POST['type'])&&
      isset($_POST['stockId'])&&
      isset($_POST['quantity'])) {
    $maker   = get_post($conn, 'maker');
    $productId    = get_post($conn, 'productId');
    $type = get_post($conn, 'type');
	$stockId = get_post($conn, 'stockId');
$quantity = get_post($conn, 'quantity');

    $query = "INSERT INTO Products (maker, productId, type) VALUES" .
      "('$maker', '$productId', '$type')";
    $result   = $conn->query($query);
	$query = "INSERT INTO productStock (productId,stockId,quantity) VALUES" .
      "('$productId', '$stockId', '$quantity')";
    $result   = $conn->query($query);
    if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }
	   
	   
	   
  echo <<<_END
  <a href="welcomeClient.php">Go back to Admin page</a> 
  <a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a>
_END;

  $query  = "SELECT productId, cost, quantity FROM TV T, Cart C WHERE T.productId = C.productId";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
  <pre>
     Model Name: $row[0]
     Price: $$row[1]
     numberofItem: <input type="text" name="numberofItem">
	 
      </pre>
  <form action="shoppingT.php" method="post">
  <form action="shoppingT.php" method="post">
  <input type="hidden" name="add" value="yes">
  <input type="hidden" name="productId" value="$row[0]">
  <input type="submit" value="Add Cart">
</form>
_END;
  }
  
  $result->close();
  $conn->close();

  // real_escape_string to strip out any characters that a hacker
  // may have inserted.
  function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }

?>