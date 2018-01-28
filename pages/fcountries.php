<?php 
	connect();
	$res = mysql_query("select * from countries");
	echo '<form class="admin country" action="adminPanel.php?menu=1" method="post">';
	echo '<input type="text" name="countryname" placeholder="Country...">';
	echo '<input type="submit" name="addcountry" value="Add Country"
			class="btn btn-success">';
	echo '<input type="submit" name="delcountry" value="Delete Country"
			class="btn btn-danger">';
			echo '<table class="table table-striped">';
		while($row = mysql_fetch_array($res)){
			echo '<tr>';	
			echo '<td>'.$row[0].'</td>';
			echo '<td>'.$row[1].'</td>';
			echo '<td><input type="checkbox" name="cb'.$row[0].'"></td>';
			echo '</tr>';
		}
	echo '</table>';
	echo '</form>';

	
	mysql_free_result($res);
	if (isset($_POST['addcountry'])){
		$country = htmlspecialchars(trim($_POST['countryname']));
		if($country == "") exit;
		$ins = 'insert into countries (country) values ("'.$country.'")';
		mysql_query($ins);
		echo'<script>window.location=document.URL;</script>';
	}
	if (isset($_POST['delcountry'])){
		foreach($_POST as $k => $v){
			if(substr($k, 0, 2) == "cb"){
				$idc = substr($k, 2);
				$del = 'delete from countries where id='.$idc;
				mysql_query(($del));
			}
		}
		echo'<script>window.location=document.URL;</script>';
	}


?>
