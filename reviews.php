<html>
<head>
<link rel="stylesheet" href="css/products.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/form-elements.css">
 
</head>
<body>
<h2> Reviews For this Product</h2>

</body>
</html>

<?php

if(isset($_GET['pid']))
{
include('util.php');
include('config.php');
$pid = $_GET['pid'];
$sql = "SELECT review,stars,timestamp,CONCAT(firstname,' ',lastname) as firstname FROM products p inner join ratings r on r.productid = p.id inner join users u on u.id = r.userId WHERE p.id = '".$pid."' and review is not null";
$result = mysql_query($sql);

$count = 0;
while ($row = mysql_fetch_array($result))
{
   $firstname =  $row["firstname"];
   $timestamp = $row["timestamp"];
   $rating = $row["stars"];
   $review = $row["review"];
   $count++;
   buildReviewsUI($firstname,$timestamp,$rating,$review,$count);
}


}

function buildReviewsUI($firstname,$timestamp,$rating,$review,$count)
{
echo "<u>".$firstname."</u><br/>";
echo $timestamp."<br/>";
echo '<div class="rating">
							<div class="stars">
							<fieldset class="rating" disabled>';
							buildRatingStars($rating,true,$count);
echo '</fieldset></div>';
echo "<br/>".$review."<br/><br/><br/>";

	
}
?>

