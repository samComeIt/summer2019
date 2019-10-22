<?php //session.php
   include('hhh3login.php');
   session_start();
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error) die($conn->connect_error);
   
   $user_sid = $_SESSION['login_stock'];

	$ses_sql = mysqli_query($conn,"SELECT * FROM productStock WHERE stockId = '$user_sid' ");
 
 
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $select_sid = $row['stockId'];
   $select_pid = $row['productId'];
   $select_q = $row['quantity'];

   if(!isset($_SESSION['login_stock'])){
      header("location:manageQuantity.php");
      die();
   }
?>