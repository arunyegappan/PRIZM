<?php 
    session_start();
	  // Creating connection to database
	  include('config.php');

    // Inserting data into orders table
    $sql = "INSERT INTO orders (userid, address, timestamp) VALUES($_SESSION[uid],'".$_POST[address]."',now())";
	mysql_query($sql);

    //Inserting data into ordermap table
    $query = mysql_query("SELECT MAX(orderid) FROM orders");
	$results = mysql_fetch_array($query);
	$order_id = $results['MAX(orderid)'];
	echo $order_id;
    $productid_array = explode(",",$_SESSION['product_ids']);

    foreach ($productid_array as $productid) {
    	$sql = "INSERT INTO ordermap(orderid, productid) values($order_id,$productid)";
		//echo $sql;
    	mysql_query($sql);
    }

    // Sending mail to user
    // $to = $_SESSION['email'];
 /*   $to = "vijay.parag9@gmail.com";
    $message = "Your order has been successfully placed and is under processing. Thanks.";
    $subject = "Latest order at PRIZM. Order ID : $order_id";
    $header = 'From: confirmorder@prizm.com' . "\r\n" .
    		  'Reply-To: webmaster@example.com' . "\r\n" .
              'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $header);
*/
    // Redirecting to orderhistory.php
	unset($_SESSION['product_ids']);
   echo '<script> location.href = "orderhistory.php"</script>';

  ?>