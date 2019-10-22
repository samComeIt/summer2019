<?php
   include('sessionCart.php');
echo "<div style=\"text-align:center\">";
?>
<html>
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
      <title>Update Cart </title>
   </head>
   
   <body>
   <header>
   <nav>
   <li><h3><a href="welcome.php">Go back to Client page</a></h3></li>
   <li><h3><a href="updateCart.php">Cancel Edit</a></h3></li>
   </nav>
   </header>
   
       <h1><div style="text-align:center">Update Cart</div></h1> 
	  
</html>
</html>
<?php   //editProfile.php
  require_once 'hhh3login.php';
  $conn = new mysqli($hn, $un, $pw, $db);

  if ($conn->connect_error) die($conn->connect_error);
echo "<div style=\"text-align:center\">";
   echo <<<_END
	
	
  <form action="updateCart.php" method="post"><pre>
    Model Name:   		$editC_productId
    Cost:    		$$editC_cost
    Number of Items:   <input type="text" name="numberofItem" value = $editC_numberofItem>
  
    <input type="submit" value="Update Number of Items">
  </pre></form>
_END;

  if(isset($_POST['numberofItem'])) {
    
  $numberofItem = get_post($conn, 'numberofItem');
  $query1 = "UPDATE Cart2 SET numberofItem = '$numberofItem', totalAmount = '$editC_cost'*'$numberofItem' WHERE productId='$editC_productId'";
 $result1   = $conn->query($query1);
	
 	header("location: welcomeC.php");
     $result1->close();
      $conn->close();
	  }
 

  function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }
?>