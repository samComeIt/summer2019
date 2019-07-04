<?php  //welcomAdmin.php
 include('sessionAdmin.php');
 require_once 'hhh3login.php';
echo "<div style=\"text-align:center\">";
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
		<h2><a href = "viewProfileAdmin.php">View Profile</a></h2>
      <h2><a href = "logout.php">Sign Out</a></h2>
	  <h2><a href = "manageProduct.php">View Products</a></h2>
	  <h2><a href = "manageQuantity.php">Manage Quantity</a></h2>
	  <h2><a href = "manageDiscount.php">Manage Discount</a></h2>
	  <h2><a href = "manageDelivery.php">Manage Delivery</a></h2>
   </body>
   
</html>