<html">
   
   <head>
   <div style="text-align:center">
      <title>3H </title>
   </head>
   <?php print "<font size = '7' color='orange'>3H</font>"; ?>
   <body style="background-color:#F5DEB3"><h1>Login as Admin</h1>
   </body></html></div>


<?php   //loginAdmin.php
  require_once 'hhh3login.php';
  session_start();
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
    echo "<div style=\"text-align:center\">";
   echo <<<_END
  <form action="loginAdmin.php" method="post"><pre>
    ID:           <input type=text name="username">
    Password:     <input type=text name="password">
    
    <input type="submit" value="Login">
                    
    <a href="loginClient.php">Login as Client?</a>
  </pre></form></p>
_END;

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT adminId FROM Admin WHERE adminId = '$myusername' and pw = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $count = $result->num_rows;

      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcomeAdmin.php");
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