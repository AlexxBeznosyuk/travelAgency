<?php 
	define("DB_HOST", "localhost"); 
	define("DB_LOGIN", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "alexx");
	$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);

	function connect($host = "localhost",
					 $user = "root",
					 $pass = "",
					 $dbname = "alexx"){
		mysql_connect($host, $user, $pass) or die("connection error");
		mysql_select_db($dbname) or die("select db error");
		mysql_query("set names 'utf8'");
	}
	function clearStr ($data) {
		global $link;
		return mysqli_real_escape_string($link, trim(strip_tags($data)));
	}

	function register( $name, $pass, $email) {
		global $link;
		$name = clearStr($name);
		$email = clearStr($email);
		$pass = md5(clearStr($pass));
		$phone = '(0xx) xxx-xx-xx';
		$discount = "5\%";
		$avatar = 'avatar.png';
		$sql = "INSERT INTO users (login, pass, email, phone, discount, avatar)
			      VALUES ('$name', '$pass',  '$email', '$phone','5', '$avatar')";
		mysqli_query($link, $sql);
		$err = mysqli_error($link);
				if ($err){
				 	if($err==1062) {
				 		echo '<p class = "suclog"><span style="color: red; ">This Login Is Already Taken!</span></p>';
				 		header ("Refresh: 3; url = index.php?menu=3");
				 	}
				 else echo "<h3><span style=’color:red;’>Error code:".$err."!</span><h3/>";
				 return false;
				}
		return true;
	}

	function loger($lname, $lpass){
		global $link;
		$lname = clearStr($lname);
		$lpass = md5(clearStr($lpass));
		$lsql = 'SELECT login, pass FROM users';
		$lres = mysqli_query($link, $lsql);
		while( $lrow = mysqli_fetch_row($lres)){
			if( $lrow[0] == $lname && $lrow[1] == $lpass) {
				return true;
			}
		}
	}
?>