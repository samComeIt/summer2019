<?php
   include('sessionCart.php');
echo "<div style=\"text-align:center\">";
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h3>Welcome <?php echo $editC_clientId; ?></h3> 
	  <h3>Model Number: <?php echo $editC_productId; ?></h3> 
	  <h3>Order Date: <?php echo $editC_orderDate; ?></h3> 
	  <h3>Cost: $<?php echo $editC_cost; ?></h3>
	  <h3>Number of Items: <?php echo $editC_numberofItem; ?></h3>
	  <h3>Total cost: $<?php echo $editC_totalAmount; ?></h3>
	  
   
      <h3><a href = "updateCart.php">Edit Number of Items</a>   </h3><h3><a href = "viewcart.php">Edit other products</a></h3>
	  
	  
	  
   </body>
   
</html>
   </body>
  
</html>