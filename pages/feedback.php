<a class="btn rewiew" href="index.php?menu=2&rew=2">Leave rewiew</a>
<?php 
	if (isset($_GET['rew']) && $_GET['rew']==2 && isset($_SESSION['registered_user'])){
		echo '<form class="rew" method="post" action="index.php?menu=2">';
		echo '<h3>Leave an entry in our Guestbook:</h3><br>';
		echo '<textarea name="msg"></textarea><br />';
		echo '<input type="submit" name = "subrew" value="Send" />';
		echo '<a class="btn1" href="index.php?menu=2&rew=0">+</a>';
		echo '</form>';
	}
	if(isset($_POST['subrew'])){
		$msg = clearStr($_POST['msg']);
		connect();
		$f_sql = 'SELECT id, login, avatar FROM users';
		$f_res = mysqli_query($link, $f_sql);
		while ($row = mysqli_fetch_assoc($f_res)){
			if ( $row['login'] == $_SESSION['registered_user']){
				$usfedid= $row['id'];
				$fi_sql = "INSERT into msgs (msg, userid) values ( '$msg', '$usfedid')";
				mysqli_query($link, $fi_sql) or die(mysql_error($link));
				header('Location: index.php?menu=2');
			}
		}
		mysql_free_result($f_res);
	}
	$f_sql1 = 'select  us.id, us.login, us.avatar, ms.msg, ms.dt, ms.id
			    FROM users us, msgs ms
			    where ms.userid = us.id ORDER BY ms.id DESC LIMIT 5';
	$f_res1 = mysqli_query($link, $f_sql1);
	while ($row = mysqli_fetch_row($f_res1)){
		$id=$row[5];
		echo '<div class="msg">';
		echo '<img src="'.$row[2].'">';
		echo '<h4>'.$row[1].'</h4>';
		echo '<div>'.$row[4].'</div>';
		echo '<p>'.$row[3].'</p>';
		echo '<a class="btn1" title="delete message" href="index.php?menu=2&del='.$id.'">+</a>';
		echo '</div>';
	}
		if(isset($_GET['del'])) {
			$del = abs((int)$_GET['del']);
			$sqldel = "select users.id, users.login, msgs.userid from users, msgs where users.id=msgs.userid and msgs.id=$del";
			$f_resdel = mysqli_query($link, $sqldel);
			$rowdel = mysqli_fetch_row($f_resdel);
			if(($del && $rowdel[1] == $_SESSION['registered_user']) || $_SESSION['registered_user']== "admin"){
				$sql = "DELETE FROM msgs WHERE id=$del";
				mysqli_query($link, $sql) or die(mysql_error($link));
				header('Location: index.php?menu=2');
				exit;
			}
		}




?>
	