<?php
session_start();
include('util.php');

function getTopFive()
{
$owners = array('MarketPlace','arun','pranav','harkanwal','surbhi','divya','Parag');
include('config.php');

$length = count($owners);

for($i=0;$i<$length;$i++)
{

if($owners[$i]!='MarketPlace')
{
$displayName = "Top 5 in ".$owners[$i]."'s website";
$owner = "and owner = '".$owners[$i]."'";	
}
else
{
$displayName = "Top 5 Rated in Market Place";
$owner = "";
}

$result = mysql_query("SELECT p.id,avg(stars) as rating FROM products P inner join ratings r on r.productid = p.id WHERE review is not null ".$owner." group by p.id order by rating desc");
echo '<div class = "newrow">';
echo '<h3><b>'.$displayName.'</b></h3>';

while ($row = mysql_fetch_array($result))
{	
	buildProductsUI(true, $row['id']);
}

echo '</div>';

}
}

?>
<html>
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Every One Must Shop - Valar Shopoholics</title>
  <meta charset="utf-8">
   <?php require "includes/head.php" ?>
 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/form-elements.css">
  <link rel="stylesheet" href="css/products.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ > 
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
 
</head>
<body>  
<?php require "includes/othernavbar.php" ?>

<div class="container">
 <ul class="main-nav">
 <li><a class="link animated fadeInUp delay-1s servicelink" href="topproducts.php">Top Visited</a></li>
 <li><a class="link animated fadeInUp delay-1s servicelink" href="toprated.php">Top Rated</a></li>
 <li><a class="link animated fadeInUp delay-1s servicelink" href="tops.php">User Tracking</a></li>
 </ul>	
 <div class="products">
 <?php getTopFive() ?>
</div> 
</div>
</body>
</html>