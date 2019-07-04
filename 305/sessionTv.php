<?php //session.php
   include('hhh3login.php');
   //session_start();
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error) die($conn->connect_error);
   
   $user_select = $_SESSION['login_user'];

	$ses_sql = mysqli_query($conn,"SELECT * FROM Products WHERE productId = '$user_select' ");
 
 
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $select_maker = $row['maker'];
   $select_productId = $row['productId'];
   $select_type = $row['type'];
   $select_cost = $row['cost'];
   

   if(!isset($_SESSION['login_user'])){
      header("location:loginClient.php");
      die();
   }
?>