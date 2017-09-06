<?php

$pid = $_GET["pid"];

$product_ids = array();
$sql = "SELECT keywords FROM products WHERE id = '".$pid."';";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
foreach (explode(", ",$row["keywords"]) as $keyword){
    $inner_sql = "SELECT id FROM products WHERE keywords LIKE '%".$keyword."%';";
    $inner_result = mysql_query($inner_sql);
    while($inner_row = mysql_fetch_array($inner_result)){
        if ($pid != $inner_row["id"] && !in_array($inner_row["id"],$product_ids)){
        array_push($product_ids,$inner_row["id"]);
        }    
    }
    
}

foreach ($product_ids as $product_id){
    buildProductsUI(true, $product_id);
}



?>

