<?php	//manageQuantity.php
  require_once 'hhh3login.php';
  session_start();
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
    echo "<div style=\"text-align:center\">";
   echo <<<_END
  <form action="manageQuantity.php" method="post"><pre>
    Stock ID:     		<input type=text name="stockId">
    
    <input type="submit" value="Search">

   
     <a href="welcomeAdmin.php">Go back to Admin page</a>               
  </pre></form>
_END;
 echo <<<_END
 List of Stock ID
 _END;
  $query  = "SELECT * FROM productStock";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
  <pre>
     Stock ID: $row[1], Number of quantity: $row[2]
      </pre>

</form>
_END;
  }

if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $mystockId = mysqli_real_escape_string($conn,$_POST['stockId']);
      $sql = "SELECT stockId FROM productStock WHERE stockId = '$mystockId'";
      $result = mysqli_query($conn,$sql);
      $count = $result->num_rows;

      if($count == 1) {
         $_SESSION['login_stock'] = $mystockId;
         
         header("location: welcomeQ.php");
      }else {
         $error = "Your Stock ID is invalid";
      }
   }
  $conn->close();
  
  function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }
  echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
   
  ?>
