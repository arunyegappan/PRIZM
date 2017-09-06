<?php

if(isset($_SESSION['product_ids']))
{
$pid = $_SESSION['product_ids'];
}
else
{
$pid = "'0'";
}

$product_ids = array();
$inner_sql = "SELECT orderid FROM ordermap WHERE productid IN (".$pid.")";
$sql = "SELECT distinct productid FROM ordermap WHERE orderid IN ( ".$inner_sql.") and productid NOT IN (".$pid.") limit 3;";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
    if($row["productid"] != $pid)
    array_push($product_ids,$row["productid"]);
}    

    


foreach ($product_ids as $product_id){
    buildProductsUI(true, $product_id);
}
?>

