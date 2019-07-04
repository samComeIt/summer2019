<html>
   <head>
      <title>Edit Profile </title>
   </head>
   
   <body>
       <h1><div style="text-align:center">Edit Profile</div></h1> 
	  
</html>
</html>
<?php   //editProfile.php
  require_once 'hhh3login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  include('session.php');
  if ($conn->connect_error) die($conn->connect_error);
    echo "<div style=\"text-align:center\">";
   echo <<<_END
	
	
  <form action="editProfile.php" method="post"><pre>
    Full name:   		<input type="text" name="fullname" value = $login_name>
    Username:    		$login_clientId
    Password:    		<input type="text" name="password" value = $login_pw>
    Address:     		<input type="text" name="address" value = $login_address>
    Phone number:  		<input type="text" name="phonenumber" value = $login_phonenumber>
    Email:        		<input type="text" name="email" value = $login_email>
    Date of birth(YYYY-MM-DD):	<input type="text" name="dateofbirth" value = $login_dateofbirth>

    
    <a href="editProfile.php">Cancel Edit</a> <input type="submit" value="Update Account">
	<a href = "welcome.php">Go back to Client page</a>
 
  </pre></form>
_END;

  if(isset($_POST['fullname'])&&isset($_POST['password'])
	  &&isset($_POST['address'])&&isset($_POST['phonenumber'])&&isset($_POST['email'])&&isset($_POST['dateofbirth'])) {
    
  $fullname = get_post($conn, 'fullname');
  //$username = get_post($conn, 'username');
  $password = get_post($conn, 'password');
  $address = get_post($conn, 'address');
  $phonenumber = get_post($conn, 'phonenumber');
  $email = get_post($conn, 'email');
  $dateofbirth = get_post($conn, 'dateofbirth');
  
  $query1 = "UPDATE Client SET name = '$fullname', pw = '$password',address = '$address', phoneNumber = '$phonenumber', email = '$email', dateofbirth = '$dateofbirth' WHERE clientId='$login_clientId'";
  $result1   = $conn->query($query1);
	header("location: viewProfile.php");
     $result1->close();
      $conn->close();
	  }
 

  function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }
?>

