<?php //sessionDiscount.php
   include('hhh3login.php');
   session_start();
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error) die($conn->connect_error);
   
   $edit_discount = $_SESSION['edit_discount'];

	$ses_sql = mysqli_query($conn,"SELECT * FROM Discount WHERE discountId = '$edit_discount' ");
 
 
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $select_discountId = $row['discountId'];
   $select_discountWhen = $row['discountWhen'];
   $select_discountName = $row['discountName'];
	$select_discountPercentage = $row['discountPercentage'];
	
   if(!isset($_SESSION['edit_discount'])){
      header("location:manageDiscount.php");
      die();
   }
?>