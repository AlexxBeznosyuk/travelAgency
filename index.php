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
	<link rel="stylesheet" type="text/css"  media="screen" href="css/style.css">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<div class="header">
			<img src="images/panoram.jpg">
			<h2>Travel Agency</h2>
			<div class="login">
				<?php  
					echo '<a class="a_log btn" href="index.php?log=4" style = "display:'; 
					if (isset($_SESSION['registered_user']) || $_GET["log"] == 4) $_SESSION['hidden'] = 'none';
					if ($_GET["log"] == 5) unset($_SESSION['hidden']);
					echo $_SESSION['hidden'];
					echo ' ">Login</a>';
				if(isset($_GET["unlog"]) && $_GET["unlog"] == 5) {
							unset($_SESSION['registered_user']);	
							header("Location: index.php");
						}
				if( isset($_GET["log"]) && ($_GET['log'] == 4)  || isset($_SESSION['hidden'])){
					include_once('pages/login.php');						
				}
				?>
			<ul class="nav">
			 	 <li ><a href="index.php?menu=1"> Tours</a></li>
			 	 <li ><a href="index.php?menu=2">Feedback</a></li>
			 	 <li ><?php 
			 	 	if(isset($_SESSION['registered_user'])){
			 	 		 echo '<a  href="index.php?menu=4">Personal page</a></li>';
			 	 	}
			 	 	else{
			 	 		 echo '<a  href="index.php?menu=3">Register</a></li>';
			 	 	}
			 	 ?>
			</ul>
			</div>
		</div>
		<div class="main">
			<img src="images/pesok3.jpg">
			<?php
				if(isset($_GET['menu'])) {
					$menu = $_GET['menu'];
					switch ($menu) {
						case 1: include_once("pages/tours.php");  break;
						case 2: include_once("pages/feedback.php");  break;	
						case 3: include_once("pages/register.php");  break;	
						case 4: include_once("pages/personal.php"); break;
					}
				}
				else {
					$_GET['menu'] = 1;
					include_once("pages/tours.php");
				}
			?>
		</div>
	</div>
</body>
</html>