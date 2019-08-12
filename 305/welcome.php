<?php
   include('session.php');
   echo "<div style=\"text-align:center\">";
	
?>

<html">
   <body style="background-color:#F0F8FF">
   <head>
      <title>Welcome </title>
	  <style>
	  li {
		 display: inline-block;
			margin-right:10px;		 
		color:#B0C4DE;
		background-color:#AEE0C5;
	  }
	  </style>
   </head>
   
   <body>
   <header>
   <nav>
   <li><h3><a href = "orderPage.php">View My Order</a></h3></li>
   <li><h3><a href = "viewcart.php">View My Cart</a></h3></li>
   <li><h3><a href = "viewProfile.php">View Profile</a></h3></li>
   <li><h3><a href = "logout.php">Sign Out</a></h3></li>
   
   </nav>
   </header>
      <h1>Welcome <?php echo $login_session; ?></h1> 
	
	  
   </body>
   <body>
	  <h2><a href = "TV.php">
	  <img src = "television.png" alt="View TV"</a>
	  
      <a href = "ac.php">
	  <img src = "ac.png" alt="View AC"</a></h2>
	  
	  <h2><a href = "washer.php">
	  <img src = "washing-machine.png" alt="View Washing Machine"</h2>
	  
	  <a href = "fridge.php">
	  <img src = "fridge.png" alt="View Fridge"</a></h2>
   </body>
</html>