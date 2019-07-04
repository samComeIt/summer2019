<?php	//manageDiscount.php
  require_once 'hhh3login.php';
  session_start();
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
    echo "<div style=\"text-align:center\">";
   echo <<<_END
  <form action="manageDiscount.php" method="post"><pre>
    Discount ID:     		<input type=text name="discountId">
    
    <input type="submit" value="Search">

   
     <a href="welcomeAdmin.php">Go back to Admin page</a>               
  </pre></form>
_END;
echo <<<_END
List of DIscount ID
_END;
  $query  = "SELECT * FROM Discount";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
  <pre>
     Disount $row[3]% when total is at least $$row[0]
	 Discount Percentage: $row[3]%
	 Discount ID: $row[1]
     
	 </pre>

</form>
_END;
  }

if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $mydiscountId = mysqli_real_escape_string($conn,$_POST['discountId']);
      $sql = "SELECT discountId FROM Discount WHERE discountId = '$mydiscountId'";
      $result = mysqli_query($conn,$sql);
      $count = $result->num_rows;

      if($count == 1) {
         $_SESSION['edit_discount'] = $mydiscountId;
         
         header("location: welcomeDiscount.php");
      }else {
         $error = "Discount ID is invalid";
		 echo $error;
      }
   }
  $conn->close();
  
  function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }
  echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
   
  ?>