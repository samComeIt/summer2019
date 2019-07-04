<?php
   include('sessionDelivery.php');
   echo "<div style=\"text-align:center\">";
   /* <h1>Client ID <?php echo $login_clientId; ?></h1> 
	  <h1>Password <?php echo $login_pw; ?></h1> 
	  <h1>Name <?php echo $login_name; ?></h1> */
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h3>Welcome <?php echo $delivery_clientId; ?></h3> 
	  <h3>Delivery Code: <?php echo $delivery_deliveryId; ?></h3> 
	  <h3>Ordered Date: <?php echo $delivery_deliveryDate; ?></h3> 
	  <h3>Address: <?php echo $delivery_address; ?></h3> 
	  <h3>Current Delivery Status: <?php echo $delivery_currStatus; ?></h3>
	  
      <h3><a href = "updateDelivery.php">Update Delivery Status</a>   </h3><h3><a href = "manageDelivery.php">Update Different Client's Delivery</a></h3>
	  
	  
	  
   </body>
   
</html>
   </body>
  
</html>