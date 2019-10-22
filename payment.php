<html>
<body style="background-color:#F0F8FF"> 
   <head>
   <div style="text-align:center">
      <title>Payment information</title>
	  <style>
	  li {
		 display: inline-block;
			margin-right:10px;		 
		color:#B0C4DE;
		background-color:#AEE0C5;
	  }
	  </style>
   </head>
   
   <body>
	<header>
   <nav>
   <li><h3><a href="welcome.php">Go to Client page</a></h3></li>
   <li><h3><a href="payment.php">Clear output</a></h3></li>
   </nav>
   </header>
       <h1><div style="text-align:center">Payment information</div></h1> 
	  </div>
</html>
</html>

<?php   
  require_once 'hhh3login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
   include('session.php');

  if ($conn->connect_error) die($conn->connect_error);
    echo "<div style=\"text-align:center\">";
   echo <<<_END
	
  <form action="payment.php" method="post"><pre>
    Enter full name:    	<input type="text" name="name" value='$login_name'>
    Enter client ID:    	                  $login_session 
	Enter Delivery Code:	<input type="text" name="dcode">
    Enter Adress: 		<input type="text" name="address" value='$login_address'>
	Enter card number:    	<input type="text" name="creditCardNumber">
    Enter expiry date(MM/YY):   <input type="text" name="expireDate">
	
    <input type="submit" value="Pay">
    
  </pre></form>
_END;

  $query = "SELECT * FROM Cart2 WHERE clientId = '$login_session'";
  $result   = $conn->query($query);
  $sum=0;
  $after_discount;

  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
 
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
    $sum += $row[5];

    echo <<<_END
 
  <form action="payment.php" method="post">

</form>
_END;
  }
  
  if($sum >= 15000){
	$sql=mysqli_fetch_assoc(mysqli_query($conn,'SELECT discountPercentage FROM Discount WHERE discountWhen=15000'));
	$num=$sql["discountPercentage"];
	$discount = ($sql["discountPercentage"]/100) * $sum; 
  $after_discount = $sum - $discount;
   echo "Discount Percentage: " . $num . "%<br><br>";
  echo "Total: $" . $sum . "<br><br>";
  echo "After Discount: $". $after_discount . "<br><br>";
  }else if($sum >= 7500){
	$sql=mysqli_fetch_assoc(mysqli_query($conn,'SELECT discountPercentage FROM Discount WHERE discountWhen=7500'));
	$num=$sql["discountPercentage"];
	$discount = ($sql["discountPercentage"]/100) * $sum; 
  $after_discount = $sum - $discount;
  echo "Discount Percentage: " . $num . "%<br><br>";
  echo "Total: $" . $sum . "<br><br>";
  echo "After Discount: $". $after_discount . "<br><br>";
  }
  else if($sum >= 2500){
	$sql=mysqli_fetch_assoc(mysqli_query($conn,'SELECT discountPercentage FROM Discount WHERE discountWhen=2500'));
	$num=$sql["discountPercentage"];
	$discount = ($sql["discountPercentage"]/100) * $sum; 
  $after_discount = $sum - $discount;
  echo "Discount Percentage: " . $num . "%<br><br>";
  echo "Total: $" . $sum . "<br><br>";
  echo "After Discount: $". $after_discount . "<br><br>";
  }else{
	  $num=0;
  echo "Discount Percentage: $num%<br><br>";
  echo "Total: $" . $sum . "<br><br>";
  echo "After Discount: $". $sum . "<br><br>";
  }

if(isset($_POST['name'])&&isset($_POST['creditCardNumber'])
	  &&isset($_POST['address'])&&isset($_POST['expireDate'])
	&&isset($_POST['dcode'])) {
    $date=date("Y-m-d", time());
	$address = get_post($conn, 'address');
    $name = get_post($conn, 'name');
    $dcode = get_post($conn, 'dcode');
    $creditCardNumber = get_post($conn, 'creditCardNumber');
    $expireDate = get_post($conn, 'expireDate');
    //$discountId = get_post($conn, 'discountId');
    
  $query2 = "SELECT deliveryId FROM Shipping WHERE deliveryId = '$dcode'";
  $result2   = $conn->query($query2);
  $rows2 = $result2->num_rows;
  
if(empty($name) || empty($date) || empty($address) || empty($dcode) || 
    empty($creditCardNumber) || empty($expireDate) ){
		if ($rows2==1){ 
        echo "Delivery ID '$dcode' already Exist";
		}else{
			 echo "You did not fill out the required fields.";
		}
  }
  else{
	  if ($rows2==1){ 
          echo "Delivery ID '$dcode' already Exist";
    
	  }else{
		 echo  "Account successfully made!";
		 message();
		 header("Location:orderPage.php");
		 $query1 = "INSERT INTO Payment(clientId, creditCardNumber, name, expireDate, discountId) VALUES  ('$login_session', '$creditCardNumber', '$name', '$expireDate', '$num')";
    $result1   = $conn->query($query1);
	$query1 = "INSERT INTO Shipping(clientId, deliveryId, deliveryDate, address, currStatus) VALUES  ('$login_session', '$dcode', '$date', '$address','Processing')";
    $result1   = $conn->query($query1);
	
	$query1 = "UPDATE productStock P, Cart2 C SET P.quantity = P.quantity -C.numberofItem  WHERE P.productId = C.productId AND C.clientId = '$login_clientId'";
    $result1   = $conn->query($query1);
	
    $query1 = "SELECT * FROM Payment where substring(expireDate,1,charindex('/',expireDate)-1) < month(GETDATE()) 
    and '20'+ substring(expireDate,charindex('/',expireDate)+1, 2) <= year(GETDATE())";
    $result1   = $conn->query($query1);
    
	$query1 = "DELETE FROM Cart2 WHERE clientId = '$login_session'";
    $result1   = $conn->query($query1);
      }	
	  
	if(!strlen($_POST['creditCardNumber']) == 16 && !strlen($_POST['expireDate'])==4) {
        error();
    }
    

    $conn->close();
    }
	}
  function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }
    function message(){
        echo "You paid successfully!";
    }

    function error(){
        echo "Please fill out the form correctly";
    }
?>