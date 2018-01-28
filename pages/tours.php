<?php 
connect();
echo '<form class="tours" action="index.php?menu=1" method="post">';
echo '<select name="countryid">';
$res = mysql_query('select * from countries order by country');
echo '<option value="0">Select country...</option>';
while($row=mysql_fetch_row($res)){
	echo '<option value="'.$row[0].'">';
	echo$row[1].'</option>';
}
mysql_free_result($res);
echo '</select>';
echo '<input type="submit" name="sub1" value="Select country">';
?>	
<?php 
if(isset($_POST['sub1'])){
	if($_POST['countryid']==0) exit();
	$sel='select * from cities where countryid='.$_POST['countryid'].' order by city';
	echo '<select name="cityid">';
	echo '<option value = "0">Select city...</option>';
	$res2 = mysql_query($sel);
	while($row = mysql_fetch_row($res2)){
		echo '<option value="'.$row[0].'">';
		echo $row[1].'</option>';
	}
	mysql_free_result($res2);
	echo '</select>';
	echo '<input type="submit" name="sub2" value="Select city">';
}
if(isset($_POST['sub2'])){
	echo '</form>';
	$cityid = $_POST['cityid'];
	$sel = 'select ho.hotel, co.country, ci.city, ho.cost, ho.id, ho.stars
			from hotels ho, countries co, cities ci
			where ci.countryid=co.id and 
			ho.cityid = ci.id and ci.id ='.$cityid;
			echo '<table class="tours_table">';
			echo '<tr><th>Hotel</th><th>Country</th><th>City</th>
			<th>Cost</th><th>Stars</th><th>Info</th></tr>';
			$res3 = mysql_query($sel);
			while ($row = mysql_fetch_array($res3)){
				echo '<tr>';
				echo '<td>'.$row[0].'</td>';
				echo '<td>'.$row[1].'</td>';
				echo '<td>'.$row[2].'</td>';
				echo '<td>'.$row[3].'$</td>';
				$stars= 15*$row[5];
				echo '<td class="star"><div class="howstar" style="width:'.$stars.'px"></div></td>';
				echo '<td><a target="_blank" href="pages/hotelinfo.php?hotelid='.
				$row[4].'">More info...</a></td>';
				echo '</tr>';
			}
			mysql_free_result($res3);
			echo '</table>';
}
?>