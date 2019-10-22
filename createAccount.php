<html>
   
   <head>
   <div style="text-align:center">
      <title>3H </title>
   </head>
   
   <body><h1>Create New Account</h1></html></div>

</html>

<?php   
  require_once 'hhh3login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
    echo "<div style=\"text-align:center\">";
   echo <<<_END
	
	
  <form action="createAccount.php" method="post"><pre>
    Enter a full name:   	<input type="text" name="fullname">
    
    Enter a username:    	<input type="text" name="username">
    
    Enter a password:    	<input type="password" name="password">
    
    Enter a address:     	<input type="text" name="address">
    
    Enter a phone number:  	<input type="text" name="phonenumber">
    
    Enter a email:        	<input type="email" name="email">
    
    Enter a date of birth:	<input type="date" name="dateofbirth">

    <input type="submit" value="Create Account">
    
    <a href="createAccount.php">Clear output</a>

    <a href="loginClient.php">Log in</a>
	
  <a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a>

  </pre></form>
_END;

  if(isset($_POST['fullname'])&&isset($_POST['username'])&&isset($_POST['password'])
	  &&isset($_POST['address'])&&isset($_POST['phonenumber'])&&isset($_POST['email'])&&isset($_POST['dateofbirth'])) {
    
  $fullname = get_post($conn, 'fullname');
  $username = get_post($conn, 'username');
  $password = get_post($conn, 'password');
  $address = get_post($conn, 'address');
  $phonenumber = get_post($conn, 'phonenumber');
  $email = get_post($conn, 'email');
  $dateofbirth = get_post($conn, 'dateofbirth');
    
  $query1 = "SELECT clientId FROM Client WHERE clientId='$username'";
  $result1   = $conn->query($query1);
  $rows1 = $result1->num_rows;
    
    /*  
	  if ($rows1>0){ 
          echo "Username '$username' already Exist";
    
	  }else{
		 echo  "Account successfully made!";
		 header("Location:loginClient.php");
      }		  
		
	  $query2 = "INSERT INTO Client (name, clientId, pw, address, phoneNumber, email, dateofbirth) 
	  VALUES('$fullname','$username','$password','$address','$phonenumber','$email','$dateofbirth')";
	  $result1 = $conn->query($query2);
	  */
	  
     //$result1->close();

  if(empty($fullname) || empty($username) || empty($password) || empty($address) || empty($phonenumber) || 
    empty($email) || empty($dateofbirth) ){
    echo "You did not fill out the required fields.";
  }
  else{
    if ($rows1==1){ echo "Username '$username' already Exist";
    }
    else{
      $query2 = "INSERT INTO Client (name, clientId, pw, address, phoneNumber, email, dateofbirth) 
      VALUES('$fullname','$username','$password','$address','$phonenumber','$email','$dateofbirth')";
      $result1 = $conn->query($query2);
      echo  "Account successfully made!";
      //header("Location:loginClient.php");
    } 
  }
      $conn->close();
	  }
 

  function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }
  
?>
