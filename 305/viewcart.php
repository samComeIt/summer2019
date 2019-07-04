<html>
   <head>
      <title>View Cart </title>
   </head>
   
   <body>
       <h1><div style="text-align:center">View Cart </div>
		
      </h1> 
    
</html>
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
  <form action="viewCart.php" method="post"><pre>
  Model Name: 	<input type="text" name="productId">
  <input type="submit" value="EDIT SELECTED ITEM ">
  </pre></form>
  <a href="welcome.php">Go back to Client page</a> 
  <a href="payment.php">Purchase</a> 
  <a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a>
   
_END;
  $query = "SELECT * FROM Cart2 WHERE clientId = '$login_session'";
  $result = $conn->query($query);
$query1 = "SELECT * FROM Discount";
$result1 = $conn->query($query1);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  $rowsD = $result1->num_rows;
  $sum=0;
  $after_discount;
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
    $sum += $row[5];
	//$after_discount=0;

    echo <<<_END
  <pre>
     Model Name: $row[0]
	 Cost: $$row[3]
	 Number of Items: $row[4]
      </pre>
  <form action="viewCart.php" method="post">
  <form action="viewCart.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="productId" value="$row[0]">
  <input type="hidden" name="numberofItem" value="$row[4]">
  <input type="hidden" name="totalAmount" value="$row[5]">
  <input type="submit" value="DELETE">
</form>
_END;
  }
  for ($j = 0 ; $j < $rowsD ; ++$j) {
    $result1->data_seek($j);
    $rowD = $result1->fetch_array(MYSQLI_NUM);
echo <<<_END
  <pre>
Discount $rowD[3]% when spending at least $$rowD[0]
      </pre>
</form>
_END;
  }

 
  if($sum >= 15000){
	$sql=mysqli_fetch_assoc(mysqli_query($conn,'SELECT discountPercentage FROM Discount WHERE discountWhen=15000'));
	$discount = ($sql["discountPercentage"]/100) * $sum; 
  $after_discount = $sum - $discount;
  echo "Total: $" . $sum . "<br><br>";
  echo "After Discount: $". $after_discount . "<br><br>";
  }else if($sum >= 7500){
	$sql=mysqli_fetch_assoc(mysqli_query($conn,'SELECT discountPercentage FROM Discount WHERE discountWhen=7500'));
	$discount = ($sql["discountPercentage"]/100) * $sum; 
  $after_discount = $sum - $discount;
  echo "Total: $" . $sum . "<br><br>";
  echo "After Discount: $". $after_discount . "<br><br>";
  }
  else if($sum >= 2500){
	  $sql=mysqli_fetch_assoc(mysqli_query($conn,'SELECT discountPercentage FROM Discount WHERE discountWhen=2500'));
	$discount = ($sql["discountPercentage"]/100) * $sum; 
  $after_discount = $sum - $discount;
  echo "Total: $" . $sum . "<br><br>";
  echo "After Discount: $". $after_discount . "<br><br>";
  }else{
  echo "Total: $" . $sum . "<br><br>";
  echo "After Discount: $". $sum . "<br><br>";
  //echo "<br><br>"."CART IS EMPTY";
  }
  
  if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myproductId = mysqli_real_escape_string($conn,$_POST['productId']);
      //$mysum = mysqli_real_escape_string($conn,$_POST['numberofItem']);
	  
	  //$sql = "SELECT SUM(numberofItem) FROM Cart WHERE productId = '$mysumI'";
	  
      $sql = "SELECT productId FROM Cart2 WHERE productId = '$myproductId' AND clientId = '$login_session'";
      $result = mysqli_query($conn,$sql);
      $count = $result->num_rows;

      if($count ==1) {
         $_SESSION['edit_cart'] = $myproductId;
         
         header("location: welcomeC.php");
      }else {
         $error = "Your Model Name is invalid";
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
