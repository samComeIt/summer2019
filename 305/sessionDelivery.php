<?php //sessionDelivery.php
   include('hhh3login.php');
   session_start();
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error) die($conn->connect_error);
   
   $delivery_cid = $_SESSION['delivery_cid'];
	$delivery_dc = $_SESSION['delivery_dc'];
  
	$ses_sql = mysqli_query($conn,"SELECT * FROM Shipping WHERE clientId = '$delivery_cid' AND deliveryId = '$delivery_dc' ");
 //$ses_sql = mysqli_query($conn,"SELECT productId, orderDate,periodId,SUM(numberofItem) FROM Cart GROUP BY productId, orderDate,periodId WHERE productId = '$edit_cart' ");
 
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $delivery_clientId= $row['clientId'];
   $delivery_deliveryId= $row['deliveryId'];
   $delivery_deliveryDate= $row['deliveryDate'];
   $delivery_address= $row['address'];
	$delivery_currStatus= $row['currStatus'];

	
   if(!isset($_SESSION['delivery_cid']) && !isset($_SESSION['delivery_dc']) ){
      header("location:viewCart.php");
      die();
   }
?>