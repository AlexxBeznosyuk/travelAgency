<?php 
	session_start();
	ob_start(); 
	include_once("function.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" type="text/css"  media="screen" href="../css/style.css">
	<title>Document</title>
</head>
<body class="h_i">
	<?php 
	$sql_info = 'SELECT ci.city, co.country, ho.hotel, ho.stars, ho.info
				 FROM hotels ho, countries co, cities ci
				 WHERE ho.cityid = ci.id and ho.countryid = co.id and ho.id ='.$_GET['hotelid'];
	$res_info = mysqli_query($link, $sql_info) or die (mysqli_error($link));
	while ($row = mysqli_fetch_assoc($res_info)){
		echo '<section class="h_i">';
		echo '<div class="hotel_info">' ;
		echo '<h2>'.$row['hotel'].'</h2>';
		$stars= 15*$row['stars'];
		echo '<div class="star"><div class="howstar" style="width:'.$stars.'px"></div></div>';		
		echo '<div class="c-c">'.$row['city'].'('.$row['country'].')</div>';
		echo '<p>'.$row['info'].'</p>';
		echo '</div>';
	}
?>
<article class="carousel">
<div class="w3-content w3-display-container">
<?php 
  	$sql_img = 'SELECT  imagepath
  				FROM images WHERE hotelid ='.$_GET['hotelid'];
  	$res_img = mysqli_query($link, $sql_img) or die (mysqli_error($link));	
  	while ($row = mysqli_fetch_row($res_img)){		
   	echo '<img class="mySlides" src="../'.$row[0].'" style="width:100%">';
  	}
?>
  <button class="w3-button display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button display-right" onclick="plusDivs(1)">&#10095;</button>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

</script>
</article>
<?php 
		echo '</section>'; ?>
</body>
</html>