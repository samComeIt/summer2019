<?php	//manageDelivery.php
  require_once 'hhh3login.php';
  session_start();
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
    echo "<div style=\"text-align:center\">";
   echo <<<_END
  <form action="manageDelivery.php" method="post"><pre>
    Client ID:     	<input type=text name="clientId">
    Delivery Code:     	<input type=text name="deliveryId">
    <input type="submit" value="Search">
     <a href="welcomeAdmin.php">Go back to Admin page</a>               
    
  </pre></form>
_END;
 echo <<<_END
 List of Delievery 
 _END;
  $query  = "SELECT * FROM Shipping";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
  <pre>
     Client ID: $row[0]
	 Delivery Code: $row[1]
	 Current Delivery Status: $row[4]
      </pre>

</form>
_END;
  }

if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myclientId = mysqli_real_escape_string($conn,$_POST['clientId']);
      $mydeliveryId = mysqli_real_escape_string($conn,$_POST['deliveryId']);   
      $sql = "SELECT clientId, deliveryId FROM Shipping WHERE clientId = '$myclientId' AND deliveryId = '$mydeliveryId'";
      $result = mysqli_query($conn,$sql);
      $count = $result->num_rows;

      if($count >0) {
         $_SESSION['delivery_cid'] = $myclientId;
         $_SESSION['delivery_dc'] = $mydeliveryId;
		 
         header("location: welcomeDelivery.php");
      }else {
         $error = "Your Client Id or Delivery Code are invalid";
      }
   }
  $conn->close();
  
  function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }
  echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
   
  ?>