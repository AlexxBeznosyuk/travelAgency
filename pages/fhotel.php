<?php
connect();
echo '<form class="admin hotel" action="adminPanel.php?menu=3" method="post"  class="input-group" 
	id="formhotel">';
	

	$sel='select ci.id, ci.city, co.country, co.id
	from countries co, cities ci
	WHERE ci.countryid=co.id';
	$res=mysql_query($sel);
	$csel=array();
	echo '<fieldset><select name="hcity" class="">';
	while ($row=mysql_fetch_array($res,MYSQL_NUM)){
		echo '<option value="'.$row[0].'">'.$row[1]." : ".$row[2].'</option>';
		$csel[$row[0]]=$row[3];
	}
	echo '</select>';
	echo '<input type="text" name="hotel" placeholder="назв.отеля">';
	echo '<input type="number" name="cost" placeholder="цена номера">';
	echo '<input type="number" name="stars" max="5" min="1" step="1" placeholder="stars">';
	echo '<br><textarea name="info" placeholder="описание" rows="3">';
	echo '</textarea><br>';
	echo '<input type="submit" name="addhotel" value="добавить">';
	echo '<input type="submit" name="delhotel" value="удалить"></fieldset>';
	mysql_free_result($res);
	$sel = 'select ci.id, ci.city, 
	ho.id, ho.hotel, ho.cityid, ho.countryid, ho.stars, ho.info, 
	co.id, co.country
	from cities ci, hotels ho, countries co
	WHERE ho.cityid=ci.id and ho.countryid=co.id';
	$res=mysql_query($sel);
	$err=mysql_errno();
	echo '<table class="table">';
	while ($row=mysql_fetch_array($res,MYSQL_NUM)) {
		echo '<tr>';
		/*foreach ($row as $k => $v) {
			echo '<td>';
			echo $k.'='.$v;
			echo '</td>';
		}*/
		echo '<td>'.$row[1]."-".$row[9].'</td>';//страна и город
		echo '<td>'.$row[3].'</td>';//отель
		echo '<td>'.$row[6].'</td>';//звёзды
		echo '<td>'.$row[7].'</td>';//описание
		echo '<td><input type="checkbox" name="hb'.$row[2].'"></td>';
		echo '</tr>';
	}
	echo '</table>';
	mysql_free_result($res);
	echo '</form>';
	if(isset($_POST['addhotel'])){
		$hotel=trim(htmlspecialchars($_POST['hotel']));
		$cost=intval(trim(htmlspecialchars($_POST['cost'])));
		$stars=intval($_POST['stars']);
		$info=trim(htmlspecialchars($_POST['info']));
		if ($hotel==""||$cost==""||$stars=="") exit();
		$cityid=$_POST['hcity'];
		$countryid=$csel[$cityid];
		$ins='insert into hotels (hotel,cityid,countryid,stars,cost,info) values("'.$hotel.'",'.$cityid;
		$ins.=",".$countryid.','.$stars.','.$cost.',"'.$info;
		$ins.='")';
echo $ins;
		mysql_query($ins);
		echo "<script>";
		echo "window.location=document.URL;";
		echo "</script>";
	}
	if(isset($_POST['delhotel'])){
		foreach ($_POST as $k => $v) {
			if (substr($k,0,2)=="hb"){
				$idc=substr($k,2);
				$del='delete from hotels where id='.$idc;
				mysql_query($del);
				if ($err){
				echo 'Error code:'.$err.'<br>';
				exit();
				}
			}
		}
		echo "<script>";
		echo "window.location=document.URL;";
		echo "</script>";
	}

	echo '<form action="adminPanel.php?menu=3" 
	method="post" enctype="multipart/form-data">';
		echo '<select name="hotelid">';
		$sel2 = 'select id, hotel from hotels';
		$res2 = mysql_query($sel2);
		while($row2= mysql_fetch_array($res2)){
			echo '<option value="'.$row2[0].'">'.$row2[1].'</option>';
		}
		mysql_free_result($res2);
		echo '</select>';
		echo '<input type="file" name="file[]" multiple accept="image/*">';
		echo '<input type="submit" name="addimage" value="add photo">';
	echo '</form>';
	if(isset($_POST['addimage'])){
		foreach($_FILES['file']['name'] as $k => $v){
			if($_FILES['file']['name'][$k] != 0){
				echo 'error';
				continue;
			}
			if(move_uploaded_file($_FILES['file']['tmp_name'][$k],'images/'.$v)){
			$ins = 'insert into images(hotelid, imagepath) values
						('.$_POST['hotelid'].' , "images/'.$v.'")';
				mysql_query($ins);
			}
		}
	}
?>