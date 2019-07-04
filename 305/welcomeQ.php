<?php
   include('sessionQuantity.php');
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
      <h3>Welcome <?php echo $select_sid; ?></h3> 
	  <h3>Stock ID: <?php echo $select_sid; ?></h3> 
	  <h3>Product ID: <?php echo $select_pid; ?></h3> 
	  <h3>Quantity: <?php echo $select_q; ?></h3>
	  
      <h3><a href = "updateQuantity.php">Update Qauntity</a>   </h3>
      <h3><a href = "manageQuantity.php">Search for different S ID</a></h3>
	  
	  
	  
   </body>
   
</html>
   </body>
  
</html>