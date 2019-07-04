<?php	//about.php
  require_once 'hhh3login.php';
  session_start();
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

echo <<<_END
  <form action="about.php" method="post"><pre>
  H3 is for the users to buy home appliances, like TVs, washers, fridges, and ACs.

  </pre></form>
_END;

function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
  }
  echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
?>