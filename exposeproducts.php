<?php
function getProductsbyOwner($owner)
{
include('config.php');

$sql = "SELECT * FROM products where owner='$owner'";
$result = mysql_query($sql);

$rows = array();
while ($row = mysql_fetch_assoc($result)) {
    $rows[] = $row;
}
header("Content-type:application/json");
echo json_encode($rows);

	
}

getProductsbyOwner("arun");

?>