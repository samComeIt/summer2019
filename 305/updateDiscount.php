<?php  //welcomAdmin.php
  require_once 'hhh3login.php';
echo "<div style=\"text-align:center\">";
?>
<html>
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
   <li><h3><a href="welcomeAdmin.php">Go back to Admin page</a></li>
   <li><h3><a href="updateDiscount.php">Reset</a></h3></li>
   </nav>
   </header>
   
   <body>
       <h1><div style="text-align:center">Update Discount Percentage</div></h1> 
	  
</html>
</html>
<?php   //editProfile.php
  
  $conn = new mysqli($hn, $un, $pw, $db);
  include('sessionDiscount.php');
  if ($conn->connect_error) die($conn->connect_error);
echo "<div style=\"text-align:center\">";
   echo <<<_END
	
	
  <form action="updateDiscount.php" method="post"><pre>
    Discount ID:   		$select_discountId
    Disount $select_discountPercentage% when total is at least $$select_discountWhen
    Disount Percentage:    		<input type="text" name="dp" value = $select_discountPercentage>%
   
    <input type="submit" value="Update Discount Percentage">
	
  <a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a>

  </pre></form>
_END;

  if(isset($_POST['dp'])) {
    
  $dp = get_post($conn, 'dp');
  
  $query1 = "UPDATE Discount SET discountPercentage = '$dp' WHERE discountId='$select_discountId'";
  $result1   = $conn->query($query1);
	header("location: welcomeDiscount.php");
     $result1->close();
      $conn->close();
	  }
 

  function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }
?>