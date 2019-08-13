<?php  //welcomAdmin.php
  require_once 'hhh3login.php';
echo "<div style=\"text-align:center\">";
?>
<html>
<body style="background-color:#F5DEB3">
   <head>
   <style>
	  li {
		  display: inline-block;
			margin-right:10px;		 
		color:#B0C4DE;
		background-color:#FFFFF0;
	  }
	  </style>
	  </head>
   <header>
   <nav>
   <li><h3><a href="welcomeAdmin.php">Go back to Admin page</a></h3></li>
   <li><h3><a href="updateDelivery.php">Cancel Edit</a></h3></li>
   </nav>
   </header>
   <body>
       <h1><div style="text-align:center">Update Delivery Status</div></h1> 
</body>
</html>
<?php   //editProfile.php
 
  $conn = new mysqli($hn, $un, $pw, $db);
  include('sessionDelivery.php');
  if ($conn->connect_error) die($conn->connect_error);
echo "<div style=\"text-align:center\">";
   echo <<<_END
	
	
  <form action="updateDelivery.php" method="post"><pre>
    Client ID:   			$delivery_clientId
    Delivery Code:    			$delivery_deliveryId
	Ordered Date: 		 	$delivery_deliveryDate
	Address:			$delivery_address
	Current Delivery Status:	$delivery_currStatus
	<td rowspan="5">Delivery Status</td>  
<td><input type="radio" name="currStatus" value="Processing"/>Processing  <td><input type="radio" name="currStatus" value="Payment Accepted"/>Payment Accepted</td><td><input type="radio" name="currStatus" value="Payment Decline"/>Payment Declined</td>
  <td><input type="radio" name="currStatus" value="On it's way"/>On it's way</td> <td><input type="radio" name="currStatus" value="Delivered"/>Delivered</td> 
  
 
    <input type="submit" value="Update Delivery Status">
	
  <a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a>

  </pre></form>
_END;
/*  Current Delivery Status:  <input type="text" name="currStatus" value = $delivery_currStatus>*/
  if(isset($_POST['currStatus'])) {
    
  $currStatus = get_post($conn, 'currStatus');
  
  $query1 = "UPDATE Shipping SET currStatus = '$currStatus' WHERE clientId='$delivery_clientId' AND deliveryId = '$delivery_deliveryId' ";
  $result1   = $conn->query($query1);
	header("location: welcomeDelivery.php");
     $result1->close();
      $conn->close();
	  }
 

  function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }
?>