<?php 
	connect();
	echo '<form class="admin city" action="adminPanel.php?menu=2" method="post">';
		$res = mysql_query("select * from countries");
		echo '<select name="countryid">';
		while ($row=mysql_fetch_array($res)){
			echo'<option value="'.$row[0].'">'.$row[1].'</option>';
		}
		mysql_free_result($res);
		echo'</select>';
		echo'<input type="text" name="cityname" placeholder="city...">';
		echo '<input type="submit" name="addcity" value="Add"
			class="btn btn-success">';
		echo '<input type="submit" name="delcity" value="Delete"
			class="btn btn-warning">';
		$sel1 = 'select ci.id, ci.city, co.country
			from countries co, cities ci 
			where ci.countryid=co.id';
			$res1=mysql_query($sel1);
			echo '<table class="table table-striped">';
				while($row1 = mysql_fetch_array($res1)){
					echo '<tr>';
					echo '<td>'.$row1[1].'</td>';
					echo '<td>'.$row1[2].'</td>';
					echo '<td><input type="checkbox" name="ci'.$row1[0].'"></td>';
					echo '</tr>';
				}
			echo '</table>';
	echo '</form>';
	if(isset($_POST['addcity'])){
		$city = htmlspecialchars(trim($_POST['cityname']));
		if($city == "") exit;
		$cid = $_POST['countryid'];
		$ins = 'insert into cities (city, countryid) values ("'.$city.'",'.$cid.' )';
		mysql_query($ins);
		echo'<script>window.location=document.URL;</script>';
	}
	if(isset($_POST['delcity'])){
		foreach($_POST as $k => $v){
			if(substr($k,0,2)=="ci"){
				$idc = substr($k,2);
				$del = 'delete from cities where id='.$idc;
				mysql_query($del);
			}
		}
		echo'<script>window.location=document.URL;</script>';
	}



?>