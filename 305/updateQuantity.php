<html>
   <head>
      <title>Update Qauntity </title>
   </head>
   
   <body>
       <h1><div style="text-align:center">Update Qauntity</div></h1> 
	  
</html>
</html>
<?php   //editProfile.php
  require_once 'hhh3login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  include('sessionQuantity.php');
  if ($conn->connect_error) die($conn->connect_error);
echo "<div style=\"text-align:center\">";
   echo <<<_END
	
	
  <form action="updateQuantity.php" method="post"><pre>
    Stock ID:   		$select_sid
    Model Name:    		$select_pid
    Quantity:    		<input type="text" name="quan" value = $select_q>
   

    
    <a href="updateQuantity.php">Cancel Edit</a> <input type="submit" value="Update Qauntity">
	
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
