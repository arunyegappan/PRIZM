<?php require "login.php" ?>
<nav class="main-nav-outer" id="test">
	<div class="container">
        <ul class="main-nav">
            <li><a href="index.php#about">ABOUT</a></li>
            <li><a href="allproducts.php">PRODUCTS</a></li>
            <li><a href="index.php#news">NEWS</a></li>
            <li><a href="index.php#contacts">CONTACTS</a></li>
			<?php
			if(isset($_SESSION['uid']))
			{
            echo '<li><a href="orderhistory.php">My Orders</a></li>';
			}
			?>
            <li class="small-logo"><a href="#header"><img class="headerlogo" style="width:50%" src="img/SpartanMusicBlackLogo.png" alt=""></a></li>
                        
            <li><a class="link animated fadeInUp delay-1s servicelink" href="cart.php" >Cart</a></li>
			<?php
			if(isset($_SESSION['uid']))
			{
            echo '<li><a class="link animated fadeInUp delay-1s servicelink" href="includes/logout.php">Logout</a></li>';
			}
			else
			{
            echo '<li><a class="link animated fadeInUp delay-1s servicelink" href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>';
			}
			?>

        </ul>

        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
    </div>
</nav>
