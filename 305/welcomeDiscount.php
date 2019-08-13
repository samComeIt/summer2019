<?php
   include('sessionDiscount.php');
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
      <li><h3><a href = "updateDiscount.php">Update Discount Percentage</a></h3></li>
	<li><h3><a href = "manageDiscount.php">Search for different Discount ID</a></h3>
	  </li>
</nav></header>   
   <body>
      
	  <h3>Discount ID: <?php echo $select_discountId; ?></h3> 
	  <h3>Disount <?php echo $select_discountPercentage; ?>% when total is at least <?php echo $select_discountWhen; ?></h3> 
	  <h3>Dicount Percentage: <?php echo $select_discountPercentage; ?>%</h3>
	  
     	  
   </body>
   
</html>
   </body>
  
</html>