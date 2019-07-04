<html>
   <head>
      <title>Add TV Products </title>
   </head>
   
   <body>
       <h1><div style="text-align:center">Add TV Products </div>

      </h1> 
    
</html>
</html>
<?php // manageProduct.php
  include('session.php');
   include('sessionTv.php'); 
  require_once 'hhh3login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
echo "<div style=\"text-align:center\">";
   
   $sdt=date("Y-m-d");
   $future=date("Y-m-d", time()+7776000);
	  
  if (isset($_POST['productId'])&&
      isset($_POST['numberofItem'])
     
     ) {
    
    $productId    = get_post($conn, 'productId');
	$numberofItem= get_post($conn, 'numberofItem');
	/*$cost = "SELECT cost FROM Products WHERE productId = '$productId'";
	$result   = $conn->cost($cost);
	*/
    $query = "INSERT INTO Cart2 (productId, clientId, orderDate, cost, numberofItem) VALUES('$productId', '$login_session', '$future','$cost','$numberofItem' )";
    $result   = $conn->query($query);
   //$query = "UPDATE productStock SET quantity = quantity-'$numberofItem' WHERE productId='$productId'";
   // $result   = $conn->query($query);

   /*$query = "UPDATE Cart SET numberofItem = SUM(numberofItem) WHERE productId='$productId'";
    $result   = $conn->query($query);*/
//    $query = "SELECT SUM(numberofItem) FROM Cart GROUP BY productId";
//    $result   = $conn->query($query);
  /*  $query = "SELECT productId, orderDate,SUM(numberofItem) FROM Cart2 GROUP BY productId, orderDate";

    $result   = $conn->query($query);*/
   
    if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }
      
      
      
  echo <<<_END
  <form action="TV.php" method="post"><pre>
   Enter Model Name:         <input type="text" name="productId">
   Enter Number of Items:    <input type="text" name="numberofItem">

           <input type="submit" value="ADD CART">
  </pre></form>
  <a href="welcome.php">Go back to Client page</a> 
  <a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a>
_END;

  $query  = "SELECT * FROM Products WHERE type ='tv'";
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
     cost: $$row[3]
	 
      </pre>
  <form action="TV.php" method="post">
  <form action="TV.php" method="post">
  
</form>
_END;
  }
  $result->close();
  $conn->close();


  function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }

?>