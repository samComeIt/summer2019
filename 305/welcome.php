<?php
   include('session.php');
   echo "<div style=\"text-align:center\">";
   /* <h1>Client ID <?php echo $login_clientId; ?></h1> 
	  <h1>Password <?php echo $login_pw; ?></h1> 
	  <h1>Name <?php echo $login_name; ?></h1> */
?>
<!--<<<<<<< HEAD

<!DOCTYPE html>
<!--
<html lang="en">
<head>
<title>Welecome</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="3H template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<div class="super_container">
	-->
	<!-- Header -->
<!--
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
						<a href="#">
							<div class="logo d-flex flex-row align-items-center justify-content-start"><img src="images/dot.png" alt=""><div>3H</div></div>
						</a>
						<nav class="main_nav">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<li class="active"><a href="welcome.php">Home</a></li>
								<li><a href="product2.html">Products</a></li>
								<li><a href = "viewProfile.php">View Profile</a></li>
	  							<li><a href = "viewCart.php">View <?php echo $login_session; ?>'s Cart</a></li>
	  							<li><a href = "logout.php">Sign Out</a></li>
							</ul>
						</nav>

						<div class="phone d-flex flex-row align-items-center justify-content-start ml-auto">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<div>652-345 3222 11</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
-->
	<!-- Hamburger -->
<!--	
	<div class="hamburger_bar trans_400 d-flex flex-row align-items-center justify-content-start">
		<div class="hamburger">
			<div class="menu_toggle d-flex flex-row align-items-center justify-content-start">
				<span>menu</span>
				<div class="hamburger_container">
					<div class="menu_hamburger">
						<div class="line_1 hamburger_lines" style="transform: matrix(1, 0, 0, 1, 0, 0);"></div>
						<div class="line_2 hamburger_lines" style="visibility: inherit; opacity: 1;"></div>
						<div class="line_3 hamburger_lines" style="transform: matrix(1, 0, 0, 1, 0, 0);"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
-->
	<!-- Menu -->
<!--
	<div class="menu trans_800">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<ul>
				<li><a href="welcome.php">Home</a></li>
				<li><a href="product2.html">Products</a></li>
				<li><a href = "viewProfile.php">View Profile</a>></li>
      			<li><a href = "logout.php">Sign Out</a></li>
	  			<li><a href = "viewCart.php">View <?php echo $login_session; ?>'s Cart</a></li>
			</ul>
		</div>
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<i class="fa fa-phone" aria-hidden="true"></i>
				<span>652-345 3222 11</span>
		</div>
	</div>
-->
	<!-- Home -->
<!--
	<div class="home">
		<div class="background_image" style="background-image:url(images/index.jpg)"></div>
		<div class="overlay"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
				
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Boxes -->


	<!-- About -->
<!--
	<div class="about">
		<div class="container about_container">
			<div class="row">
				<div class="col-lg-6">
					<div class="about_content">
						<div class="section_title_container">
							<div class="section_subtitle">welcome to 3H</div>
							<div class="section_title">About </div>
						</div>
						<div class="text_highlight">Etiam commodo justo nec aliquam feugiat. Donec a leo eget eget augue porttitor sollicitudin augue porttitor sollicitudin.</div>
						<div class="about_text">
							<p>Morbi sed varius risus, vitae molestie lectus. Donec id hendrerit velit, eu fringilla neque. Etiam id finibus sapien. Donec sollicitudin luctus ex non pharetra. Aenean lobortis ut leo vel porta. Maecenas ac vestibulum lectus. Cras nulla urna, lacinia ut tempor facilisis, congue dignissim tellus. Maecenas ac vestibulum lectus. Cras nulla urna, lacinia ut tempor facilisis, congue dignissim tellus. Phasellus sit amet justo ullamcorper, elementum ipsum nec.</p>
						</div>
						<div class="button about_button"><a href="http://localhost:8888/createAccount.php">Join Now</a></div>
					</div>
				</div>
			</div>
		</div>
		<div class="about_background">
			<div class="container fill_height">
				<div class="row fill_height">
					<div class="col-lg-6 offset-lg-6 fill_height">
						<div class="about_image"><img src="images/a1.png" alt=""></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Testimonials -->
<!--
	<div class="testimonials">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/testimonials.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section_title_container">
						<div class="section_subtitle">welcome to 3H</div>
						<div class="section_title">Testimonials</div>
					</div>
					
				</div>
				
			
		</div>
	</div>

=======
-->
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
		<h2><a href = "viewProfile.php">View Profile</a></h2>
      <h2><a href = "logout.php">Sign Out</a></h2>
	  <h2><a href = "viewcart.php">View My Cart</a></h2>
	  <h2><a href = "orderPage.php">View My Order</a></h2>
   </body>
   <body>
	  <h2><a href = "TV.php">
	  <img src = "television.png" alt="View TV"</a>
	  
      <a href = "ac.php">
	  <img src = "ac.png" alt="View AC"</a></h2>
	  
	  <h2><a href = "washer.php">
	  <img src = "washing-machine.png" alt="View Washing Machine"</h2>
	  
	  <a href = "fridge.php">
	  <img src = "fridge.png" alt="View Fridge"</a></h2>
   </body>
</html>
<!--
>>>>>>> 3a92d9a98b34a4ab8ad621aea71234fb48b7b58f-->
