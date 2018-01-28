<?php
if(!isset($_POST['subreg']))
{
?>
<form action="index.php" method="post">
	<label for="nm">Login:</label><input id="nm" type="text" name="login" required autofocus >
	<label for="em">E-mail:</label><input id="em" type="email" name="email" >
	<label for="ps">Password:</label><input id="ps" type="password" name="password" >
	<input type="submit" name="subreg" value="Send">
	<input type="reset" value="Reset">
</form>
<?php
}
else{
	$user = new User($_POST['login'], $_POST['password'], $_POST['email']);
	if (!$user->intoDb()){
		echo "<p class = 'suclog'> The successful registration</p>
		<p class = 'suclog'> Welcome to our website</p>";
		$_SESSION['registered_user'] = $_POST['login'];
		header ("Refresh: 3; url = index.php?menu=1");
		exit;
	}
}
?>
