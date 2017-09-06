<?php
session_start();
include('util.php');
include('config.php');
$uid = -1;

if(isset($_SESSION['uid']))
{
	$uid = $_SESSION['uid'];
}
$productIds = "";

$result = mysql_query("SELECT p.id FROM users u inner join orders o on u.id = o.userid inner join ordermap om on om.orderid = o.orderid inner join products p on p.id=om.productid WHERE u.id=".$uid);

while ($row = mysql_fetch_array($result))
{
$productIds = $productIds."'".$row['id']."',";
}

$productIds = rtrim($productIds,',');
?>
<html><meta charset="utf-8">
<head>
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
  <link rel="stylesheet" href="path/to/easy-autocomplete.min.css"> 
</head>
<body>  
<?php require "includes/othernavbar.php" ?>
  
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:100%">Product</th>
							<th style="width:40%">Price</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if($productIds!="")
							$total = buildCartUI($productIds); 
						else
							echo '</br></br><b>You did not order any product yet. Please check our <a href="allproducts.php">products</a> page to find awesome products at low price.</b></br></br></br>';
						?>
					</tbody>
									</table>
</div>

</html>