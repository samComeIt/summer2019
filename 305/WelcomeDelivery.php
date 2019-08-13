<?php
   include('sessionDelivery.php');
   echo "<div style=\"text-align:center\">";
?>
<html">
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
   <li><h3><a href = "updateDelivery.php">Update Delivery Status</a></h3></li>
   <li><h3><a href = "manageDelivery.php">Update Different Client's Delivery</a></h3></li>
   </nav>
   </header>
   
   <body>
      <h3>Welcome <?php echo $delivery_clientId; ?></h3> 
	  <h3>Delivery Code: <?php echo $delivery_deliveryId; ?></h3> 
	  <h3>Ordered Date: <?php echo $delivery_deliveryDate; ?></h3> 
	  <h3>Address: <?php echo $delivery_address; ?></h3> 
	  <h3>Current Delivery Status: <?php echo $delivery_currStatus; ?></h3>
	  
       
   </body>
   
</html>
   </body>
  
</html>