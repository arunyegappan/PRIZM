<?php
session_start();
?>

<!doctype html>
<html>

    <head>
        <?php require "includes/head.php" ?>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/form-elements.css">
<link rel="stylesheet" href="css/products.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <title>Prizm</title>
        <?php ob_start(); ?>
    </head>
    <body>
        <script type="text/javascript" src="js/custom-scroll.js"></script>
        <?php require "includes/othernavbar.php" ?>
        <?php require "./util.php"?>
        <section class="main-section alabaster" id="tops">
            <div class="col-lg-7 col-sm-8 wow fadeInRight">
                        <h2>Your top viewed</h2>
						<div class="container">
                        <?php
                            if(isset($_COOKIE["lastids"])){

                             $heatmap=array();
                             foreach (explode(",",$_COOKIE["lastids"]) as $id){
                                 if(isset($heatmap[$id])){
                                     $heatmap[$id] = $heatmap[$id] + 1;
                                 }
                                 else {
                                     $heatmap[$id] = 1;
                                 }
                             }
                            for($i=0;$i<5;$i++){
                             $max=0;
                             $maxid=0;
                            foreach ($heatmap as $key => $value){
                                 if($value>$max){
                                     $max = $value;
                                     $maxid = $key;
                                 }
                             }


                            buildProductsUI(true, $maxid);
                            unset($heatmap[$maxid]);    
                            }

                            }
                            else{
                                echo "You have not viewed any products";

                            }

                        ?>

                    </div>
					</div>
                    <div class="col-lg-7 col-sm-12 wow fadeInRight">
                        <h2>Your Last viewed</h2>
						<div class="container">

                        <?php
                            if(isset($_COOKIE["lastids"])){
                                $hits = explode(",",$_COOKIE["lastids"]);
                                $arunviewed = array();
                                $divyaviewed = array();
                                $paragviewed = array();
                                $surbhiviewed = array();
                                $pranavviewed = array();
                                $harkanviewed = array();
                                for($i=0; $i<sizeof($hits); $i++){
                                    if (substr($hits[$i],0,2)=="PP"){
                                       array_push($pranavviewed,$hits[$i]); 
                                    }
                                    elseif (substr($hits[$i],0,2)=="AR"){
                                        array_push($arunviewed,$hits[$i]);
                                    }
                                    elseif (substr($hits[$i],0,2)=="SJ"){
                                        array_push($surbhiviewed,$hits[$i]);
                                    }
                                    elseif (substr($hits[$i],0,2)=="DT"){
                                        array_push($divyaviewed,$hits[$i]);
                                    }
                                    elseif (substr($hits[$i],0,2)=="PV"){
                                        array_push($paragviewed,$hits[$i]);
                                    }
                                    else {
                                        array_push($harkanviewed,$hits[$i]);
                                    }
                                }
                                if(sizeof($pranavviewed)!=0){
                                    echo "<div class = 'newrow'><h3>Pranav's Site</h3>";
                                    }
                                for($i=0; $i<sizeof($pranavviewed); $i++){
                                    buildProductsUI(true, $pranavviewed[$i]); 
                                    }
									echo "</div>";
                                if(sizeof($divyaviewed)!=0){
                                    echo "<div class = 'newrow'><h3>Divyaa's Site</h3>";
                                }
								echo "</div>";
                                for($i=0; $i<sizeof($divyaviewed); $i++){
                                    buildProductsUI(true, $divyaviewed[$i]); 
                                    }
									echo "</div>";
                                if(sizeof($arunviewed)!=0){echo "<div class = 'newrow'><h3>Arun's Site</h3>";}
                                for($i=0; $i<sizeof($arunviewed); $i++){
                                    buildProductsUI(true, $arunviewed[$i]); 
                                    }
									echo "</div>";
                                if(sizeof($surbhiviewed)!=0){echo "<div class = 'newrow'><h3>Surbhi's Site</h3>";}
                                for($i=0; $i<sizeof($surbhiviewed); $i++){
                                    buildProductsUI(true, $surbhiviewed[$i]); 
                                    }
									echo "</div>";
                                if(sizeof($paragviewed)!=0){echo "<div class = 'newrow'><h3>Parag's Site</h3>";}
                                for($i=0; $i<sizeof($paragviewed); $i++){
                                    buildProductsUI(true, $paragviewed[$i]); 
                                    }
									echo "</div>";
                                if(sizeof($harkanviewed)!=0){echo "<div class = 'newrow'><h3>Harkanwal's Site</h3>";}
                                for($i=0; $i<sizeof($harkanviewed); $i++){
                                    buildProductsUI(true, $harkanviewed[$i]); 
                                    }
									echo "</div>";

                            }
                            else{
                                echo "You have not viewed any products";
                            }
							
                        ?>
				</div>
            </div>
        </section>
    </body>
</html>