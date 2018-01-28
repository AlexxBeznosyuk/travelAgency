<?php 
	if(!isset($_POST['logsub'])  && !isset($_SESSION['registered_user'])) {
?>
		<form class="form_log" action="index.php" method="post">
			<label>Login: <input type="text" name="logname" maxlength="17" ></label>
			<label>Password: <input type="password" name="logpas" maxlength="17" ></label>
			<input class="btn_log" type="submit" name="logsub" value="Enter">
			<a class="btn_log" href="index.php?log=5">Cancel</a>
		</form>
<?php 
	}
else {
	if (!isset($_SESSION['registered_user'])){
		if (!loger ($_POST['logname'], $_POST['logpas'])) {
			echo '<div class = "log"><h3 style="color:red;"> Wrong login or password!!! </h3></div>';
			header ("Refresh: 3; url = index.php?menu=1");
			exit;
		}
	else {		
		$_SESSION['registered_user'] = $_POST['logname'];
		}
	}
		if ( $_SESSION['registered_user'] == 'admin') {
			echo '<div class = "log"><h3> Welcome, ' . $_SESSION['registered_user'] . '</h3>';
			echo '<a class="btn" href ="adminPanel.php"> As admin </a>'; 
			echo '<a class="btn" href ="index.php?unlog=5"> Quit </a></div>';
		}
		else {
			echo '<div class = "log"><h3> Welcome, ' . $_SESSION['registered_user'] . '</h3>';
			echo '<a class="btn" href ="index.php?unlog=5">Quit</a></div>';	
		}
	}
?>