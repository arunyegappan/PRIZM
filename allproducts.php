<?php
session_start();
include('util.php');

function FillDetails()
{
include('config.php');
$content = "";
$field = "";
$value =0;
	
if(isset($_GET['field']))
{
	$field = $_GET['field'];
}

if(isset($_GET['value']))
{
	$value = $_GET['value'];
}

if($field == "")
	$sql = "select * from products order by id asc";
else
	if($field!="price")
		$sql= "select * from products where ".$field."='".$value."'";
	else
		$sql= "select * from products where ".$field."<".$value;

$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)) {
	$id = $row['id'];
	$img = $row['imgUrl'];
	$desc = $row['description'];
	$title = $row['name'];
	$price = $row['price'];
	$content = $content.createProductUI($id,$img,$desc,$title,$price); 
}

echo $content;

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
  <link rel="stylesheet" href="path/to/easy-autocomplete.min.css"> 
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php require "includes/othernavbar.php" ?>

<br/><br/>
        
<div class="container">
	<div class="col-md-2">
	
	<div class="span3">         
		<div class="well">
			<ul id="cat-navi" class="nav nav-list">
			  <li class="nav-header"><b>Shop by Owner</b></li>
			  <li class="active"><a href="allproducts.php">Market Place</a></li>
			  <li><a href="allproducts.php?field=owner&value=arun">Arun</a></li>
			  <li><a href="allproducts.php?field=owner&value=pranav">Pranav</a></li>
			  <li><a href="allproducts.php?field=owner&value=harkanwal">Harkanval</a></li>
			</ul>
			
			
			
		</div><!-- /well--> 
			
	</div>
	
	</div>
    <div id="products" class=" list-group col-md-10">
        <?php FillDetails(); ?>
    </div>
</div>


</body>
</html>
