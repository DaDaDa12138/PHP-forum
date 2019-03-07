<?php
include "../functions/db.php";
  if(isset($_GET['post_Id'])){
		$id = $_GET['post_Id'];
	}
	if(empty($id)){
		header("location:../pages/home.php");
	}

	$result = mysql_query("DELETE FROM tblpost WHERE post_Id = '$id'")
	or die(mysql_error());  	

	header("Location:../pages/post.php");
	
?>