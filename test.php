<?php
include('config.php');
 $sql = "SELECT * from users;";
            $result = mysql_query($sql);
            
            while($row=mysql_fetch_array($result)){
                    if ("pranavprem@gmail.com"==$row["email"]  && "123"==$row["password"]){
						$_SESSION["uid"] = 1;
						echo $_row['id'];
						echo "please ";
                    }
					else
					{
						echo $row['id'];
					}
                }

?>