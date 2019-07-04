<html>
   <head>
      <title>Manage Products </title>
   </head>
   
   <body>
      <h1>Manage Products 

      </h1> 
    
</html>
</html>
<?php // manageProduct.php
  require_once 'hhh3login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['delete']) && isset($_POST['productId'])) {
    $productId = get_post($conn, 'productId');
    $query  = "DELETE FROM Products WHERE productId='$productId'";
    $result = $conn->query($query);
    if (!$result)
      echo "DELETE failed: $query<br>" . $conn->error . "<br><br>";
  }

  if (isset($_POST['maker'])   &&
      isset($_POST['productId'])    &&
      isset($_POST['type'])) {
    $maker   = get_post($conn, 'maker');
    $productId    = get_post($conn, 'productId');
    $type = get_post($conn, 'type');


    $query = "INSERT INTO Products (maker, productId, type) VALUES" .
      "('$maker', '$productId', '$type')";
    $result   = $conn->query($query);
    if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  echo <<<_END
  <form action="deleteCheck.php" method="post"><pre>
    Maker: 	<input type="text" name="maker">
    ProductId: 	<input type="text" name="productId">
	Type: 	<input type="text" name="type">
           <input type="submit" value="ADD PRODUCT">
  </pre></form>
  
  <a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a>
_END;

  $query  = "SELECT * FROM Products";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
  <pre>
     Maker: $row[0]
     ProductId: $row[1]
     Type: $row[2]
      </pre>
  <form action="deleteCheck.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="productId" value="$row[1]">
  <input type="submit" value="DELETE"> <a href="editProduct.php">Edit Product</a> 
</form>
_END;
  }
  
  $result->close();
  $conn->close();

  function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }

?>