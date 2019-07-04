<?php //sessionCart.php
   include('hhh3login.php');
   session_start();
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error) die($conn->connect_error);
   
   $edit_cart = $_SESSION['edit_cart'];

  
	$ses_sql = mysqli_query($conn,"SELECT * FROM Cart2 WHERE productId = '$edit_cart' ");
 //$ses_sql = mysqli_query($conn,"SELECT productId, orderDate,periodId,SUM(numberofItem) FROM Cart GROUP BY productId, orderDate,periodId WHERE productId = '$edit_cart' ");
 
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $editC_clientId = $row['clientId'];
   $editC_productId= $row['productId'];
   $editC_orderDate= $row['orderDate'];
   $editC_cost = $row['cost'];
   $editC_numberofItem= $row['numberofItem'];
  // $editC_sumnumberofItem= $row['SUM(numberofItem)'];
   $editC_totalAmount= $row['totalAmount'];

	
   if(!isset($_SESSION['edit_cart'])){
      header("location:viewCart.php");
      die();
   }
?>