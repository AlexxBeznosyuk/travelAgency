<?php 
	$p_sql = 'SELECT id,login, email, discount, phone, avatar FROM users';
	$p_res = mysqli_query($link, $p_sql);
	while ($p_row = mysqli_fetch_assoc($p_res)){
		if ( $p_row['login'] == $_SESSION['registered_user']){
			echo '<form class="personal" action="index.php?menu=4" method = "post"  enctype="multipart/form-data"> ';
			echo '<img class="photo" src='.$p_row["avatar"].' ">';
			echo '<h3>'.$p_row["login"] .'</h3>  ';
			echo '<label>My e-mail: </label><input type="text" name = "p_email" value=" '.$p_row["email"].' " >';
			echo '<label>My discount: </label><input type="text" readonly value=" '.$p_row["discount"].'% ">  ';
			echo '<label>My phone: </label><input type="text" name = "p_phone" value=" '.$p_row["phone"].' " >';
			echo '<label>Change avatar: </label><input type = "file" name="p_file">';
			echo '<input type="submit" name="p_sub" value="Change"> ';
			echo '<input type="reset" value="Reset"> ';
			echo '</form>';
			$p_id = $p_row['id'];
	if(isset($_POST['p_sub'])){
		$p_email = clearStr($_POST['p_email']);
		$p_phone = clearStr($_POST['p_phone']);
		if ( is_uploaded_file($_FILES['p_file']['tmp_name'])) {
			$logimg = $p_row['login'].".";
			$p_avatar = "images/avatar/".$logimg.$_FILES['p_file']['name'];
			$p_del = $p_row["avatar"];
			unlink($p_del);
			move_uploaded_file($_FILES['p_file']['tmp_name'], 
				$p_avatar);
		}
		if ($p_avatar == '') $p_avatar = $p_row['avatar'];
		$p_sql1 = "UPDATE users SET  phone ='$p_phone', email='$p_email', avatar = '$p_avatar' where id = '$p_id'"; 
		$p_res1 = mysqli_query($link, $p_sql1);
		header("Location: index.php?menu=4");
		}
	}
}
?>