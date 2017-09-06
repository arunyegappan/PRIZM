<?php require "../config.php"?>
<?php 

    $sql = "INSERT INTO users (firstname,lastname,email,homeaddress,homephone,cellphone,password) VALUES ('".$_POST["firstname"]."', '".$_POST["lastname"]."', '".$_POST["email"]."', '".$_POST["homeaddress"]."', '".$_POST["homephone"]."', '".$_POST["cellphone"]."', '".$_POST["password"]."')";
    $result = mysql_query($sql);
	header("location: ../allproducts.php");
    
?>