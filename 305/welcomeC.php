<?php
   include('sessionCart.php');
echo "<div style=\"text-align:center\">";
?>
<html">
   <body style="background-color:#F0F8FF">
   <head>
   <style>
	  li {
		 display: inline-block;
			margin-right:10px;		 
		color:#B0C4DE;
		background-color:#AEE0C5;
		text-align:center;
	  }
	  </style>  
      <title>Welcome </title>
   </head>
   
   <body>
   <header>
   <nav>
   <li><h3><a href="welcome.php">Go back to Client page</a> </h3></li>
   <li><h3><a href = "updateCart.php">Edit Number of Items</a>   </h3></li>
   <li><h3><a href = "viewcart.php">Edit other products</a></h3></li>
   </nav>
   </header>
      <h3>Welcome <?php echo $editC_clientId; ?></h3> 
	  <h3>Model Number: <?php echo $editC_productId; ?></h3> 
	  <h3>Order Date: <?php echo $editC_orderDate; ?></h3> 
	  <h3>Cost: $<?php echo $editC_cost; ?></h3>
	  <h3>Number of Items: <?php echo $editC_numberofItem; ?></h3>
	  <h3>Total cost: $<?php echo $editC_totalAmount; ?></h3>
	  
   </body>
   
</html>
   </body>
  
</html>