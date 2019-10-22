<?php
   include('sessionAdmin.php');
   echo "<div style=\"text-align:center\">";
?>
<html">
   <body style="background-color:#F5DEB3">
   <head>
      <title>View Profile </title>
	   <style>
	  li {
		 display: inline-block;
			margin-right:10px;		 
		color:#B0C4DE;
		background-color:#FFFFF0;
	  }
	  </style>
   </head>
   </body>
   <header>
   <nav>
   <li><h3><a href = "welcomeAdmin.php">Go back to Admin page</a></h3></li>
   <li><h3><a href = "logout.php">Sign Out</a></h3></li>
   </nav></header>
   
   <body>
   
      <h3>Welcome <?php echo $login_session; ?></h3> 
	  <h3>Admin ID: <?php echo $login_adminId; ?></h3> 
	  <h3>Password: <?php echo $login_pw; ?></h3> 
	  <h3>Name: <?php echo $login_name; ?></h3>
	  <h3>Address: <?php echo $login_address; ?></h3>
	  <h3>Phone Number: <?php echo $login_phonenumber; ?></h3>
	  <h3>Email: <?php echo $login_email; ?></h3>
	  <h3>Date of Birth: <?php echo $login_dateofbirth; ?></h3>
	  </body>
   
</html>