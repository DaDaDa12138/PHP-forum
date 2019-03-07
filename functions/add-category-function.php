<?php
include "../functions/db.php";
 				
extract($_POST);
$sqli = "INSERT INTO `category`(category) VALUES ('$category')";
$result = mysql_query($sqli);

header("Location:../pages/category.php");


?>