<?php  //welcomAdmin.php
 include('sessionAdmin.php');
 require_once 'hhh3login.php';
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
      <title>Welcome </title>
   </head>
   <header>
   <nav>
   <li><h3><a href = "viewProfileAdmin.php">View Profile</a></h3></li>
   <li><h3><a href = "logout.php">Sign Out</a></h3></li>
   </nav>
   </header>
   </body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
	<h2><a href = "manageProduct.php">Manage Products</a></h2>
	  <h2><a href = "manageQuantity.php">Manage Quantity</a></h2>
	  <h2><a href = "manageDiscount.php">Manage Discount</a></h2>
	  <h2><a href = "manageDelivery.php">Manage Delivery</a></h2>
   
</html>