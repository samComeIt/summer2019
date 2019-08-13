<?php
   include('sessionQuantity.php');
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
   <li><h3><a href="welcomeAdmin.php">Go back to Admin page</a></h3></li>
   <li><h3><a href = "updateQuantity.php">Update Qauntity</a>   </h3></li>
   <li><h3><a href = "manageQuantity.php">Search for different S ID</a></h3></li>
   </nav></header>
   <body>
      <h3>Welcome <?php echo $select_sid; ?></h3> 
	  <h3>Stock ID: <?php echo $select_sid; ?></h3> 
	  <h3>Product ID: <?php echo $select_pid; ?></h3> 
	  <h3>Quantity: <?php echo $select_q; ?></h3>
	  
      
     	  
   </body>
   
</html>
   </body>
  
</html>