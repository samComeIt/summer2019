<html">
   
   <head>
   <div style="text-align:center">
      <title>3H </title>
   </head>
   <?php print "<font size = '7' color='orange'>3H</font>"; ?>
   <body style="background-color:#F0F8FF"><h1>Login as Client</h1>
   </body></html></div>

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
    <div class="login_page">
	<div class="form">
	<form class = "register_form">
	ID:     	<input type=text name="username">
    Password:      	<input type=text name="password">
    
    <button><input type="submit" value="Login"></button>
     </form>
</div>
</div>	 
    <a href="loginAdmin.php">Login as Admin?</a> 	<a href="createAccount.php">No account? Create Account</a>
  </pre></form>
_END;

//Set variable

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
  