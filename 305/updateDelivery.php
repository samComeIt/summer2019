<html>
   <head>
      <title>Update Delivery </title>
   </head>
   
   <body>
       <h1><div style="text-align:center">Update Delivery</div></h1> 
	  
</html>
</html>
<?php   //editProfile.php
  require_once 'hhh3login.php';
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
  
 
    <a href="updateDelivery.php">Cancel Edit</a> <input type="submit" value="Update Delivery Status">
	
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