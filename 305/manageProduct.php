<html>
   <head>
      <title>Manage Products </title>
   </head>
   
   <body>
       <h1><div style="text-align:center">Manage Products </div>

      </h1> 
    
</html>
</html>
<?php // manageProduct.php
  require_once 'hhh3login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
echo "<div style=\"text-align:center\">";

  if (isset($_POST['delete']) &&  
      isset($_POST['type']) && 
      isset($_POST['productId'])) {

    $productId = get_post($conn, 'productId');
    $type = get_post($conn, 'type');
	
	$query  = "DELETE FROM '$type' WHERE productId='$productId'";
    $result   = $conn->query($query);
	
	$query  = "DELETE FROM Products WHERE productId='$productId'";
    $result   = $conn->query($query);
	
	$query  = "DELETE FROM productStock WHERE productId='$productId'";
	$result   = $conn->query($query);
	  
    if (!$result)
      echo "DELETE failed: $query<br>" . $conn->error . "<br><br>";
  }




  if (isset($_POST['maker'])   &&
      isset($_POST['productId'])    &&
      isset($_POST['type'])&&
      isset($_POST['cost'])&&
      isset($_POST['stockId'])&&
      isset($_POST['quantity'])) {
    $maker   = get_post($conn, 'maker');
    $productId    = get_post($conn, 'productId');
    $type = get_post($conn, 'type');
    $cost = get_post($conn, 'cost');
	$stockId = get_post($conn, 'stockId');
    $quantity = get_post($conn, 'quantity');
	
	$query1 = "SELECT productId FROM Products WHERE productId='$productId'";
	$result1   = $conn->query($query1);
	$rows1 = $result1->num_rows;
	$query2 = "SELECT stockId FROM productStock WHERE stockId='$stockId'";
	$result2   = $conn->query($query2);
	$rows2 = $result2->num_rows;
	
	if(empty($maker) || empty($productId) || empty($type) || empty($cost) || empty($stockId) || 
    empty($quantity)){
    echo "You did not fill out all the fields.";
  }  
  else{
    if ($rows1==1){ echo "Model Name '$productId' already Exist";
    }else if($rows2==1){ echo "Stock ID '$stockId' already Exist";
	}
    else{
      $query = "INSERT INTO Products (maker, productId, type, cost) VALUES" .
     "('$maker', '$productId', '$type', '$cost')";
    $result   = $conn->query($query);
	$query = "INSERT INTO $type (productId, cost, maker) VALUES".
	"('$productId', '$cost', '$maker' )";
      $result   = $conn->query($query);
	 if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>"; 

	  $query = "INSERT INTO productStock (productId,stockId,quantity) VALUES" .
      "('$productId', '$stockId', '$quantity')";
    $result   = $conn->query($query);

    if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
    } 
  }
 
  }
	   
	   
	   
  echo <<<_END
  <form action="manageProduct.php" method="post"><pre>
Maker:  <input type="text" name="maker">
  Model Name:<input type="text" name="productId">
  Cost:     $<input type="text" name="cost">
  Product Type: <td><input type="radio" name="type" value="AC"/>AC</td><td><input type="radio" name="type" value="Fridge"/>Fridge</td><td><input type="radio" name="type" value="Washer"/>Washer</td><td><input type="radio" name="type" value="TV"/>TV</td>
  Stock ID:<input type="text" name="stockId">
  Quantity:<input type="text" name="quantity">
           <input type="submit" value="ADD PRODUCT">

 
  </pre></form>
  <a href="welcomeAdmin.php">Go back to Admin page</a> 
  <a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a>
_END;

/*
 <p>List Box - Type<br>
  <select name="listbox" size="4">
  <option value="Option 1" selected>AC</option>
  <option value="Option 2">Fridge</option>
  <option value="Option 3">TV</option>
  <option value="Option 4">Washer</option>
  </select>
</p>
*/

  $query  = "SELECT * FROM Products ORDER BY type";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
  <pre>
     Maker: $row[0]
     Model Name: $row[1]
     Type: $row[2]
      </pre>
  <form action="manageProduct.php" method="post">
  <form action="manageProduct.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="productId" value="$row[1]">
  <input type="hidden" name="type" value="$row[2]">
  <input type="submit" value="DELETE">
</form>
_END;;
  }
  
  $result->close();
  $conn->close();

  function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }

?>