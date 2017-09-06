<?php
$uid = $_SESSION['uid'];

$product_ids = array();
$inner_sql = "SELECT orderid FROM orders WHERE userid = ".$uid."";
$sql = "SELECT distinct productid FROM ordermap WHERE orderid IN ( ".$inner_sql.") limit 4;";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
    array_push($product_ids,$row["productid"]);
}    

    


foreach ($product_ids as $product_id){
    buildProductsUI(true, $product_id);
}
?>

