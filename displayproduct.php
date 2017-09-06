<?php
session_start();
include "config.php";
include "util.php";
if(isset($_GET['pid']))
{
$uid = -1;

if(isset($_SESSION['uid']))
{
	$uid = $_SESSION['uid'];
}
$product_id=$_GET['pid'];

$result = mysql_query("SELECT p.id,name,description,imgUrl,price,count(*) as reviews,floor(avg(stars)) as rating FROM `products` p inner join ratings r on r.productid = p.id WHERE id = '$product_id' and review is not null");


while ($row = mysql_fetch_array($result))
{
   $title = $row["name"]; 
   $description =  $row["description"];
   $img =  $row["imgUrl"];
   $price = $row["price"];
   $rating = $row["rating"];
   $reviews = $row["reviews"];
}
updateHits($product_id);

    if(isset($_COOKIE["lastids"])){
        if(explode(",",$_COOKIE["lastids"])[0]!=$_GET["pid"]){
            setcookie("lastids",$_GET["pid"].",".$_COOKIE["lastids"],time() + (86400 * 30));    
        }
        
    }
    else{
        setcookie("lastids", $_GET["pid"], time() + (86400 * 30));
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
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php require "includes/othernavbar.php" ?>

	<div class="container">
	
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="<?php echo $img?>" height="450" width="450" /></div>
						 
						</div>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?php echo $title ?></h3>
						<div class="rating">
							<div class="stars">
							<fieldset class="rating" disabled>
							<?php buildRatingStars($rating,false,1);?>
							</fieldset>
							</div>
							<div class="review-no"><?php echo '<a href="#" id="myBtn" onclick=getReviews("'.$product_id.'")>'.$reviews.' reviews</a>'?> </div>
							
							
						</div>
						<p class="product-description"><?php echo $description ?></p>
						<h4 class="price">current price: $<span><?php echo $price ?>.00</span></h4>
						
						<div class="action">
							<button class="add-to-cart btn btn-default" type="button" onclick="addToCart('<?php echo $product_id ?>')">add to cart</button>
						</div>
							<div class="addreviews">
							</br>
								<h3>Add a new review: </h3>
								<fieldset class="rating">
									<input type="radio" id="star5" name="rating1" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
									<input type="radio" id="star4half" name="rating1" value="5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
									<input type="radio" id="star4" name="rating1" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
									<input type="radio" id="star3half" name="rating1" value="4" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
									<input type="radio" id="star3" name="rating1" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
									<input type="radio" id="star2half" name="rating1" value="3" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
									<input type="radio" id="star2" name="rating1" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
									<input type="radio" id="star1half" name="rating1" value="2" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
									<input type="radio" id="star1" name="rating1" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
									<input type="radio" id="starhalf" name="rating1" value="1" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
								</fieldset>
								<div class="form-group">
								  
								<textarea class="form-control" rows="5" id="comment"></textarea>
								</div>
								<div class="action">
							<button class="add-to-cart btn btn-default" type="button" onclick="addNewReview('<?php echo $product_id ?>',<?php echo $uid ?>)">Add Review</button>
						</div>
						
						</div>
						</div>
					</div>
					
					
					<!-- The Modal -->
					<div id="myModal" class="mymodal">

					  <!-- Modal content -->
					  <div class="modal-content">
						<span class="close">&times;</span>
						<div id="reviewcontent"> </div>
					  </div>

					</div>

				</div>
			</div>
		<div class="row">
		<h3><b>Similar Recommendations for you</b></h3>
		<?php include('product_recommend.php');?>
		</div>
		
		<div class="row newrow">
		<h3><b>You already bought these : </b></h3>
		<?php
		if(isset($_SESSION['uid']))
		{
		include('user_recommend.php');
		}
		?>
		
		</div>
	</div>

</body>
</html>