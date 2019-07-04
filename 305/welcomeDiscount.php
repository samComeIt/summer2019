<?php
   include('sessionDiscount.php');
   echo "<div style=\"text-align:center\">";
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      
	  <h3>Discount ID: <?php echo $select_discountId; ?></h3> 
	  <h3>Disount <?php echo $select_discountPercentage; ?>% when total is at least <?php echo $select_discountWhen; ?></h3> 
	  <h3>Dicount Percentage: <?php echo $select_discountPercentage; ?>%</h3>
	  
      <h3><a href = "updateDiscount.php">Update Discount Percentage</a>   </h3>
      <h3><a href = "manageDiscount.php">Search for different Discount ID</a></h3>
	  
	  
	  
   </body>
   
</html>
   </body>
  
</html>