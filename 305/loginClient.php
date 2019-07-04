<html">
   
   <head>
   <div style="text-align:center">
      <title>3H </title>
   </head>
   
   <body><h1>Login as Client</h1></html></div>

<?php	//loginClient.php
/*
Code worte by San Hae Kim and Kyu Hee Park*/
  require_once 'hhh3login.php';
  session_start();
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
    echo "<div style=\"text-align:center\">";
   echo <<<_END
  <form action="loginClient.php" method="post"><pre>
    ID:     		<input type=text name="username">
    Password:      	<input type=text name="password">
    
    <input type="submit" value="Login">
                    
    <a href="loginAdmin.php">Login as Admin?</a> 	<a href="createAccount.php">No account? Create Account</a>
  </pre></form>
_END;

if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT clientId FROM Client WHERE clientId = '$myusername' and pw = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $count = $result->num_rows;

      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
  $conn->close();
  
  function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }
  echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
   
  ?>