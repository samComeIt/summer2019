<?php //session.php
   include('hhh3login.php');
   session_start();
   $conn = new mysqli($hn, $un, $pw, $db);
   if ($conn->connect_error) die($conn->connect_error);
   
   $user_check = $_SESSION['login_user'];
   
   
   
 /*  require_once 'hhh3login.php';
  session_start();
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);*/
   
   //$ses_sql = mysqli_query($db,"SELECT username from admin where username = '$user_check' ");
	$ses_sql = mysqli_query($conn,"SELECT * FROM Admin WHERE adminId = '$user_check' ");
 
 
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['adminId'];
   $login_adminId = $row['adminId'];
   $login_pw = $row['pw'];
   $login_name = $row['name'];
   $login_address= $row['address'];
   $login_phonenumber= $row['phoneNumber'];
   $login_email = $row['email'];
   $login_dateofbirth = $row['dateofbirth'];

   if(!isset($_SESSION['login_user'])){
      header("location:loginClient.php");
      die();
   }
?>