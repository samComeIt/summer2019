<?php  //welcomAdmin.php
  require_once 'hhh3login.php';
echo "<div style=\"text-align:center\">";
?>
<html>
<body style="background-color:#F5DEB3">
   <head>
      <title>Update Qauntity </title>
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
   <li><h3><a href="updateQuantity.php">Cancel Edit</a></h3></li>
   </nav>
   </header>
   <body>
       <h1><div style="text-align:center">Update Qauntity</div></h1> 
	  
</html>
</html>
<?php   //editProfile.php
  
  $conn = new mysqli($hn, $un, $pw, $db);
  include('sessionQuantity.php');
  if ($conn->connect_error) die($conn->connect_error);
echo "<div style=\"text-align:center\">";
   echo <<<_END
	
	
  <form action="updateQuantity.php" method="post"><pre>
    Stock ID:   		$select_sid
    Model Name:    		$select_pid
    Quantity:    	<input type="text" name="quan" value = $select_q>
   

    
    <input type="submit" value="Update Qauntity">
	
  <a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a>

  </pre></form>
_END;

  if(isset($_POST['quan'])) {
    
  $quan = get_post($conn, 'quan');
  
  $query1 = "UPDATE productStock SET quantity = '$quan' WHERE stockId='$select_sid'";
  $result1   = $conn->query($query1);
	header("location: welcomeQ.php");
     $result1->close();
      $conn->close();
	  }
 

  function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }
?>
