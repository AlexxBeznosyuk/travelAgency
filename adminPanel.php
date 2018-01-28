<?php 
	session_start();
	ob_start(); 
	include_once("pages/function.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Document</title>
</head>
<body>
	<div class="container">
			<div class="header">
				<img src="images/panoram.jpg">
				<h2>Travel Agency</h2>
				<?php 
					if ( $_SESSION['registered_user'] == 'admin') {
						echo '<div class = "log"><h3> Welcome, ' . $_SESSION['registered_user'] . '</h3>';
						echo '<a class="btn" href ="index.php"> As user </a>';
						echo '<a class="btn" href ="index.php?unlog=5"> Quit </a></div> ';					
					}
				?>
				<div class="row">
			<ul class="nav">
			  <li role="presentation"><a href="adminPanel.php?menu=1">Countries</a></li>
			  <li role="presentation"><a href="adminPanel.php?menu=2">Cities</a></li>
			  <li role="presentation"><a href="adminPanel.php?menu=3">Hotels</a></li>
			  <li role="presentation"><a href="adminPanel.php?menu=7">Users</a></li>
			</ul>
		</div>
			</div>		
		<div class="main">
			<img src="images/pesok3.jpg">
			<?php
				if(isset($_GET['menu'])) {
					$act = "class='active'";
					$menu = $_GET['menu'];
					switch ($menu) {
						case 1: include_once("pages/fcountries.php");  break;
						case 2: include_once("pages/fcities.php");  break;	
						case 3: include_once("pages/fhotel.php");  break;	
						case 7: include_once("pages/fusers.php");  break;	
					}
				}
			?>
		</div>
	</div>
</body>
</html>