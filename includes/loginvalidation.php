<?php
 session_start();
 require "../config.php";
     if (isset($_POST["Login"]) && !empty($_POST["Username"]) && !empty($_POST["Password"])){
            $sql = "SELECT * from users;";
            $result = mysql_query($sql);
            
            while($row=mysql_fetch_array($result)){
                    if ($_POST["Username"]==$row["email"]  && $_POST["Password"]==$row["password"]){
						$_SESSION["uid"] = $row["id"];
                        header("location: ../allproducts.php");
                    }
                }
     }
    else
    {
        header("location: ../index.php");
    }
?>