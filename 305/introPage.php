<?php	//loginClient.php
  require_once 'hhh3login.php';
  session_start();
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
?>
<!DOCTYPE html>
<html">
   
   <head>
      <title>3H </title>
   </head>
   
   <body>
   <!-- Tab links 
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'About')">About</button>
  <button class="tablinks" onclick="openCity(event, 'Login')">Login</button>
  <button class="tablinks" onclick="openCity(event, 'Contact')">Contact</button>
  
  -->
 
</div>
<div style="text-align:center">
      <h1>Welcome to 3H </h1> 
		<h2><a href = "loginClient.php">Login</a></h2>
      <h2><a href = "about.php">About</a></h2>
	 <!--
<div id="About" class="tabcontent">
  <h3>About</h3>
  <p>3H is a rental website where you can borrow home appliances online.</p>
</div>-->
</div>

<div id="Contact" class="tabcontent" style="text-align:center">
  <h3>Contact</h3>
  <p>Address: SUNY KOREA, songdo</p>
  <p>Phone Number: 010-1234-5678</p>
  <p>Operating Hours: Mon-Fri, 9:00 - 18:00</p>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
  </body> 
</html>
